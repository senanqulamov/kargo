<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    public $timestamps = true;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'country',
        'city',
        'address',
        'address_2',
        'indetification_number',
        'tax_number',
        'tax_adminstration',
        'company_name',
        'Iban',
        'user_role',
        'is_admin',
        'is_banned',
        'postcode',
        'password',
        'email_verified_at',
        'gender',
        'user_market',
        'from_where',
        'promotion_code',
        'average_requests',
        'integration',
        'balance_name',
        'balance',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // public function setPasswordAttribute($password)
    // {
    //     $this->attributes['password'] = bcrypt($password);
    // }

}
