<?php

namespace App\Http\Livewire\Client\Dashboard\Cards\Pin;

use Livewire\Component;
use App\Helpers\Client\Client;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $card, $activate, $enable_pin, $pin;

    public function mount($slug)
    {
        //Begin::If this Client owns a Card
        if ($card = Client::FindCardBySlug(Auth::user()->id, $slug)) {
            
            $this->card = $card;
            $this->activate = $card->activate;

            if($card->pin){
                $this->enable_pin = true;
                $this->pin = $card->pin;
            }

        } else {
            session()->flash('error', 'No such card found');
            return redirect(route('ClientCards'));
        }
        //End::If this Client owns a card
    }

    public function render()
    {
        return view('livewire.client.dashboard.cards.pin.index')
            ->extends('layouts.dashboard');
    }

    public function Update()
    {

        /*Begin::If card is banned*/
        if (!$this->card->trashed()) {
            /*Begin::If card is expired*/
            if (!$this->card->isExpired()) {

                /*Begin::Add Or Remove Pin*/
                if ($this->enable_pin) {
                    $validated = $this->validate([
                        'pin' => 'required|numeric|digits:5',
                    ]);
                    $this->card->update($validated);
                    session()->flash('success', 'Updated Successfully');
                } else {
                    $this->card->update(['pin' => null]);
                    session()->flash('success', 'Updated Successfully');
                }/*End::Add Or Remove Pin*/

            } else return session()->flash('error', 'Card is Banned');
            /*End::If card is expired*/
        } else return session()->flash('error', 'Card is Banned');
        /*End::If card is banned*/
    }
}
