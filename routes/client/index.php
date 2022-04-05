<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Client\Dashboard\Index as ClientDashboard;
use App\Http\Livewire\Client\Dashboard\Profile\Index as EditProfile;
use App\Http\Livewire\Client\Dashboard\Password\Index as EditPassword;

/*Begin::Auth,Client Group*/

Route::middleware(['auth', 'client'])->prefix('Client')->group(function () {

    Route::get('Dashboard', ClientDashboard::class)->name('ClientDashboard');

    /*Begin::Edit Profile & Password Operations*/
    Route::get('EditProfile', EditProfile::class)->name('ClientEditProfile');
    Route::get('EditPassword', EditPassword::class)->name('ClientEditPassword');
    /*End::Edit Profile & Password Operations*/
});
/*End::Auth,Client Group*/
