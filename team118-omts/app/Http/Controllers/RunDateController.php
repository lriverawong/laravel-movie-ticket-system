<?php

namespace App\Http\Controllers;

use App\Models\RunDate;
use Illuminate\Http\Request;


class RunDateController extends Controller
{

    public function index()
    {   
        return view('run_date.index', [
            'run_dates' => RunDate::all()
        ]);
    }

     /**
     * Show the page to create a new project.
     */

    public function create()
    {   
        // if we have any projects we render them
        return view('run_date.create', [
        ]);
    }

    public function edit($id) {
        return view('run_date.edit', [
            'run_date' => RunDate::findOrFail($id),
        ]);
    }

    public function destroy($id) {
        $run_date = RunDate::findOrFail($id);
        $run_date->delete();
        return redirect('run_dates');
    }

    public function update(Request $request, $id) {
        $run_date = RunDate::findOrFail($id);
        $run_date->movie_id=$request->get('movie_id');
        $run_date->theatre_complex_id=$request->get('theatre_complex_id');
        $run_date->run_start_date=$request->get('run_start_date');
        $run_date->run_end_date=$request->get('run_end_date');
        $run_date->save();
        return redirect('run_dates');
    }

    /**
     * Store a new project in the database.
     */
    public function store()
    {
        // if fails a 422 response code will be returned
        $this->validate(request(), [
            "movie_id" => 'required', 
            "theatre_complex_id" => 'required',
            "run_start_date" => 'required',
            "run_end_date" => 'required',
        ]); 
        
        // otherwise we will create the object and save it to the database
        RunDate::forceCreate([
            'movie_id' => request('movie_id'),
            'theatre_complex_id' => request('theatre_complex_id'),
            'run_start_date' => request('run_start_date'),
            'run_end_date' => request('run_end_date'),
        ]); 

        return redirect('run_dates');
        //return ['message' => 'Supplier Created!'];
    }
}
