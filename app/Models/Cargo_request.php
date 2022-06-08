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
        'customer',
        'fullname',
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
        'additional',
        'battery',
        'document',
    ];
}
