@extends('layouts.app')

@section('content')
<div class="container">
        <div class="container">
            <form method="POST" action="{{URL('run_dates')}}">
            @csrf
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                    <label for="movie_id" class="label">Movie Id:</label>
                    
                    <input type="text" id="movie_id" name="movie_id" class="form-control"> 

                    <span class="form-text has-danger"></span>
                </div>
    
                <div class="form-group">
                    <label for="theatre_complex_id" class="label">Theatre Complex Id:</label>
                    
                    <input type="text" id="theatre_complex_id" name="theatre_complex_id" class="form-control">

                    <span class="form-text has-danger"></span>
                </div>

                <div class="form-group">
                    <label for="run_start_date" class="label">Run Start Date:</label>
                        
                    <input type="text" id="run_start_date" name="run_start_date" class="form-control">
    
                    <span class="form-text has-danger"></span>
                </div>

                <div class="form-group">
                    <label for="run_end_date" class="label">Run End Date:</label>
                            
                    <input type="text" id="run_end_date" name="run_end_date" class="form-control">
        
                    <span class="form-text has-danger"></span>
                </div>
                
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4" style="margin-top:60px">
                        <button type="submit" class="btn btn-success" style="margin-left:38px">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection