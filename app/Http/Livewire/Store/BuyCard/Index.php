<?php

namespace App\Http\Livewire\Store\BuyCard;

use App\Helpers\Admin\Admin;
use App\Helpers\Business\Business;
use Livewire\Component;
use App\Helpers\Card\Card;
use App\Helpers\Client\Client;
use App\Helpers\Stripe\Stripe;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $card,
        $business,
        $store,
        $holder_name,
        $card_number,
        $card_cvc,
        $card_expiry,
        $balance,
        $application_fee,
        $comission_percentage;

    public function mount($code)
    {
        if ($card = Card::Find($code)) {

            $this->card = $card;

            $this->store = Business::Store($card->user_id);

            $this->business = $card->user_id;
        } else abort(404);
    }

    public function render()
    {
        return view('livewire.store.buy-card.index')
            ->with(['store' => $this->store])
            ->extends('layouts.store');
    }

    public function PayNow()
    {
        $validated = $this->validate([
            'holder_name' => 'required|string',
            'card_number' => 'required|numeric',
            'card_cvc' => 'required|numeric',
            'card_expiry' => 'required|date',
        ]);

        $card_data = [
            'name' => $validated['holder_name'],
            'number' => $validated['card_number'],
            'exp_year' => date('Y', strtotime($validated['card_expiry'])),
            'exp_month' => date('m', strtotime($validated['card_expiry'])),
            'cvc' => $validated['card_cvc'],
        ];

        $price = $this->card->price;
        //Begin::If Client is logged in
        if ($client = Auth::user()) {
            //Begin::If Client is
            if (Client::Is($client->id)) {
                //Begin::Find Business
                $user = User::find($this->business);
                if ($user) {
                    //Begin::Setting Up Account Id
                    if ($user->account_id) {
                        //Setting Platform Application Fee
                        if ($fee = Admin::Settings()) {
                            $this->application_fee = $price * $fee->comission_percentage / 100;
                            $this->comission_percentage = $fee->comission_percentage;
                        } else {
                            $this->application_fee = 1;
                            $this->comission_percentage = 0;
                        }
                        $pay = Stripe::ChargeClientCard(
                            $card_data,
                            $price,
                            'usd',
                            $this->application_fee,
                            $this->comission_percentage,
                            $user->account_id,
                            $this->card->id,
                        );
                        //Begin::If payment is true
                        if ($pay) {
                            $this->card->update(['sold' => true]);
                            session()->flash('success', 'Paid Successfully');
                            return redirect(route('ClientCards'));
                        }
                        //End::If payment is true
                    } else return session()->flash('error', 'Something went wrong');
                    //End::Setting Up Account Id
                } else return session()->flash('error', 'Something went wrong');
                //End::Find Business
            } else return session()->flash('error', 'Something went wrong');
            //End::Client Is
        } else return session()->flash('error', 'Something went wrong');
        //End::Client is logged in

        //4242424242424242
    }
}
