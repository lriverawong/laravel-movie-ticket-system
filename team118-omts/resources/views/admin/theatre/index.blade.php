@extends('admin.admin-layout')

@section('admin-content')
    <div class="container">
        <h1>Inside index page of theatre</h1>
        @if (count($theatres))
            <h1 class="title is-3">Theatre</h1>
        @endif
        <a class="btn btn-primary float-right" href="{{route('admin.theatres.create')}}">Creat a new theatre</a>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Theatre Number</th>
                    <th scope="col">Theatres Max # Seats</th>
                    <th scope="col">Theatre Screen Size</th>
                    <th scope="col">Theatre Complex ID</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($theatres as $theatre)
                <tr>
                    <th scope="row">{{$theatre->theatre_num}}</th>
                    <td>{{$theatre->max_num_seats}}</td>
                    <td>{{$theatre->screen_size}}</td>
                    <td>{{$theatre->theatre_complex_id}}</td>
                    <td>
                        <div class="btn btn-group" role="group" aria-label="Basic example">
                            <a href="{{ URL::to('admin/theatres/' . $theatre->id . '/edit') }}">
                            <button type="button" class="btn btn-warning">Edit</button>
                            </a>&nbsp;
                            <form action="{{url('admin/theatres', [$theatre->id])}}" method="POST">
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
