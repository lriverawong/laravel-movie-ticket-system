@extends('admin.admin-layout')

@section('admin-content')
    <div class="container">
        <h1>Inside index page of show times</h1>
        @if (count($show_times))
            <h1 class="title is-3">Show Time</h1>
        @endif
        <a class="btn btn-primary float-right" href="{{route('admin.show_times.create')}}">Creat a new Show Time</a>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Movie Id</th>
                    <th scope="col">Theatre Id</th>
                    <th scope="col">Theatre Complex Id</th>
                    <th scope="col">Showing Start Time</th>
                    <th scope="col">Number of Seats Available</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($show_times as $show_time)
                <tr>
                    <th scope="row">{{$show_time->movie_id}}</th>
                    <td>{{$show_time->theatre_id}}</td>
                    <td>{{$show_time->theatre_complex_id}}</td>
                    <td>{{$show_time->showing_start_time}}</td>
                    <td>{{$show_time->num_seats_avail}}</td>
                    <td>
                        <div class="btn btn-group" role="group" aria-label="Basic example">
                            <a href="{{ URL::to('admin/show_times/' . $show_time->id . '/edit') }}">
                            <button type="button" class="btn btn-warning">Edit</button>
                            </a>&nbsp;
                            <form action="{{url('admin/show_times', [$show_time->id])}}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn btn-danger" value="Delete"/>
                            </form>
                        </div>
                    </td>
                </tr>
                    {{--  <li>
                        <a href="#">{{ $director->last_name }}</a>
                    </li>  --}}
                @endforeach
            

            <hr>
    </div>
@endsection
