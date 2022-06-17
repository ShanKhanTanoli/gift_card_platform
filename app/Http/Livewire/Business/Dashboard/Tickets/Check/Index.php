<?php

namespace App\Http\Livewire\Business\Dashboard\Tickets\Check;

use App\Helpers\Business\Business;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $code;

    public function render()
    {
        return view('livewire.business.dashboard.tickets.check.index')
            ->extends('layouts.dashboard');
    }

    public function Check()
    {
        $validated = $this->validate([
            'code' => 'required|string',
        ]);

        //Begin::If this Business owns a Card
        if ($card = Business::FindTicketBySlug(Auth::user()->id, $validated['code'])) {
            return redirect(route('BusinessViewCard', $card->code));
        } else {
            session()->flash('error', 'No such card found');
            return redirect(route('BusinessRedeemCard'));
        }
        //End::If this Business owns a card
    }
}
