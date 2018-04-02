@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center">Your Past Purchases</h2>
            <h3>It is currently: {{$current_time}}</h3>
        @if (count($reservations))
            {{-- <h1 class="title is-3">Movies</h1> --}}
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="text-center">Movie Title</th>
                        <th scope="col" class="text-center">Movie Showing Start Time</th>
                        <th scope="col" class="text-center">Number of Tickets Bought</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservations as $reservation)
                    <tr>
                        <th scope="row" class="text-center">{{$reservation->movie_title}}</th>
                        <th class="text-center">{{$reservation->showing_start_time}}</th>
                        <th class="text-center">{{$reservation->number_of_tickets}}</th>
                    </tr>
                    @endforeach
                <hr>
            </table>
        @endif
    </div>
@endsection
