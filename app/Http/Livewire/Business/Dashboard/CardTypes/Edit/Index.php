<?php

namespace App\Http\Livewire\Business\Dashboard\CardTypes\Edit;

use Exception;
use Livewire\Component;
use App\Helpers\Business\Business;
use FrittenKeeZ\Vouchers\Models\Voucher;
use FrittenKeeZ\Vouchers\Models\VoucherType;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $type, $name;

    public function mount($slug)
    {
        if ($find = VoucherType::where('slug', $slug)->first()) {
            //Begin::If this Business has a Card Type
            if ($type = Business::FindCardType(Auth::user()->id, $find->id)) {
                $this->type = $type;
                $this->name = $type->name;
            } else {
                session()->flash('error', 'No such card type found');
                return redirect(route('BusinessCardTypes'));
            }
            //End::If this Business has a Card Type
        } else {
            session()->flash('error', 'No such card type found');
            return redirect(route('BusinessCardTypes'));
        }
    }

    public function render()
    {
        return view('livewire.business.dashboard.card-types.edit.index')
            ->extends('layouts.dashboard');
    }

    public function Update()
    {
        //Begin::If this Business owns a card
        if (Business::FindCardType(Auth::user()->id, $this->type->id)) {
            $validated = $this->validate([
                'name' => 'required|string',
            ]);
            try {
                $this->type->update($validated);
                session()->flash('success', 'Updated Successfully');
                return redirect(route('BusinessEditCardType', $this->type->slug));
            } catch (Exception $e) {
                return session()->flash('error', $e->getMessage());
            }
        } else {
            session()->flash('error', 'No such card type found');
            return redirect(route('BusinessCardTypes'));
        }
    }
}
