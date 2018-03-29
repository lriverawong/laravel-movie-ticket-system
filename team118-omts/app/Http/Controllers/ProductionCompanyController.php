<?php

namespace App\Http\Controllers;

use App\Models\ProductionCompany;

class ProductionCompanyController extends Controller
{
    /**
     * Show the page to create a new project.
     */
    public function create()
    {   
        // if we have any projects we render them
        return view('production_company.create', [
            'production_companies' => ProductionCompany::all()
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
        ]); 
        
        // otherwise we will create the object and save it to the database
        ProductionCompany::forceCreate([
            'name' => request('name'),
        ]); 

        return ['message' => 'Production Company is Created!'];
    }
}
