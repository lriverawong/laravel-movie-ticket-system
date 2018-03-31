<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    // use HasApiTokens, Notifiable;

    const ADMIN_TYPE = 0;
    const DEFAULT_TYPE = 1;
    public function isAdmin()    {        
        return $this->role_id === self::ADMIN_TYPE;    
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role', 'first_name', 'last_name', 'email', 'password','phone_num', 'street_num', 'apt_num', 'street_num', 'street_name', 'city', 'province', 'country', 'postal_code', 'credit_card_num', 'credit_card_expiry'
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
