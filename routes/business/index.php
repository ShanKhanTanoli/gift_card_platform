<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Business\Dashboard\Index as BusinessDashboard;

/*Begin::Cards*/
use App\Http\Livewire\Business\Dashboard\Cards\Index as Cards;
use App\Http\Livewire\Business\Dashboard\Cards\Sold\Index as SoldCards;
use App\Http\Livewire\Business\Dashboard\Cards\Check\Index as RedeemCard;
use App\Http\Livewire\Business\Dashboard\Cards\View\Index as ViewCard;
use App\Http\Livewire\Business\Dashboard\Cards\Issue\Index as IssueCard;
use App\Http\Livewire\Business\Dashboard\Cards\Add\Index as AddCard;
use App\Http\Livewire\Business\Dashboard\Cards\Edit\Index as EditCard;
use App\Http\Livewire\Business\Dashboard\Cards\More\Index as CardMore;
/*End::Cards*/

/*Begin::Tickets*/
use App\Http\Livewire\Business\Dashboard\Tickets\Index as Tickets;
use App\Http\Livewire\Business\Dashboard\Tickets\Sold\Index as SoldTickets;
use App\Http\Livewire\Business\Dashboard\Tickets\Check\Index as RedeemTicket;
use App\Http\Livewire\Business\Dashboard\Tickets\View\Index as ViewTicket;
use App\Http\Livewire\Business\Dashboard\Tickets\Issue\Index as IssueTicket;
use App\Http\Livewire\Business\Dashboard\Tickets\Add\Index as AddTicket;
use App\Http\Livewire\Business\Dashboard\Tickets\Edit\Index as EditTicket;
use App\Http\Livewire\Business\Dashboard\Tickets\More\Index as TicketMore;
/*End::Tickets*/

/*Begin::Vouchers*/
use App\Http\Livewire\Business\Dashboard\Vouchers\Index as Vouchers;
use App\Http\Livewire\Business\Dashboard\Vouchers\Sold\Index as SoldVouchers;
use App\Http\Livewire\Business\Dashboard\Vouchers\Check\Index as RedeemVoucher;
use App\Http\Livewire\Business\Dashboard\Vouchers\View\Index as ViewVoucher;
use App\Http\Livewire\Business\Dashboard\Vouchers\Issue\Index as IssueVoucher;
use App\Http\Livewire\Business\Dashboard\Vouchers\Add\Index as AddVoucher;
use App\Http\Livewire\Business\Dashboard\Vouchers\Edit\Index as EditVoucher;
use App\Http\Livewire\Business\Dashboard\Vouchers\More\Index as VoucherMore;
/*End::Vouchers*/

/*Begin::Store*/
use App\Http\Livewire\Business\Dashboard\Store\Index as Store;
/*End::Store*/

/*Begin::Payments*/
// use App\Http\Livewire\Business\Dashboard\Payments\Index as Payments;
// use App\Http\Livewire\Business\Dashboard\Payments\Add\Index as AddPayment;
// use App\Http\Livewire\Business\Dashboard\Payments\Edit\Index as EditPayment;
/*End::Payments*/

/*Begin::StripeConnect*/
use App\Http\Livewire\Business\Dashboard\StripeConnect\Index as StripeConnect;
/*End::StripeConnect*/

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

    Route::get('RedeemCard', RedeemCard::class)
        ->name('BusinessRedeemCard');

    Route::get('ViewCard/{slug}', ViewCard::class)
        ->name('BusinessViewCard');

    Route::get('IssueCard/{slug}', IssueCard::class)
        ->name('BusinessIssueCard');

    Route::get('AddCard', AddCard::class)
        ->name('BusinessAddCard');

    Route::get('EditCard/{slug}', EditCard::class)
        ->name('BusinessEditCard');

    Route::get('Card/{slug}/More', CardMore::class)
        ->name('BusinessCardMore');
    /*End::Cards*/


    /*Begin::Tickets*/
    Route::get('Tickets', Tickets::class)
        ->name('BusinessTickets');

    Route::get('SoldTickets', SoldTickets::class)
        ->name('BusinessSoldTickets');

    Route::get('RedeemTicket', RedeemTicket::class)
        ->name('BusinessRedeemTicket');

    Route::get('ViewTicket/{slug}', ViewTicket::class)
        ->name('BusinessViewTicket');

    Route::get('IssueTicket/{slug}', IssueTicket::class)
        ->name('BusinessIssueTicket');

    Route::get('AddTicket', AddTicket::class)
        ->name('BusinessAddTicket');

    Route::get('EditTicket/{slug}', EditTicket::class)
        ->name('BusinessEditTicket');

    Route::get('Ticket/{slug}/More', TicketMore::class)
        ->name('BusinessTicketMore');
    /*End::Tickets*/

    /*Begin::Vouchers*/
    Route::get('Vouchers', Vouchers::class)
        ->name('BusinessVouchers');

    Route::get('SoldVouchers', SoldVouchers::class)
        ->name('BusinessSoldVouchers');

    Route::get('RedeemVoucher', RedeemVoucher::class)
        ->name('BusinessRedeemVoucher');

    Route::get('ViewVoucher/{slug}', ViewVoucher::class)
        ->name('BusinessViewVoucher');

    Route::get('IssueVoucher/{slug}', IssueVoucher::class)
        ->name('BusinessIssueVoucher');

    Route::get('AddVoucher', AddVoucher::class)
        ->name('BusinessAddVoucher');

    Route::get('EditVoucher/{slug}', EditVoucher::class)
        ->name('BusinessEditVoucher');

    Route::get('Voucher/{slug}/More', VoucherMore::class)
        ->name('BusinessVoucherMore');
    /*End::Vouchers*/

    /*Begin::Store*/
    Route::get('Store', Store::class)->name('BusinessStore');
    /*End::Store*/

    /*Begin::Payments*/
    // Route::get('Payments', Payments::class)->name('BusinessPayments');
    // Route::get('AddPayment', AddPayment::class)->name('BusinessAddPayment');
    // Route::get('EditPayment/{id}', EditPayment::class)->name('BusinessEditPayment');
    /*End::Payments*/

    /*Begin::StripeConnect*/
    Route::get('StripeConnect', StripeConnect::class)->name('BusinessStripeConnect');
    /*End::StripeConnect*/

    /*Begin::Settings*/
    Route::get('Settings/BusinessDetails', EditBusinessDetails::class)->name('BusinessEditDetails');
    Route::get('Settings/Profile', EditProfile::class)->name('BusinessEditProfile');
    Route::get('Settings/Store', EditStore::class)->name('BusinessEditStore');
    Route::get('Settings/Password', EditPassword::class)->name('BusinessEditPassword');
    /*End::Settings*/
});
/*End::Auth,Business Group*/
