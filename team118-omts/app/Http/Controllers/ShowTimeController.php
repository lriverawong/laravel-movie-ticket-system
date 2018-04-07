<?php

namespace App\Http\Controllers;

use App\Models\ShowTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ShowTimeController extends Controller
{

    public function index()
    {   
        $show_times = DB::table('show_times')
            ->join('run_dates', 'show_times.run_date_id', '=', 'run_dates.id')
            ->join('movies', 'run_dates.movie_id', '=', 'movies.id')
            ->join('theatre_complexes', 'run_dates.theatre_complex_id', '=', 'theatre_complexes.id')
            ->join('theatres', 'show_times.theatre_id', '=', 'theatres.id')
            ->select('movies.title as movie_title', 'theatre_complexes.name as theatre_complex_name', 'show_times.num_seats_avail', 'show_times.showing_start_time', 'show_times.id as show_time_id', 'theatres.theatre_num')
            ->get();
        return view('admin.show_time.index', compact('show_times'));
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
        $show_time = DB::table('show_times')->join('run_dates', 'show_times.run_date_id', '=', 'run_dates.id')->join('movies', 'run_dates.movie_id', '=', 'movies.id')->join('theatre_complexes', 'run_dates.theatre_complex_id', '=', 'theatre_complexes.id')->join('theatres', 'show_times.theatre_id', '=', 'theatres.id')->select('movies.title as movie_title', 'theatre_complexes.name as theatre_complex_name', 'show_times.num_seats_avail', 'show_times.showing_start_time', 'show_times.id as show_time_id', 'show_times.theatre_id', 'show_times.run_date_id')->where('show_times.id', '=', $id)->get()->first();
        $theatres = DB::table('show_times')->join('run_dates', 'show_times.run_date_id', '=', 'run_dates.id')->join('theatres', 'run_dates.theatre_complex_id', '=', 'theatres.theatre_complex_id')->where('show_times.id', '=', $id)->get();
        return view('admin.show_time.edit', compact('show_time', 'theatres'));
    }

    public function destroy($id) {
        $showing = ShowTime::findOrFail($id);
        $showing->delete();
        return redirect('/admin/show_times');
    }

    public function update(Request $request, $id) {
        $show_time = ShowTime::findOrFail($id);
        $show_time->theatre_id=$request->get('theatre_id');
        $show_time->showing_start_time=$request->get('showing_start_time');
        $show_time->num_seats_avail=$request->get('num_seats_avail');
        $show_time->run_date_id=$request->get('run_date_id');
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
            "theater_id" => 'required',
            "showing_start_time" => 'required',
            "num_seats_avail" => 'required',
            "run_date_id" => 'required',
        ]); 
        
        // otherwise we will create the object and save it to the database
        ShowTime::forceCreate([
            'theatre_id' => request('theatre_id'),
            'showing_start_time' => request('showing_start_time'),
            'num_seats_avail' => request('num_seats_avail'),
            'run_date_id' => request('run_date_id'),
        ]); 

        return redirect('/admin/show_times');
    }
}
