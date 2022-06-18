<?php

namespace App\Http\Livewire\Business\Dashboard\Tickets\View;

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
        //Begin::If this Business owns a Ticket
        if ($card = Business::FindTicketBySlug(Auth::user()->id, $slug)) {
            dd($card);
            $this->card = $card;
        } else {
            session()->flash('error', 'No such tickets found');
            return redirect(route('BusinessTickets'));
        }
        //End::If this Business owns a Ticket
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


    public function Redeem()
    {
        $validated = $this->validate([
            'balance' => 'required|numeric',
            'description' => 'required|string',
        ]);

        try {

            //Begin::If this Business owns a Ticket
            if ($card = Business::FindTicketBySlug(Auth::user()->id, $this->card->slug)) {

                //Begin::If Card has Zero Balance
                if ($this->card->balance != 0) {

                    //Begin::If Ticket has Enough Balance
                    if ($this->card->balance >= $validated['balance']) {

                        Vouchers::redeem($this->card->slug, $validated['balance'], $validated['description'], 'usd', Auth::user(), ['foo' => 'bar']);
                        $this->card->update([
                            'balance' => $this->card->balance - $validated['balance'],
                        ]);
                        session()->flash('success', 'Ticket has been redeemed successfully');
                        return redirect(route('BusinessViewTicket', $this->card->slug));
                    } else {
                        session()->flash('error', "Ticket has not enough balance");
                        return redirect(route('BusinessViewTicket', $this->card->slug));
                    }
                    //End::If Ticket has Enough Balance

                } else {
                    session()->flash('error', "Ticket has zero balance");
                    return redirect(route('BusinessViewTicket', $this->card->slug));
                }
                //End::If Card has Zero Balance

            } else {
                session()->flash('error', 'No such tickets found');
                return redirect(route('BusinessTickets'));
            }
            //End::If this Business owns a Ticket
        } catch (\FrittenKeeZ\Vouchers\Exceptions\VoucherNotFoundException $e) {
            session()->flash('error', $e->getMessage());
            return redirect(route('BusinessViewTicket', $this->card->slug));
        } catch (\FrittenKeeZ\Vouchers\Exceptions\VoucherAlreadyRedeemedException $e) {
            session()->flash('error', $e->getMessage());
            return redirect(route('BusinessViewTicket', $this->card->slug));
        }
        //End::If this Business owns a Ticket
    }

    public function LoadMoreRedeemingHistory()
    {
        return $this->redeem_quantity += 3;
    }
}
