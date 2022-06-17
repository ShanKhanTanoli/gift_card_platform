<?php

namespace App\Http\Livewire\Business\Dashboard\Tickets\Issue;

use Livewire\Component;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $card;

    public function mount($slug)
    {
        //Begin::If this Business owns a Card
        if ($card = Business::FindCardBySlug(Auth::user()->id, $slug)) {
            $this->card = $card;
            //This feature for later
            return redirect(route('BusinessTickets'));
        } else {
            session()->flash('error', 'No such card found');
            return redirect(route('BusinessTickets'));
        } //End::If this Business owns a card
    }

    public function render()
    {
        return view('livewire.business.dashboard.cards.issue.index')
            ->extends('layouts.dashboard');
    }
}
