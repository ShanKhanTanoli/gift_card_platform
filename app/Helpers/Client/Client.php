<?php

namespace App\Helpers\Client;

use App\Helpers\Client\Traits\ClientCardRecharge;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Client\Traits\ClientCards;
use App\Helpers\Client\Traits\ClientPayments;

class Client
{
    use ClientCards, ClientPayments, ClientCardRecharge;

    public static function Is()
    {
        if ($user = Auth::user()) {
            if ($user->role_id == 3 && $user->role == "client") {
                return $user;
            }
            return false;
        }
        return false;
    }

    public static function all()
    {
        return User::where('role_id', '3')
            ->where('role', 'client');
    }

    public static function LatestPaginate($quantity)
    {
        return self::all()->latest()
            ->paginate($quantity);
    }

    public static function count()
    {
        return self::all()->count();
    }
}
