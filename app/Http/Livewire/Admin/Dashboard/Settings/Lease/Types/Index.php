<?php

namespace App\Http\Livewire\Admin\Dashboard\Settings\Lease\Types;

use App\Models\Settings\Lease\LeaseType;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $types = LeaseType::paginate(6);
        return view('livewire.admin.dashboard.settings.lease.types.index')
            ->with(['types' => $types])
            ->extends('layouts.dashboard');
    }
}
