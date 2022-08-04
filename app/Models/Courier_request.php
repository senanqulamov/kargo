<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courier_request extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'courier_id',
        'status',
        'orders',
        'customer_name',
        'phone',
        'city',
        'state',
        'country',
        'address',
        'zipcode',
        'note',
        'date',
    ];
}
