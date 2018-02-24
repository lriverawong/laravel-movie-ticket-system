<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $table = 'movies';
    
    public $timestamps = true;

    /**
     * Model Relationships 
     */

    // movie has-many actors
    public function actors() {
        return $this->hasMany('App\Models\Actor');
    }

    // movie has-many playtimes
    

}
