<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prev_complex = $request->theatre_complex_id;
        $cart_item = Cart::forcecreate([
            'user_id'             => $request->input('user_id'),
            'showing_id'       => $request->input('showing_id'),
            'run_date_id'       => $request->input('run_date_id'),
            'number_of_tickets'        => $request->input('number_of_tickets')
        ]);

        $cart_item->save();

        return redirect("/theatre_complexes/$prev_complex")->with('success', 'Successfully added to cart!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show_times = DB::table('carts as temp')
            ->where('temp.user_id', '=', $id)
            ->join("show_times", "temp.showing_id", "=", "show_times.id")
            ->select('*', 'temp.id as cart_id')
            ->join("run_dates", "temp.run_date_id", '=', 'run_dates.id')
            ->get();
        // $show_times = DB::table('carts as temp')->where('temp.user_id', '=', $id)->join("show_times", "temp.showing_id", "=", "show_times.id")->select('*', 'temp.id as cart_id')->join("run_dates", "temp.run_date_id", '=', 'run_dates.id')->get();
        return view('cart.show', compact('show_times'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
