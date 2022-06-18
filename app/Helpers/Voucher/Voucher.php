<?php

namespace App\Helpers\Voucher;

use App\Models\User;
use FrittenKeeZ\Vouchers\Models\Card;
use FrittenKeeZ\Vouchers\Models\Redeemer;

class Voucher
{

    /*Begin::Vouchers*/
    public static function All()
    {
        return Card::where('type', 'voucher')
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
        return Card::where('slug', $slug)
            ->first();
    }

    public static function FindOwner($slug)
    {
        $voucher = Card::where('slug', $slug)->first();
        if ($voucher) {
            if ($owner = User::find($voucher->user_id)) {
                return $owner;
            } else return "Add Owner";
        } else return "Add Owner";
    }

    public static function CanBePurchased($slug): bool
    {
        //If Card Found
        if ($card = self::FindBySlug($slug)) {
            //If Card is not banned
            if (!$card->trashed()) {
                //If Card is not expired
                if (!$card->isExpired()) {
                    //If Card is not expired
                    if ($card->isPublished()) {
                        return true;
                    } else return false;
                } else return false;
            } else return false;
        } else return false;
    }

    /*End::Vouchers*/

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
