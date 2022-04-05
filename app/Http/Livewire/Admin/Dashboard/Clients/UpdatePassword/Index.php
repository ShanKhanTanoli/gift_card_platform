<?php

namespace App\Http\Livewire\Admin\Dashboard\Clients\UpdatePassword;

use Exception;
use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public $user;

    public $password, $password_confirmation;

    public function mount($slug)
    {
        $this->user = User::where('slug', $slug)
            ->first();
        if (!$this->user) {
            session()->flash('error', 'Account does not exist');
            return redirect(route('AdminClients'));
        }
    }

    public function render()
    {
        return view('livewire.admin.dashboard.clients.update-password.index')
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function Update()
    {
        $validated = $this->validate([
            'password' => 'required|string|min:5|confirmed',
            'password_confirmation' => 'required|string|min:5|',
        ]);
        try {
            $this->user->update(['password' => bcrypt($validated['password'])]);
            session()->flash('success', 'Password Updated Successfully');
            $this->reset(['password', 'password_confirmation']);
        } catch (Exception $e) {
            return session()->flash('error', $e->getMessage());
        }
    }
}
