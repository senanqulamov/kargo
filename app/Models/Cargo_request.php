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
        'cancel_comment',
        'order_type',
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
        'company_value',
        'additional_services',
        'total_cargo_price',
        'total_count',
        'total_weight',
        'total_worth',
        'total_volume',
        'total_deci',
        'battery',
        'liquid',
        'food',
        'dangerous',
        'document',
    ];
}
