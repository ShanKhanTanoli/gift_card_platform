<?php

namespace App\Http\Livewire\Admin\Dashboard\Cards\Add;

use DateTime;
use Exception;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use FrittenKeeZ\Vouchers\Facades\Vouchers;

class Index extends Component
{
    public $price, $balance, $expires_at, $voucher_category_id, $quantity, $owner_id;
    public function render()
    {
        return view('livewire.admin.dashboard.cards.add.index')
            ->extends('layouts.dashboard');
    }

    public function Add()
    {
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
            $timestamp = new DateTime(date('Y-m-d H:i:s', strtotime($validated['expires_at'])));
            $owner = User::find($validated['owner_id']);
            Vouchers::withOwner($owner)
                ->withExpireDate($timestamp)
                ->withPrice($validated['price'])
                ->withBalance($validated['balance'])
                ->withUniqueId(strtoupper(Str::random(20)))
                ->create();
            session()->flash('success', 'Added Successfully');
            return redirect(route('AdminCards'));
        } catch (Exception $e) {
            return session()->flash('error', $e->getMessage());
        }
    }
}
