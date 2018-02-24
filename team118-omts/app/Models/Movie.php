<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $table = 'movies';
    
    public $timestamps = true;

    // Setting up relations
    public function actors() {
        return $this->hasMany('App\Models\Actor');
    }

}
