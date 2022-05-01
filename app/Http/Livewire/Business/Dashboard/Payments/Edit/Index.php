<?php

namespace App\Http\Livewire\Business\Dashboard\Payments\Edit;

use Exception;
use Livewire\Component;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $card, $price, $balance, $expires_at;

    public function mount($unique_id)
    {
        //Begin::If this Business owns a Card
        if ($card = Business::FindCard(Auth::user()->id, $unique_id)) {
            $this->card = $card;
            $this->price = $card->price;
            $this->balance = $card->balance;
            $this->expires_at = date('Y-m-d',strtotime($card->expires_at));
        } else {
            session()->flash('error', 'No such card found');
            return redirect(route('BusinessCards'));
        }
        //End::If this Business owns a card
    }

    public function render()
    {
        return view('livewire.business.dashboard.payments.edit.index')
            ->extends('layouts.dashboard');
    }

    public function Update()
    {
        //Begin::If this Business owns a card
        if (Business::FindCard(Auth::user()->id, $this->card->unique_id)) {
            $validated = $this->validate([
                'price' => 'required|integer',
                'balance' => 'required|integer',
                'expires_at' => 'required|date',
            ]);
            try {
                $this->card->update($validated);
                session()->flash('success', 'Updated Successfully');
                return redirect(route('BusinessEditCard', $this->card->unique_id));
            } catch (Exception $e) {
                return session()->flash('error', $e->getMessage());
            }
        } else {
            session()->flash('error', 'No such card found');
            return redirect(route('BusinessCards'));
        }
    }
}
