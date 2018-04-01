<?php

namespace App\Http\Controllers;

use App\Models\ShowTime;
use Illuminate\Http\Request;


class ShowTimeController extends Controller
{

    public function index()
    {   
        return view('admin.show_time.index', [
            'show_times' => ShowTime::all()
        ]);
    }

     /**
     * Show the page to create a new project.
     */

    public function create()
    {   
        // if we have any projects we render them
        return view('admin.show_time.create', [
        ]);
    }

    public function edit($id) {
        return view('admin.show_time.edit', [
            'show_time' => ShowTime::findOrFail($id),
        ]);
    }

    public function destroy($id) {
        $run_date = ShowTime::findOrFail($id);
        $run_date->delete();
        return redirect('/admin/show_times');
    }

    public function update(Request $request, $id) {
        $show_time = ShowTime::findOrFail($id);
        $show_time->movie_id=$request->get('movie_id');
        $show_time->theatre_id=$request->get('theatre_id');
        $show_time->theatre_complex_id=$request->get('theatre_complex_id');
        $show_time->showing_start_time=$request->get('showing_start_time');
        $show_time->num_seats_avail=$request->get('num_seats_avail');
        $show_time->save();
        return redirect('/admin/show_times');
    }

    /**
     * Store a new project in the database.
     */
    public function store()
    {
        // if fails a 422 response code will be returned
        $this->validate(request(), [
            "movie_id" => 'required', 
            "theater_id" => 'theatre_id',
            "theatre_complex_id" => 'required',
            "showing_start_time" => 'required',
            "num_seats_avail" => 'required',
        ]); 
        
        // otherwise we will create the object and save it to the database
        ShowTime::forceCreate([
            'movie_id' => request('movie_id'),
            'theatre_id' => request('theatre_id'),
            'theatre_complex_id' => request('theatre_complex_id'),
            'showing_start_time' => request('showing_start_time'),
            'num_seats_avail' => request('num_seats_avail'),
        ]); 

        return redirect('/admin/show_times');
        //return ['message' => 'Supplier Created!'];
    }
}
