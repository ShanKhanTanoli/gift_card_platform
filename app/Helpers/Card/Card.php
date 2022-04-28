<?php

namespace App\Helpers\Card;

use FrittenKeeZ\Vouchers\Models\Voucher;
use FrittenKeeZ\Vouchers\Models\VoucherCategory;

class Card
{

    /*Begin::Cards*/
    public static function All()
    {
        return Voucher::latest();
    }

    public static function LatestPaginate($quantity)
    {
        return self::All()->paginate($quantity);
    }

    public static function Count()
    {
        return self::All()->count();
    }

    public static function Find($card)
    {
        return self::All()->find($card);
    }
    /*End::Cards*/

    /*Begin::CardCategory*/
    public static function FindCategory($category)
    {
        return VoucherCategory::find($category);
    }

    public static function Categories()
    {
        return VoucherCategory::latest();
    }

    public static function LatestCategoriesPaginate($quantity)
    {
        return VoucherCategory::latest()
            ->paginate($quantity);
    }

    public static function CountCategories()
    {
        return VoucherCategory::count();
    }

    /*End::CardCategory*/
}
