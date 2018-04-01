@extends('admin.admin-layout')

@section('admin-content')
<div class="container">
        <div id="director-form" class="container">
            <form method="POST" action="{{URL('/admin/directors', [$director->id])}}">
            <input type="hidden" name="_method" value="PATCH">
            @csrf
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                    <label for="first_name" class="label">First Name:</label>
                    
                    <input type="text" id="first_name" name="first_name" class="form-control" value="{{$director->first_name}}"> 

                    <span class="form-text has-danger"></span>
                </div>
    
                <div class="form-group">
                    <label for="last_name" class="label">Last Name:</label>
                    
                    <input type="text" id="last_name" name="last_name" class="form-control" value="{{$director->last_name}}">

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