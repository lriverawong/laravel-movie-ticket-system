@extends('layouts.app')

@section('content')
<div class="container">
        <div id="theatre-complex-form" class="container">
            <form method="POST" action="{{URL('admin/theatre_complexes', [$theatre_complex->id])}}">
            <input type="hidden" name="_method" value="PATCH">
            @csrf
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                    <label for="name" class="label">Theatre Complex Name:</label>
                    
                    <input type="text" id="name" name="name" class="form-control" value="{{$theatre_complex->name}}"> 

                    <span class="form-text has-danger"></span>
                </div>
    
                <div class="form-group">
                    <label for="phone_num" class="label">Theatre Complex Phone Number:</label>
                    
                    <input type="text" id="phone_num" name="phone_num" class="form-control" value="{{$theatre_complex->phone_num}}">

                    <span class="form-text has-danger"></span>
                </div>

                <div class="form-group">
                    <label for="street_num" class="label">Theatre Complex Street Number:</label>
                                    
                    <input type="text" id="street_num" name="street_num" class="form-control" value="{{$theatre_complex->street_num}}">
                
                    <span class="form-text has-danger"></span>
                </div>

                <div class="form-group">
                    <label for="street_name" class="label">Theatre Complex Street Name:</label>
                                        
                    <input type="text" id="street_name" name="street_name" class="form-control" value="{{$theatre_complex->street_name}}">
                    
                    <span class="form-text has-danger"></span>
                </div>

                <div class="form-group">
                    <label for="city" class="label">Theatre Complex City:</label>
                                        
                    <input type="text" id="city" name="city" class="form-control" value="{{$theatre_complex->city}}">
                    
                    <span class="form-text has-danger"></span>
                </div>

                <div class="form-group">
                    <label for="province" class="label">Theatre Complex Province:</label>
                                            
                    <input type="text" id="province" name="province" class="form-control" value="{{$theatre_complex->province}}">
                        
                    <span class="form-text has-danger"></span>
                </div>

                <div class="form-group">
                    <label for="country" class="label">Theatre Complex Country:</label>
                                            
                    <input type="text" id="country" name="country" class="form-control" value="{{$theatre_complex->country}}">
                        
                    <span class="form-text has-danger"></span>
                </div>

                <div class="form-group">
                    <label for="postal_code" class="label">Theatre Complex Postal Code:</label>
                                                
                    <input type="text" id="postal_code" name="postal_code" class="form-control" value="{{$theatre_complex->postal_code}}">
                            
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