@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-3 text-center">Welcome to the Team 118 - Online Movie Ticket Service!</h1>
            <p class="lead text-center">
                Feel free to look around although to best enjoy our site - Sign up!
            </p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="{{route('register')}}">Sign Up!</a>
            </p>
        </div>
    </div>
@endsection