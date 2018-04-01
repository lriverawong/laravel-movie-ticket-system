@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Inside index page of Run Times</h1>
        @if (count($run_dates))
            <h1 class="title is-3">Run Times</h1>
        @endif
        <a class="btn btn-primary float-right" href="{{route('run_dates.create')}}">Creat a new running time</a>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Movie Id</th>
                    <th scope="col">Theatre Complex Id</th>
                    <th scope="col">Run Start Date</th>
                    <th scope="col">Run End Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($run_dates as $run_date)
                <tr>
                    <th scope="row">{{$run_date->movie_id}}</th>
                    <td>{{$run_date->theatre_complex_id}}</td>
                    <td>{{$run_date->run_start_date}}</td>
                    <td>{{$run_date->run_end_date}}</td>
                    <td>
                        <div class="btn btn-group" role="group" aria-label="Basic example">
                            <a href="{{ URL::to('run_dates/' . $run_date->movie_id . '/edit') }}">
                            <button type="button" class="btn btn-warning">Edit</button>
                            </a>&nbsp;
                            <form action="{{url('run_dates', [$run_date->movie_id])}}" method="POST">
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
