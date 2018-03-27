<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Request;
use App\Models\TheatreComplex;

class TheatreComplexesController extends Controller {
    // index
    public function getComplexes() {
        $theatre_complexes = TheatreComplex::all();

        return response()->json( $theatre_complexes );
    }
    // show
    public function getComplex($id) {
        $theare_complex = TheatreComplex::where('id', '=', $id)->first();

        return response()->json( $theatre_complex );
    }

    /** Create
     * this method using an implicit binding to the Request object. 
     * This will allow us to grab the form data sent from the user to add a new cafe.
     */
    public function postComplex() {
        $theatre_complex = new TheatreComplex();

        $theatre_complex->name          = Request::get('name');
        $theatre_complex->phone_num     = Request::get('phone_num');
        $theatre_complex->street_num    = Request::get('street_num');
        $theatre_complex->street_name   = Request::get('street_name');
        $theatre_complex->city          = Request::get('city');
        $theatre_complex->province      = Request::get('province');
        $theatre_complex->country       = Request::get('country');
        $theatre_complex->postal_code   = Request::get('postal_code');
        $theatre_complex->num_theatres  = Request::get('num_theatres');

        $theare_complex->save();

        return response()->json($cafe, 201);

    }
}