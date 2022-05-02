<?php

namespace App\Http\Livewire\Admin\Dashboard\Cards\Check;

use App\Helpers\Card\Card;
use Livewire\Component;

class Index extends Component
{
    public $code;

    public function render()
    {
        return view('livewire.admin.dashboard.cards.check.index')
            ->extends('layouts.dashboard');
    }

    public function Check()
    {
        $validated = $this->validate([
            'code' => 'required|string',
        ]);

        //Begin::If this Card Exists
        if ($card = Card::Find($validated['code'])) {
            return redirect(route('AdminViewCard', $card->code));
        } else {
            session()->flash('error', 'No such card found');
            return redirect(route('AdminCheckCard'));
        }
        //End::If this Card Exists
    }
}
