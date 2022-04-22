<?php

namespace App\Http\Livewire\Admin\Dashboard\Settings\Tenant\Types;

use Livewire\Component;
use App\Models\Settings\Tenant\TenantType;

class Index extends Component
{
    public function render()
    {
        $types = TenantType::paginate(6);
        return view('livewire.admin.dashboard.settings.tenant.types.index')
            ->with(['types' => $types])
            ->extends('layouts.dashboard');
    }
}
