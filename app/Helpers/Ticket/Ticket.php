<?php

namespace App\Helpers\Ticket;

use App\Models\User;
use FrittenKeeZ\Vouchers\Models\Voucher;
use FrittenKeeZ\Vouchers\Models\Redeemer;
use FrittenKeeZ\Vouchers\Models\VoucherRecharge;
use FrittenKeeZ\Vouchers\Models\Card as CardModel;

class Ticket
{

    /*Begin::Tickets*/
    public static function All()
    {
        return CardModel::where('type', 'ticket')->latest();
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

    public static function FindById($id)
    {
        return self::All()->find($id);
    }

    public static function Expiry($slug)
    {
        return CardModel::where('slug', $slug)
            ->first();
    }

    public static function FindOwner($slug)
    {
        $voucher = CardModel::where('slug', $slug)->first();
        if ($voucher) {
            if ($owner = User::find($voucher->user_id)) {
                return $owner;
            } else return "Add Owner";
        } else return "Add Owner";
    }

    //Count Sold tickets
    public static function CountSold($id)
    {
        return Voucher::where('card_id', $id)
            ->where('type', 'ticket')
            ->count();
    }
    /*End::Tickets*/


    /*Begin::Card Redeem History*/
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
    /*End::Card Redeem History*/
}
