<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo_request extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id',
        // 'customer',
        'name',
        'country',
        'state',
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
        'extra_bubble',
        'insure_order',
        'other_additional',
        'battery',
        'liquid',
        'food',
        'dangerous',
        'document',
    ];
}
