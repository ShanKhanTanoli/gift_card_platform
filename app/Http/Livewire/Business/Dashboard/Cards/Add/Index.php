<?php

namespace App\Http\Livewire\Business\Dashboard\Cards\Add;

use DateTime;
use Exception;
use Livewire\Component;
use Carbon\CarbonInterval;
use Illuminate\Support\Facades\Auth;
use FrittenKeeZ\Vouchers\Facades\Vouchers;

class Index extends Component
{
    public $price, $balance, $expires_at, $voucher_category_id, $quantity;
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

            'balance.required' => 'Enter Usable Amount',
            'balance.numeric' => 'Enter Usable Amount',

            'expires_at.required' => 'Enter Date',
            'expires_at.date' => 'Enter Date',

            'voucher_category_id.required' => 'Select Category',
            'voucher_category_id.numeric' => 'Select Category',

            'quantity.required' => 'Select Cards Quantity',
            'quantity.numeric' => 'Select Cards Quantity',

        ];
        $validated = $this->validate([
            'price' => 'required|numeric',
            'balance' => 'required|numeric',
            'expires_at' => 'required|date',
            'voucher_category_id' => 'required|numeric',
            'quantity' => 'required|numeric',
        ], $msg);

        try {
            $timestamp = new DateTime(date('Y-m-d H:i:s',strtotime($validated['expires_at'])));
            Vouchers::withOwner(Auth::user())
                ->withExpireDate($timestamp)
                ->withPrice($validated['price'])
                ->withBalance($validated['balance'])
                ->withCategory($validated['voucher_category_id'])
                ->create($validated['quantity']);
            session()->flash('success', 'Added Successfully');
            return redirect(route('BusinessCards'));
        } catch (Exception $e) {
            return session()->flash('error', $e->getMessage());
        }
    }
}
