<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    // table name
    protected $table = 'user_addresses';

    // timestamps for records
    public $timestamps = true;

    // setting up relationships
    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
