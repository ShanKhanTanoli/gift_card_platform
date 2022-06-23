<?php

namespace App\Http\Livewire\Admin\Dashboard\Vouchers\Add;

use DateTime;
use Exception;
use Livewire\Component;
use Illuminate\Support\Str;
use FrittenKeeZ\Vouchers\Models\Card;

class Index extends Component
{
    public $name, $price, $balance, $expires_at, $user_id, $visibility;

    public function render()
    {
        return view('livewire.admin.dashboard.vouchers.add.index')
            ->extends('layouts.dashboard');
    }

    public function Add()
    {
        $msg = [
            'price.required' => 'Enter Price',
            'price.numeric' => 'Enter Price',

            'balance.required' => 'Enter  Balance',
            'balance.numeric' => 'Enter  Balance',

            'expires_at.required' => 'Enter Date',
            'expires_at.date' => 'Enter Date',

            'visibility.required' => 'Select card visibility',
            'visibility.in' => 'Select card visibility',

            'user_id.required' => 'Select Business',
            'user_id.numeric' => 'Select Business',

        ];
        $validated = $this->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'balance' => 'required|numeric',
            'expires_at' => 'required|date',
            'user_id' => 'required|numeric',
            'visibility' => 'required|numeric|in:1,0',

        ], $msg);
        $data = [
            'name' => $validated['name'],
            'type' => 'voucher',
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
            return redirect(route('AdminEditVoucher', $card->slug));
        } catch (Exception $e) {
            return session()->flash('error', 'Something went wrong');
        }
    }
}
