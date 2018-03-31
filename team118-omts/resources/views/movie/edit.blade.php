@extends('layouts.app')

@section('content')
<div class="container">
        <div id="movie-form" class="container">
            <form method="POST" action="{{URL('movies', [$movie->id])}}">
            <input type="hidden" name="_method" value="PATCH">
            @csrf
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                    <label for="title" class="label">Movie Title:</label>
                    
                    <input type="text" id="title" name="title" class="form-control" value="{{$movie->title}}"> 

                    <span class="form-text has-danger"></span>
                </div>
    
                <div class="form-group">
                    <label for="running_time" class="label">Movie Running Time:</label>
                    
                    <input type="text" id="running_time" name="running_time" class="form-control" value="{{$movie->running_time}}">

                    <span class="form-text has-danger"></span>
                </div>

                <div class="form-group">
                    <label for="rating" class="label">Movie Rating:</label>
                                    
                    <input type="text" id="rating" name="rating" class="form-control" value="{{$movie->rating}}">
                
                    <span class="form-text has-danger"></span>
                </div>

                <div class="form-group">
                    <label for="plot_synopsis" class="label">Movie Plot Synopsis:</label>

                    {{--  <textarea type="text" id="plot_synopsis" name="plot_synopsis" class="form-control">{{old('plot_synopsis')}}</textarea>  --}}
                    {{ Form::textarea('plot_synopsis', $movie->plot_synopsis, ['class' => "form-control"]) }}

                    <span class="form-text has-danger"></span>
                </div>

                <div class="form-group">
                    <label for="director_id" class="label">Movie Director Id:</label>
                                        
                    <input type="text" id="director_id" name="director_id" class="form-control" value="{{$movie->director_id}}">
                    
                    <span class="form-text has-danger"></span>
                </div>

                <div class="form-group">
                    <label for="prod_company_id" class="label">Movie Production Company Id:</label>
                                            
                    <input type="text" id="prod_company_id" name="prod_company_id" class="form-control" value="{{$movie->prod_company_id}}">
                        
                    <span class="form-text has-danger"></span>
                </div>

                <div class="form-group">
                    <label for="supplier_id" class="label">Movie Supplier Id:</label>
                                            
                    <input type="text" id="supplier_id" name="supplier_id" class="form-control" value="{{$movie->supplier_id}}">
                        
                    <span class="form-text has-danger"></span>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4" style="margin-top:60px">
                        <button type="submit" class="btn btn-success" style="margin-left:38px">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection