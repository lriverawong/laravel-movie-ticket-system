<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'role', 'street_num', 'apt_num', 'street_num', 'street_name', 'city', 'province', 'country', 'postal_code', 'phone_num'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'credit_card_num', 'credit_card_expiry'
    ];

    /**
     * Model relationships
     */

}
