<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Director;
use App\Models\ProductionCompany;
use App\Models\Supplier;
use Illuminate\Http\Request;


class MovieController extends Controller
{

    public function index()
    {   
        // if we have any projects we render them
        return view('movie.index', [
            'movies' => Movie::all()
        ]);
    }
    /**
     * Show the page to create a new project.
     */
    public function create()
    {   
        // if we have any projects we render them
        return view('movie.create', [
            'movies' => Movie::all(),
            'directors' => Director::all(),
            'production_companies' => ProductionCompany::all(),
            'suppliers' => Supplier::all(),
        ]);
    }

    public function edit($id) {
        return view('movie.edit', [
            'movie' => Movie::findOrFail($id),
            'directors' => Director::all(),
            'production_companies' => ProductionCompany::all(),
            'suppliers' => Supplier::all(),
        ]);
    }

    public function destroy($id) {
        $movie = Movie::findOrFail($id);
        $movie->delete();
        return redirect('movies');
    }

    public function update(Request $request, $id) {
        $movie = Movie::findOrFail($id);
        $movie->title=$request->get('title');
        $movie->running_time=$request->get('running_time');
        $movie->rating=$request->get('rating');
        $movie->plot_synopsis=$request->get('plot_synopsis');
        $movie->director_id=$request->get('director_id');
        $movie->prod_comp_id=$request->get('prod_comp_id');
        $movie->supplier_id=$request->get('supplier_id');
        $movie->save();
        return redirect('movies');
    }

    /**
     * Store a new project in the database.
     */
    public function store()
    {
        // if fails a 422 response code will be returned
        $this->validate(request(), [
            "title" => 'required', 
            "running_time" => 'required',
            "rating" => 'required',
            "plot_synopsis" => 'required',
            "director_id" => 'required',
            "prod_comp_id" => 'required',
            "supplier_id" => 'required',
        ]); 
        
        // otherwise we will create the object and save it to the database
        Movie::forceCreate([
            'title' => request('title'),
            'running_time' => request('running_time'),
            'rating' => request('rating'),
            'plot_synopsis' => request('plot_synopsis'),
            'director_id' => request('director_id'),
            'prod_comp_id' => request('prod_comp_id'),
            'supplier_id' => request('supplier_id'),
        ]); 

        return redirect('movies');
        //return ['message' => 'Movie Created!'];
    }
}
