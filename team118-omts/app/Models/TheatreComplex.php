<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TheatreComplex extends Model
{
    /**
     * Model relationships
     */

     // theatre_complex has-one theatre_complex_address
     public function theatre_complex_address() {
         return $this->hasOne('App\Models\TheatreComplexAddress');
     }
}
