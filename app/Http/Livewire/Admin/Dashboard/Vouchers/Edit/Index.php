<?php

namespace App\Http\Livewire\Admin\Dashboard\Vouchers\Edit;

use Exception;
use Livewire\Component;
use App\Helpers\Voucher\Voucher;

class Index extends Component
{
    public $card, $user_id, $price, $balance, $expires_at;

    public function mount($slug)
    {
        if ($card = Voucher::FindBySlug($slug)) {
            $this->card = $card;
            $this->user_id = $card->user_id;
            $this->price = $card->price;
            $this->balance = $card->balance;
            $this->expires_at = date('Y-m-d', strtotime($card->expires_at));
        } else {
            session()->flash('error', 'No such voucher found');
            return redirect(route('AdminVouchers'));
        }
    }

    public function render()
    {
        return view('livewire.admin.dashboard.vouchers.edit.index')
            ->extends('layouts.dashboard');
    }

    public function Update()
    {
        //Begin::If Voucher Exists
        if (Voucher::FindBySlug($this->card->slug)) {
            $msg = [
                'user_id.required' => 'Enter Price',
                'user_id.numeric' => 'Enter Price',
                'price.required' => 'Enter Price',
                'price.numeric' => 'Enter Price',
                'balance.required' => 'Enter Balance Amount',
                'balance.numeric' => 'Enter Balance Amount',
                'expires_at.required' => 'Enter Date',
                'expires_at.date' => 'Enter Date',
            ];
            $validated = $this->validate([
                'user_id' => 'required|numeric',
                'price' => 'required|numeric',
                'balance' => 'required|numeric',
                'expires_at' => 'required|date',
            ], $msg);
            try {
                $this->card->update($validated);
                session()->flash('success', 'Updated Successfully');
                return redirect(route('AdminEditVoucher', $this->card->code));
            } catch (Exception $e) {
                return session()->flash('error', $e->getMessage());
            }
        } else {
            session()->flash('error', 'No such card found');
            return redirect(route('AdminVouchers'));
        }
    }
}
