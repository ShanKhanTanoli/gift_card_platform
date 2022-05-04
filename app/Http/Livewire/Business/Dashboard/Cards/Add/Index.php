<?php

namespace App\Http\Livewire\Business\Dashboard\Cards\Add;

use DateTime;
use Exception;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use FrittenKeeZ\Vouchers\Facades\Vouchers;

class Index extends Component
{
    public $price, $balance, $expires_at, $quantity;
    public function render()
    {
        return view('livewire.business.dashboard.cards.add.index')
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

            'quantity.required' => 'Enter Quantity',
            'quantity.date' => 'Enter Quantity',

        ];
        $validated = $this->validate([
            'price' => 'required|numeric',
            'balance' => 'required|numeric',
            'expires_at' => 'required|date',
            'quantity' => 'required|numeric|digits_between:1,2',
        ], $msg);
        try {
            $timestamp = new DateTime(date('Y-m-d H:i:s', strtotime($validated['expires_at'])));
            Vouchers::withOwner(Auth::user()->id)
                ->withExpireDate($timestamp)
                ->withPrice($validated['price'])
                ->withBalance($validated['balance'])
                ->create($validated['quantity']);
            session()->flash('success', 'Added Successfully');
            return redirect(route('BusinessCards'));
        } catch (Exception $e) {
            return session()->flash('error', $e->getMessage());
        }
    }
}
