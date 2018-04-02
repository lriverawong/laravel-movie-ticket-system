@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center">Currently Playing Movies</h2>
            <h3>It is currently: {{$current_time}}</h3>
        @if (count($movies))
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="text-center">Movie Title</th>
                        <th scope="col" class="text-center">Movie Running Time</th>
                        <th scope="col" class="text-center">Movie Rating</th>
                        <th scope="col" class="text-center"></th>
                        {{-- <th scope="col" class="text-center">Movie Director Id</th>
                        <th scope="col" class="text-center">Movie Production Company Id</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($movies as $movie)
                    <tr>
                        <th scope="row" class="text-center">{{$movie->title}}</th>
                        <td class="text-center">{{$movie->running_time}}</td>
                        <td class="text-center">{{$movie->rating}}</td>
                        <td class="text-center"><a class="btn btn-info" href="{{route('movie.public_show', ['id' => $movie->id])}}">See more info</a></td>
                        {{-- <td class="text-center">{{$movie->director_id}}</td>
                        <td class="text-center">{{$movie->prod_comp_id}}</td> --}}
                    </tr>
                    @endforeach
                <hr>
            </table>
        @endif
        
        

    </div>
@endsection
