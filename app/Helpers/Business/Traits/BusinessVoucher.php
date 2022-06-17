<?php

namespace App\Helpers\Business\Traits;

use FrittenKeeZ\Vouchers\Models\Card;

trait BusinessVoucher
{

    /*Begin::Vouchers*/
    public static function Vouchers($business)
    {
        return Card::withTrashed()
            ->where('user_id', $business)
            ->where('type', 'voucher');
    }

    public static function VouchersLatestPaginate($business, $quantity)
    {
        return self::Vouchers($business)
            ->latest()
            ->paginate($quantity);
    }

    public static function CountVouchers($business)
    {
        return self::Vouchers($business)->count();
    }

    public static function FindVoucherBySlug($business, $slug)
    {
        return self::Vouchers($business)
            ->where('slug', $slug)
            ->first();
    }
    public static function FindVoucherById($business, $id)
    {
        return self::Vouchers($business)
            ->find($id);
    }
    /*End::Vouchers*/
}
