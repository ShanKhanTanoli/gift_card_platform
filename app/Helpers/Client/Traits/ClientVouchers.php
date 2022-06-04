<?php

namespace App\Helpers\Client\Traits;

use FrittenKeeZ\Vouchers\Models\ClientVoucher;
use FrittenKeeZ\Vouchers\Models\Voucher;

trait ClientVouchers
{
    public static function Vouchers($client)
    {
        $vouchers = ClientVoucher::where('user_id', $client)
            ->pluck('voucher_id')
            ->toArray();
        return Voucher::whereIn('id', $vouchers)
        ->where('type','voucher');
    }

    public static function LatestVouchersPaginate($client, $quantity)
    {
        return self::Vouchers($client)->latest()->paginate($quantity);
    }

    public static function VouchersCount($client)
    {
        return self::Vouchers($client)->count();
    }

    public static function FindVoucherByCode($client, $code)
    {
        return self::Vouchers($client)
            ->where('code', $code)
            ->first();
    }

    public static function FindVoucherBySlug($client, $slug)
    {
        return self::Vouchers($client)
            ->where('slug', $slug)
            ->first();
    }
}
