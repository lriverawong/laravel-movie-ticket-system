@extends('admin.admin-layout')

@section('admin-content')
    <div class="container">
        <h1>Inside index page of Movies</h1>
        @if (count($movies))
            <h1 class="title is-3">Movies</h1>
        @endif
        <a class="btn btn-primary float-right" href="{{route('admin.movies.create')}}">Creat a new movie</a>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Movie Title</th>
                    <th scope="col">Movie Running Time</th>
                    <th scope="col">Movie Rating</th>
                    <th scope="col">Movie Director Id</th>
                    <th scope="col">Movie Production Company Id</th>
                    <th scope="col">Action</th>
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
                    <td>
                        <div class="btn btn-group" role="group" aria-label="Basic example">
                            <a href="{{ URL::to('admin/movies/' . $movie->id . '/edit') }}">
                            <button type="button" class="btn btn-warning">Edit</button>
                            </a>&nbsp;
                            <form action="{{url('admin/movies', [$movie->id])}}" method="POST">
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
