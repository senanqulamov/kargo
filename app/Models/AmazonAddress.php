<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmazonAddress extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = ['id','name','address','zipcode','city','state','country'];
}
