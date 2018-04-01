@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Inside index page of directors</h1>
        @if (count($directors))
            <h1 class="title is-3">Director</h1>
        @endif
        <a class="btn btn-primary float-right" href="{{route('admin.directors.create')}}">Creat a new director</a>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Director First Name</th>
                    <th scope="col">Director Last Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($directors as $director)
                <tr>
                    <th scope="row">{{$director->first_name}}</th>
                    <td>{{$director->last_name}}</td>
                    <td>
                        <div class="btn btn-group" role="group" aria-label="Basic example">
                            <a href="{{ URL::to('admin/directors/' . $director->id . '/edit') }}">
                            <button type="button" class="btn btn-warning">Edit</button>
                            </a>&nbsp;
                            <form action="{{url('admin/directors', [$director->id])}}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn btn-danger" value="Delete"/>
                            </form>
                        </div>
                    </td>
                </tr>
                    {{--  <li>
                        <a href="#">{{ $director->last_name }}</a>
                    </li>  --}}
                @endforeach
            

            <hr>
    </div>
@endsection
