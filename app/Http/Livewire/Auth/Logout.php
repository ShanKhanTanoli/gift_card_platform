<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

class Logout extends Component
{
    public function logout()
    {
        //Forget Session
        Session()->forget('validate_pin');

        auth()->logout();
        return redirect(route('login'));
    }

    public function render()
    {
        return view('livewire.auth.logout');
    }
}
