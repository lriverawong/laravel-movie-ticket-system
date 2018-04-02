@extends('layouts.app')
 
@section('content')
    <div class="container">
        <div class="text-center">
            {{--  <h1>User Profile: {{ $user->first_name }} {{ $user->last_name }}</h1>  --}}
        </div>
        <div class="jumbotron text-center">
            <p>
                <strong>Movie Title</strong> {{ $movie->title }}<br>
                <strong>Running Time</strong> {{ $movie->running_time }}<br>
                <strong>Rating</strong> {{ $movie->rating }}<br>
                <strong>Plot Synopsis</strong> {{ $movie->plot_synopsis }}<br>
                <strong>Director Name</strong> {{ $movie->director_first_name }} {{ $movie->director_last_name }}<br>
                <strong>Production Company</strong> {{ $movie->prod_comp_name }}<br>
                <strong>Supplier</strong> {{ $movie_supplier->supplier_name }}<br>
            </p>
        </div>
        <div class="container reviews">
            @foreach($reviews as $review)
                <div class="single-review">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{$review->first_name}} {{$review->last_name}}</h5>
                            <div class="card-text" style="">
                                <p>{{$review->review}}</p>
                            </div>
                        </div>
                    </div>
                    <span class="badge badge-success">
                        Created at: {{$review->created_at}}
                    </span>
                    <span class="badge badge-primary">
                        Updated at: {{$review->updated_at}}
                    </span>
                </div>
            @endforeach
        </div>

        @guest
            <div class="make-review">
                <h2>Sign in to leave a review!</h2>
            </div>
        @else
            <div class="container make-review">
                <form method="POST" action="{{route('movie.write_review')}}">
                @csrf
                    <div class="invisible">
                        <label for="user_id" class="label">User_Id:</label>
                        
                        <input type="text" id="user_id" name="user_id" class="form-control" value="{{auth()->user()->id}}" readonly> 
    
                        <span class="form-text has-danger"></span>
                    </div>
        
                    <div class="invisible">
                        <label for="movie_id" class="label">Movie Id:</label>
                        
                        <input type="text" id="movie_id" name="movie_id" class="form-control" value="{{$movie->id}}" readonly>
    
                        <span class="form-text has-danger"></span>
                    </div>

                    <div class="form-group">
                        <label for="review" class="label">Review:</label>
                        
                        {{ Form::textarea('review', old('review'), ['class' => "form-control"]) }}
    
                        <span class="form-text has-danger"></span>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-4" style="margin-top:60px">
                            <button type="submit" class="btn btn-success" style="margin-left:38px">Create New Review</button>
                        </div>
                    </div>
                </form>
            </div>
        @endguest
    </div>
@endsection