@extends('admin.admin-layout')

@section('admin-content')
<div class="container">
        <div id="movie-form" class="container">
            <form method="POST" action="{{URL('admin/movies', [$movie->id])}}">
            <input type="hidden" name="_method" value="PATCH">
            @csrf
                <div class="form-group">
                    <label for="title" class="label">Movie Title:</label>
                    
                    <input type="text" id="title" name="title" class="form-control" value="{{$movie->title}}"> 

                    <span class="form-text has-danger"></span>
                </div>
    
                <div class="form-group">
                    <label for="running_time" class="label">Movie Running Time:</label>
                    
                    <input type="text" id="running_time" name="running_time" class="form-control" value="{{$movie->running_time}}">

                    <span class="form-text has-danger"></span>
                </div>

                <div class="form-group">
                    <label for="rating" class="label">Movie Rating:</label>
                                    
                    <input type="text" id="rating" name="rating" class="form-control" value="{{$movie->rating}}">
                
                    <span class="form-text has-danger"></span>
                </div>

                <div class="form-group">
                    <label for="plot_synopsis" class="label">Movie Plot Synopsis:</label>

                    {{--  <textarea type="text" id="plot_synopsis" name="plot_synopsis" class="form-control">{{old('plot_synopsis')}}</textarea>  --}}
                    {{ Form::textarea('plot_synopsis', $movie->plot_synopsis, ['class' => "form-control"]) }}

                    <span class="form-text has-danger"></span>
                </div>

                <div class="col-md-6 form-group">
                    <label for="director_id" class="label">Movie Director:</label>
                    <select name="director_id">
                        @foreach ($directors as $director)
                            @if ($director->id === $movie->director_id )
                                <option value="{{ $director->id }}" selected>{{ $director->first_name }} {{ $director->last_name }}</option>
                            @else
                                <option value="{{ $director->id }}">{{ $director->first_name }} {{ $director->last_name }}</option>
                            @endif
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
                            @if ($supplier->id === $movie->supplier_id )
                                <option value="{{ $supplier->id }}" selected>{{ $supplier->name }}</option>
                            @else
                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                            @endif
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
                            @if ($prod_comp->id === $movie->prod_comp_id )
                                <option value="{{ $prod_comp->id }}" selected>{{ $prod_comp->name }}</option>
                            @else
                                <option value="{{ $prod_comp->id }}">{{ $prod_comp->name }}</option>
                            @endif
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
                        <button type="submit" class="btn btn-success" style="margin-left:38px">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection