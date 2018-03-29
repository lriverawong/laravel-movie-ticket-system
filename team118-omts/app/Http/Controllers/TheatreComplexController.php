<?php

namespace App\Http\Controllers;

use App\Models\TheatreComplex;

class TheatreComplexController extends Controller
{
    /**
     * Show the page to create a new project.
     */
    public function create()
    {   
        // if we have any projects we render them
        return view('theatre_complex.create', [
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
            'name' => 'required',
            "phone_num" => 'required',
            "street_num" => 'required',
            "street_name" => 'required',
            "city" => 'required',
            "province" => 'required',
            "country" => 'required',
            "postal_code" => 'required'
        ]); 
        
        // otherwise we will create the object and save it to the database
        TheatreComplex::forceCreate([
            'name' => request('name'),
            'phone_num' => request('phone_num'),
            'street_num' => request('street_num'),
            'street_name' => request('street_name'),
            'city' => request('city'),
            'province' => request('province'),
            'country' => request('country'),
            'postal_code' => request('postal_code'),
        ]); 

        return ['message' => 'Theatre Complex Created!'];
    }
}
