<?php

namespace App\Helpers\Card;

use App\Models\User;
use FrittenKeeZ\Vouchers\Models\Voucher;
use FrittenKeeZ\Vouchers\Models\VoucherData;
use FrittenKeeZ\Vouchers\Models\VoucherCategory;
use FrittenKeeZ\Vouchers\Models\VoucherRecharge;

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

    public static function CountSold()
    {
        return self::All()
            ->where('sold', true)
            ->count();
    }

    public static function CountUnSold()
    {
        return self::All()
            ->where('sold', null)
            ->count();
    }

    public static function Find($code)
    {
        return self::All()->where('code', $code)
            ->first();
    }

    public static function FindById($id)
    {
        return self::All()->find($id);
    }

    public static function Expiry($code)
    {
        return Voucher::where('code', $code)
            ->first();
    }

    public static function FindOwner($code)
    {
        $voucher = Voucher::where('code', $code)->first();
        if ($voucher) {
            if ($owner = User::find($voucher->owner_id)) {
                return $owner;
            } else return "Add Owner";
        } else return "Add Owner";
    }

    /*End::Cards*/

    /*Begin::Card Recharge History*/
    public static function Recharge($voucher_id)
    {
        return VoucherRecharge::where('voucher_id', $voucher_id);
    }

    public static function LatestRechargePaginate($voucher_id, $quantity)
    {
        return self::Recharge($voucher_id)->latest()->paginate($quantity);
    }

    public static function RechargeCount($voucher_id)
    {
        return self::Recharge($voucher_id)->count();
    }
    /*End::Card Recharge History*/
}
