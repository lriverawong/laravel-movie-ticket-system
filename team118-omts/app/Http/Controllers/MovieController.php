<?php

namespace App\Http\Controllers;

use App\Models\Movie;


class MovieController extends Controller
{
    /**
     * Show the page to create a new project.
     */
    public function create()
    {   
        // if we have any projects we render them
        return view('movie.create', [
            'movies' => Movie::all(),
        ]);
    }

    /**
     * Store a new project in the database.
     */
    public function store()
    {
        // if fails a 422 response code will be returned
        $this->validate(request(), [
            "title" => 'required', 
            "running_time" => 'required',
            "rating" => 'required',
            "plot_synopsis" => 'required',
        ]); 
        
        // otherwise we will create the object and save it to the database
        Movie::forceCreate([
            'title' => request('title'),
            'running_time' => request('running_time'),
            'rating' => request('rating'),
            'plot_synopsis' => request('plot_synopsis'),
        ]); 

        return ['message' => 'Movie Created!'];
    }
}
