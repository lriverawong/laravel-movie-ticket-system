@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Inside index page of Movies</h1>
        @if (count($movies))
            <h1 class="title is-3">Movies</h1>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Movie Title</th>
                        <th scope="col">Movie Running Time</th>
                        <th scope="col">Movie Rating</th>
                        <th scope="col">Movie Director Id</th>
                        <th scope="col">Movie Production Company Id</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($movies as $movie)
                    <tr>
                        <th scope="row">{{$movie->title}}</th>
                        <td>{{$movie->running_time}}</td>
                        <td>{{$movie->rating}}</td>
                        <td>{{$movie->director_id}}</td>
                        <td>{{$movie->prod_comp_id}}</td>
                    </tr>
                    @endforeach
                <hr>
            </table>
        @endif
        <h2 class="text-center">Currently Playing Movies</h2>
        <p>It is currently: {{$current_time}}</p>
        

    </div>
@endsection
