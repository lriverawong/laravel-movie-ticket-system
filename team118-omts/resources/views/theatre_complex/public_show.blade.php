@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center">Current Showing at this Theatre Complex</h2>
        @include('shared.flash-success')
        <a class="btn btn-primary float-right" href="{{route("cart.show", auth()->user()->id)}}">Go to cart</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Movie ID</th>
                    <th scope="col" class="text-center">Theatre ID</th>
                    <th scope="col" class="text-center">Theatre Complex ID</th>
                    <th scope="col" class="text-center">Showing Start Time</th>
                    <th scope="col" class="text-center">Number of Seats Available</th>
                    <th scope="col" class="text-center">Desired Number of Seats</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($show_times as $show_time)
                    <tr class="single-buy">
                        <form method="POST" action="{{ route('cart.store') }}">
                        @csrf
                            <div class="invisible">
                                <input type="hidden" id="user_id" name="user_id" class="form-control" value="{{auth()->user()->id}}" readonly> 
                                <input type="hidden" id="showing_id" name="showing_id" class="form-control" value="{{$show_time->id}}" readonly> 
                            </div>

                            <td class="form-group">
                                {{-- <label for="movie_id" class="hide">Movie Id:</label> --}}
                                {{-- <input type="hidden" id="movie_id" name="movie_id" class="form-control" value="{{$show_time->movie_id}}" readonly>  --}}
                                <p class="text-center">{{$show_time->movie_id}}</p>
                                <span class="form-text has-danger"></span>
                            </td>    
        
                            <td class="form-group">
                                {{-- <label for="theatre_id" class="label">Theatre Id:</label> --}}
                                {{-- <input type="hidden" id="theatre_id" name="theatre_id" class="form-control" value="{{$show_time->theatre_id}}" readonly> --}}
                                <p class="text-center">{{$show_time->theatre_id}}</p>
                                <span class="form-text has-danger"></span>
                            </td>
    
                            <td class="form-group">
                                {{-- <label for="theatre_complex_id" class="label">Theatre Complex Id:</label> --}}
                                <input type="hidden" id="theatre_complex_id" name="theatre_complex_id" class="form-control" value="{{$show_time->theatre_complex_id}}" readonly>
                                <p class="text-center">{{$show_time->theatre_complex_id}}</p>
                                <span class="form-text has-danger"></span>
                            </td>
    
                            <td class="form-group">

                                {{-- <label for="showing_start_time" class="label">Showing Start Time:</label> --}}
                                {{-- <input type="hidden" id="showing_start_time" name="showing_start_time" class="form-control" value="{{$show_time->showing_start_time}}" readonly> --}}
                                <p class="text-center">{{$show_time->showing_start_time}}</p>
                                <span class="form-text has-danger"></span>
                            </td>

                            <td class="form-group">
                                    {{-- <label for="showing_start_time" class="label">Showing Start Time:</label> --}}
                                    <input type="hidden" id="num_seats_avail" name="num_seats_avail" class="form-control" value="{{$show_time->num_seats_avail}}" readonly>
                                    <p class="text-center">{{$show_time->num_seats_avail}}</p>
                                    <span class="form-text has-danger"></span>
                                </td>

                            <td class="form-group">
                                {{-- <label for="showing_start_time" class="label">Showing Start Time:</label> --}}
                                <input type="number" min="0" max="{{$show_time->num_seats_avail}}" id="number_of_tickets" name="number_of_tickets" class="form-control" value="{{old('number_of_tickets')}}">
                                <span class="form-text has-danger"></span>
                            </td>

                            <div class="invisible">
                                {{-- <label for="showing_start_time" class="label">Showing Start Time:</label> --}}
                                <input type="hidden" min="0" max="{{$show_time->run_date_id}}" id="run_date_id" name="run_date_id" class="form-control" value="{{$show_time->run_date_id}}">
                                <span class="form-text has-danger"></span>
                            </div>
        
                            <td class="form-group col-md-4" style="margin-top:60px">
                                <button type="submit" class="btn btn-success" style="margin-left:38px">Add to Shopping Cart</button>
                            </td>
                        </form>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection()
