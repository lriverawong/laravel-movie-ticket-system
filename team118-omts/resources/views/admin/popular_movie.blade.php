@extends('admin.admin-layout')

@section('admin-content')
    <h1 class="text-center">The most popular movie is: {{$movie_stats->first()->title}}</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="text-center">Movie ID</th>
                <th class="text-center">Movie Title</th>
                <th class="text-center">Movie Total Number of Tickets</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movie_stats as $stat)
                <tr>
                    <td class="text-center">{{$stat->movie_id}}</td>
                    <td class="text-center">{{$stat->title}}</td>
                    <td class="text-center">{{$stat->sum_num_tickets}}</td>
                </tr>
            @endforeach    
        </tbody>
    </table>
    
@endsection