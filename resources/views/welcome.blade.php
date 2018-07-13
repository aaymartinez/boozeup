@extends('layouts.landing')

@section('style')
    /* for help page */
    .body__landing .right {
        padding-bottom: 13rem;
    }
@endsection

@section('body_class', 'body__landing')

@section('content')
    <div class="row login-top-right">
        <a href="{{ route('login') }}" class="btn cBtn">LOGIN</a>
    </div>

    <div class="center">
        <img src="{{ asset('images/BoozeUp_Logo_red.png') }}" alt="Booze Up!" class="img-fluid">
        <div class="text">
            <h4>REGISTER</h4>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                A, cumque dolores eius eligendi esse harum impedit nemo.
            </p>
        </div>

        <div class="buttons help">
            <a class="btn cBtn" href="{{ route('register') }}">REGISTER AS USER</a>
            <a class="btn cBtn" href="{{ url('register-seller') }}">REGISTER AS SHOP OWNER</a>
            <a href="{{ url('help') }}">Need help?</a>
        </div>
    </div>
@endsection