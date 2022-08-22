<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support_message extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'by',
        'user_id',
        'support_id',
        'moderator_id',
        'message',
        'from',
    ];
}
