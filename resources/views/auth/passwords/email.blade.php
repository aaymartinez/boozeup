@extends('layouts.landing')

@section('content')

    <div class="row login-top-right">
        <a href="/" class="btn cBtn" style="width: auto;">X</a>
    </div>

    <div class="center">
        <img src="{{ asset('images/BoozeUp_Logo_red.png') }}" alt="Booze Up!" class="img-fluid">

        <div class="text">
            <h4>RESET PASSWORD</h4>
        </div>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <input id="email" type="email" class="form-control" name="email" placeholder="E-Mail Address"
                       value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group buttons">
                <button type="submit" class="btn cBtn w-100">
                    Send Password Reset Link
                </button>
            </div>
        </form>
    </div>

@endsection
