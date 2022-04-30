<?php

namespace App\Helpers\Card;

use App\Models\User;
use FrittenKeeZ\Vouchers\Models\Voucher;
use FrittenKeeZ\Vouchers\Models\VoucherData;
use FrittenKeeZ\Vouchers\Models\VoucherCategory;

class Card
{

    /*Begin::Cards*/
    public static function All()
    {
        return VoucherData::latest();
    }

    public static function LatestPaginate($quantity)
    {
        return self::All()->paginate($quantity);
    }

    public static function Count()
    {
        return self::All()->count();
    }

    public static function CountSold($unique_id)
    {
        return Voucher::where('unique_id', $unique_id)->count();
    }

    public static function Find($unique_id)
    {
        return self::All()->where('unique_id', $unique_id)
            ->first();
    }

    public static function Expiry($unique_id)
    {
        return Voucher::where('unique_id', $unique_id)
            ->first();
    }
    
    public static function FindOwner($unique_id)
    {
        if ($voucher = VoucherData::where('unique_id', $unique_id)
            ->first()
        ) {
            if ($owner = User::find($voucher->owner_id)) {
                return $owner;
            } else return "Add Owner";
        } else return "Add Owner";
    }

    /*End::Cards*/
}
