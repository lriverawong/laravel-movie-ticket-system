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
                        <th scope="col">Movie Title</th>
                        <th scope="col">Movie User Id</th>
                        <th scope="col">Movie Showing Id</th>
                        <th scope="col">Movie Theatre Id</th>
                        <th scope="col">Movie Showing Start Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservations as $reservation)
                    <tr>
                        <th scope="row">{{$reservation->title}}</th>
                        <td>{{$reservation->user_id}}</td>
                        <td>{{$reservation->showing_id}}</td>
                        <td>{{$reservation->theatre_id}}</td>
                        <td>{{$reservation->showing_start_time}}</td>
                    </tr>
                    @endforeach
                <hr>
            </table>
        @endif
    </div>
@endsection
