@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Inside index page of Review Movies</h1>
        @if (count($movies))
            <h1 class="title is-3">Review Movies</h1>
        @endif
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Movie Title</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movies as $movie)
                <tr>
                    <th scope="row">{{$movie->title}}</th>
                    <td>
                        <div class="btn btn-group" role="group" aria-label="Basic example">
                            <a href="{{ URL::to('movies/' . $movie->id) }}">
                            <button type="button" class="btn btn-primary">Show More and Review</button>
                            </a>&nbsp;
                        </div>
                    </td>
                </tr>
                @endforeach
            <hr>
    </div>
@endsection
