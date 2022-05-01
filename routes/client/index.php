<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Client\Dashboard\Index as ClientDashboard;


/*Begin::Cards*/
use App\Http\Livewire\Client\Dashboard\Cards\Index as Cards;
use App\Http\Livewire\Client\Dashboard\Cards\View\Index as ViewCard;
use App\Http\Livewire\Client\Dashboard\Cards\Redeem\Index as RedeemCard;
use App\Http\Livewire\Client\Dashboard\Cards\Recharge\Index as RechargeCard;
/*End::Cards*/

/*Begin::Settings*/
use App\Http\Livewire\Client\Dashboard\Settings\Profile\Index as EditProfile;
use App\Http\Livewire\Client\Dashboard\Settings\Password\Index as EditPassword;
/*End::Settings*/

/*Begin::Payments*/
use App\Http\Livewire\Client\Dashboard\Payments\Index as Payments;
/*End::Payments*/

/*Begin::Auth,Client Group*/

Route::middleware(['auth', 'client'])->prefix('Client')->group(function () {

    Route::get('Dashboard', ClientDashboard::class)->name('ClientDashboard');

    /*Begin::Cards*/
    Route::get('Cards', Cards::class)
        ->name('ClientCards');

    Route::get('RechargeCard/{code}', RechargeCard::class)
        ->name('ClientRechargeCard');

    Route::get('ViewCard/{code}', ViewCard::class)
        ->name('ClientViewCard');
    /*End::Cards*/

    /*Begin::Payments*/
    Route::get('Payments', Payments::class)->name('ClientPayments');
    /*End::Payments*/

    /*Begin::Settings*/
    Route::get('Settings/Profile', EditProfile::class)->name('ClientEditProfile');
    Route::get('Settings/Password', EditPassword::class)->name('ClientEditPassword');
    /*End::Settings*/
});
/*End::Auth,Client Group*/
