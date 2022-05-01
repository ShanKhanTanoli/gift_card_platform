<?php

namespace App\Http\Livewire\Admin\Dashboard\Cards\Edit;

use Exception;
use Livewire\Component;
use App\Helpers\Card\Card;

class Index extends Component
{
    public $card, $owner_id, $price, $balance, $expires_at;

    public function mount($code)
    {
        if ($card = Card::Find($code)) {
            $this->card = $card;
            $this->owner_id = $card->owner_id;
            $this->price = $card->price;
            $this->balance = $card->balance;
            $this->expires_at = date('Y-m-d', strtotime($card->expires_at));
        } else {
            session()->flash('error', 'No such card found');
            return redirect(route('AdminCards'));
        }
    }

    public function render()
    {
        return view('livewire.admin.dashboard.cards.edit.index')
            ->extends('layouts.dashboard');
    }

    public function Update()
    {
        //Begin::If Card Exists
        if (Card::Find($this->card->code)) {
            $msg = [
                'owner_id.required' => 'Enter Price',
                'owner_id.numeric' => 'Enter Price',
                'price.required' => 'Enter Price',
                'price.numeric' => 'Enter Price',
                'balance.required' => 'Enter Balance Amount',
                'balance.numeric' => 'Enter Balance Amount',
                'expires_at.required' => 'Enter Date',
                'expires_at.date' => 'Enter Date',
            ];
            $validated = $this->validate([
                'owner_id' => 'required|numeric',
                'price' => 'required|numeric',
                'balance' => 'required|numeric',
                'expires_at' => 'required|date',
            ], $msg);
            try {
                $this->card->update($validated);
                session()->flash('success', 'Updated Successfully');
                return redirect(route('AdminEditCard', $this->card->code));
            } catch (Exception $e) {
                return session()->flash('error', $e->getMessage());
            }
        } else {
            session()->flash('error', 'No such card found');
            return redirect(route('AdminCards'));
        }
    }
}
