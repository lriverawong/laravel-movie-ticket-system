@extends('layouts.app')

@section('content')
    <div class="container">
        <hr>
        <h2 class="text-center">ADMIN VIEW</h2>
        <hr>
        <div class="py-4">
            @yield('admin-content')
        </div>
    </div>
@endsection