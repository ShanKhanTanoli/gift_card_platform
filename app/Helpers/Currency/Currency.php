<?php

namespace App\Helpers\Currency;

use App\Models\Currency as CurrencyModel;

class Currency
{

    public static function all()
    {
        return CurrencyModel::all();
    }

    public static function count()
    {
        return CurrencyModel::count();
    }

    public static function Find($currency)
    {
        $currency = CurrencyModel::find($currency);
        if ($currency) {
            return $currency;
        } else return false;
    }

    public static function FindBySlug($slug)
    {
        $currency = CurrencyModel::where('slug', $slug)->first();
        if ($currency) {
            return $currency;
        } else return false;
    }
}
