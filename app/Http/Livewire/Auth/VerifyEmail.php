<?php

namespace App\Http\Livewire\Auth;

use App\Helpers\Redirect;
use Livewire\Component;

class VerifyEmail extends Component
{
    public function render()
    {
        // if ($user = auth()->user()) {

        //     if (!$user->email_verified_at) {
        //         // return view('livewire.auth.verify-email')
        //         //     ->extends('layouts.auth');
        //         return view('livewire.auth.login')
        //         ->extends('layouts.auth');
        //     }
        //     return redirect(Redirect::ToDashboard());
        // }
        return view('livewire.auth.login')
            ->extends('layouts.auth');
    }
}
