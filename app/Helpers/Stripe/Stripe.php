<?php

namespace App\Helpers\Stripe;

use App\Helpers\Stripe\Traits\StripeAuthentication;
use App\Helpers\Stripe\Traits\StripeCard;

class Stripe
{
    use StripeAuthentication, StripeCard;
}
