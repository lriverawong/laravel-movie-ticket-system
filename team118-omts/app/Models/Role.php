<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    public $timestamps = false;

    /**
     * Model relationships
     */

     // theatre_complex has-many theatres
     public function users(){
         return $this->belongsTo('App\Models\User');
     }
}
