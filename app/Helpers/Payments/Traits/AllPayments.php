<?php

namespace App\Helpers\Payments\Traits;

use FrittenKeeZ\Vouchers\Models\ClientVoucher;

trait AllPayments
{
    public static function All()
    {
        return ClientVoucher::latest();
    }

    public static function LatestPaginate($quantity)
    {
        return self::All()
            ->paginate($quantity);
    }

    public static function Count()
    {
        return self::All()->count();
    }
}
