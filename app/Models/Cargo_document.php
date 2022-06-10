<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo_document extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'doc_id',
        'cargo_id',
        'document',
        'type',
    ];
}
