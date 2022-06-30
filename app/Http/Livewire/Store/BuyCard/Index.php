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
use FrittenKeeZ\Vouchers\Models\Card as CardModel;

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

    public function mount($slug)
    {
        if ($card = CardModel::where('slug', $slug)->first()) {
            if(!$card->isExpired()){
                $this->card = $card;
                $this->store = Business::Store($card->user_id);
                $this->business = $card->user_id;
            }else abort(404);
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

        //4242424242424242

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
                            $this->card,
                        );
                        //Begin::If payment is true
                        if ($pay) {
                            $this->card->update(['sold' => true]);
                            session()->flash('success', 'Paid Successfully');

                        //Begin::If Card is a Card
                        if ($this->card->type == "card") {
                            return redirect(route('ClientCards'));
                        }

                         //Begin::If Card is a Voucher
                         if ($this->card->type == "voucher") {
                            return redirect(route('ClientVouchers'));
                        }

                         //Begin::If Card is a Ticket
                         if ($this->card->type == "ticket") {
                            return redirect(route('ClientTickets'));
                        }

                        }
                        //End::If payment is true
                    } else return session()->flash('error', 'Something went wrong');
                    //End::Setting Up Account Id
                } else return session()->flash('error', 'Not Found');
                //End::Find Business
            } else return session()->flash('error', 'Please log in to continue');
            //End::Client Is
        } else return session()->flash('error', 'Please log in to continue');
        //End::Client is logged in

        //4242424242424242
    }
}
