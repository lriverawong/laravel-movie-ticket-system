@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Inside index page of Reservations Table (purchases)</h1>
        @if (count($purchases))
            <h1 class="title is-3">Purchases</h1>
        @endif
        <a class="btn btn-primary float-right" href="{{route('theatre_complexes')}}">Purchase tickets!</a>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Showing Id</th>
                    <th scope="col">Number of Tickets</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($purchases as $purchase)
                <tr>
                    <th scope="row">{{$purchase->showing_id}}</th>
                    <td>{{$purchase->number_of_tickets}}</td>
                    <td>
                        <div class="btn btn-group" role="group" aria-label="Basic example">
                            <form action="{{url('purchases', [$purchase->id])}}" method="POST">
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
