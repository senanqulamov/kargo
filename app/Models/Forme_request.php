<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forme_request extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'id',
        'user_id',
        'order_type',
        'status',
        'name',
        'country',
        'state',
        'city',
        'address',
        'zipcode',
        'phone',
        'email',
        'product_name',
        'product_count',
        'product_link',
        'product_note',
        'product_price',
        'cargo_price',
        'comission',
        'comment',
        'time',
    ];

    protected $casts = [
        'id' => 'string'
    ];

}
