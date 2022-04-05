<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Dashboard\Index as AdminDashboard;

use App\Http\Livewire\Admin\Dashboard\Settings\Index as Settings;

use App\Http\Livewire\Admin\Dashboard\Profile\Index as EditProfile;
use App\Http\Livewire\Admin\Dashboard\Password\Index as EditPassword;

use App\Http\Livewire\Admin\Dashboard\Business\Index as ViewAllBusiness;
use App\Http\Livewire\Admin\Dashboard\Business\Add\Index as AddBusiness;
use App\Http\Livewire\Admin\Dashboard\Business\Edit\Index as EditBusiness;
use App\Http\Livewire\Admin\Dashboard\Business\UpdatePassword\Index as UpdateBusinessPassword;

use App\Http\Livewire\Admin\Dashboard\Clients\Index as ViewAllClients;
use App\Http\Livewire\Admin\Dashboard\Clients\Add\Index as AddClient;
use App\Http\Livewire\Admin\Dashboard\Clients\Edit\Index as EditClient;
use App\Http\Livewire\Admin\Dashboard\Clients\UpdatePassword\Index as UpdateClientPassword;

/*Begin::Auth,Admin Group*/

Route::middleware(['auth', 'admin'])->prefix('Admin')->group(function () {

    Route::get('Dashboard', AdminDashboard::class)->name('AdminDashboard');

    /*Begin::Business*/
    Route::get('Business', ViewAllBusiness::class)->name('AdminBusiness');
    Route::get('AddBusiness', AddBusiness::class)->name('AdminAddBusiness');
    Route::get('EditBusiness/{slug}', EditBusiness::class)->name('AdminEditBusiness');
    Route::get('UpdateBusiness/{slug}/Password', UpdateBusinessPassword::class)
        ->name('AdminUpdateBusinessPassword');
    /*End::Business*/

    /*Begin::Clients*/
    Route::get('Clients', ViewAllClients::class)->name('AdminClients');
    Route::get('AddClient', AddClient::class)->name('AdminAddClient');
    Route::get('EditClient/{slug}', EditClient::class)->name('AdminEditClient');
    Route::get('UpdateClient/{slug}/Password', UpdateClientPassword::class)
        ->name('AdminUpdateClientPassword');
    /*End::Clients*/

    /*Begin::Edit Profile & Password*/
    Route::get('EditProfile', EditProfile::class)->name('AdminEditProfile');
    Route::get('EditPassword', EditPassword::class)->name('AdminEditPassword');
    /*End::Edit Profile & Password*/

    /*Begin::Settings*/
    Route::get('Settings', Settings::class)->name('AdminSettings');
    /*End::Settings*/
});
/*End::Auth,Admin Group*/
