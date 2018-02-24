<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $table = "actors";

    public $timestamps = true;

    // Set up relations
    public function movies() {
        return $this->belongsTo('App\Models\Movie');
    }
}
