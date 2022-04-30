<?php

namespace App\Http\Livewire\Business\Dashboard\Cards\View;

use Livewire\Component;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $card;

    public function mount($unique_id)
    {
        //Begin::If this Business owns a Card
        if ($card = Business::FindCard(Auth::user()->id, $unique_id)) {
            $this->card = $card;
        } else {
            session()->flash('error', 'No such card found');
            return redirect(route('BusinessCards'));
        }
        //End::If this Business owns a card
    }

    public function render()
    {
        return view('livewire.business.dashboard.cards.view.index')
            ->extends('layouts.dashboard');
    }
}
