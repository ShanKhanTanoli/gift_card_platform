<?php

namespace App\Http\Livewire\Business\Dashboard\Settings\Password;

use Exception;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $password, $password_confirmation;

    public function render()
    {
        return view('livewire.business.dashboard.settings.password.index')
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function UpdatePassword()
    {
        $validated = $this->validate([
            'password' => 'required|string|min:5|confirmed',
            'password_confirmation' => 'required|string|min:5|',
        ]);
        try {
            Auth::user()->update(['password' => bcrypt($validated['password'])]);
            session()->flash('success', 'Password Updated Successfully');
            $this->reset(['password', 'password_confirmation']);
            return redirect(route('BusinessEditPassword'));
        } catch (Exception $e) {
            return session()->flash('error', $e->getMessage());
        }
    }
}
