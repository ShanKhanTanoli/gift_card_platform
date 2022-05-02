<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Dashboard\Index as AdminDashboard;

/*Begin::Business*/
use App\Http\Livewire\Admin\Dashboard\Business\Index as ViewAllBusiness;
use App\Http\Livewire\Admin\Dashboard\Business\Add\Index as AddBusiness;
use App\Http\Livewire\Admin\Dashboard\Business\Edit\Index as EditBusiness;
use App\Http\Livewire\Admin\Dashboard\Business\UpdatePassword\Index as UpdateBusinessPassword;
/*End::Business*/

/*Begin::Cards*/
use App\Http\Livewire\Admin\Dashboard\Cards\Index as ViewAllCards;
use App\Http\Livewire\Admin\Dashboard\Cards\Check\Index as CheckCard;
use App\Http\Livewire\Admin\Dashboard\Cards\View\Index as ViewCard;
use App\Http\Livewire\Admin\Dashboard\Cards\Add\Index as AddCard;
use App\Http\Livewire\Admin\Dashboard\Cards\Edit\Index as EditCard;
/*End::Cards*/

/*Begin::Clients*/
use App\Http\Livewire\Admin\Dashboard\Clients\Index as ViewAllClients;
use App\Http\Livewire\Admin\Dashboard\Clients\Add\Index as AddClient;
use App\Http\Livewire\Admin\Dashboard\Clients\Edit\Index as EditClient;
use App\Http\Livewire\Admin\Dashboard\Clients\UpdatePassword\Index as UpdateClientPassword;
/*End::Clients*/

/*Begin::Payments*/
use App\Http\Livewire\Admin\Dashboard\Payments\Index as ViewAllPayments;
/*End::Payments*/

/*Begin::Settings*/
use App\Http\Livewire\Admin\Dashboard\Settings\Index as Settings;
use App\Http\Livewire\Admin\Dashboard\Settings\Profile\Index as EditProfile;
use App\Http\Livewire\Admin\Dashboard\Settings\Currencies\Index as Currency;
use App\Http\Livewire\Admin\Dashboard\Settings\Currencies\Edit\Index as EditCurrency;
use App\Http\Livewire\Admin\Dashboard\Settings\Stripe\Index as Stripe;
use App\Http\Livewire\Admin\Dashboard\Settings\Stripe\Edit\Index as EditStripe;
use App\Http\Livewire\Admin\Dashboard\Settings\Password\Index as EditPassword;
/*End::Settings*/

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

    /*Begin::Cards*/
    Route::get('Cards', ViewAllCards::class)->name('AdminCards');
    Route::get('CheckCard', CheckCard::class)->name('AdminCheckCard');
    Route::get('ViewCard/{code}', ViewCard::class)->name('AdminViewCard');
    Route::get('AddCard', AddCard::class)->name('AdminAddCard');
    Route::get('EditCard/{code}', EditCard::class)->name('AdminEditCard');
    /*End::Cards*/

    /*Begin::Clients*/
    Route::get('Clients', ViewAllClients::class)->name('AdminClients');
    Route::get('AddClient', AddClient::class)->name('AdminAddClient');
    Route::get('EditClient/{slug}', EditClient::class)->name('AdminEditClient');
    Route::get('UpdateClient/{slug}/Password', UpdateClientPassword::class)
        ->name('AdminUpdateClientPassword');
    /*End::Clients*/

    /*Begin::Payments*/
    Route::get('Payments', ViewAllPayments::class)->name('AdminPayments');
    /*End::Payments*/

    /*Begin::Settings*/
    Route::get('Settings/General', Settings::class)->name('AdminSettings');
    Route::get('Settings/Profile', EditProfile::class)->name('AdminEditProfile');

    Route::get('Settings/Currency', Currency::class)->name('AdminCurrency');
    Route::get('Settings/EditCurrency/{slug}', EditCurrency::class)
        ->name('AdminEditCurrency');

    Route::get('Settings/Stripe', Stripe::class)->name('AdminStripe');
    Route::get('Settings/EditStripe', EditStripe::class)
        ->name('AdminEditStripe');

    Route::get('Settings/Password', EditPassword::class)->name('AdminEditPassword');
    /*End::Settings*/
});
/*End::Auth,Admin Group*/
