<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_time extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'cargo_id',
        'user_id',
        'action',
        'time',
    ];

    protected $casts = [
        'cargo_id' => 'string'
    ];
}
