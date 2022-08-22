<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalCargo extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'id',
        'user_id',
        'company_id',
        'order_id',
        'name',
        'value',
    ];

    protected $casts = [
        'order_id' => 'string'
    ];
}
