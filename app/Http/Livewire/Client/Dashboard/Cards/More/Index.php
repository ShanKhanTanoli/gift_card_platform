<?php

namespace App\Http\Livewire\Client\Dashboard\Cards\More;

use Livewire\Component;
use App\Helpers\Client\Client;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $card, $activate;

    public function mount($slug)
    {
        //Begin::If this Client owns a Card
        if ($card = Client::FindCardBySlug(Auth::user()->id, $slug)) {
            $this->card = $card;
            $this->activate = $card->activate;
        } else {
            session()->flash('error', 'No such card found');
            return redirect(route('ClientCards'));
        }
        //End::If this Client owns a card
    }

    public function render()
    {
        return view('livewire.client.dashboard.cards.more.index')
            ->extends('layouts.dashboard');
    }

    public function Update()
    {
        $validated = $this->validate([
            'activate' => 'required|boolean',
        ]);

        /*Begin::If card is banned*/
        if (!$this->card->trashed()) {
            /*Begin::If card is expired*/
            if (!$this->card->isExpired()) {
                $this->card->update($validated);
                session()->flash('success', 'Updated Successfully');
            } else return session()->flash('error', 'Card is Banned');
            /*End::If card is expired*/
        } else return session()->flash('error', 'Card is Banned');
        /*End::If card is banned*/
    }
}
