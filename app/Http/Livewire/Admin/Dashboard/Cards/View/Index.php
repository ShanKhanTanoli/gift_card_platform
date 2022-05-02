<?php

namespace App\Http\Livewire\Admin\Dashboard\Cards\View;

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

    public $card, $business, $balance, $description;

    public $redeem_quantity = 3;
    public $recharge_quantity = 3;

    public function mount($code)
    {
        //Begin::If Card Exists
        if ($card = Card::Find($code)) {
            $this->card = $card;
            $this->business = Business::Find($this->card->owner_id);
        } else {
            session()->flash('error', 'No such card found');
            return redirect(route('AdminCards'));
        }
        //End::If Card Exists
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
        return view('livewire.admin.dashboard.cards.view.index')
            ->with([
                'recharge' => $recharge,
                'redeeming' => $redeeming
            ])->extends('layouts.dashboard');
    }

    public function LoadMoreRechargingHistory()
    {
        return $this->recharge_quantity += 3;
    }

    public function LoadMoreRedeemingHistory()
    {
        return $this->redeem_quantity += 3;
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
                'stripe_id' => "Admin",
                'voucher_id' => $this->card->id,
                'user_id' => Auth::user()->id,
                'amount' => $validated['balance'],
            ]);
            session()->flash('success', 'Card has been recharged successfully');
            return redirect(route('AdminViewCard', $this->card->code));
        } else {
            session()->flash('error', 'Expired card can not be recharged');
            return redirect(route('AdminViewCard', $this->card->code));
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

            //Begin::If Card has Zero Balance
            if ($this->card->balance != 0) {

                //Begin::If Card has Enough Balance
                if ($this->card->balance >= $validated['balance']) {
                    Vouchers::redeem($this->card->code, $validated['balance'], $validated['description'], 'usd', Auth::user(), ['foo' => 'bar']);
                    $this->card->update([
                        'balance' => $this->card->balance - $validated['balance'],
                    ]);
                } else {
                    session()->flash('error', "Card has not enough balance");
                    return redirect(route('AdminViewCard', $this->card->code));
                }
                //End::If Card has Enough Balance

            } else {
                session()->flash('error', "Card has zero balance");
                return redirect(route('AdminViewCard', $this->card->code));
            }
            //End::If Card has Zero Balance

            session()->flash('success', 'Card has been redeemed successfully');
            return redirect(route('AdminViewCard', $this->card->code));
        } catch (\FrittenKeeZ\Vouchers\Exceptions\VoucherNotFoundException $e) {
            session()->flash('error', $e->getMessage());
            return redirect(route('AdminViewCard', $this->card->code));
        } catch (\FrittenKeeZ\Vouchers\Exceptions\VoucherAlreadyRedeemedException $e) {
            session()->flash('error', $e->getMessage());
            return redirect(route('AdminViewCard', $this->card->code));
        }

        //End::If this card is not expired
    }
}
