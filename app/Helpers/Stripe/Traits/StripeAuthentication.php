<?php

namespace App\Helpers\Stripe\Traits;

use App\Models\StripeConfiguration;

trait StripeAuthentication
{
    public static function PublicKey()
    {
        if (!is_null($stripe = StripeConfiguration::first())) {
            return $stripe->public_key;
        } else return false;
    }

    public static function SecretKey()
    {
        if (!is_null($stripe = StripeConfiguration::first())) {
            return $stripe->secret_key;
        } else return false;
    }

    public static function Mode()
    {
        if (!is_null($stripe = StripeConfiguration::first())) {
            return $stripe->payment_mode;
        } else return false;
    }

    public static function Client()
    {
        if ($sk = self::SecretKey()) {
            return new  \Stripe\StripeClient($sk);
        } else return false;
    }
}
