<?php

namespace App\Helpers\Business\Traits;

use FrittenKeeZ\Vouchers\Models\Voucher;

trait BusinessCards
{

    /*Begin::Cards*/
    public static function Cards($business)
    {
        return Voucher::where('user_id', $business);
    }

    public static function CardsLatestPaginate($business, $quantity)
    {
        return self::Cards($business)
            ->latest()
            ->paginate($quantity);
    }

    public static function CardsLatestUnsoldPaginate($business, $quantity)
    {
        return self::Cards($business)
            ->where('sold', null)
            ->latest()
            ->paginate($quantity);
    }

    public static function CardsLatestSoldPaginate($business, $quantity)
    {
        return self::Cards($business)
            ->where('sold', true)
            ->latest()
            ->paginate($quantity);
    }

    public static function CountCards($business)
    {
        return self::Cards($business)->count();
    }

    public static function CountUnsoldCards($business)
    {
        return self::Cards($business)
            ->where('sold', null)
            ->count();
    }

    public static function CountSoldCards($business)
    {
        return self::Cards($business)
            ->where('sold', true)
            ->count();
    }

    public static function FindCard($business, $code)
    {
        return self::Cards($business)
            ->where('code', $code)
            ->first();
    }
    public static function FindCardById($business, $id)
    {
        return self::Cards($business)
            ->find($id);
    }
    /*End::Cards*/
}
