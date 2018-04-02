@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="row justify-content-center">
        Welcome to the user home page!
    </h1>
    <div class="container text-center user-home-page">
        <a class="btn btn-primary justify-content-center" href="/theatre_complexes">Purchases Tickets</a>
        <a class="btn btn-primary justify-content-center" href="/purchases">View Purchases</a>
        <a class="btn btn-primary justify-content-center" href="/rentals">View Past Rentals</a>
        <a class="btn btn-primary justify-content-center" href="/reviews">Post a Review</a>
    </div>
</div>
@endsection