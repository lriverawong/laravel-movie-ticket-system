<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Director;
use App\Models\ProductionCompany;
use App\Models\Supplier;
use App\Models\Purchase;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class PurchaseController extends Controller
{

    // Admin methods
    public function index()
    {   
        // if we have any projects we render them
        return view('purchase.index', [
            'purchases' => Purchase::all()->where('user_id', '=', auth()->user()->id)
        ]);
    }
    /**
     * Show the page to create a new project.
     */
    public function create()
    {   
        // if we have any projects we render them
        return view('purchase.create', [
            'movies' => Movie::all(),
        ]);
    }

    public function destroy($id) {
        $purchase = Purchase::findOrFail($id);
        $purchase->delete();
        return redirect('purchases');
    }

    public function rentals() {
        $current_time = Carbon::now();
        $reservations = DB::table('reservations')
        ->where('user_id', '=', auth()->user()->id)
        ->join('show_times', 'reservations.showing_id', '=', 'show_times.id')
        ->join('run_dates', 'run_date_id', '=', 'run_dates.id')
        ->join('movies', 'movie_id', '=', 'movies.id')
        ->whereDate('showing_start_time', '<', $current_time)->get();
        return view('purchase.rentals', compact('current_time', 'reservations'));
    }

    /**
     * Store a new project in the database.
     */
    public function store(Request $request)
    {   
        $cart_id = $request->cart_id;
        // if fails a 422 response code will be returned
        $this->validate(request(), [
            "user_id" => 'required', 
            "showing_id" => 'required',
            "number_of_tickets" => 'required',
        ]); 
        
        // otherwise we will create the object and save it to the database
        Purchase::forceCreate([
            'user_id' => request('user_id'),
            'showing_id' => request('showing_id'),
            'number_of_tickets' => request('number_of_tickets'),
        ]); 

        $cart_item = Cart::findorFail($cart_id);
        $cart_item->delete();

        return redirect('purchases');
    }

    public function movie_stats() {
        // $show_times = DB::table('carts as temp')->where('temp.user_id', '=', $id)->join("show_times", "temp.showing_id", "=", "show_times.id")->select('*', 'temp.id as cart_id')->join("run_dates", "temp.run_date_id", '=', 'run_dates.id')->get();
        // $movie_stats = DB::table('reservations as temp')
        //     ->join("show_times", "temp.showing_id", "=", "show_times.id")
        //     ->select('*', 'temp.id as reservation_id')
        //     ->join('run_dates', 'run_date_id', '=', 'run_dates.id')
        //     ->select('movie_id', 'number_of_tickets')
        //     ->select(DB::raw('movie_id'), DB::raw('sum(number_of_tickets) as sum_num_tickets'))
        //     ->groupBy(DB::raw('movie_id'))
        //     ->get();
        $movie_stats = DB::table('reservations as temp')
            ->join("show_times", "temp.showing_id", "=", "show_times.id")
            ->select('*', 'temp.id as reservation_id')
            ->join('run_dates', 'run_date_id', '=', 'run_dates.id')
            ->join('movies', 'movie_id', '=', 'movies.id')
            ->select('movie_id', 'title', 'number_of_tickets')
            ->select(DB::raw('movie_id'), DB::raw('title'), DB::raw('sum(number_of_tickets) as sum_num_tickets'))
            ->groupBy(DB::raw('movie_id'))
            ->orderBy('sum_num_tickets', 'desc')
            ->get();
        return view('admin.popular_movie', compact('movie_stats'));

    }

    public function complex_stats() {
        $complex_stats = DB::table('reservations as temp')
            ->join("show_times", "temp.showing_id", "=", "show_times.id")
            ->select('*', 'temp.id as reservation_id')
            ->join('run_dates', 'run_date_id', '=', 'run_dates.id')
            ->join('theatre_complexes', 'theatre_complex_id', '=', 'theatre_complexes.id')
            ->select('theatre_complex_id', 'name', 'number_of_tickets')
            ->select(DB::raw('theatre_complex_id'), DB::raw('name'), DB::raw('sum(number_of_tickets) as sum_num_tickets'))
            ->groupBy(DB::raw('theatre_complex_id'))
            ->orderBy('sum_num_tickets', 'desc')
            ->get();
        return view('admin.popular_complex', compact('complex_stats'));
    }
}
