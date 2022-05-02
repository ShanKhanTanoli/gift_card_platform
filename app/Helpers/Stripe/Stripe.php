<?php

namespace App\Helpers\Stripe;

use App\Helpers\Stripe\Traits\StripeAuthentication;
use App\Helpers\Stripe\Traits\StripeCard;
use App\Helpers\Stripe\Traits\StripeConnect;

class Stripe
{
    use StripeAuthentication, StripeCard, StripeConnect;
}
