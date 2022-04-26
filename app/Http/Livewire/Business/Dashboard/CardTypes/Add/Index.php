<?php

namespace App\Http\Livewire\Business\Dashboard\CardTypes\Add;

use App\Helpers\Business\Business;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

class Index extends Component
{
    public $name;

    public function render()
    {
        return view('livewire.business.dashboard.card-types.add.index')
            ->extends('layouts.dashboard');
    }

    public function Add()
    {
        $validated = $this->validate([
            'name' => 'required|string|min:3',
        ]);
        try {
            Business::Add(Auth::user()->id, $validated['name']);
            session()->flash('success', 'Added Successfully');
            return redirect(route('BusinessCardTypes'));
        } catch (Exception $e) {
            return session()->flash('error', $e->getMessage());
        }
    }
}
