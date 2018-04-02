@extends('admin.admin-layout')

@section('admin-content')
    <div class="container">
        <h1 class="title text-left">Show Time</h1>
        @if (count($show_times))
            {{-- <a class="btn btn-primary float-right" href="{{route('admin.show_times.create')}}">Create a new Show Time</a> --}}
            <a class="btn btn-primary float-right" href="{{route('admin.show_times')}}">Create a new Show Time</a>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="text-center">Theatre Complex Id</th>
                        <th scope="col" class="text-center">Theatre Number</th>
                        <th scope="col" class="text-center">Movie Title</th>
                        <th scope="col" class="text-center">Showing Start Time</th>
                        <th scope="col" class="text-center">Number of Seats Available</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($show_times as $show_time)
                    <tr>
                        <td scope="row" class="text-center">{{$show_time->theatre_complex_name}}</td>
                        <td class="text-center">{{$show_time->theatre_num}}</td>
                        <th class="text-center">{{$show_time->movie_title}}</th>
                        <td class="text-center">{{$show_time->showing_start_time}}</td>
                        <td class="text-center">{{$show_time->num_seats_avail}}</td>
                        <td>
                            <div class="btn btn-group" role="group" aria-label="Basic example">
                                <a href="{{ URL::to('admin/show_times/' . $show_time->show_time_id . '/edit') }}">
                                <button type="button" class="btn btn-warning">Edit</button>
                                </a>&nbsp;
                                <form action="{{url('admin/show_times', [$show_time->show_time_id])}}" method="POST">
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
        @else
            <h3 class="text-center">No showtimes availble.</h3>
        @endif

    </div>
@endsection
