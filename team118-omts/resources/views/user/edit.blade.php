@extends('layouts.app')
 
@section('content')
    <div class="container">
        <h1>Edit User</h1>
        <hr>
        <form action="{{url('users', [$user->id])}}" method="POST">
        <input type="hidden" name="_method" value="PATCH">
        @csrf
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="first_name">First Name:</label>
                    <input type="text" class="form-control" name="first_name" value="{{$user->first_name}}">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="last_name">Last Name:</label>
                    <input type="text" class="form-control" name="last_name" value="{{$user->last_name}}">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="email">Email: </label>
                    <input type="text" class="form-control" name="email" value="{{$user->email}}">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="phone_num">Phone Number:</label>
                    <input type="text" class="form-control" name="phone_num" value="{{$user->phone_num}}">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="credit_card_num">Credit Card Number:</label>
                    <input type="text" class="form-control" name="credit_card_num" value="{{$user->credit_card_num}}">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="credit_card_exp">Credit Card Expiry:</label>
                    <input type="text" class="form-control" name="credit_card_exp" value="{{$user->credit_card_exp}}">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="apt_num">Apartment Number:</label>
                    <input type="text" class="form-control" name="apt_num" value="{{$user->apt_num}}">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="street_num">Street Number:</label>
                    <input type="text" class="form-control" name="street_num" value="{{$user->street_num}}">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="street_name">Street Name:</label>
                    <input type="text" class="form-control" name="street_name" value="{{$user->street_name}}">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-4">
                    <label for="city">City:</label>
                    <input type="text" class="form-control" name="city" value="{{$user->city}}">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-4">
                    <label for="province">Province:</label>
                    <input type="text" class="form-control" name="province" value="{{$user->province}}">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-4">
                    <label for="country">Country:</label>
                    <input type="text" class="form-control" name="country" value="{{$user->country}}">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-4">
                    <label for="postal_code">Postal Code:</label>
                    <input type="text" class="form-control" name="postal_code" value="{{$user->postal_code}}">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-4" style="margin-top:60px">
                    <button type="submit" class="btn btn-success" style="margin-left:38px">Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection