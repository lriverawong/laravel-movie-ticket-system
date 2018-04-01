@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Inside index page of theatre_complexes</h1>
        @if (count($theatre_complexes))
            <h1 class="title is-3">Theatre Complex</h1>
        @endif
        <a class="btn btn-primary float-right" href="{{route('admin.theatre_complexes.create')}}">Creat a new complex</a>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Theatre Complex Name</th>
                    <th scope="col">Theatre Complex Phone Number</th>
                    <th scope="col">Theatre Complex City</th>
                    <th scope="col">Theatre Complex Province</th>
                    <th scope="col">Theatre Complex Country</th>
                    <th scope="col">Action</th>
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
                            <a href="{{ URL::to('admin/theatre_complexes/' . $theatre_complex->id . '/edit') }}">
                            <button type="button" class="btn btn-warning">Edit</button>
                            </a>&nbsp;
                            <form action="{{url('admin/theatre_complexes', [$theatre_complex->id])}}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn btn-danger" value="Delete"/>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            <hr>
    </div>
@endsection
