@extends('layouts.app')

@section('content')
<div class="container">
        <div id="supplier-form" class="container">
            <form method="POST" action="{{URL('/admin/suppliers', [$supplier->id])}}">
            <input type="hidden" name="_method" value="PATCH">
            @csrf
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                    <label for="name" class="label">Supplier Name:</label>
                    
                    <input type="text" id="name" name="name" class="form-control" value="{{$supplier->name}}"> 

                    <span class="form-text has-danger"></span>
                </div>
    
                <div class="form-group">
                    <label for="phone_num" class="label">Supplier Phone Number:</label>
                    
                    <input type="text" id="phone_num" name="phone_num" class="form-control" value="{{$supplier->phone_num}}">

                    <span class="form-text has-danger"></span>
                </div>

                <div class="form-group">
                    <label for="contact_first_name" class="label">Supplier Contact Name:</label>
                        
                    <input type="text" id="contact_first_name" name="contact_first_name" class="form-control" value="{{$supplier->contact_first_name}}">
    
                    <span class="form-text has-danger"></span>
                </div>

                <div class="form-group">
                    <label for="contact_last_name" class="label">Supplier Contact Name:</label>
                            
                    <input type="text" id="contact_last_name" name="contact_last_name" class="form-control" value="{{$supplier->contact_last_name}}">
        
                    <span class="form-text has-danger"></span>
                </div>

                <div class="form-group">
                    <label for="apt_num" class="label">Supplier Apartment Number:</label>
                                
                    <input type="text" id="apt_num" name="apt_num" class="form-control" value="{{$supplier->apt_num}}">
            
                    <span class="form-text has-danger"></span>
                </div>

                <div class="form-group">
                    <label for="street_num" class="label">Supplier Street Number:</label>
                                    
                    <input type="text" id="street_num" name="street_num" class="form-control" value="{{$supplier->street_num}}">
                
                    <span class="form-text has-danger"></span>
                </div>

                <div class="form-group">
                    <label for="street_name" class="label">Supplier Street Name:</label>
                                        
                    <input type="text" id="street_name" name="street_name" class="form-control" value="{{$supplier->street_name}}">
                    
                    <span class="form-text has-danger"></span>
                </div>

                <div class="form-group">
                    <label for="city" class="label">Supplier City:</label>
                                        
                    <input type="text" id="city" name="city" class="form-control" value="{{$supplier->city}}">
                    
                    <span class="form-text has-danger"></span>
                </div>

                <div class="form-group">
                    <label for="province" class="label">Supplier Province:</label>
                                            
                    <input type="text" id="province" name="province" class="form-control" value="{{$supplier->province}}">
                        
                    <span class="form-text has-danger"></span>
                </div>

                <div class="form-group">
                    <label for="country" class="label">Supplier Country:</label>
                                            
                    <input type="text" id="country" name="country" class="form-control" value="{{$supplier->country}}">
                        
                    <span class="form-text has-danger"></span>
                </div>

                <div class="form-group">
                    <label for="postal_code" class="label">Supplier Postal Code:</label>
                                                
                    <input type="text" id="postal_code" name="postal_code" class="form-control" value="{{$supplier->postal_code}}">
                            
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