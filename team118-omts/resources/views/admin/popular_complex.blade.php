@extends('admin.admin-layout')

@section('admin-content')
    <h1 class="text-center">The most popular movie is: {{$complex_stats->first()->name}}</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="text-center">Theatre Complex ID</th>
                <th class="text-center">Theatre Complex Name</th>
                <th class="text-center">Theatre Complex Total Number of Tickets</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($complex_stats as $stat)
                <tr>
                    <td class="text-center">{{$stat->theatre_complex_id}}</td>
                    <td class="text-center">{{$stat->name}}</td>
                    <td class="text-center">{{$stat->sum_num_tickets}}</td>
                </tr>
            @endforeach    
        </tbody>
    </table>
    
@endsection