<?php

namespace App\Http\Livewire\Business\Dashboard\Clients\UpdatePassword;

use Exception;
use App\Models\User;
use Livewire\Component;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $user;

    public $password, $password_confirmation;

    public function mount($slug)
    {
        if ($user = User::where('slug', $slug)->first()) {
            //Begin::If this Business owns a Client
            if ($client = Business::FindClient(Auth::user()->id, $user->id)) {
                $this->user = $client;
            } else {
                session()->flash('error', 'No such client found');
                return redirect(route('BusinessClients'));
            }
            //End::If this Business owns a Client
        } else {
            session()->flash('error', 'No such client found');
            return redirect(route('BusinessClients'));
        }
    }

    public function render()
    {
        return view('livewire.business.dashboard.clients.update-password.index')
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function Update()
    {
        //Begin::If this Business owns a Client
        if (Business::FindClient(Auth::user()->id, $this->user->id)) {
            $validated = $this->validate([
                'password' => 'required|string|min:5|confirmed',
                'password_confirmation' => 'required|string|min:5|',
            ]);
            try {
                $this->user->update(['password' => bcrypt($validated['password'])]);
                session()->flash('success', 'Password Updated Successfully');
                $this->reset(['password', 'password_confirmation']);
                return redirect(route('BusinessEditClientPassword', $this->user->slug));
            } catch (Exception $e) {
                return session()->flash('error', $e->getMessage());
            }
        } else {
            session()->flash('error', 'No such client found');
            return redirect(route('BusinessClients'));
        }
    }
}
