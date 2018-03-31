<?php

namespace App\Http\Controllers;

use App\Models\Theatre;
use App\Models\TheatreComplex;

use Illuminate\Http\Request;

class TheatreController extends Controller
{
    /**
     * Show the page to create a new project.
     */
    public function create()
    {   
        // if we have any projects we render them
        return view('theatre.create', [
            'theatre' => Theatre::all(),
            // 'theatre_complexes' => TheatreComplex::all()->pluck('name', 'id')
            'theatre_complexes' => TheatreComplex::all()
        ]);
    }

    /**
     * Store a new project in the database.
     */
    public function store()
    {
        // if fails a 422 response code will be returned
        $this->validate(request(), [
            "theatre_num" => 'required', 
            "max_num_seats" => 'required',
            "screen_size" => 'required',
            "theatre_complex_id" => 'required'
        ]); 
        
        // otherwise we will create the object and save it to the database
        Theatre::forceCreate([
            'theatre_num' => request('theatre_num'),
            'max_num_seats' => request('max_num_seats'),
            'screen_size' => request('screen_size'),
            'theatre_complex_id' => request('theatre_complex_id'),
        ]); 

        return ['message' => 'Theatre Created!'];
    }
}
