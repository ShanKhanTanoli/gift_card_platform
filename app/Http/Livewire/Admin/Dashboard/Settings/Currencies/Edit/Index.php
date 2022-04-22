<?php

namespace App\Http\Livewire\Admin\Dashboard\Settings\Currencies\Edit;

use Exception;
use Livewire\Component;
use App\Helpers\Currency\Currency;

class Index extends Component
{
    public $currency;

    public $name, $description;

    public function mount($slug)
    {
        $this->currency = Currency::FindBySlug($slug);
        if ($this->currency) {
            $this->name = $this->currency->name;
            $this->description = $this->currency->description;
        } else {
            session()->flash('error', 'Currency does not exist');
            return redirect(route('AdminCurrency'));
        }
    }

    public function render()
    {
        return view('livewire.admin.dashboard.settings.currencies.edit.index')
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function Update()
    {
        $validated = $this->validate([
            'name' => 'required|string',
            'description' => 'required|string',
        ]);
        try {
            $this->currency->update($validated);
            session()->flash('success', 'Updated Successfully');
            return redirect(route('AdminEditCurrency', $this->currency->slug));
        } catch (Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }
}
