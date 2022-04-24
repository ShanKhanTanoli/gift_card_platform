<?php

use App\Helpers\Business\Business;
use App\Models\User;
use Carbon\CarbonInterval;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Logout;
use App\Http\Livewire\Auth\SignUp;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Auth\VerifyEmail;
use App\Http\Livewire\Auth\ResetPassword;
use App\Http\Livewire\Auth\ForgotPassword;
use FrittenKeeZ\Vouchers\Facades\Vouchers;
use Illuminate\Support\Facades\Auth;

//Auth::routes();

Route::get('debug', function () {
    //dd(Business::Cards(Auth::user()));
    //dd(CarbonInterval::create('P30D'));
    $user = User::find(Auth::user()->id);
    $vouchers = Vouchers::withOwner($user)
        ->withExpireDateIn(CarbonInterval::create('P30D'))
        ->create(5);
    dd($vouchers);
    //dd($success = Vouchers::redeem('2639-1593-0535-3580', $user, ['name' => $user->name]));
    return "done";
});


Route::get('/home', function () {
    return redirect(route('AdminDashboard'));
})->name('home');


Route::get('/', function () {
    return redirect(route('login'));
})->name('main');

/*Begin::Admin Routes*/
include('admin/index.php');
/*End::Admin Routes*/

/*Begin::Business Routes*/
include('business/index.php');
/*End::Business Routes*/

/*Begin::Client Routes*/
include('client/index.php');
/*End::Client Routes*/


/*Begin::Auth Routes*/
Route::get('register', SignUp::class)
    ->name('register');

Route::get('/login', Login::class)
    ->name('login');

Route::get('logout', Logout::class)
    ->name('logout');

Route::get('/login/forgot-password', ForgotPassword::class)
    ->name('forgot-password');

Route::get('/reset-password/{id}', ResetPassword::class)
    ->name('reset-password')->middleware('signed');

Route::get('VerifyEmail', VerifyEmail::class)
    ->name('verification.notice')
    ->middleware('auth');
/*End::Auth Routes*/