<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class UsersManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index', [
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create', [
            'roles' => Role::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'first_name'            => 'required',
                'last_name'             => 'required',
                'email'                 => 'required|email|max:255|unique:users',
                'password'              => 'required|min:6|max:20|confirmed',
                'password_confirmation' => 'required|same:password',
                'phone_num' => 'required',
                'credit_card_num' => '',
                'credit_card_exp' => '',
                'apt_num' => '',
                'street_num' => 'required',
                'street_name' => 'required',
                'city' => 'required',
                'province' => 'required',
                'country' => 'required',
                'postal_code' => 'required',
                'role_id'             => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'role_id'             => $request->input('role_id'),
            'first_name'       => $request->input('first_name'),
            'last_name'        => $request->input('last_name'),
            'email'            => $request->input('email'),
            'password'         => bcrypt($request->input('password')),
            'phone_num'            => $request->input('phone_num'),
            'credit_card_num'            => '',
            'credit_card_exp'            => '',
            'apt_num'            => $request->input('apt_num'),
            'street_num'            => $request->input('street_num'),
            'street_name'            => $request->input('street_name'),
            'city'            => $request->input('city'),
            'province'            => $request->input('province'),
            'country'            => $request->input('country'),
            'postal_code'            => $request->input('postal_code'),
            // 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            // 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        $user->save();

        return redirect('/admin/users')->with('success', 'User created successfully');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.users.edit', [
            'user' => User::findOrFail($id),
            'roles' => Role::all()
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
        $user = User::find($id);
        $validator = Validator::make($request->all(),
            [
                'first_name'            => 'required',
                'last_name'             => 'required',
                'email'                 => 'required|email|max:255|unique:users,email,'.$user->id,
                'phone_num' => 'required',
                'apt_num' => '',
                'street_num' => 'required',
                'street_name' => 'required',
                'city' => 'required',
                'province' => 'required',
                'country' => 'required',
                'postal_code' => 'required',
                'role_id'             => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->phone_num = $request->input('phone_num');
        $user->apt_num = $request->input('apt_num');
        $user->street_num = $request->input('street_num');
        $user->street_name = $request->input('street_name');
        $user->city = $request->input('city');
        $user->province = $request->input('province');
        $user->country = $request->input('country');
        $user->postal_code = $request->input('postal_code');
        $user->role_id = $request->input('role_id');
        
        $user->save();

        return redirect('/admin/users')->with('success', 'User updated successfully');
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
        return redirect('/admin')->with('success','User has been  deleted');
    }

    /**
     * See user purchase history
     */
    public function purchase_history($user_id){
        $current_time = Carbon::now();
        $past_purchases = DB::table('reservations')
            ->where('user_id', '=', $user_id)
            ->join('show_times', 'reservations.showing_id', '=', 'show_times.id')
            ->join('run_dates', 'run_date_id', '=', 'run_dates.id')
            ->join('movies', 'movie_id', '=', 'movies.id')
            ->whereDate('showing_start_time', '<', $current_time)->get();
        $held_tickets = DB::table('reservations')
            ->where('user_id', '=', $user_id)
            ->join('show_times', 'reservations.showing_id', '=', 'show_times.id')
            ->join('run_dates', 'run_date_id', '=', 'run_dates.id')
            ->join('movies', 'movie_id', '=', 'movies.id')
            ->whereDate('showing_start_time', '>=', $current_time)->get();
        return view('admin.users.purchase_history', compact('current_time', 'past_purchases', 'held_tickets'));
    }
}
