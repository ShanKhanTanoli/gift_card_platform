<?php

namespace App\Helpers\Business;

use App\Helpers\Business\Traits\BusinessCards;
use App\Helpers\Business\Traits\BusinessStore;
use App\Helpers\Business\Traits\BusinessTicket;
use App\Helpers\Business\Traits\BusinessVoucher;
use App\Models\User;
use App\Helpers\Currency\Currency;
use Illuminate\Support\Facades\Auth;

class Business
{
    use BusinessCards, BusinessTicket, BusinessVoucher, BusinessStore;

    public static function Is()
    {
        if ($user = Auth::user()) {
            if ($user->role_id == 2 && $user->role == "business") {
                return $user;
            }
            return false;
        }
        return false;
    }

    public static function Find($business)
    {
        if ($user = User::find($business)) {
            if ($user->role_id == 2 && $user->role == "business") {
                return $user;
            }
            return false;
        }
        return false;
    }

    public static function all()
    {
        return User::where('role_id', '2')
            ->where('role', 'business');
    }

    public static function LatestPaginate($quantity)
    {
        return self::all()->latest()
            ->paginate($quantity);
    }

    public static function count()
    {
        return self::all()->count();
    }

    /*Begin::Settings*/
    public static function Settings($user)
    {
        return User::find($user)->settings;
    }
    /*End::Settings*/

    /*Begin::Business Details*/
    public static function Details($user)
    {
        return User::find($user)->details;
    }
    public static function Currency($user)
    {
        if ($details = User::find($user)->details) {
            if ($currency = Currency::Find($details->currency_id)) {
                return $currency->name;
            } else return "usd";
        } else return "usd";
    }
    /*End::Business Details*/
}
