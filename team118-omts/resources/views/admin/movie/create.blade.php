@extends('admin.admin-layout')

@section('admin-content')
<div class="container">
        <div class="container">
            <form method="POST" action="{{URL('admin/movies')}}">
            @csrf
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                    <label for="title" class="label">Movie Title:</label>
                    
                    <input type="text" id="title" name="title" class="form-control" value="{{old('title')}}"> 

                    <span class="form-text has-danger"></span>
                </div>
    
                <div class="form-group">
                    <label for="running_time" class="label">Movie Running Time:</label>
                    
                    <input type="text" id="running_time" name="running_time" class="form-control" value="{{old('running_time')}}">

                    <span class="form-text has-danger"></span>
                </div>

                <div class="form-group">
                    <label for="rating" class="label">Movie Rating:</label>
                                    
                    <input type="text" id="rating" name="rating" class="form-control" value="{{old('rating')}}">
                
                    <span class="form-text has-danger"></span>
                </div>

                <div class="form-group">
                    <label for="plot_synopsis" class="label">Movie Plot Synopsis:</label>
                   
                    {{ Form::textarea('plot_synopsis', null, ['class' => "form-control"]) }}

                    <span class="form-text has-danger"></span>
                </div>

                <div class="col-md-6 form-group">
                    <label for="director_id" class="label">Movie Director:</label>
                    <select name="director_id">
                        @foreach ($directors as $director)
                            <option value="{{ $director->id }}">{{ $director->first_name }} {{ $director->last_name }}</option>
                        @endforeach
                    </select>
                    
                    @if ($errors->has('director_id'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('director_id') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="col-md-6 form-group">
                    <label for="supplier_id" class="label">Movie Supplier:</label>
                    <select name="supplier_id">
                        @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                        @endforeach
                    </select>
                    
                    @if ($errors->has('supplier_id'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('supplier_id') }}</strong>
                    </span>
                    @endif
                </div>



                <div class="col-md-6 form-group">
                    <label for="prod_comp_id" class="label">Movie Production Company:</label>
                    <select name="prod_comp_id">
                        @foreach ($production_companies as $prod_comp)
                            <option value="{{ $prod_comp->id }}">{{ $prod_comp->name }}</option>
                        @endforeach
                    </select>
                    
                    @if ($errors->has('prod_comp_id'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('prod_comp_id') }}</strong>
                    </span>
                    @endif
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