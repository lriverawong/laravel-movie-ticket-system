@extends('admin.admin-layout')

@section('admin-content')
    <h1>ALL USERS</h1>
    <div class="container">
        <br />
        @if (\Session::has('success'))
            <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
            </div><br />
        @endif
        <a class="btn btn-primary float-right" href="{{route('admin.users.create')}}">Creat a new user</a>
        <table class="table table-striped">
            <thead>
                <tr>
                <th>ID</th>
                <th>Role</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th colspan="3" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->role_id}}</td>
                        <td>{{$user->first_name}}</td>
                        <td>{{$user->last_name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone_num}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>{{$user->updated_at}}</td>
                        
                        <td><a href="{{action('UsersManagementController@edit', $user->id)}}" class="btn btn-warning">Edit</a></td>
                        <td>
                            <form action="{{action('UsersManagementController@destroy', $user->id)}}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger" onclick="return confirm('Are you sure?')" type="submit">Delete</button>
                            </form>
                        </td>
                        <td><a href="{{route('admin.users.purchase_history', $user->id, '/purchase_histroy')}}" class="btn btn-info">Purchase History</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection