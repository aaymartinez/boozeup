@extends('layouts.admin')

@section('content')

    <h3>Add User</h3>

    <form class="form-horizontal" method="POST" action="{{ url('/admin/user') }}">
        {{ csrf_field() }}

        <div class="form-row mt-3 mb-2">
            <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }} col-md-6 col-lg-3">
                <label for="role">Role</label>
                <select name="role" id="role" class="form-control" required>
                    <option selected value="">-Any-</option>
                    <option value="1">Admin</option>
                    <option value="2">Buyer</option>
                    <option value="3">Seller</option>
                </select>
                @if ($errors->has('role'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('role') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-row mt-2 mb-2">
            <div class="form-group{{ $errors->has('shop_name') ? ' has-error' : '' }} col-md-6 col-lg-4 div-shop-name">
                <label for="shop_name">Shop Name</label>
                <input id="shop_name" type="text" class="form-control" name="shop_name" value="{{ old('shop_name') }}">
                @if ($errors->has('shop_name'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('shop_name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }} col-md-6 col-lg-4 div-name">
                <label for="first_name">First Name</label>
                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}">
                @if ($errors->has('first_name'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('first_name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }} col-md-6 col-lg-4 div-name">
                <label for="last_name">Last Name</label>
                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">
                @if ($errors->has('last_name'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('last_name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-row mt-2 mb-2">
            <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }} col-md-6 col-lg-4">
                <label for="birthday">Birthday</label>
                <input id="birthday" type="date" class="form-control" name="birthday" value="{{ old('birthday') }}" required>
                @if ($errors->has('birthday'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('birthday') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }} col-md-6 col-lg-4">
                <label for="mobile">Mobile Number</label>
                <input id="mobile" type="tel" class="form-control" name="mobile" value="{{ old('mobile') }}" required>
                @if ($errors->has('mobile'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('mobile') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }} col-md-6 col-lg-4">
                <label for="gender">Gender</label>
                <select name="gender" id="gender" class="form-control" required>
                    <option selected value="">-Any-</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                @if ($errors->has('gender'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('gender') }}</strong>
                    </span>
                @endif
            </div>

        </div>

        <div class="form-row mt-2 mb-2">
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-md-6 col-lg-4">
                <label for="email">Email Address</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} col-md-6 col-lg-4">
                <label for="password">Password</label>
                <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" required>
                @if ($errors->has('password'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }} col-md-6 col-lg-4">
                <label for="password-confirm">Confirm Password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" required>
                @if ($errors->has('password_confirmation'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <hr />

        <div class="form-row mt-2 mb-2">
            <div class="form-group{{ $errors->has('unitFloor') ? ' has-error' : '' }} col-md-6 col-lg-3">
                <label for="unitFloor">Unit & Floor No.</label>
                <input id="unitFloor" type="text" class="form-control" name="unitFloor" value="{{ old('unitFloor') }}" required>
                @if ($errors->has('unitFloor'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('unitFloor') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('street') ? ' has-error' : '' }} col-md-6 col-lg-3">
                <label for="street">Street</label>
                <input id="street" type="text" class="form-control" name="street" value="{{ old('street') }}" required>
                @if ($errors->has('street'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('street') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('building') ? ' has-error' : '' }} col-md-6 col-lg-3">
                <label for="building">Building</label>
                <input id="building" type="text" class="form-control" name="building" value="{{ old('building') }}" required>
                @if ($errors->has('building'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('building') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('subdivision') ? ' has-error' : '' }} col-md-6 col-lg-3">
                <label for="subdivision">Subdivision/Apartment/Village</label>
                <input id="subdivision" type="text" class="form-control" name="subdivision" value="{{ old('subdivision') }}" required>
                @if ($errors->has('building'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('building') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-row mt-2 mb-2">
            <div class="form-group{{ $errors->has('province') ? ' has-error' : '' }} col-md-6 col-lg-3">
                <label for="province">Province</label>
                <input id="province" type="text" class="form-control" name="province" value="{{ old('province') }}" required>
                @if ($errors->has('province'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('province') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }} col-md-6 col-lg-3">
                <label for="city">City</label>
                <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}" required>
                @if ($errors->has('city'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('city') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('barangay') ? ' has-error' : '' }} col-md-6 col-lg-3">
                <label for="barangay">Barangay</label>
                <input id="barangay" type="text" class="form-control" name="barangay" value="{{ old('barangay') }}" required>
                @if ($errors->has('barangay'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('barangay') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('zip') ? ' has-error' : '' }} col-md-6 col-lg-3">
                <label for="zip">Zip Code</label>
                <input id="zip" type="text" class="form-control" name="zip" value="{{ old('zip') }}" required>
                @if ($errors->has('zip'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('zip') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <hr />

        <div class="form-group{{ $errors->has('company') ? ' has-error' : '' }} mt-2 mb-2">
            <label for="company">Company Name</label>
            <input id="company" type="text" class="form-control" name="company" value="{{ old('company') }}">
            @if ($errors->has('company'))
                <span class="help-block text-danger">
                    <strong>{{ $errors->first('company') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('landmarks') ? ' has-error' : '' }} mt-2 mb-2">
            <label for="landmarks">Landmarks</label>
            <textarea name="landmarks" id="landmarks" class="form-control"></textarea>
            @if ($errors->has('landmarks'))
                <span class="help-block text-danger">
                    <strong>{{ $errors->first('landmarks') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('authorized') ? ' has-error' : '' }} mt-2 mb-2">
            <label for="authorized">Authorized Recipient's Name and Mobile No.</label>
            <input id="authorized" type="text" class="form-control" name="authorized" value="{{ old('authorized') }}">
            @if ($errors->has('authorized'))
                <span class="help-block text-danger">
                    <strong>{{ $errors->first('authorized') }}</strong>
                </span>
            @endif
        </div>

        <hr />

        <div class="form-group mt-2 mb-2 text-right">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ url('/admin/user') }}" class="btn btn-primary">Cancel</a>
        </div>
    </form>


@endsection
