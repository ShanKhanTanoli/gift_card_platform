<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Dashboard\Index as AdminDashboard;

/*Begin::Settings*/
use App\Http\Livewire\Admin\Dashboard\Settings\Index as Settings;
use App\Http\Livewire\Admin\Dashboard\Settings\Profile\Index as EditProfile;
use App\Http\Livewire\Admin\Dashboard\Settings\Lease\Types\Index as LeaseTypes;
use App\Http\Livewire\Admin\Dashboard\Settings\Tenant\Types\Index as TenantTypes;
use App\Http\Livewire\Admin\Dashboard\Settings\Currencies\Index as Currency;
use App\Http\Livewire\Admin\Dashboard\Settings\Currencies\Edit\Index as EditCurrency;
use App\Http\Livewire\Admin\Dashboard\Settings\Password\Index as EditPassword;
/*End::Settings*/

/*Begin::Business*/
use App\Http\Livewire\Admin\Dashboard\Business\Index as ViewAllBusiness;
use App\Http\Livewire\Admin\Dashboard\Business\Add\Index as AddBusiness;
use App\Http\Livewire\Admin\Dashboard\Business\Edit\Index as EditBusiness;
use App\Http\Livewire\Admin\Dashboard\Business\UpdatePassword\Index as UpdateBusinessPassword;
/*End::Business*/

/*Begin::Clients*/
use App\Http\Livewire\Admin\Dashboard\Clients\Index as ViewAllClients;
use App\Http\Livewire\Admin\Dashboard\Clients\Add\Index as AddClient;
use App\Http\Livewire\Admin\Dashboard\Clients\Edit\Index as EditClient;
use App\Http\Livewire\Admin\Dashboard\Clients\UpdatePassword\Index as UpdateClientPassword;
/*End::Clients*/

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

    /*Begin::Settings*/
    Route::get('Settings/General', Settings::class)->name('AdminSettings');
    Route::get('Settings/Profile', EditProfile::class)->name('AdminEditProfile');
    Route::get('Settings/LeaseTypes', LeaseTypes::class)->name('AdminLeaseTypes');
    Route::get('Settings/TenantTypes', TenantTypes::class)->name('AdminTenantTypes');
    Route::get('Settings/Currency', Currency::class)->name('AdminCurrency');
    Route::get('Settings/EditCurrency/{slug}', EditCurrency::class)
        ->name('AdminEditCurrency');
    Route::get('Settings/Password', EditPassword::class)->name('AdminEditPassword');
    /*End::Settings*/
});
/*End::Auth,Admin Group*/
