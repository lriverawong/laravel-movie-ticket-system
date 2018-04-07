<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;


class SupplierController extends Controller
{

    public function index()
    {   
        return view('admin.supplier.index', [
            'suppliers' => Supplier::all()
        ]);
    }

     /**
     * Show the page to create a new project.
     */

    public function create()
    {   
        // if we have any projects we render them
        return view('admin.supplier.create', []);
    }

    public function edit($id) {
        return view('admin.supplier.edit', [
            'supplier' => Supplier::findOrFail($id),
        ]);
    }

    public function destroy($id) {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        return redirect('/admin/suppliers');
    }

    public function update(Request $request, $id) {
        $supplier = Supplier::findOrFail($id);
        $supplier->name=$request->get('name');
        $supplier->phone_num=$request->get('phone_num');
        $supplier->contact_first_name=$request->get('contact_first_name');
        $supplier->contact_last_name=$request->get('contact_last_name');
        $supplier->apt_num=$request->get('apt_num');
        $supplier->street_num=$request->get('street_num');
        $supplier->street_name=$request->get('street_name');
        $supplier->city=$request->get('city');
        $supplier->province=$request->get('province');
        $supplier->country=$request->get('country');
        $supplier->postal_code=$request->get('postal_code');
        $supplier->save();
        return redirect('/admin/suppliers');
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

        return redirect('/admin/suppliers');
        //return ['message' => 'Supplier Created!'];
    }
}
