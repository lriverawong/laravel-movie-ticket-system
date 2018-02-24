<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupplierAddress extends Model
{
    protected $table = 'supplier_address';
    
    public $timestamps = true;

    // Set up relations

    public function supplier() {
        return $this->belongsTo('App\Models\supplier');
    }


}
