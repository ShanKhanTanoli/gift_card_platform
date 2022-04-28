<?php

namespace App\Http\Livewire\Admin\Dashboard\Cards\Edit;

use Exception;
use Livewire\Component;
use App\Helpers\Card\Card;
use Illuminate\Support\Facades\Auth;
use FrittenKeeZ\Vouchers\Models\Voucher;

class Index extends Component
{
    public $card,$owner_id, $voucher_category_id, $price, $balance, $expires_at;

    public function mount($code)
    {
        if ($find = Voucher::where('code', $code)->first()) {
            //Begin::If this Card owns a Card
            if ($card = Card::Find(Auth::user(), $find->id)) {
                $this->card = $card;
                $this->owner_id = $card->owner_id;
                $this->voucher_category_id = $card->voucher_category_id;
                $this->price = $card->price;
                $this->balance = $card->balance;
                $this->expires_at = date('Y-m-d', strtotime($card->expires_at));
            } else {
                session()->flash('error', 'No such card found');
                return redirect(route('AdminCards'));
            }
            //End::If Card Exists
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
        if (Card::Find(Auth::user(), $this->card->id)) {
            $validated = $this->validate([
                'voucher_category_id' => 'required|numeric',
                'price' => 'required|integer',
                'balance' => 'required|integer',
                'expires_at' => 'required|date',
            ]);
            try {
                $this->card->update($validated);
                session()->flash('success', 'Updated Successfully');
                return redirect(route('AdminEditCard', $this->card->code));
            } catch (Exception $e) {
                return session()->flash('error', $e->getMessage());
            }
        } else {
            session()->flash('error', 'No such card found');
            return redirect(route('AdminCards'));
        }
    }
}
