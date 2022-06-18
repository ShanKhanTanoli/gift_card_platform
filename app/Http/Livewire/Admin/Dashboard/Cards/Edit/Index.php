<?php

namespace App\Http\Livewire\Admin\Dashboard\Cards\Edit;

use DateTime;
use Exception;
use App\Models\User;
use Livewire\Component;
use App\Helpers\Card\Card;

class Index extends Component
{
    public $card, $user_id, $name, $price, $balance, $expires_at, $visibility, $temporary_image;

    public function mount($slug)
    {
        if ($card = Card::FindBySlug($slug)) {
            $this->card = $card;
            $this->user_id = $card->user_id;
            $this->name = $card->name;
            $this->price = $card->price;
            $this->balance = $card->balance;
            $this->expires_at = date('Y-m-d', strtotime($card->expires_at));
            $this->visibility = $card->visibility;
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
        if (Card::FindBySlug($this->card->slug)) {

            $msg = [
                'user_id.required' => 'Select card owner',
                'user_id.numeric' => 'Select card owner',

                'price.required' => 'Enter Price',
                'price.numeric' => 'Enter Price',

                'balance.required' => 'Enter  Balance',
                'balance.numeric' => 'Enter  Balance',

                'expires_at.required' => 'Enter Date',
                'expires_at.date' => 'Enter Date',

                'visibility.required' => 'Select card visibility',
                'visibility.in' => 'Select card visibility',
            ];
            $validated = $this->validate([
                'name' => 'required|string',
                'user_id' => 'required|numeric',
                'price' => 'required|numeric',
                'balance' => 'required|numeric',
                'expires_at' => 'required|date',
                'visibility' => 'required|numeric|in:1,0',

            ], $msg);

            try {

                $user = User::find($validated['user_id']);

                $data = [
                    'name' => $validated['name'],
                    'type' => 'card',
                    'price' => $validated['price'],
                    'balance' => $validated['balance'],
                    'expires_at' => new DateTime(date('Y-m-d H:i:s', strtotime($validated['expires_at']))),
                    'visibility' => $validated['visibility'],
                    'user_id' => $user->id,
                ];

                $this->card->update($data);
                session()->flash('success', 'Updated Successfully');
                return redirect(route('AdminEditCard', $this->card->slug));
            } catch (Exception $e) {
                return session()->flash('error', 'Something went wrong');
            }
        } else {
            session()->flash('error', 'No such card found');
            return redirect(route('AdminCards'));
        }
    }
}
