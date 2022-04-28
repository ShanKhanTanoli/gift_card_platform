<?php

namespace App\Http\Livewire\Admin\Dashboard\Cards\View;

use Livewire\Component;
use App\Helpers\Card\Card;
use FrittenKeeZ\Vouchers\Models\Voucher;

class Index extends Component
{
    public $card, $code, $metadata, $starts_at, $expires_at, $owner_id;

    public function mount($code)
    {
        if ($card = Voucher::where('code', $code)->first()) {
            //Begin::If Card Exists
            if ($card = Card::Find($card->id)) {
                $this->card = $card;
                $this->owner_id = $card->owner_id;
                $this->code = $card->code;
                $this->metadata = $card->metadata;
                $this->starts_at = $card->starts_at;
                $this->expires_at = $card->expires_at;
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
        return view('livewire.admin.dashboard.cards.view.index')
            ->extends('layouts.dashboard');
    }
}
