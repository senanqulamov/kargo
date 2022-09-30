<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'userID',
        'method',
        'money_type',
        'amount',
        'comission',
        'result_price',
        'kur',
        'document',
        'payment_comment',
    ];
}
