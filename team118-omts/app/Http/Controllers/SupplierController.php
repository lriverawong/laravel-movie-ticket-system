<?php

namespace App\Http\Controllers;

use App\Models\Supplier;


class SupplierController extends Controller
{
    /**
     * Show the page to create a new project.
     */
    public function create()
    {   
        // if we have any projects we render them
        return view('supplier.create', [
            'suppliers' => Supplier::all(),
        ]);
    }

    /**
     * Store a new project in the database.
     */
    public function store()
    {
        // if fails a 422 response code will be returned
        $this->validate(request(), [
            "name" => 'required', 
            "phone_num" => 'required',
            "contact_first_name" => 'required',
            "contact_last_name" => 'required',
            "apt_num" => 'required',
            "street_num" => 'required',
            "street_name" => 'required',
            "city" => 'required',
            "province" => 'required',
            "country" => 'required',
            "postal_code" => 'required',
        ]); 
        
        // otherwise we will create the object and save it to the database
        Supplier::forceCreate([
            'name' => request('name'),
            'phone_num' => request('phone_num'),
            'contact_first_name' => request('contact_first_name'),
            'contact_last_name' => request('contact_last_name'),
            'apt_num' => request('apt_num'),
            'street_num' => request('street_num'),
            'street_name' => request('street_name'),
            'city' => request('city'),
            'province' => request('province'),
            'country' => request('country'),
            'postal_code' => request('postal_code'),
        ]); 

        return ['message' => 'Supplier Created!'];
    }
}
