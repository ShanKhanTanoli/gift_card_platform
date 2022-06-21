<?php

namespace App\Http\Livewire\Business\Dashboard\Cards\View;

use Livewire\Component;
use App\Helpers\Card\Card;
use Livewire\WithPagination;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\Auth;
use FrittenKeeZ\Vouchers\Facades\Vouchers;
use FrittenKeeZ\Vouchers\Models\VoucherRecharge;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $card, $balance, $description;

    public $redeem_quantity = 3;
    public $recharge_quantity = 3;

    public function mount($slug)
    {
        //Begin::If this Business owns a Card
        if ($card = Business::FindAnyCardBySlug(Auth::user()->id, $slug)) {
            $this->card = $card;
        } else {
            session()->flash('error', 'No such card found');
            return redirect(route('BusinessCards'));
        }
        //End::If this Business owns a card
    }

    public function render()
    {
        $recharge = Card::Recharge($this->card->id)
            ->latest()
            ->take($this->recharge_quantity)
            ->get();
        $redeeming = Card::Redeem($this->card->id)
            ->latest()
            ->take($this->redeem_quantity)
            ->get();
        return view('livewire.business.dashboard.cards.view.index')
            ->with([
                'recharge' => $recharge,
                'redeeming' => $redeeming
            ])->extends('layouts.dashboard');
    }

    public function Recharge()
    {
        $validated = $this->validate([
            'balance' => 'required|numeric',
        ]);

        //Begin::If this card is not expired
        if (!$this->card->isExpired()) {
            $this->card->update([
                'balance' => $this->card->balance + $validated['balance'],
            ]);
            VoucherRecharge::create([
                'stripe_id' => Auth::user()->name . 'And ID' . Auth::user()->id,
                'voucher_id' => $this->card->id,
                'user_id' => Auth::user()->id,
                'amount' => $validated['balance'],
            ]);
            session()->flash('success', 'Card has been recharged successfully');
            return redirect(route('BusinessViewCard', $this->card->slug));
        } else {
            session()->flash('error', 'Expired card can not be recharged');
            return redirect(route('BusinessViewCard', $this->card->slug));
        }
        //End::If this card is not expired
    }

    public function Redeem()
    {
        $validated = $this->validate([
            'balance' => 'required|numeric',
            'description' => 'required|string',
        ]);

        try {

            //Begin::If this Business owns a Card
            if ($card = Business::FindCardBySlug(Auth::user()->id, $this->card->slug)) {

                //Begin::If Card has Zero Balance
                if ($this->card->balance != 0) {

                    //Begin::If Card has Enough Balance
                    if ($this->card->balance >= $validated['balance']) {

                        Vouchers::redeem($this->card->slug, $validated['balance'], $validated['description'], 'usd', Auth::user(), ['foo' => 'bar']);
                        $this->card->update([
                            'balance' => $this->card->balance - $validated['balance'],
                        ]);
                        session()->flash('success', 'Card has been redeemed successfully');
                        return redirect(route('BusinessViewCard', $this->card->slug));
                    } else {
                        session()->flash('error', "Card has not enough balance");
                        return redirect(route('BusinessViewCard', $this->card->slug));
                    }
                    //End::If Card has Enough Balance

                } else {
                    session()->flash('error', "Card has zero balance");
                    return redirect(route('BusinessViewCard', $this->card->slug));
                }
                //End::If Card has Zero Balance

            } else {
                session()->flash('error', 'No such card found');
                return redirect(route('BusinessCards'));
            }
            //End::If this Business owns a Card
        } catch (\FrittenKeeZ\Vouchers\Exceptions\VoucherNotFoundException $e) {
            session()->flash('error', $e->getMessage());
            return redirect(route('BusinessViewCard', $this->card->slug));
        } catch (\FrittenKeeZ\Vouchers\Exceptions\VoucherAlreadyRedeemedException $e) {
            session()->flash('error', $e->getMessage());
            return redirect(route('BusinessViewCard', $this->card->slug));
        }
        //End::If this Business owns a card

        //End::If this card is not expired
    }

    public function LoadMoreRechargingHistory()
    {
        return $this->recharge_quantity += 3;
    }

    public function LoadMoreRedeemingHistory()
    {
        return $this->redeem_quantity += 3;
    }
}
