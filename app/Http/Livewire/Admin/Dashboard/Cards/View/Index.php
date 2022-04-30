<?php

namespace App\Http\Livewire\Admin\Dashboard\Cards\View;

use Livewire\Component;
use App\Helpers\Card\Card;
use FrittenKeeZ\Vouchers\Models\VoucherData;

class Index extends Component
{
    public $card, $unique_id, $metadata, $starts_at, $expires_at, $owner_id;

    public function mount($unique_id)
    {
        //Begin::If Card Exists
        if ($card = VoucherData::where('unique_id',$unique_id)->first()) {
                $this->card = $card;
                $this->owner_id = $card->owner_id;
                $this->unique_id = $card->unique_id;
                $this->metadata = $card->metadata;
                $this->starts_at = $card->starts_at;
                $this->expires_at = $card->expires_at;
        } else {
            session()->flash('error', 'No such card found');
            return redirect(route('AdminCards'));
        }
        //End::If Card Exists
    }

    public function render()
    {
        return view('livewire.admin.dashboard.cards.view.index')
            ->extends('layouts.dashboard');
    }
}
