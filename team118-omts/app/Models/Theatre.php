<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theatre extends Model
{
    protected $table = 'theatres';

    /**
     * Model Relationships
     */

     // theatre_complex has-many theatres
     public function theatre_complex() {
         return $this->belongsTo('App\Models\TheatreComplex');
     } 
}
