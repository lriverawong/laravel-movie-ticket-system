@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Inside index page of theatre_complexes</h1>
        @if (count($theatre_complexes))
            <h1 class="title is-3">Theatre Complex</h1>
        @endif
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Theatre Complex Name</th>
                    <th scope="col">Theatre Complex Phone Number</th>
                    <th scope="col">Theatre Complex City</th>
                    <th scope="col">Theatre Complex Province</th>
                    <th scope="col">Theatre Complex Country</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($theatre_complexes as $theatre_complex)
                <tr>
                    <th scope="row">{{$theatre_complex->name}}</th>
                    <td>{{$theatre_complex->phone_num}}</td>
                    <td>{{$theatre_complex->city}}</td>
                    <td>{{$theatre_complex->province}}</td>
                    <td>{{$theatre_complex->country}}</td>
                    <td>
                        <div class="btn btn-group" role="group" aria-label="Basic example">
                            <a href="{{ URL::to('theatre_complexes/' . $theatre_complex->id) }}">
                            <button type="button" class="btn btn-warning">Select Theatre Complex</button>
                        </div>
                    </td>
                </tr>
                @endforeach
            <hr>
    </div>
@endsection
