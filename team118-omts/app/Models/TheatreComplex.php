<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TheatreComplex extends Model
{
    protected $table = 'theatre_complexes';

    public $timestamps = false;

    /**
     * Model relationships
     */

     // theatre_complex has-many theatres
     public function theatres(){
         return $this->hasMany('App\Models\Theatre');
     }
}
