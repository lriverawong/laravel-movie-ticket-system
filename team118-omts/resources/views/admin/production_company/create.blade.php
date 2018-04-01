@extends('layouts.app')

@section('content')
<div class="container">
        <div class="container">
            <form method="POST" action="{{URL('admin/production_companies')}}">
            @csrf
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                    <label for="name" class="label">Production Company Name:</label>
                    
                    <input type="text" id="name" name="name" class="form-control"> 

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