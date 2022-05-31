<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use FrittenKeeZ\Vouchers\Models\Voucher;
use FrittenKeeZ\Vouchers\Models\ClientVoucher;

//Auth::routes();

Route::get('debug', function () {

    dd('debug');

    //Verified Business Account
    $verified_business = 'acct_1KVjQIRYVF7b7SlI';

    //Verified Individual Account
    $verified_individual = 'acct_1KVjJwDGx269Aqtf';

    //Restricts Soon Account
    $account = 'acct_1KVH0XRXmAQzp1r9';

    //Restricted Account
    $restricted = 'acct_1KVH0LRiGUGr13em';

    // $amount = 10;
    // $percentage = 1;

    // dd($amount*$percentage/100);

    $voucher = Voucher::where('code', '8610-8362-1545-2697')->first();
    if (!$voucher->isSold() && !$voucher->isExpired()) {
        ClientVoucher::create([
            'stripe_id' => 'string',
            'voucher_id' => $voucher->id,
            'user_id' => Auth::user()->id,
            'price' => $voucher->price,
            'currency' => 'usd',
            'comission_percentage' => 10,
            'final_amount' => $voucher->price * 10 / 100,
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

/*Begin::Public Routes*/
include('public/index.php');
/*End::Public Routes*/

/*Begin::Auth Routes*/
include('auth/index.php');
/*End::Auth Routes*/
