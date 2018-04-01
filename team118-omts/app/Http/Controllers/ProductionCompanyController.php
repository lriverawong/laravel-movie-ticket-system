<?php

namespace App\Http\Controllers;

use App\Models\ProductionCompany;
use Illuminate\Http\Request;

class ProductionCompanyController extends Controller
{

    public function index()
    {   
        // if we have any projects we render them
        return view('admin.production_company.index', [
            'production_companies' => ProductionCompany::all()
        ]);
    }

    /**
     * Show the page to create a new project.
     */     
    public function create()
    {   
        // if we have any projects we render them
        return view('admin.production_company.create', [
            //'production_companies' => ProductionCompany::all()
        ]);
    }

    public function edit($id) {
        return view('admin.production_company.edit', [
            'production_company' => ProductionCompany::findOrFail($id),
        ]);
    }

    public function destroy($id) {
        $production_company = ProductionCompany::findOrFail($id);
        $production_company->delete();
        return redirect('/admin/production_companies');
    }

    public function update(Request $request, $id) {
        $production_company = ProductionCompany::findOrFail($id);
        $production_company->name=$request->get('name');
        $production_company->save();
        return redirect('/admin/production_companies');
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

        return redirect('/admin/production_companies');
        //return ['message' => 'Production Company is Created!'];
    }
}
