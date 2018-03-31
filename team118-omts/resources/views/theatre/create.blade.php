@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container">
            <form method="POST" action="{{URL('theatres')}}">
                @csrf
                <div class="form-group">
                    <label for="theatre_num" class="label">Theatre Number:</label>
                    
                    <input type="text" id="theatre_num" name="theatre_num" class="form-control"> 

                    <span class="form-text has-danger"></span>
                </div>
    
                <div class="form-group">
                    <label for="max_num_seats" class="label">Theatre Maximum Seats:</label>
                    
                    <input type="number" id="max_num_seats" name="max_num_seats" class="form-control">

                    <span class="form-text has-danger"></span>
                </div>

                <div class="form-group">
                        <label for="screen_size" class="label">Theatre Screen Size:</label>
                        
                        <input type="number" id="screen_size" name="screen_size" class="form-control">
    
                        <span class="form-text has-danger"></span>
                    </div>

                <div class="form-group">
                    <label for="theatre_complex_id" class="label">Theatre Complex Id:</label>
                    <select name="theatre_complex_id">
                        @foreach ($theatre_complexes as $theatre_complex)
                            <option value="{{ $theatre_complex->id }}">{{ $theatre_complex->name }}</option>
                        @endforeach
                    </select>
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