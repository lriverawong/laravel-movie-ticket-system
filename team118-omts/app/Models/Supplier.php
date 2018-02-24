<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'suppliers';

    public $timestamps = true;

    // Set up relations
    public function supplier_address() {
        return $this->hasOne('App\Modles\SupplierAddress');
    }

}
