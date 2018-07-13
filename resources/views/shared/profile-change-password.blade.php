@extends('layouts.app')

@section('content')
    <div class="page-title w-100 d-block">
        <div class="container">
            <h3>CHANGE PASSWORD</h3>
        </div>
    </div>

    <div class="container main">

        <div class="row mt-3 pl-5">
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>

        <div class="row mt-4 mb-5 pl-5">

            <form class="form-horizontal" method="POST" action="{{ url('/change-password') }}">
                {{ csrf_field() }}
                {{--<input name="_method" type="hidden" value="PATCH">--}}

                <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
                    <label for="current_password">Current Password</label>
                    <input id="current_password" type="password" class="form-control" name="current_password" value="{{ old('current_password') }}" required>
                    @if ($errors->has('current_password'))
                        <span class="help-block text-danger">
                    <strong>{{ $errors->first('current_password') }}</strong>
                </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
                    <label for="new_password">New Password</label>
                    <input id="new_password" type="password" class="form-control" name="new_password" value="{{ old('new_password') }}" required>
                    @if ($errors->has('new_password'))
                        <span class="help-block text-danger">
                    <strong>{{ $errors->first('new_password') }}</strong>
                </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('new_password_confirm') ? ' has-error' : '' }}">
                    <label for="new_password_confirm">Confirm Password</label>
                    <input id="new_password_confirm" type="password" class="form-control" name="new_password_confirmation" value="{{ old('new_password_confirm') }}" required>
                    @if ($errors->has('new_password_confirm'))
                        <span class="help-block text-danger">
                    <strong>{{ $errors->first('new_password_confirm') }}</strong>
                </span>
                    @endif
                </div>

                <div class="form-group mt-2 mb-5">
                    <button type="submit" class="btn cBtn rounded-0">Change Password</button>
                    <a href="{{ url('/profile') }}" class="btn cBtn rounded-0 ">Cancel</a>
                </div>
            </form>
        </div>




    </div>

@endsection