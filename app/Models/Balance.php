<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'id',
        'userID',
        'balance'
    ];
}
