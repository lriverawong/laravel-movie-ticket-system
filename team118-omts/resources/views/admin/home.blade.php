@extends('admin.admin-layout')

@section('admin-content')
    <h1 class="text-center">Welcome {{auth()->user()->first_name}} to the Admin Panel</h1>
    
    <div class="container text-center">

        <a class="btn btn-primary" href="/admin/theatre_complexes">Complex</a>
        
        <a class="btn btn-primary" href="/admin/theatres">Theatre</a>
        
        <a class="btn btn-primary" href="/admin/suppliers">Supplier</a>
        
        <a class="btn btn-primary" href="/admin/directors">Director</a>
        
        <a class="btn btn-primary" href="/admin/production_companies">Production Company</a>
        
        <a class="btn btn-primary" href="/admin/movies">Movie</a>
        
        <a class="btn btn-primary" href="/admin/users">Users</a>
        
        <a class="btn btn-primary" href="/run_dates">Run Times</a>

        <a class="btn btn-primary" href="/admin/show_times">Show Times</a>

        <a class="btn btn-primary" href="{{route('admin.movie_stats')}}">Most Popular Movie</a>

        <a class="btn btn-primary" href="{{route('admin.complex_stats')}}">Most Popular Complex</a>
    </div>
    
@endsection