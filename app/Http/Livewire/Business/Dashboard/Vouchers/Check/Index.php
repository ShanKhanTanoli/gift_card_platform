<?php

namespace App\Http\Livewire\Business\Dashboard\Vouchers\Check;

use App\Helpers\Business\Business;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $code;

    public function render()
    {
        return view('livewire.business.dashboard.vouchers.check.index')
            ->extends('layouts.dashboard');
    }
}
