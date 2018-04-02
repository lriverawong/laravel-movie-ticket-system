@extends('admin.admin-layout')

@section('admin-content')
<div class="container">
        <div class="container">
            <form method="POST" action="{{URL('/admin/show_times', [$show_time->show_time_id])}}">
            <input type="hidden" name="_method" value="PATCH">
            @csrf
                <div class="form-group">
                    <label for="movie_id" class="label">Movie Id:</label>
                    <input type="hidden" id="movie_id" name="movie_id" class="form-control" value="{{$show_time->movie_title}}"> 
                    <h3>{{$show_time->movie_title}}</h3>
                    <span class="form-text has-danger"></span>
                </div>
    
                <div class="form-group">
                    <label for="theatre_id" class="label">Theatre ID</label>
                    <select name="theatre_id">
                        @foreach ($theatres as $theatre)
                            <option value="{{ $theatre->theatre_id }}">{{ $theatre->theatre_num }}</option>
                        @endforeach
                    </select>
                </div>
                

                <div class="form-group">
                    <label for="showing_start_time" class="label">Showing Start Time:</label>
                    <input type="text" id="showing_start_time" name="showing_start_time" class="form-control" value="{{$show_time->showing_start_time}}">
                    <span class="form-text has-danger"></span>
                </div>

                <div class="form-group">
                    <label for="num_seats_avail" class="label">Number of Seats Available</label>
                    <input type="text" id="num_seats_avail" name="num_seats_avail" class="form-control" value="{{$show_time->num_seats_avail}}">
                    <span class="form-text has-danger"></span>
                </div>

                <div class="invisible">
                    {{-- <label for="num_seats_avail" class="label">Number of Seats Available</label> --}}
                    <input type="hidden" id="run_date_id" name="run_date_id" class="form-control" value="{{$show_time->run_date_id}}">
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