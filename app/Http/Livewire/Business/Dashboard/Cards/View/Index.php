<?php

namespace App\Http\Livewire\Business\Dashboard\Cards\View;

use Livewire\Component;
use App\Helpers\Card\Card;
use App\Helpers\Business\Business;
use FrittenKeeZ\Vouchers\Models\Voucher;
use FrittenKeeZ\Vouchers\Models\VoucherRecharge;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $card, $balance;

    public function mount($code)
    {
        //Begin::If this Business owns a Card
        if ($card = Business::FindCard(Auth::user()->id, $code)) {
            $this->card = $card;
        } else {
            session()->flash('error', 'No such card found');
            return redirect(route('BusinessCards'));
        }
        //End::If this Business owns a card
    }

    public function render()
    {
        $recharge = Card::LatestRechargePaginate($this->card->id, 6);
        return view('livewire.business.dashboard.cards.view.index')
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
                'stripe_id' => Auth::user()->name . 'And ID' . Auth::user()->id,
                'voucher_id' => $this->card->id,
                'user_id' => Auth::user()->id,
                'amount' => $validated['balance'],
            ]);
            session()->flash('success', 'Card has been recharged successfully');
            return redirect(route('BusinessViewCard', $this->card->code));
        } else {
            session()->flash('error', 'Expired card can not be recharged');
            return redirect(route('BusinessViewCard', $this->card->code));
        }
        //End::If this card is not expired
    }
}
