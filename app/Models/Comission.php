<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comission extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'payment',
        'show_name',
        'image',
        'css_class',
        'comission'
    ];
}
