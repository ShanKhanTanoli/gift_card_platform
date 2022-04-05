<?php

namespace App\Http\Livewire\Client\Dashboard\Profile;

use Exception;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $name, $user_name, $number, $email;

    public function mount()
    {
        $this->name = Auth::user()->name;
        $this->user_name = Auth::user()->user_name;
        $this->number = Auth::user()->number;
        $this->email = Auth::user()->email;
    }

    public function render()
    {
        return view('livewire.client.dashboard.profile.index')
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function UpdateProfile()
    {
        $validated = $this->validate([
            'name' => 'required|string|min:3',
            'user_name' => 'required|string|unique:users,user_name,' . Auth::user()->id,
            'number' => 'required|string|unique:users,number,' . Auth::user()->id,
            'email' => 'required|email|unique:users,email,' . Auth::user()->id,
        ]);

        try {
            Auth::user()->update($validated);
            session()->flash('success', 'Updated Successfully');
        } catch (Exception $e) {
            return session()->flash('error', $e->getMessage());
        }
    }
}
