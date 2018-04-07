<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.home');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('user.profile', ['user' => User::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('user.edit', [
            'user' => User::findOrFail($id)
        ]);
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
        $user= User::findOrFail($id);
        $user->first_name=$request->get('first_name');
        $user->last_name=$request->get('last_name');
        $user->email=$request->get('email');
        $user->phone_num=$request->get('phone_num');
        $user->credit_card_num=$request->get('credit_card_num');
        $user->credit_card_exp=$request->get('credit_card_exp');
        if (empty($data['apt_num'])) {
            $user->apt_num='';
        } else {
            $user->apt_num=$request->get('apt_num');
        }
        $user->street_num=$request->get('street_num');
        $user->street_name=$request->get('street_name');
        $user->city=$request->get('city');
        $user->province=$request->get('province');
        $user->country=$request->get('country');
        $user->postal_code=$request->get('postal_code');
        $user->save();
        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/')->with('success','User has been  deleted');
    }
}
