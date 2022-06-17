<?php

namespace App\Helpers\Business\Traits;

use FrittenKeeZ\Vouchers\Models\Card;

trait BusinessCards
{

    /*Begin::Cards*/
    public static function Cards($business)
    {
        return Card::withTrashed()
            ->where('user_id', $business)
            ->where('type','card');
    }

    public static function CardsLatestPaginate($business, $quantity)
    {
        return self::Cards($business)
            ->latest()
            ->paginate($quantity);
    }

    public static function CountCards($business)
    {
        return self::Cards($business)->count();
    }

    public static function FindCardBySlug($business, $slug)
    {
        return self::Cards($business)
            ->where('slug', $slug)
            ->first();
    }
    public static function FindCardById($business, $id)
    {
        return self::Cards($business)
            ->find($id);
    }
    /*End::Cards*/
}
