<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Director;
use App\Models\ProductionCompany;
use App\Models\Supplier;
use App\Models\RunDate;
use App\Models\Review;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class MovieController extends Controller
{
    // public methods
    public function playing() {
        $current_time = Carbon::now();
        $movies = DB::table('movies')
            ->join('run_dates', 'movies.id', '=', 'run_dates.movie_id')
            ->whereDate('run_start_date', '<', $current_time)
            ->whereDate('run_end_date', '>=', $current_time)->distinct()->get();
        return view('movies.playing', compact('current_time', 'movies'));
    }

    public function reviews() {
        return view('movies.reviews', [
            'movies' => Movie::all()
        ]);
    }
    //Post request
    public function write_review(Request $request) {
        $movie_id = $request->movie_id;
        Review::forceCreate([
            'user_id' => request('user_id'),
            'movie_id' => request('movie_id'),
            'review' => request('review'),
        ]); 

        return redirect("movies/$movie_id");
    }

    public function public_show($id)
    {
        $reviews = DB::table('reviews')->join('users', 'reviews.user_id', '=', 'users.id')->get();
        
        $movie = DB::table('movies as temp')
            ->where('temp.id', '=', $id)
            ->join('directors', 'temp.director_id', '=', 'directors.id')
            ->select('*', 'temp.id as movie_id')
            ->join('production_companies', 'temp.prod_comp_id', '=', 'production_companies.id' )
            ->select('name as prod_comp_name', 'title', 'running_time', 'rating', 'plot_synopsis', 'director_id', 'prod_comp_id', 'supplier_id', 'first_name as director_first_name', 'last_name as director_last_name')
            ->get()->first();
        $movie_supplier = DB::table('movies as temp')
            ->where('temp.id', '=', $id)
            ->select('*', 'temp.id as movie_id')
            ->join('suppliers', 'temp.supplier_id', '=', 'suppliers.id' )
            ->select('name as supplier_name', 'title', 'running_time', 'rating', 'plot_synopsis', 'supplier_id')
            ->get()->first();

        return view('movies.show', compact('reviews', 'movie', 'movie_supplier'));
    }

    // Admin methods
    public function index()
    {   
        // if we have any projects we render them
        return view('admin.movie.index', [
            'movies' => Movie::all()
        ]);
    }
    /**
     * Show the page to create a new project.
     */
    public function create()
    {   
        // if we have any projects we render them
        return view('admin.movie.create', [
            'movies' => Movie::all(),
            'directors' => Director::all(),
            'production_companies' => ProductionCompany::all(),
            'suppliers' => Supplier::all(),
        ]);
    }

    public function edit($id) {
        return view('admin.movie.edit', [
            'movie' => Movie::findOrFail($id),
            'directors' => Director::all(),
            'production_companies' => ProductionCompany::all(),
            'suppliers' => Supplier::all(),
        ]);
    }

    public function destroy($id) {
        $movie = Movie::findOrFail($id);
        $movie->delete();
        return redirect('admin/movies');
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
        return redirect('admin/movies');
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

        return redirect('admin/movies');
    }
}
