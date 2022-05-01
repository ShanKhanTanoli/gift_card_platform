<?php

namespace App\Http\Livewire\Admin\Dashboard\Cards\View;

use Livewire\Component;
use App\Helpers\Card\Card;
use Illuminate\Support\Facades\Auth;
use FrittenKeeZ\Vouchers\Models\VoucherRecharge;

class Index extends Component
{
    public $card, $balance;

    public function mount($code)
    {
        //Begin::If Card Exists
        if ($card = Card::Find($code)) {
            $this->card = $card;
        } else {
            session()->flash('error', 'No such card found');
            return redirect(route('AdminCards'));
        }
        //End::If Card Exists
    }

    public function render()
    {
        $recharge = Card::LatestRechargePaginate($this->card->id, 6);
        return view('livewire.admin.dashboard.cards.view.index')
            ->with(['recharge' => $recharge])
            ->extends('layouts.dashboard');
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
}
