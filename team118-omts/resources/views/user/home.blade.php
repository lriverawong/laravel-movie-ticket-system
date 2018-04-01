@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        INSIDE HOME.BLADE.PHP - THE USER HOME SCREEN
    </div>
    <div>
        {{url('users/home', [auth()->user()->id])}}
    </div>
    <form action="{{url('users', [auth()->user()->id])}}" method="POST">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="submit" class="btn btn-danger" value="Delete"/>
        <a class="btn btn-primary" href="/purchases/create">Purchases Tickets</a>
        <a class="btn btn-primary" href="/purchases">View Purchases</a>
        <a class="btn btn-primary" href="/#">View Past Rentals</a>
        <a class="btn btn-primary" href="/#">Post a Review</a>

    </form>
</div>
@endsection