@extends('layouts.app')

@section('content')
    <div class="page-title w-100 d-block">
        <div class="container">
            <h3>PROFILE</h3>
        </div>
    </div>

    <div class="container main">

        <div class="row mt-3">
            @if ($message = Session::get('success'))
                <div class="alert alert-success w-100">
                    <p class="m-0">{{ $message }}</p>
                </div>
            @endif
        </div>

        <div class="row flex-row-reverse">
            <a href="{{ url('/change-password') }}" class="btn cBtn rounded-0 mt-2 mb-2">Change Password</a>
            <a href="{{ url('/profile/'.$id.'/edit') }}" class="btn cBtn rounded-0 mt-2 mb-2 mr-2">Edit Profile</a>
        </div>

        <div class="row mt-2 mb-2 rounded grouping">
            @if( $user->role_id != 3 )
                <div class="col-md-6">
                    <div><span class="font-weight-bold">First Name:</span> {{ $user->first_name }}</div>
                    <div><span class="font-weight-bold">Last Name:</span> {{ $user->last_name }}</div>
                    <div><span class="font-weight-bold">Email Address:</span> {{ $user->email }}</div>
                </div>
                <div class="col-md-6">
                    <div><span class="font-weight-bold">Gender:</span> {{ $user->gender }}</div>
                    <div><span class="font-weight-bold">Birth Date:</span> {{ $user->birth_date }}</div>
                    <div><span class="font-weight-bold">Mobile Number:</span> {{ $user->mobile_number }}</div>
                </div>
            @else
                <div class="d-block pd">
                    <div><span class="font-weight-bold">Shop Name:</span> {{ $user->shop_name }}</div>
                    <div><span class="font-weight-bold">Email Address:</span> {{ $user->email }}</div>
                </div>
            @endif
        </div>

        <hr>

        <div class="row mt-2 mb-2 rounded w-100 grouping">
            <div class="col-md-6">
                <div><span class="font-weight-bold">Unit & Floor No.: {{ $user->unit_floor }}</span> </div>
                <div><span class="font-weight-bold">Building:</span> {{ $user->building }}</div>
                <div><span class="font-weight-bold">Street: {{ $user->street }}</span> </div>
                <div><span class="font-weight-bold">Subdivision/Apartment/Village:</span> {{ $user->subdivision }}</div>
            </div>
            <div class="col-md-6">
                <div><span class="font-weight-bold">Barangay:</span> {{ $user->barangay }}</div>
                <div><span class="font-weight-bold">City:</span> {{ $user->city }}</div>
                <div><span class="font-weight-bold">Province:</span> {{ $user->province }}</div>
                <div><span class="font-weight-bold">Zip Code:</span> {{ $user->zip }}</div>
            </div>
        </div>

        <hr>

        <div class="row d-block mt-2 mb-5 rounded w-100 grouping">
            <div class="pd">
                <div><span class="font-weight-bold">Company Name:</span> {{ $user->company_name }}</div>
                <div><span class="font-weight-bold">Landmarks:</span> </div>
                <div>{{ $user->landmarks }}</div>
                <div><span class="font-weight-bold">Authorized Recipient's Name and Mobile:</span> </div>
                <div>{{ $user->authorized_recipient }}</div>
            </div>
        </div>
    </div>

@endsection
