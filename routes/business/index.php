<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Business\Dashboard\Index as BusinessDashboard;

/*Begin::Settings*/
use App\Http\Livewire\Business\Dashboard\Settings\BusinessDetails\Index as EditBusinessDetails;
use App\Http\Livewire\Business\Dashboard\Settings\Profile\Index as EditProfile;
use App\Http\Livewire\Business\Dashboard\Settings\Password\Index as EditPassword;
/*End::Settings*/

/*Begin::Clients*/
use App\Http\Livewire\Business\Dashboard\Clients\Index as Clients;
use App\Http\Livewire\Business\Dashboard\Clients\Add\Index as AddClient;
use App\Http\Livewire\Business\Dashboard\Clients\Edit\Index as EditClient;
use App\Http\Livewire\Business\Dashboard\Clients\UpdatePassword\Index as EditClientPassword;
/*End::Clients*/

/*Begin::Cards*/
use App\Http\Livewire\Business\Dashboard\Cards\Index as Cards;
use App\Http\Livewire\Business\Dashboard\Cards\View\Index as ViewCard;
use App\Http\Livewire\Business\Dashboard\Cards\Add\Index as AddCard;
use App\Http\Livewire\Business\Dashboard\Cards\Edit\Index as EditCard;
/*End::Cards*/

/*Begin::CardCategories*/
use App\Http\Livewire\Business\Dashboard\CardCategories\Index as CardCategories;
use App\Http\Livewire\Business\Dashboard\CardCategories\Add\Index as AddCardCategory;
use App\Http\Livewire\Business\Dashboard\CardCategories\Edit\Index as EditCardCategory;
/*End::CardCategories*/

/*Begin::Auth,Business Group*/

Route::middleware(['auth', 'business'])->prefix('Business')->group(function () {

    Route::get('Dashboard', BusinessDashboard::class)->name('BusinessDashboard');

    /*Begin::Card*/
    Route::get('Cards', Cards::class)->name('BusinessCards');
    Route::get('ViewCard/{unique_id}', ViewCard::class)->name('BusinessViewCard');
    Route::get('AddCard', AddCard::class)->name('BusinessAddCard');
    Route::get('EditCard/{unique_id}', EditCard::class)->name('BusinessEditCard');
    /*End::Card*/

    /*Begin::Settings*/
    Route::get('Settings/BusinessDetails', EditBusinessDetails::class)->name('BusinessEditDetails');
    Route::get('Settings/Profile', EditProfile::class)->name('BusinessEditProfile');
    Route::get('Settings/Password', EditPassword::class)->name('BusinessEditPassword');
    /*End::Settings*/
});
/*End::Auth,Business Group*/
