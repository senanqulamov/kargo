<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'cargo_id' ,
        'package_id',
        'sku_code',
        'count',
        'product',
        'weight',
        'price',
        'gtip_code'
    ];
}
