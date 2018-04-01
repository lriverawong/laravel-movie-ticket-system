@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Inside index page of production_companies</h1>
        @if (count($production_companies))
            <h1 class="title is-3">Theatre Complex</h1>
        @endif
        <a class="btn btn-primary float-right" href="{{route('production_companies.create')}}">Creat a new production company</a>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Production Company Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($production_companies as $production_company)
                <tr>
                    <th scope="row">{{$production_company->name}}</th>
                    <td>
                        <div class="btn btn-group" role="group" aria-label="Basic example">
                            <a href="{{ URL::to('production_companies/' . $production_company->id . '/edit') }}">
                            <button type="button" class="btn btn-warning">Edit</button>
                            </a>&nbsp;
                            <form action="{{url('production_companies', [$production_company->id])}}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn btn-danger" value="Delete"/>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            <hr>
    </div>
@endsection
