<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialOffer extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'status',
        'shipment_type',
        'cargo',
        'address',
        'date',
        'origin',
        'destination',
        'shipping_type',
        'containeer_type',
        'cargo_weight_containeer',
        'length',
        'width',
        'height',
        'weight',
        'quantity',
        'total_volume',
        'total_weight',
        'incoterm',
        'insurance',
        'additional',
        'document',
        'offer_price',
        'comment',
        'details'
    ];
}
