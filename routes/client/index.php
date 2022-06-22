<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Client\Dashboard\Index as ClientDashboard;


/*Begin::Cards*/
use App\Http\Livewire\Client\Dashboard\Cards\Index as Cards;
use App\Http\Livewire\Client\Dashboard\Cards\View\Index as ViewCard;
use App\Http\Livewire\Client\Dashboard\Cards\More\Index as CardMore;
use App\Http\Livewire\Client\Dashboard\Cards\Pin\Index as CardPin;
use App\Http\Livewire\Client\Dashboard\Cards\Recharge\Index as RechargeCard;
/*End::Cards*/

/*Begin::Recharge with Stripe*/
use App\Http\Livewire\Client\Dashboard\Cards\Recharge\Stripe\Index as RechargeWithStripe;
/*End::Recharge with Stripe*/

/*Begin::Recharge with Paypal*/
use App\Http\Livewire\Client\Dashboard\Cards\Recharge\Paypal\Index as RechargeWithPaypal;
/*End::Recharge with Paypal*/

/*Begin::Recharge with Crypto*/
use App\Http\Livewire\Client\Dashboard\Cards\Recharge\Crypto\Index as RechargeWithCrypto;
/*End::Recharge with Crypto*/

/*Begin::Tickets*/
use App\Http\Livewire\Client\Dashboard\Tickets\Index as Tickets;
use App\Http\Livewire\Client\Dashboard\Tickets\View\Index as ViewTicket;
/*End::Tickets*/

/*Begin::Vouchers*/
use App\Http\Livewire\Client\Dashboard\Vouchers\Index as Vouchers;
use App\Http\Livewire\Client\Dashboard\Vouchers\View\Index as ViewVoucher;
/*End::Vouchers*/

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

    Route::get('RechargeCard/{slug}', RechargeCard::class)
        ->name('ClientRechargeCard');

    Route::get('ViewCard/{slug}', ViewCard::class)
        ->name('ClientViewCard');

    Route::get('Card/{slug}/More', CardMore::class)
        ->name('ClientCardMore');

    Route::get('Card/{slug}/Pin', CardPin::class)
        ->name('ClientCardPin');

    /*End::Cards*/

    /*Begin::Recharge with Stripe*/
    Route::get('Card/{slug}/RechargeWithStripe', RechargeWithStripe::class)
        ->name('ClientRechargeWithStripe');
    /*End::Recharge with Stripe*/

    /*Begin::Recharge with Paypal*/
    Route::get('Card/{slug}/RechargeWithPaypal', RechargeWithPaypal::class)
        ->name('ClientRechargeWithPaypal');
    /*End::Recharge with Paypal*/

    /*Begin::Recharge with Paypal*/
    Route::get('Card/{slug}/RechargeWithPaypal', RechargeWithPaypal::class)
        ->name('ClientRechargeWithPaypal');
    /*End::Recharge with Paypal*/

    /*Begin::Recharge with Crypto*/
    Route::get('Card/{slug}/RechargeWithCrypto', RechargeWithCrypto::class)
        ->name('ClientRechargeWithCrypto');
    /*End::Recharge with Crypto*/

    /*Begin::Tickets*/
    Route::get('Tickets', Tickets::class)
        ->name('ClientTickets');

    Route::get('ViewTicket/{slug}', ViewTicket::class)
        ->name('ClientViewTicket');

    /*End::Tickets*/

    /*Begin::Vouchers*/
    Route::get('Vouchers', Vouchers::class)
        ->name('ClientVouchers');

    Route::get('ViewVoucher/{slug}', ViewVoucher::class)
        ->name('ClientViewVoucher');

    /*End::Vouchers*/

    /*Begin::Payments*/
    Route::get('Payments', Payments::class)->name('ClientPayments');
    /*End::Payments*/

    /*Begin::Settings*/
    Route::get('Settings/Profile', EditProfile::class)->name('ClientEditProfile');
    Route::get('Settings/Password', EditPassword::class)->name('ClientEditPassword');
    /*End::Settings*/
});
/*End::Auth,Client Group*/
