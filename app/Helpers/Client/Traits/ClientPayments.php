<?php

namespace App\Helpers\Client\Traits;

use FrittenKeeZ\Vouchers\Models\ClientVoucher;

trait ClientPayments
{
    public static function Payments($client)
    {
        $vouchers = ClientVoucher::where('user_id', $client);
        //dd($vouchers->get());
        return $vouchers;
    }

    public static function LatestPaymentsPaginate($client, $quantity)
    {
        return self::Payments($client)->latest()->paginate($quantity);
    }

    public static function PaymentsCount($client)
    {
        return self::Payments($client)->count();
    }
}
