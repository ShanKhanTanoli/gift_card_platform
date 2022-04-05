<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Business\Dashboard\Index as BusinessDashboard;
use App\Http\Livewire\Business\Dashboard\Settings\Index as Settings;
use App\Http\Livewire\Business\Dashboard\Profile\Index as EditProfile;
use App\Http\Livewire\Business\Dashboard\Password\Index as EditPassword;

use App\Http\Livewire\Business\Dashboard\Clients\Index as Clients;
use App\Http\Livewire\Business\Dashboard\Clients\Add\Index as AddClient;
use App\Http\Livewire\Business\Dashboard\Clients\Edit\Index as EditClient;

/*Begin::Auth,Business Group*/

Route::middleware(['auth', 'business'])->prefix('Business')->group(function () {

    Route::get('Dashboard', BusinessDashboard::class)->name('BusinessDashboard');

    /*Begin::Edit Profile & Password Operations*/
    Route::get('EditProfile', EditProfile::class)->name('BusinessEditProfile');
    Route::get('EditPassword', EditPassword::class)->name('BusinessEditPassword');
    /*End::Edit Profile & Password Operations*/

    /*Begin::Client Operations*/
    Route::get('Clients', Clients::class)->name('BusinessClients');
    Route::get('AddClient', AddClient::class)->name('BusinessAddClient');
    Route::get('EditClient/{slug}', EditClient::class)->name('BusinessEditClient');
    /*End::Client Operations*/

    /*Begin::Settings Operations*/
    Route::get('Settings', Settings::class)->name('BusinessSettings');
    /*End::Settings Operations*/
});
/*End::Auth,Business Group*/
