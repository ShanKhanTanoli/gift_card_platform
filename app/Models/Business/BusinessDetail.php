<?php

namespace App\Models\Business;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'business_name',
        'business_logo',
        'business_email',
        'business_phone',
        'business_address',
        'currency_id'
    ];
}
