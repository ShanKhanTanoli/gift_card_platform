<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'company_logo',
        'company_email',
        'company_phone',
        'company_address',
        'currency_id'
    ];


    public static function Logo()
    {
        $settings = Setting::first();
        if ($settings) {
            return $settings->company_name;
        } else return "Home";
    }
}
