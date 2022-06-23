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
use App\Http\Livewire\Admin\Dashboard\Cards\View\Index as ViewCard;
use App\Http\Livewire\Admin\Dashboard\Cards\Add\Index as AddCard;
use App\Http\Livewire\Admin\Dashboard\Cards\Edit\Index as EditCard;
/*End::Cards*/

/*Begin::Tickets*/
use App\Http\Livewire\Admin\Dashboard\Tickets\Index as ViewAllTickets;
use App\Http\Livewire\Admin\Dashboard\Tickets\View\Index as ViewTicket;
use App\Http\Livewire\Admin\Dashboard\Tickets\Add\Index as AddTicket;
use App\Http\Livewire\Admin\Dashboard\Tickets\Edit\Index as EditTicket;
/*End::Tickets*/

/*Begin::Vouchers*/
use App\Http\Livewire\Admin\Dashboard\Vouchers\Index as ViewAllVouchers;
use App\Http\Livewire\Admin\Dashboard\Vouchers\View\Index as ViewVoucher;
use App\Http\Livewire\Admin\Dashboard\Vouchers\Add\Index as AddVoucher;
use App\Http\Livewire\Admin\Dashboard\Vouchers\Edit\Index as EditVoucher;
/*End::Vouchers*/

/*Begin::Redeem*/
use App\Http\Livewire\Admin\Dashboard\Redeem\Index as Redeem;
/*End::Redeem*/

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

Route::middleware(['auth', 'admin'])->prefix('mapanel')->group(function () {

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
    Route::get('ViewCard/{slug}', ViewCard::class)->name('AdminViewCard');
    Route::get('AddCard', AddCard::class)->name('AdminAddCard');
    Route::get('EditCard/{slug}', EditCard::class)->name('AdminEditCard');
    /*End::Cards*/

    /*Begin::Tickets*/
    Route::get('Tickets', ViewAllTickets::class)->name('AdminTickets');
    Route::get('ViewTicket/{slug}', ViewTicket::class)->name('AdminViewTicket');
    Route::get('AddTicket', AddTicket::class)->name('AdminAddTicket');
    Route::get('EditTicket/{slug}', EditTicket::class)->name('AdminEditTicket');
    /*End::Tickets*/

    /*Begin::Vouchers*/
    Route::get('Vouchers', ViewAllVouchers::class)->name('AdminVouchers');
    Route::get('ViewVoucher/{slug}', ViewVoucher::class)->name('AdminViewVoucher');
    Route::get('AddVoucher', AddVoucher::class)->name('AdminAddVoucher');
    Route::get('EditVoucher/{slug}', EditVoucher::class)->name('AdminEditVoucher');
    /*End::Vouchers*/

    /*Begin::Redeem*/
    Route::get('Redeem', Redeem::class)->name('AdminRedeemCard');
    /*End::Redeem*/

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
