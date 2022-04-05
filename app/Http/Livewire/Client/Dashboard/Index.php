<?php

namespace App\Http\Livewire\Client\Dashboard;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.client.dashboard.index')
        ->extends('layouts.dashboard')
        ->section('content');
    }
}
