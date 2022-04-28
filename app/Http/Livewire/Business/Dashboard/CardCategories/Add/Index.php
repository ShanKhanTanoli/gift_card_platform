<?php

namespace App\Http\Livewire\Business\Dashboard\CardCategories\Add;

use App\Helpers\Business\Business;
use Exception;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $name;

    public function render()
    {
        return view('livewire.business.dashboard.card-categories.add.index')
            ->extends('layouts.dashboard');
    }

    public function Add()
    {
        $validated = $this->validate([
            'name' => 'required|string|min:3',
        ]);
        try {
            Business::CreateCardCategory(Auth::user()->id, $validated['name']);
            session()->flash('success', 'Added Successfully');
            return redirect(route('BusinessCardCategories'));
        } catch (Exception $e) {
            return session()->flash('error', $e->getMessage());
        }
    }
}
