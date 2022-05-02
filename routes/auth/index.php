<?php

use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Logout;
use App\Http\Livewire\Auth\VerifyEmail;
use App\Http\Livewire\Auth\ResetPassword;
use App\Http\Livewire\Auth\ClientRegister;
use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Livewire\Auth\BusinessRegister;

/*Begin::Auth Routes*/

Route::get('RegisterBusiness', BusinessRegister::class)
    ->name('BusinessRegister');

Route::get('RegisterClient', ClientRegister::class)
    ->name('ClientRegister');

Route::get('/login', Login::class)
    ->name('login');

Route::get('logout', Logout::class)
    ->name('logout');

Route::get('/login/forgot-password', ForgotPassword::class)
    ->name('forgot-password');

Route::get('/reset-password/{id}', ResetPassword::class)
    ->name('reset-password')->middleware('signed');

Route::get('VerifyEmail', VerifyEmail::class)
    ->name('verification.notice')
    ->middleware('auth');
/*End::Auth Routes*/