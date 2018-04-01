@extends('admin.admin-layout')

@section('admin-content')
<div class="container">
        <div id="show-time-form" class="container">
            <form method="POST" action="{{URL('/admin/show_times', [$show_time->id])}}">
            <input type="hidden" name="_method" value="PATCH">
            @csrf
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                    <label for="movie_id" class="label">Movie Id:</label>
                    
                    <input type="text" id="movie_id" name="movie_id" class="form-control" value="{{$show_time->movie_id}}"> 

                    <span class="form-text has-danger"></span>
                </div>
    
                <div class="form-group">
                    <label for="theatre_id" class="label">Theatre Id:</label>
                    
                    <input type="text" id="theatre_id" name="theatre_id" class="form-control" value="{{$show_time->theatre_id}}">

                    <span class="form-text has-danger"></span>
                </div>

                <div class="form-group">
                    <label for="theatre_complex_id" class="label">Theatre Complex Id:</label>
                        
                    <input type="text" id="theatre_complex_id" name="theatre_complex_id" class="form-control" value="{{$show_time->theatre_complex_id}}">
    
                    <span class="form-text has-danger"></span>
                </div>

                <div class="form-group">
                    <label for="showing_start_time" class="label">Showing Start Time:</label>
                            
                    <input type="text" id="showing_start_time" name="showing_start_time" class="form-control" value="{{$show_time->showing_start_time}}">
        
                    <span class="form-text has-danger"></span>
                </div>

                <div class="form-group">
                    <label for="num_seats_avail" class="label">Supplier Apartment Number:</label>
                                
                    <input type="text" id="num_seats_avail" name="num_seats_avail" class="form-control" value="{{$show_time->num_seats_avail}}">
            
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