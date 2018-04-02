@extends('admin.admin-layout')

@section('admin-content')
    <h1 class="text-center">Welcome {{auth()->user()->first_name}} to the Admin Panel</h1>
    <h1 class="text-center">The most popular complex is...</h1>    
@endsection