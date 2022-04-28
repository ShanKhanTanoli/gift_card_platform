<?php

namespace App\Helpers\Business;

use App\Models\User;
use Illuminate\Support\Str;
use App\Helpers\Currency\Currency;
use Illuminate\Support\Facades\Auth;
use FrittenKeeZ\Vouchers\Models\Voucher;
use FrittenKeeZ\Vouchers\Models\VoucherCategory;

class Business
{
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
            } else return "USD";
        } else return "USD";
    }
    /*End::Business Details*/

    /*Begin::Cards*/
    public static function Cards($business)
    {
        return Voucher::withOwner($business);
    }

    public static function CardsLatestPaginate($business, $quantity)
    {
        return self::Cards($business)->latest()->paginate($quantity);
    }

    public static function CountCards($business)
    {
        return self::Cards($business)->count();
    }

    public static function FindCard($business, $card)
    {
        return self::Cards($business)->find($card);
    }
    /*End::Cards*/

    /*Begin::CardCategories*/
    public static function CardCategories($business)
    {
        return VoucherCategory::where('user_id', $business);
    }

    public static function CardCategoriesLatestPaginate($business, $quantity)
    {
        return self::CardCategories($business)
            ->latest()->paginate($quantity);
    }

    public static function CreateCardCategory($business = null, $name = null)
    {
        return VoucherCategory::create([
            'user_id' => $business,
            'name' => $name,
            'slug' => Str::random(10),
        ]);
    }

    public static function CountCardCategories($business)
    {
        return self::CardCategories($business)->count();
    }

    public static function FindCardCategory($business, $category)
    {
        return self::CardCategories($business)->find($category);
    }
    /*End::Cards*/
}
