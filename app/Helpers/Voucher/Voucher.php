<?php

namespace App\Helpers\Voucher;

use App\Models\User;
use FrittenKeeZ\Vouchers\Models\Redeemer;
use FrittenKeeZ\Vouchers\Models\Voucher as VoucherModel;
use FrittenKeeZ\Vouchers\Models\VoucherRecharge;

class Voucher
{

    /*Begin::Vouchers*/
    public static function All()
    {
        return VoucherModel::where('type', 'voucher')
            ->latest();
    }

    public static function LatestPaginate($quantity)
    {
        return self::All()->paginate($quantity);
    }

    public static function Count()
    {
        return self::All()->count();
    }

    public static function FindBySlug($slug)
    {
        return self::All()->where('slug', $slug)
            ->first();
    }

    public static function FindById($id)
    {
        return self::All()->find($id);
    }

    public static function Expiry($slug)
    {
        return VoucherModel::where('slug', $slug)
            ->first();
    }

    public static function FindOwner($slug)
    {
        $voucher = VoucherModel::where('slug', $slug)->first();
        if ($voucher) {
            if ($owner = User::find($voucher->user_id)) {
                return $owner;
            } else return "Add Owner";
        } else return "Add Owner";
    }

    /*End::Vouchers*/

    /*Begin::Voucher Recharge History*/
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
    /*End::Voucher Recharge History*/

    /*Begin::Voucher Redeem History*/
    public static function Redeem($voucher_id)
    {
        return Redeemer::where('voucher_id', $voucher_id);
    }

    public static function LatestRedeemPaginate($voucher_id, $quantity)
    {
        return self::Redeem($voucher_id)->latest()->paginate($quantity);
    }

    public static function RedeemCount($voucher_id)
    {
        return self::Redeem($voucher_id)->count();
    }
    /*End::Voucher Redeem History*/
}
