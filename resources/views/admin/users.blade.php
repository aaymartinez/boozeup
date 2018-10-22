@extends('layouts.admin')

@section('content')

    <h3>Users</h3>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p class="m-0">{{ $message }}</p>
        </div>
    @endif

    <table class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Full Name / Shop Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Verified</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ ($user->shop_name) ? $user->shop_name : $user->first_name .' '. $user->last_name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role['role'] }}</td>
                <td>{{ ($user->is_profile_complete) ? 'Yes' : 'No' }}</td>
                <td>
                    <a href="{{ url('/admin/user/'.$user->id.'/edit') }}">Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
