<?php

namespace App\Http\Livewire\Client\Dashboard\Cards\Recharge\Paypal;

use Exception;
use Livewire\Component;
use App\Helpers\Client\Client;
use App\Helpers\Stripe\Stripe;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $card, $holder_name, $card_number, $card_cvc, $card_expiry, $balance;

    public $hide_form = false;

    public function mount($slug)
    {
        //Begin::If this Client owns a Card
        if ($card = Client::FindCardBySlug(Auth::user()->id, $slug)) {
            $this->card = $card;
        } else {
            session()->flash('error', 'No such card found');
            return redirect(route('ClientCards'));
        }
        //End::If this Client owns a card
    }

    public function render()
    {
        return view('livewire.client.dashboard.cards.recharge.paypal.index')
            ->extends('layouts.dashboard');
    }

    public function Recharge()
    {

        $validated = $this->validate([
            'holder_name' => 'required|string',
            'card_number' => 'required|numeric',
            'card_cvc' => 'required|numeric',
            'card_expiry' => 'required|date',
            'balance' => 'required|numeric',
        ]);

        $card_data = [
            'name' => $validated['holder_name'],
            'number' => $validated['card_number'],
            'exp_year' => date('Y', strtotime($validated['card_expiry'])),
            'exp_month' => date('m', strtotime($validated['card_expiry'])),
            'cvc' => $validated['card_cvc'],
        ];

        $balance = $validated['balance'];
        $currency = Business::Currency($this->card->user_id);
        try {
            Stripe::RechargeVoucher($card_data, $balance, $currency, $this->card, Auth::user()->id);
            $this->hide_form = true;
            //return redirect(route('ClientRechargeWithStripe', $this->card->slug));
        } catch (Exception $e) {
            return session()->flash('error', $e->getMessage());
        }

        //4242424242424242
    }
}
