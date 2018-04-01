<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Director;
use App\Models\ProductionCompany;
use App\Models\Supplier;
use App\Models\Purchase;
use Illuminate\Http\Request;


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

    /**
     * Store a new project in the database.
     */
    public function store()
    {
        // if fails a 422 response code will be returned
        $this->validate(request(), [
            "id" => 'required',
            "user_id" => 'required', 
            "showing_id" => 'required',
            "number_of_tickets" => 'required',
        ]); 
        
        // otherwise we will create the object and save it to the database
        Purchase::forceCreate([
            'id' => request('id'),
            'user_id' => request('user_id'),
            'showing_id' => request('showing_id'),
            'number_of_tickets' => request('number_of_tickets'),
        ]); 

        return redirect('purchases');
        //return ['message' => 'Movie Created!'];
    }
}
