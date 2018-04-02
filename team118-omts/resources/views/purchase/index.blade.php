@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="title is-3">Purchases</h1>
        <hr>
        <a class="btn btn-primary float-right" href="{{route('theatre_complexes')}}">Purchase tickets!</a>
        @if (count($purchases))
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="text-center">Showing Id</th>
                        <th scope="col" class="text-center">Number of Tickets</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($purchases as $purchase)
                    <tr>
                        <th scope="row" class="text-center">{{$purchase->showing_id}}</th>
                        <td class="text-center">{{$purchase->number_of_tickets}}</td>
                        <td class="text-center">
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
        @else
            <h3>You have not bought any tickets.</h3>
        @endif
    </div>
@endsection
