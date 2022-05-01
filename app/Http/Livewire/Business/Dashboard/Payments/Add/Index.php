<?php

namespace App\Http\Livewire\Business\Dashboard\Payments\Add;

use DateTime;
use Exception;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use FrittenKeeZ\Vouchers\Facades\Vouchers;

class Index extends Component
{
    public $price, $balance, $expires_at;
    public function render()
    {
        return view('livewire.business.dashboard.payments.add.index')
            ->extends('layouts.dashboard');
    }

    public function Add()
    {
        $msg = [
            'price.required' => 'Enter Price',
            'price.numeric' => 'Enter Price',

            'balance.required' => 'Enter Usable Amount',
            'balance.numeric' => 'Enter Usable Amount',

            'expires_at.required' => 'Enter Date',
            'expires_at.date' => 'Enter Date',

        ];
        $validated = $this->validate([
            'price' => 'required|numeric',
            'balance' => 'required|numeric',
            'expires_at' => 'required|date',
        ], $msg);

        try {
            $timestamp = new DateTime(date('Y-m-d H:i:s', strtotime($validated['expires_at'])));
            Vouchers::withOwner(Auth::user())
                ->withUniqueId(strtoupper(Str::random(20)))
                ->withExpireDate($timestamp)
                ->withPrice($validated['price'])
                ->withBalance($validated['balance'])
                ->create();

            session()->flash('success', 'Added Successfully');
            return redirect(route('BusinessCards'));
        } catch (Exception $e) {
            return session()->flash('error', $e->getMessage());
        }
    }
}
