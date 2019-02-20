@extends('layouts.app')

@section('add-styles')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
@endsection

@section('content')
    <div class="page-title w-100 d-block">
        <div class="container">
            <h3>EDIT PROFILE</h3>
        </div>
    </div>

    <div class="container main">

        <form class="form-horizontal" method="POST" action="{{ action('Shared\ProfileController@update', $user->id) }}"  enctype="multipart/form-data">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PATCH">

            @if( $user->role_id == 3 )
                <div class="form-row mt-5 mb-2">
                    <div class="form-group{{ $errors->has('shop_name') ? ' has-error' : '' }} col-md-6">
                        <label for="shop_name">Shop Name</label>
                        <input id="shop_name" type="text" class="form-control" name="shop_name" value="{{ (old('shop_name')) ? old('shop_name') : $user->shop_name }}">
                        @if ($errors->has('shop_name'))
                            <span class="help-block text-danger">
                            <strong>{{ $errors->first('shop_name') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-md-6">
                        <label for="email">Email Address</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" readonly>
                        @if ($errors->has('email'))
                            <span class="help-block text-danger">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            @else
                <div class="form-row mt-5 mb-2">
                    <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }} col-md-6">
                        <label for="first_name">First Name</label>
                        <input id="first_name" type="text" class="form-control" name="first_name" value="{{ (old('first_name')) ? old('first_name') : $user->first_name }}">
                        @if ($errors->has('first_name'))
                            <span class="help-block text-danger">
                            <strong>{{ $errors->first('first_name') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }} col-md-6">
                        <label for="last_name">Last Name</label>
                        <input id="last_name" type="text" class="form-control" name="last_name" value="{{ (old('last_name')) ? old('last_name') : $user->last_name }}">
                        @if ($errors->has('last_name'))
                            <span class="help-block text-danger">
                            <strong>{{ $errors->first('last_name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-row mt-2 mb-2">
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-md-6">
                        <label for="email">Email Address</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" readonly>
                        @if ($errors->has('email'))
                            <span class="help-block text-danger">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('mobile_number') ? ' has-error' : '' }} col-md-6">
                        <label for="mobile_number">Mobile Number</label>
                        <input id="mobile_number" type="text" class="form-control" name="mobile_number" value="{{ (old('mobile_number')) ? old('mobile_number') : $user->mobile_number }}" required>
                        @if ($errors->has('mobile_number'))
                            <span class="help-block text-danger">
                            <strong>{{ $errors->first('mobile_number') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('birth_date') ? ' has-error' : '' }} col-md-6">
                        <label for="birth_date">Birthday</label>
                        <input id="birth_date" type="text" class="form-control" name="birth_date" value="{{ old('birth_date') ? old('birth_date') : date('m/d/Y') }}" required>
                        @if ($errors->has('birth_date'))
                            <span class="help-block text-danger">
                            <strong>{{ $errors->first('birth_date') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }} col-md-6">
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender" class="form-control" required>
                            <option value="">-Any-</option>
                            <option value="Male" {{ ($user->gender == 'Male') ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ ($user->gender == 'Female') ? 'selected' : '' }}>Female</option>
                        </select>
                        @if ($errors->has('gender'))
                            <span class="help-block text-danger">
                            <strong>{{ $errors->first('gender') }}</strong>
                        </span>
                        @endif
                    </div>

                </div>
            @endif

            <hr />

            <div class="form-row mt-2 mb-2">
                <div class="form-group{{ $errors->has('unit_floor') ? ' has-error' : '' }} col-md-6">
                    <label for="unit_floor">Unit & Floor No.</label>
                    <input id="unit_floor" type="text" class="form-control" name="unit_floor" value="{{ (old('unit_floor')) ? old('unit_floor') : $user->unit_floor }}" required>
                    @if ($errors->has('unit_floor'))
                        <span class="help-block text-danger">
                        <strong>{{ $errors->first('unit_floor') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('street') ? ' has-error' : '' }} col-md-6">
                    <label for="street">Street</label>
                    <input id="street" type="text" class="form-control" name="street" value="{{ (old('street')) ? old('street') : $user->street }}" required>
                    @if ($errors->has('street'))
                        <span class="help-block text-danger">
                        <strong>{{ $errors->first('street') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('building') ? ' has-error' : '' }} col-md-6">
                    <label for="building">Building</label>
                    <input id="building" type="text" class="form-control" name="building" value="{{ (old('building')) ? old('building') : $user->building }}" required>
                    @if ($errors->has('building'))
                        <span class="help-block text-danger">
                        <strong>{{ $errors->first('building') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('subdivision') ? ' has-error' : '' }} col-md-6">
                    <label for="subdivision">Subdivision/Apartment/Village</label>
                    <input id="subdivision" type="text" class="form-control" name="subdivision" value="{{ (old('subdivision')) ? old('subdivision') : $user->subdivision }}" required>
                    @if ($errors->has('building'))
                        <span class="help-block text-danger">
                        <strong>{{ $errors->first('building') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-row mt-2 mb-2">
                <div class="form-group{{ $errors->has('province') ? ' has-error' : '' }} col-md-6">
                    <label for="province">Province</label>
                    <input id="province" type="text" class="form-control" name="province" value="{{ (old('province')) ? old('province') : $user->province }}" required>
                    @if ($errors->has('province'))
                        <span class="help-block text-danger">
                        <strong>{{ $errors->first('province') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }} col-md-6">
                    <label for="city">City</label>
                    <input id="city" type="text" class="form-control" name="city" value="{{ (old('city')) ? old('city') : $user->city }}" required>
                    @if ($errors->has('city'))
                        <span class="help-block text-danger">
                        <strong>{{ $errors->first('city') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('barangay') ? ' has-error' : '' }} col-md-6">
                    <label for="barangay">Barangay</label>
                    <input id="barangay" type="text" class="form-control" name="barangay" value="{{ (old('barangay')) ? old('barangay') : $user->barangay }}" required>
                    @if ($errors->has('barangay'))
                        <span class="help-block text-danger">
                        <strong>{{ $errors->first('barangay') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('zip') ? ' has-error' : '' }} col-md-6">
                    <label for="zip">Zip Code</label>
                    <input id="zip" type="text" class="form-control" name="zip" value="{{ (old('zip')) ? old('zip') : $user->zip }}" required>
                    @if ($errors->has('zip'))
                        <span class="help-block text-danger">
                        <strong>{{ $errors->first('zip') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <hr />

            <div class="form-group{{ $errors->has('company_name') ? ' has-error' : '' }} mt-2 mb-2">
                <label for="company_name">Company Name</label>
                <input id="company_name" type="text" class="form-control" name="company_name" value="{{ (old('company_name')) ? old('company_name') : $user->company_name }}">
                @if ($errors->has('company_name'))
                    <span class="help-block text-danger">
                    <strong>{{ $errors->first('company_name') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('landmarks') ? ' has-error' : '' }} mt-2 mb-2">
                <label for="landmarks">Landmarks</label>
                <textarea name="landmarks" id="landmarks" class="form-control">{{ (old('landmarks')) ? old('landmarks') : $user->landmarks }}</textarea>
                @if ($errors->has('landmarks'))
                    <span class="help-block text-danger">
                    <strong>{{ $errors->first('landmarks') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('authorized_recipient') ? ' has-error' : '' }} mt-2 mb-2">
                <label for="authorized_recipient">Authorized Recipient's Name and Mobile No.</label>
                <input id="authorized_recipient" type="text" class="form-control" name="authorized_recipient" value="{{ (old('authorized_recipient')) ? old('authorized_recipient') : $user->authorized_recipient }}">
                @if ($errors->has('authorized_recipient'))
                    <span class="help-block text-danger">
                    <strong>{{ $errors->first('authorized_recipient') }}</strong>
                </span>
                @endif
            </div>

            <hr />

            <div class="form-group{{ $errors->has('id_verification') ? ' has-error' : '' }} mt-2 mb-2">
                <label for="id_verification">ID Verification</label>
                <input id="id_verification" type="file" class="form-control" name="id_verification" {{ ($user->id_verification) ? '': 'required' }}>
                <div>
                    @if($user->id_verification)
                        <img src="{{ Storage::url($user->id_verification) }}" alt="ID Verification" class="img-fluid" width="500">
                    @endif
                </div>
                @if ($errors->has('id_verification'))
                    <span class="help-block text-danger">
                    <strong>{{ $errors->first('id_verification') }}</strong>
                </span>
                @endif
            </div>

            <hr />

            <div class="form-group mt-2 mb-5 text-right">
                <button type="submit" class="btn cBtn rounded-0">Submit</button>
                <a href="{{ url('/profile') }}" class="btn cBtn rounded-0 ">Cancel</a>
            </div>
        </form>



    </div>

@endsection


@section('add-scripts')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
            integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
            crossorigin="anonymous"></script>
    <script>
        $(function() {
            $( '#birth_date' ).datepicker();
        });
    </script>
@endsection