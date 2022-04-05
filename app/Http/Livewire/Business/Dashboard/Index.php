<?php

namespace App\Http\Livewire\Business\Dashboard;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.business.dashboard.index')
            ->extends('layouts.dashboard')
            ->section('content');
    }
}
