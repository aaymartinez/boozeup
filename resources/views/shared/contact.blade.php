@extends('layouts.app')

@section('content')
    <div class="page-title w-100 d-block">
        <div class="container">
            <h3>CONTACT</h3>
        </div>
    </div>

    <div class="container main w-100 text-center">

        <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</div>
        <div class="font-weight-bold">contact@boozeup.com</div>
        <div class="font-weight-bold mb-5">0911 354 9874</div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p class="m-0">{{ $message }}</p>
            </div>
        @endif

        <form class="form-horizontal text-left" method="POST" action="{{ url('contact-us') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="font-weight-bold">Name</label>
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="font-weight-bold">Email address</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('mobile_number') ? ' has-error' : '' }}">
                <label for="mobile_number" class="font-weight-bold">Mobile Number (e.g. 09188887777)</label>
                <input id="mobile_number" type="text" class="form-control" name="mobile_number" value="{{ old('mobile_number') }}" required>

                @if ($errors->has('mobile_number'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('mobile_number') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                <label for="message" class="font-weight-bold">Message</label>
                <textarea id="message" name="message" class="form-control" rows="3" required></textarea>

                @if ($errors->has('message'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('message') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <button type="submit" class="btn cBtn w-100">SUBMIT</button>
            </div>
        </form>

    </div>

@endsection
