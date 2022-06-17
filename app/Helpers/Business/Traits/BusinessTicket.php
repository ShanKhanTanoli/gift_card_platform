<?php

namespace App\Helpers\Business\Traits;

use FrittenKeeZ\Vouchers\Models\Card;

trait BusinessTicket
{

    /*Begin::Tickets*/
    public static function Tickets($business)
    {
        return Card::withTrashed()
            ->where('user_id', $business)
            ->where('type', 'ticket');
    }

    public static function TicketsLatestPaginate($business, $quantity)
    {
        return self::Tickets($business)
            ->latest()
            ->paginate($quantity);
    }

    public static function CountTickets($business)
    {
        return self::Tickets($business)->count();
    }

    public static function FindTicketBySlug($business, $slug)
    {
        return self::Tickets($business)
            ->where('slug', $slug)
            ->first();
    }
    public static function FindTicketById($business, $id)
    {
        return self::Tickets($business)
            ->find($id);
    }
    /*End::Tickets*/
}
