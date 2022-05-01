<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Business\Dashboard\Index as BusinessDashboard;

/*Begin::Cards*/
use App\Http\Livewire\Business\Dashboard\Cards\Index as Cards;
use App\Http\Livewire\Business\Dashboard\Cards\Sold\Index as SoldCards;
use App\Http\Livewire\Business\Dashboard\Cards\Check\Index as CheckCard;
use App\Http\Livewire\Business\Dashboard\Cards\View\Index as ViewCard;
use App\Http\Livewire\Business\Dashboard\Cards\Add\Index as AddCard;
use App\Http\Livewire\Business\Dashboard\Cards\Edit\Index as EditCard;
/*End::Cards*/

/*Begin::Payments*/
use App\Http\Livewire\Business\Dashboard\Payments\Index as Payments;
use App\Http\Livewire\Business\Dashboard\Payments\Add\Index as AddPayment;
use App\Http\Livewire\Business\Dashboard\Payments\Edit\Index as EditPayment;
/*End::Payments*/

/*Begin::Settings*/
use App\Http\Livewire\Business\Dashboard\Settings\BusinessDetails\Index as EditBusinessDetails;
use App\Http\Livewire\Business\Dashboard\Settings\Profile\Index as EditProfile;
use App\Http\Livewire\Business\Dashboard\Settings\Store\Index as EditStore;
use App\Http\Livewire\Business\Dashboard\Settings\Password\Index as EditPassword;
/*End::Settings*/

/*Begin::Auth,Business Group*/

Route::middleware(['auth', 'business'])->prefix('Business')->group(function () {

    Route::get('Dashboard', BusinessDashboard::class)->name('BusinessDashboard');

    /*Begin::Cards*/
    Route::get('Cards', Cards::class)
        ->name('BusinessCards');

    Route::get('SoldCards', SoldCards::class)
        ->name('BusinessSoldCards');

    Route::get('CheckCard', CheckCard::class)
        ->name('BusinessCheckCard');

    Route::get('ViewCard/{code}', ViewCard::class)
        ->name('BusinessViewCard');

    Route::get('AddCard', AddCard::class)
        ->name('BusinessAddCard');

    Route::get('EditCard/{code}', EditCard::class)
        ->name('BusinessEditCard');
    /*End::Cards*/

    /*Begin::Payments*/
    Route::get('Payments', Payments::class)->name('BusinessPayments');
    Route::get('AddPayment', AddPayment::class)->name('BusinessAddPayment');
    Route::get('EditPayment/{id}', EditPayment::class)->name('BusinessEditPayment');
    /*End::Payments*/

    /*Begin::Settings*/
    Route::get('Settings/BusinessDetails', EditBusinessDetails::class)->name('BusinessEditDetails');
    Route::get('Settings/Profile', EditProfile::class)->name('BusinessEditProfile');
    Route::get('Settings/Store', EditStore::class)->name('BusinessEditStore');
    Route::get('Settings/Password', EditPassword::class)->name('BusinessEditPassword');
    /*End::Settings*/
});
/*End::Auth,Business Group*/
