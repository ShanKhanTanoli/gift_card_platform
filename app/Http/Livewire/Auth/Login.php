<?php

namespace App\Http\Livewire\Auth;

use App\Helpers\Redirect;
use Livewire\Component;
use App\Models\User;

class Login extends Component
{
    public $email;
    public $password;
    public $remember_me = false;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function mount() {
        if(auth()->user()){
            redirect(Redirect::ToDashboard());
        }
        //$this->fill(['email' => 'shankhantanoli1@gmail.com', 'password' => 'secret']);
    }

    public function login() {
        $credentials = $this->validate();
        if(auth()->attempt(['email' => $this->email, 'password' => $this->password], $this->remember_me)) {
            $user = User::where(["email" => $this->email])->first();
            auth()->login($user, $this->remember_me);
            return redirect()->intended(Redirect::ToDashboard());        
        }
        else{
            return $this->addError('email', trans('auth.failed')); 
        }
    }

    public function render()
    {
        return view('livewire.auth.login')
        ->extends('layouts.auth');
    }
}
