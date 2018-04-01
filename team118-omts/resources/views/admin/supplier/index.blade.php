@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Inside index page of suppliers</h1>
        @if (count($suppliers))
            <h1 class="title is-3">Supplier</h1>
        @endif
        <a class="btn btn-primary float-right" href="{{route('admin.suppliers.create')}}">Creat a new supplier</a>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Supplier Name</th>
                    <th scope="col">Supplier Phone Number</th>
                    <th scope="col">Supplier Contact First Name</th>
                    <th scope="col">Supplier Contact Last Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($suppliers as $supplier)
                <tr>
                    <th scope="row">{{$supplier->name}}</th>
                    <td>{{$supplier->phone_num}}</td>
                    <td>{{$supplier->contact_first_name}}</td>
                    <td>{{$supplier->contact_last_name}}</td>
                    <td>
                        <div class="btn btn-group" role="group" aria-label="Basic example">
                            <a href="{{ URL::to('admin/suppliers/' . $supplier->id . '/edit') }}">
                            <button type="button" class="btn btn-warning">Edit</button>
                            </a>&nbsp;
                            <form action="{{url('admin/suppliers', [$supplier->id])}}" method="POST">
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
