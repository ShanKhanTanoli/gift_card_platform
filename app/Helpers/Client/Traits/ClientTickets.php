<?php

namespace App\Helpers\Client\Traits;

use FrittenKeeZ\Vouchers\Models\ClientVoucher;
use FrittenKeeZ\Vouchers\Models\Voucher;

trait ClientTickets
{
    public static function Tickets($client)
    {
        $vouchers = ClientVoucher::where('user_id', $client)
            ->pluck('voucher_id')
            ->toArray();
        return Voucher::whereIn('id', $vouchers)
            ->where('type', 'ticket');
    }

    public static function LatestTicketsPaginate($client, $quantity)
    {
        return self::Tickets($client)->latest()->paginate($quantity);
    }

    public static function TicketsCount($client)
    {
        return self::Tickets($client)->count();
    }

    public static function FindTicketByCode($client, $code)
    {
        return self::Tickets($client)
            ->where('code', $code)
            ->first();
    }

    public static function FindTicketBySlug($client, $slug)
    {
        return self::Tickets($client)
            ->where('slug', $slug)
            ->first();
    }
}
