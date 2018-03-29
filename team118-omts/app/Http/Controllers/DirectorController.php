<?php

namespace App\Http\Controllers;

use App\Models\Director;

class DirectorController extends Controller
{
    /**
     * Show the page to create a new project.
     */
    public function create()
    {   
        // if we have any projects we render them
        return view('director.create', [
            'directors' => Director::all()
        ]);
    }

    /**
     * Store a new project in the database.
     */
    public function store()
    {
        // if fails a 422 response code will be returned
        $this->validate(request(), [
            'first_name' => 'required',
            'last_name' => 'required',
        ]); 
        
        // otherwise we will create the object and save it to the database
        Director::forceCreate([
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
        ]); 

        return ['message' => 'Director is Created!'];
    }
}
