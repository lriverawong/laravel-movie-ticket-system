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
        'name', 'email', 'password', 'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Model relationships
     */

    // has-many user_addresses
    public function user_address() {
        return $this->hasOne('App\Models\UserAddress');
    }

    // The roles that belong to the user
    public function roles() {
        return $this->belongsToMany('App\Models\Role');
    }

}
