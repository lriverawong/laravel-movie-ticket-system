@extends('admin.admin-layout')

@section('admin-content')
    <div class="container">
        <h3>It is currently: {{$current_time}}</h3>
        <h1 class="title">User Future Purchases</h1>
        @if (count($held_tickets))
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
                    @foreach ($held_tickets as $viewing)
                    <tr>
                        <th scope="row">{{$viewing->title}}</th>
                        <td>{{$viewing->user_id}}</td>
                        <td>{{$viewing->showing_id}}</td>
                        <td>{{$viewing->theatre_id}}</td>
                        <td>{{$viewing->showing_start_time}}</td>
                    </tr>
                    @endforeach
                <hr>
            </table>
        @else
            <h3 class="text-center">User has no upcoming viewings purchased.</h3>
        @endif

        <h1 class="title">User Past Purchases</h1>
        @if (count($past_purchases))
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
                    @foreach ($past_purchases as $past_purchase)
                    <tr>
                        <th scope="row">{{$past_purchase->title}}</th>
                        <td>{{$past_purchase->user_id}}</td>
                        <td>{{$past_purchase->showing_id}}</td>
                        <td>{{$past_purchase->theatre_id}}</td>
                        <td>{{$past_purchase->showing_start_time}}</td>
                    </tr>
                    @endforeach
                <hr>
            </table>
        @else
            <h3 class="text-center">User has no past viewings.</h3>
        @endif
    </div>
@endsection
