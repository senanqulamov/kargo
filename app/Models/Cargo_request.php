<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo_request extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'id',
        'user_id',
        // 'customer',
        'name',
        'country',
        'state',
        'city',
        'address',
        'zipcode',
        'phone',
        'email',
        'ioss_number',
        'vat_number',
        'currency',
        'order_info',
        'packages',
        'cargo_company',
        'additional_services',
        'total_cargo_price',
        'battery',
        'liquid',
        'food',
        'dangerous',
        'document',
    ];
}
