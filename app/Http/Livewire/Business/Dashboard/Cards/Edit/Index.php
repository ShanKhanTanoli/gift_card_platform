<?php

namespace App\Http\Livewire\Business\Dashboard\Cards\Edit;

use Exception;
use Livewire\Component;
use App\Helpers\Business\Business;
use FrittenKeeZ\Vouchers\Models\Voucher;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $card, $price, $expires_at;

    public function mount($code)
    {
        if ($find = Voucher::where('code', $code)->first()) {
            //Begin::If this Business owns a Card
            if ($card = Business::FindCard(Auth::user(), $find->id)) {
                $this->card = $card;
                $this->price = $card->price;
                $this->expires_at = date('Y-m-d',strtotime($card->expires_at));
            } else {
                session()->flash('error', 'No such card found');
                return redirect(route('BusinessCards'));
            }
            //End::If this Business owns a card
        } else {
            session()->flash('error', 'No such card found');
            return redirect(route('BusinessCards'));
        }
    }

    public function render()
    {
        return view('livewire.business.dashboard.cards.edit.index')
            ->extends('layouts.dashboard');
    }

    public function Update()
    {
        //Begin::If this Business owns a card
        if (Business::FindCard(Auth::user(), $this->card->id)) {
            $validated = $this->validate([
                'price' => 'required|integer',
                'metadata' => 'required|string',
                'expires_at' => 'required|date',
            ]);
            dd($validated);
            try {
                $this->user->update($validated);
                session()->flash('success', 'Updated Successfully');
                return redirect(route('BusinessEditcard', $this->user->slug));
            } catch (Exception $e) {
                return session()->flash('error', $e->getMessage());
            }
        } else {
            session()->flash('error', 'No such card found');
            return redirect(route('BusinessCards'));
        }
    }
}
