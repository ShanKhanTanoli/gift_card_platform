<?php

namespace App\Helpers\Business\Traits;

use App\Models\BusinessStore as ModelsBusinessStore;

trait BusinessStore
{
    /*Begin::Store*/
    public static function Store($business)
    {
        return ModelsBusinessStore::where('user_id', $business)
            ->first();
    }
    public static function DisplayStoreName($business)
    {
        if ($store = self::Store($business)) {
            if ($store->display_store_name) {
                return $store->store_name;
            }
        }
    }
    /*End::Store*/
}
