<?php

namespace App\Http\Livewire\Admin\Dashboard\Vouchers\Add;

use DateTime;
use Exception;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use FrittenKeeZ\Vouchers\Facades\Vouchers;

class Index extends Component
{
    public $price, $balance, $expires_at, $quantity, $user_id;
    public function render()
    {
        return view('livewire.admin.dashboard.vouchers.add.index')
            ->extends('layouts.dashboard');
    }

    public function Add()
    {
        $msg = [
            'user_id.required' => 'Enter Price',
            'user_id.numeric' => 'Enter Price',
            'price.required' => 'Enter Price',
            'price.numeric' => 'Enter Price',
            'balance.required' => 'Enter Balance Amount',
            'balance.numeric' => 'Enter Balance Amount',
            'expires_at.required' => 'Enter Date',
            'expires_at.date' => 'Enter Date',
            'quantity.required' => 'Enter Quantity',
            'quantity.numeric' => 'Enter Quantity',
        ];
        $validated = $this->validate([
            'user_id' => 'required|numeric',
            'price' => 'required|numeric',
            'balance' => 'required|numeric',
            'expires_at' => 'required|date',
            'quantity' => 'required|numeric',
        ], $msg);

        try {
            $timestamp = new DateTime(date('Y-m-d H:i:s', strtotime($validated['expires_at'])));
            $user = User::find($validated['user_id']);
            Vouchers::withOwner($user->id)
                ->withExpireDate($timestamp)
                ->withPrice($validated['price'])
                ->withBalance($validated['balance'])
                ->create($validated['quantity']);
            session()->flash('success', 'Added Successfully');
            return redirect(route('AdminCards'));
        } catch (Exception $e) {
            return session()->flash('error', $e->getMessage());
        }
    }
}
