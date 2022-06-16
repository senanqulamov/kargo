<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'id',
        'cargo_id',
        'package_count',
        'package_type',
        'package_length',
        'package_width',
        'package_height',
        'package_weight',
        'barcode',
    ];
}
