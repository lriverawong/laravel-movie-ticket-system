<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TheatreComplexAddress extends Model
{
    protected $table = 'theatre_complex_addresses';

    /**
     * Model relationships
     */

     // theatre_complex has-one theatre_complex_address
     public function theatre_complex() {
        return $this->belongsTo('App\Models\TheatreComplex');
    }
}
