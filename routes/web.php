<?php

use App\Helpers\Client\Client;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Logout;
use App\Http\Livewire\Auth\SignUp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Auth\VerifyEmail;
use FrittenKeeZ\Vouchers\Models\Voucher;
use App\Http\Livewire\Auth\ResetPassword;
use App\Http\Livewire\Auth\ForgotPassword;
use FrittenKeeZ\Vouchers\Models\ClientVoucher;

//Auth::routes();

Route::get('debug', function () {

    dd(Client::CardsCount(Auth::user()->id, 6));

    $voucher = Voucher::where('code', '8550-5990-8918-1021')->first();

    if (!$voucher->isSold() && !$voucher->isExpired()) {
        ClientVoucher::create([
            'stripe_id' => 'string',
            'voucher_id' => $voucher->id,
            'user_id' => Auth::user()->id,
            'price' => $voucher->price,
            'comission_percentage' => 1,
        ]);
        $voucher->update([
            'sold' => true,
        ]);
        return true;
    } else return "false";
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