<?php

namespace App\Http\Livewire\Business\Dashboard\Cards\View;

use Exception;
use Livewire\Component;
use App\Helpers\Business\Business;
use FrittenKeeZ\Vouchers\Models\Voucher;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $card, $code, $metadata, $starts_at, $expires_at;

    public function mount($code)
    {
        if ($card = Voucher::where('code', $code)->first()) {
            //Begin::If this Business owns a Card
            if ($card = Business::FindCard(Auth::user(), $card->id)) {
                $this->card = $card;
                $this->code = $card->code;
                $this->metadata = $card->metadata;
                $this->starts_at = $card->starts_at;
                $this->expires_at = $card->expires_at;
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
        return view('livewire.business.dashboard.cards.view.index')
            ->extends('layouts.dashboard');
    }
}
