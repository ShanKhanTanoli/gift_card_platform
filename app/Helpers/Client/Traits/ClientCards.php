<?php

namespace App\Helpers\Client\Traits;

use FrittenKeeZ\Vouchers\Models\ClientVoucher;
use FrittenKeeZ\Vouchers\Models\Voucher;

trait ClientCards
{
    public static function Cards($client)
    {
        $vouchers = ClientVoucher::where('user_id', $client)
            ->pluck('voucher_id')
            ->toArray();
        return Voucher::whereIn('id', $vouchers);
    }

    public static function LatestCardsPaginate($client, $quantity)
    {
        return self::Cards($client)->latest()->paginate($quantity);
    }

    public static function CardsCount($client)
    {
        return self::Cards($client)->count();
    }

    public static function FindCard($client, $code)
    {
        return self::Cards($client)
            ->where('code', $code)
            ->first();
    }
}
