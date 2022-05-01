<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'company_logo',
        'company_email',
        'company_phone',
        'company_address',
        'comission_percentage',
        'currency_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function Logo()
    {
        $settings = Setting::first();
        if ($settings) {
            return $settings->company_name;
        } else return "Home";
    }
}
