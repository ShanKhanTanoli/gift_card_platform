<?php

namespace App\Http\Livewire\Business\Dashboard\Vouchers\Issue;

use Livewire\Component;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $card;

    public function mount($slug)
    {
        //Begin::If this Business owns a Voucher
        if ($card = Business::FindCardBySlug(Auth::user()->id, $slug)) {
            $this->card = $card;
            //This feature for later
            return redirect(route('BusinessVouchers'));
        } else {
            session()->flash('error', 'No such card found');
            return redirect(route('BusinessVouchers'));
        } //End::If this Business owns a Voucher
    }

    public function render()
    {
        return view('livewire.business.dashboard.vouchers.issue.index')
            ->extends('layouts.dashboard');
    }
}
