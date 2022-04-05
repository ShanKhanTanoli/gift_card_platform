<?php

namespace App\Helpers\Business;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Business
{
    public static function Is()
    {
        if ($user = Auth::user()) {
            if ($user->role_id == 2 && $user->role == "business") {
                return $user;
            }
            return false;
        }
        return false;
    }

    public static function Find($business)
    {
        if ($user = User::find($business)) {
            if ($user->role_id == 2 && $user->role == "business") {
                return $user;
            }
            return false;
        }
        return false;
    }

    public static function all()
    {
        return User::where('role_id', '2')
            ->where('role', 'business');
    }

    public static function count()
    {
        return self::all()->count();
    }

    public static function clients($business)
    {
        return User::where('role_id', '3')
            ->where('role', 'client')
            ->where('parent_business_id',$business);
    }

    public static function CountClients($business)
    {
        return User::where('role_id', '3')
            ->where('role', 'client')
            ->where('parent_business_id',$business)
            ->count();
    }

    public static function FindClient($business,$client)
    {
        if($user = self::Find($business)){
            if($client = self::clients($user->id)
            ->where('id',$client)->first()){
                return $client;
            }else return false;
        }else return false;
    }
    
}
