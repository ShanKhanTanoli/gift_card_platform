<?php

namespace App\Http\Livewire\Business\Dashboard\Settings\Profile;

use Exception;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $name, $user_name, $email, $number;

    public function mount()
    {
        $this->name = Auth::user()->name;
        $this->user_name = Auth::user()->user_name;
        $this->email = Auth::user()->email;
        $this->number = Auth::user()->number;
    }

    public function render()
    {
        return view('livewire.business.dashboard.settings.profile.index')
            ->extends('layouts.dashboard');
    }

    public function UpdateProfile()
    {
        $validated = $this->validate([
            'name' => 'required|string|min:3',
            'user_name' => 'required|string|unique:users,user_name,' . Auth::user()->id,
            'email' => 'required|email|unique:users,email,' . Auth::user()->id,
            'number' => 'required|numeric|unique:users,number,' . Auth::user()->id,
        ]);
        try {
            Auth::user()->update($validated);
            session()->flash('success', 'Profile Updated Successfully');
            return redirect(route('BusinessEditProfile'));
        } catch (Exception $e) {
            return session()->flash('error', $e->getMessage());
        }
    }
}
