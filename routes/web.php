<?php

use App\Helpers\Business\Business;
use App\Helpers\Stripe\Stripe;
use App\Models\User;
use Illuminate\Support\Str;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Logout;
use App\Http\Livewire\Auth\SignUp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Auth\VerifyEmail;
use App\Http\Livewire\Auth\ResetPassword;
use App\Http\Livewire\Auth\ForgotPassword;
use FrittenKeeZ\Vouchers\Facades\Vouchers;
use FrittenKeeZ\Vouchers\Models\VoucherCategory;
use FrittenKeeZ\Vouchers\Models\VoucherData;

//Auth::routes();

Route::get('debug', function () {

    $voucher = VoucherData::where('unique_id','8UJYK5ZUUYLQUATDYZZU')->first();
    //dd($voucher);
    dd(Vouchers::issue(1,$voucher->unique_id,$voucher->expires_at));

    dd(Business::CountCards(2));
    $user = User::find(2);
    VoucherCategory::create([
        'user_id' => $user->id,
        'name' => '10 Dollars',
        'slug' => Str::random(10),
    ]);
    VoucherCategory::create([
        'user_id' => $user->id,
        'name' => '20 Dollars',
        'slug' => Str::random(10),
    ]);
    //dd(Business::Cards(Auth::user()));
    //dd(CarbonInterval::create('P30D'));
    $vouchers = Vouchers::withOwner($user)
        ->withExpireDate(new DateTime(date('Y-m-d H:i:s')))
        ->withPrice(100)
        ->withBalance(100)
        ->withCategory(mt_rand(1, 2))
        ->create(10);
    dd($vouchers);
    //dd($success = Vouchers::redeem('2639-1593-0535-3580', $user, ['name' => $user->name]));
    return "done";

    //Carbon::parse($timestamp)->format('Y-m-d');
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