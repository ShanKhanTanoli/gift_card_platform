<?php

namespace App\Helpers\Client\Traits;

use FrittenKeeZ\Vouchers\Models\VoucherRecharge;

trait ClientCardRecharge
{
    public static function Recharge($client)
    {
        return VoucherRecharge::where('user_id', $client);
    }

    public static function LatestRechargePaginate($client, $quantity)
    {
        return self::Recharge($client)->latest()->paginate($quantity);
    }

    public static function RechargeCount($client)
    {
        return self::Recharge($client)->count();
    }
}
