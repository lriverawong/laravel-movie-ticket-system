@extends('layouts.app')

@section('content')
<div class="container">
        <div id="theatre-form" class="container">
            <form method="POST" action="{{URL('/admin/theatres', [$theatre->id])}}">
            <input type="hidden" name="_method" value="PATCH">
            @csrf
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                    <label for="theatre_num" class="label">Theatre Number:</label>
                    
                    <input type="text" id="theatre_num" name="theatre_num" class="form-control" value="{{$theatre->theatre_num}}"> 

                    <span class="form-text has-danger"></span>
                </div>
    
                <div class="form-group">
                    <label for="max_num_seats" class="label">Theatre Max # Seats:</label>
                    
                    <input type="text" id="max_num_seats" name="max_num_seats" class="form-control" value="{{$theatre->max_num_seats}}">

                    <span class="form-text has-danger"></span>
                </div>

                <div class="form-group">
                    <label for="screen_size" class="label">Theatre Screen Size:</label>
                                    
                    <input type="text" id="screen_size" name="screen_size" class="form-control" value="{{$theatre->screen_size}}">
                
                    <span class="form-text has-danger"></span>
                </div>

                <div class="form-group">
                    <label for="theatre_complex_id" class="label">Theatre Complex Id:</label>
                                        
                    <input type="text" id="theatre_complex_id" name="theatre_complex_id" class="form-control" value="{{$theatre->theatre_complex_id}}">
                    
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