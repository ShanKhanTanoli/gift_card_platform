<?php

namespace App\Http\Livewire\Admin\Dashboard\Cards\Add;

use DateTime;
use Exception;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use FrittenKeeZ\Vouchers\Models\Card;
use FrittenKeeZ\Vouchers\Facades\Vouchers;

class Index extends Component
{
    public $name, $user_id, $price, $balance, $expires_at, $visibility;
    public function render()
    {
        return view('livewire.admin.dashboard.cards.add.index')
            ->extends('layouts.dashboard');
    }

    public function Add()
    {
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
                'slug' => strtoupper(Str::random(15)),
            ];

            $card = Card::create($data);
            session()->flash('success', 'Added Successfully');
            return redirect(route('AdminEditCard', $card->slug));
        } catch (Exception $e) {
            return session()->flash('error', 'Something went wrong');
        }
    }
}
