@extends('layouts.app')
 
@section('content')
    <div class="container">
        <div class="text-center">
            <h1>User Profile: {{ $user->first_name }} {{ $user->last_name }}</h1>
        </div>
        <div class="jumbotron text-center">
            <p>
                <strong>Email</strong> {{ $user->email }}<br>
                <strong>Phone Number</strong> {{ $user->phone_num }}<br>
                <strong>Apartment Number</strong> {{ $user->apt_num }}<br>
                <strong>Street Number</strong> {{ $user->street_num }}<br>
                <strong>Street Name</strong> {{ $user->street_name }}<br>
                <strong>City</strong> {{ $user->city }}<br>
                <strong>Province</strong> {{ $user->province }}<br>
                <strong>Country</strong> {{ $user->country }}<br>
                <strong>Postal Code</strong> {{ $user->postal_code }}<br>
            </p>
        </div>
    </div>
@endsection