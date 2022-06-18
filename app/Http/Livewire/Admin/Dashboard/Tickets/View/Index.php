<?php

namespace App\Http\Livewire\Admin\Dashboard\Tickets\View;

use Livewire\Component;
use App\Helpers\Ticket\Ticket;
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

    public function mount($slug)
    {
        //Begin::If Ticket Exists
        if ($card = Ticket::FindBySlug($slug)) {
            $this->card = $card;
            $this->business = Business::Find($this->card->owner_id);
        } else {
            session()->flash('error', 'No such ticket found');
            return redirect(route('AdminTickets'));
        }
        //End::If Ticket Exists
    }

    public function render()
    {
        $recharge = Ticket::Recharge($this->card->id)
            ->latest()
            ->take($this->recharge_quantity)
            ->get();
        $redeeming = Ticket::Redeem($this->card->id)
            ->latest()
            ->take($this->redeem_quantity)
            ->get();
        return view('livewire.admin.dashboard.tickets.view.index')
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

        //Begin::If this ticket is not expired
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
            session()->flash('success', 'Ticket has been recharged successfully');
            return redirect(route('AdminViewTicket', $this->card->code));
        } else {
            session()->flash('error', 'Expired ticket can not be recharged');
            return redirect(route('AdminViewTicket', $this->card->code));
        }
        //End::If this ticket is not expired
    }

    public function Redeem()
    {
        $validated = $this->validate([
            'balance' => 'required|numeric',
            'description' => 'required|string',
        ]);

        try {

            //Begin::If Ticket has Zero Balance
            if ($this->card->balance != 0) {

                //Begin::If Ticket has Enough Balance
                if ($this->card->balance >= $validated['balance']) {
                    Vouchers::redeem($this->card->code, $validated['balance'], $validated['description'], 'usd', Auth::user(), ['foo' => 'bar']);
                    $this->card->update([
                        'balance' => $this->card->balance - $validated['balance'],
                    ]);
                } else {
                    session()->flash('error', "Ticket has not enough balance");
                    return redirect(route('AdminViewTicket', $this->card->code));
                }
                //End::If Ticket has Enough Balance

            } else {
                session()->flash('error', "Ticket has zero balance");
                return redirect(route('AdminViewTicket', $this->card->code));
            }
            //End::If Ticket has Zero Balance

            session()->flash('success', 'Ticket has been redeemed successfully');
            return redirect(route('AdminViewTicket', $this->card->code));
        } catch (\FrittenKeeZ\Vouchers\Exceptions\VoucherNotFoundException $e) {
            session()->flash('error', $e->getMessage());
            return redirect(route('AdminViewTicket', $this->card->code));
        } catch (\FrittenKeeZ\Vouchers\Exceptions\VoucherAlreadyRedeemedException $e) {
            session()->flash('error', $e->getMessage());
            return redirect(route('AdminViewTicket', $this->card->code));
        }

        //End::If this ticket is not expired
    }
}
