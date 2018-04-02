<?php

namespace App\Http\Controllers;

use App\Models\TheatreComplex;
use App\Models\ShowTime;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TheatreComplexController extends Controller
{
    public function public_index() {
        return view('theatre_complex.public_index', [
            'theatre_complexes' => TheatreComplex::all()
        ]);
    }

    public function public_show($id) {
        $current_time = Carbon::now();
        $show_times = DB::table('show_times')
            ->join('run_dates', 'show_times.run_date_id', '=', 'run_dates.id')
            ->where('theatre_complex_id', '=', $id)
            ->whereDate('showing_start_time', '>', $current_time)
            ->orderBy('movie_id')->get();
        return view('theatre_complex.public_show', compact('current_time', 'show_times'));
    }
    
    
    public function index()
    {   
        return view('admin.theatre_complex.index', [
            'theatre_complexes' => TheatreComplex::all()
        ]);
    }

    /**
     * Show the page to create a new project.
     */
    public function create()
    {   
        // if we have any projects we render them
        return view('admin.theatre_complex.create', [
            //'theatre_complexes' => TheatreComplex::all()
        ]);
    }

    public function edit($id) {
        return view('admin.theatre_complex.edit', [
            'theatre_complex' => TheatreComplex::findOrFail($id),
        ]);
    }

    public function destroy($id) {
        $theatre_complex = TheatreComplex::findOrFail($id);
        $theatre_complex->delete();
        return redirect('/admin/theatre_complexes');
    }

    public function update(Request $request, $id) {
        $theatre_complex = TheatreComplex::findOrFail($id);
        $theatre_complex->name=$request->get('name');
        $theatre_complex->phone_num=$request->get('phone_num');
        $theatre_complex->street_num=$request->get('street_num');
        $theatre_complex->street_name=$request->get('street_name');
        $theatre_complex->city=$request->get('city');
        $theatre_complex->province=$request->get('province');
        $theatre_complex->country=$request->get('country');
        $theatre_complex->postal_code=$request->get('postal_code');
        $theatre_complex->save();
        return redirect('/admin/theatre_complexes');
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

        return redirect('/admin/theatre_complexes');
        //return ['message' => 'Theatre Complex Created!'];
    }
}
