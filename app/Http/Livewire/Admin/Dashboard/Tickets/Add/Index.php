<?php

namespace App\Http\Livewire\Admin\Dashboard\Tickets\Add;

use DateTime;
use Exception;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use FrittenKeeZ\Vouchers\Models\Card;

class Index extends Component
{
    public $name, $price, $balance, $expires_at, $user_id, $visibility;

    public function render()
    {
        return view('livewire.admin.dashboard.tickets.add.index')
            ->extends('layouts.dashboard');
    }

    public function Add()
    {
        $msg = [
            'type.required' => 'Select card type',
            'type.in' => 'Select card type',

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
            'price' => 'required|numeric',
            'balance' => 'required|numeric',
            'expires_at' => 'required|date',
            'visibility' => 'required|numeric|in:1,0',
            'user_id' => 'required|numeric',

        ], $msg);
        $data = [
            'name' => $validated['name'],
            'type' => 'ticket',
            'price' => $validated['price'],
            'balance' => $validated['balance'],
            'expires_at' => new DateTime(date('Y-m-d H:i:s', strtotime($validated['expires_at']))),
            'visibility' => $validated['visibility'],
            'user_id' => $validated['user_id'],
            'slug' => strtoupper(Str::random(15)),
        ];
        try {
            $card = Card::create($data);
            session()->flash('success', 'Added Successfully');
            return redirect(route('BusinessEditTicket', $card->slug));
        } catch (Exception $e) {
            return session()->flash('error', 'Something went wrong');
        }
    }
}
