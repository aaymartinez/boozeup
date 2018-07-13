@extends('layouts.landing')

@section('content')

    <div class="row login-top-right">
        <a href="/" class="btn cBtn" style="width: auto;">X</a>
    </div>

    <div class="center">
        <img src="{{ asset('images/BoozeUp_Logo_red.png') }}" alt="Booze Up!" class="img-fluid">
        <div class="text">
            <h4>REGISTER AS USER</h4>
        </div>

        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
            <input id="role" type="hidden" name="role" value="2">

            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                <input id="first_name" type="text" class="form-control" name="first_name" placeholder="First Name"
                       value="{{ old('first_name') }}" required autofocus>

                @if ($errors->has('first_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('first_name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                <input id="last_name" type="text" class="form-control" name="last_name" placeholder="Last Name"
                       value="{{ old('last_name') }}" required>

                @if ($errors->has('last_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('last_name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <input id="email" type="email" class="form-control" name="email" placeholder="Email Address"
                       value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <input id="password" type="password" class="form-control" name="password" placeholder="Password"
                       required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                       placeholder="Confirm Password" required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn cBtn w-100">REGISTER</button>
            </div>
        </form>

        <span>Already have an account? <a href="{{ route('login') }}">Log in now!</a></span>
    </div>

@endsection
