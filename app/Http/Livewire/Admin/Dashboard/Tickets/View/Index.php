<?php

namespace App\Http\Livewire\Admin\Dashboard\Tickets\View;

use Livewire\Component;
use App\Helpers\Card\Card;
use Livewire\WithPagination;
use App\Helpers\Ticket\Ticket;
use App\Helpers\Business\Business;
use FrittenKeeZ\Vouchers\Facades\Vouchers;
use FrittenKeeZ\Vouchers\Exceptions\VoucherNotFoundException;
use FrittenKeeZ\Vouchers\Exceptions\VoucherAlreadyRedeemedException;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $card, $balance, $description;

    public $redeem_quantity = 3;
    public $recharge_quantity = 3;

    public function mount($slug)
    {
        //Begin::If this ticket is available
        if ($card = Ticket::FindBySlug($slug)) {
            $this->card = $card;
        } else {
            session()->flash('error', 'No such ticket found');
            return redirect(route('AdminRedeem'));
        }
        //End::If this ticket is available
    }

    public function render()
    {
        $redeeming = Card::Redeem($this->card->id)
            ->latest()
            ->take($this->redeem_quantity)
            ->get();

        return view('livewire.admin.dashboard.tickets.view.index')
            ->with(['redeeming' => $redeeming])
            ->extends('layouts.dashboard');
    }


    public function Redeem()
    {
        $validated = $this->validate([
            'balance' => 'required|numeric',
            'description' => 'required|string',
        ]);

        try {

            //Begin::If ticket has Zero Balance
            if ($this->card->balance != 0) {

                //Begin::If ticket has Enough Balance
                if ($this->card->balance >= $validated['balance']) {

                    Vouchers::redeem($this->card->code, $validated['balance'], $validated['description'], Business::Currency($this->card->user_id), $this->card->user_id, ['redeem' => 'success']);

                    $this->card->update([
                        'balance' => 0,
                    ]);

                    session()->flash('success', 'Ticket has been redeemed successfully');
                    return redirect(route('AdminViewTicket', $this->card->slug));
                } else {
                    session()->flash('error', "Ticket has not enough balance");
                    return redirect(route('AdminViewTicket', $this->card->slug));
                }
                //End::If ticket has Enough Balance

            } else {
                session()->flash('error', "Ticket has zero balance");
                return redirect(route('AdminViewTicket', $this->card->slug));
            }
            //End::If ticket has Zero Balance

            //End::If this ticket is available
        } catch (VoucherNotFoundException $e) {
            session()->flash('error', $e->getMessage());
            return redirect(route('AdminViewTicket', $this->card->slug));
        } catch (VoucherAlreadyRedeemedException $e) {
            session()->flash('error', $e->getMessage());
            return redirect(route('AdminViewTicket', $this->card->slug));
        }
        //End::If this ticket is available

        //End::If this card is not expired
    }

    public function LoadMoreRedeemingHistory()
    {
        return $this->redeem_quantity += 3;
    }
}
