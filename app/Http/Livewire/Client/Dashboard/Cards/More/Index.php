<?php

namespace App\Http\Livewire\Client\Dashboard\Cards\More;

use Livewire\Component;
use App\Helpers\Client\Client;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $card;

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
        return view('livewire.client.dashboard.cards.more.index')
            ->extends('layouts.dashboard');
    }
}
