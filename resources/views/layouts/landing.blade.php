<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Booze Up!') }}</title>

    <!-- Fonts -->
    {{--<link href="https://fonts.googleapis.com/css?family=Proxima:100,600" rel="stylesheet" type="text/css">--}}

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <style>
        /* Default */
        html {
            height: 100%;
        }

        body {
            height: 100%;
            min-height: 100%;
            margin: 0;
            padding: 0;
            position: relative;
            display: block;
            font-size: 12px;
            background: url("{{ asset('images/bg-image-homepage.png') }}") no-repeat;
            background-size: cover;
        }

        .row {
            margin: 0;
        }

        .landing-page {
            height: 100%;
            padding: 0;
        }

        .content {
            height: 100%;
        }

        .btn {
            cursor: pointer;
        }

        /* brand logo */
        .brand {
            height: 70px;
        }

        .wrapper {
            height: 89%;
            align-items: center;
            width: 70%;
            padding: 0 3em;
        }

        .left {
            color: #FFFFFF;
        }

        /* right */
        .right {
            background: #FFFFFF;
            text-align: center;
            color: #000000;
            min-height: 100%;
            width: 100%;
            padding-bottom: 10rem;
        }

        .right .login-top-right, .right .login-x-top-right {
            padding: 15px;
            text-align: right;
            display: block;
        }

        .right .login-top-right .cBtn {
            width: 200px;
        }

        .right img {
            height: 180px;
        }

        .right .cBtn {
            background: #93201B;
            color: #FFFFFF;
            font-weight: bold;
        }

        .right .center {
            padding: 0 5rem;
        }

        .right .center h4 {
            font-weight: bold;
        }

        .right .center .cBtn {
            display: grid;
        }
        .right .center .buttons .cBtn {
            margin: 5px 0;
        }

        /* footer */
        .lp-footer {
            background: #000000;
            color: #FFFFFF;
            position: absolute;
            right: 0;
            bottom: 0;
            left: 0;
            width: 100%;
        }


        /*Extra small devices (portrait phones, less than 576px)*/
        @media (max-width: 575px) {
            .lp-footer .text {
                text-align: left !important;
            }
        }

        /*Small devices (landscape phones, less than 768px)*/
        @media (max-width: 767px) {
            .right .center {
                padding: 0;
            }

            .lp-footer {
                padding-bottom: 20px;
            }
        }

        /*Medium devices (tablets, less than 992px)*/
        @media (max-width: 991px) {
            body {
                height: auto;
                background: #FFFFFF;
            }
            .left {
                display: none;
            }
        }

        /*Medium devices (tablets, less than 992px)*/
        @media (max-height: 600px) {
            body {
                height: auto;
            }
        }

        #ageCheckerModal .modal-header {
            background: #000000;
            color: #FFFFFF;
        }

        #ageCheckerModal .dot {
            font-size: 3em;
            padding-bottom: 10px;
            padding-right: 15px;
            padding-left: 6px;
            margin-top: -10px;
        }

        #ageCheckerModal .cBtn {
            background: #93201B;
            color: #FFFFFF;
        }

        #ageCheckerModal .cBtn:hover  {
            cursor:pointer;
            background: #93201B;
            color: #FFFFFF;
        }

        #ageCheckerModal form .col, #ageCheckerModal form .col-4 {
            padding: 0 !important;
        }
        #ageCheckerModal form .form-control {
            padding: 1rem 10px !important;
        }


        @yield('style')
    </style>
</head>
<body class="@yield('body_class')">
    <div class="container-fluid landing-page">
        <div class="content">
            <div class="row" style="height: 100%;">
                <div class="col-xl-6 col-lg-6 left">
                    <div class="row">
                        <img src="{{ asset('images/BoozeUp_Logo.png') }}" alt="Booze Up!" class="brand">
                    </div>

                    <div class="row wrapper">
                        <div>
                            <h4>LARGE TEXT HERE</h4>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Doloribus fugiat laudantium molestias necessitatibus, nobis
                                provident quas rerum sequi velit vero? Adipisci dignissimos
                                ducimus neque, perspiciatis placeat rem reprehenderit totam voluptas.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6 right">
                    @yield('content')
                </div>
            </div>
        </div>


        <div class="lp-footer">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 logo">
                    <img src="{{ asset('images/BoozeUp_Logo.png') }}" alt="Booze Up!" class="brand">
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 text my-auto text-right">
                    <span>Copyright 2017. Lorem ipsum dolor sit amet.</span> <br />
                    <span>consectetur adipisicing elit.</span>
                </div>
            </div>
        </div>
    </div>


    <!-- Age Checker Modal -->
    <div class="modal fade" id="ageCheckerModal" tabindex="-1" role="dialog" aria-labelledby="ageCheckerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content rounded-0">
                <div class="modal-header rounded-0">
                    <h5 class="modal-title" id="ageCheckerModalLabel">HOLD ON</h5>
                </div>
                <div class="modal-body text-center">
                    <div class="font-weight-bold">
                        Are you of legal age?
                    </div>
                    <div>
                        Please enter your date of birth to confirm
                    </div>

                    <form class="form-horizontal" action="{{ url('./ageCheck') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row mt-3">
                            <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }} col">
                                <input type="text" id="dob" name="dob" placeholder="MM/DD/YYYY" class="form-control rounded-0" value="{{ old('dob') }}" required>
                            </div>

                            {{--<div class="form-group{{ $errors->has('month') ? ' has-error' : '' }} col">--}}
                                {{--<input type="text" id="month" name="month" maxlength="2" placeholder="MM" class="form-control rounded-0" value="{{ old('month') }}" required>--}}
                            {{--</div>--}}
                            {{--<span class="col-1 font-weight-bold dot">.</span>--}}
                            {{--<div class="form-group{{ $errors->has('day') ? ' has-error' : '' }} col">--}}
                                {{--<input type="text" id="day" name="day" maxlength="2" placeholder="DD" class="form-control rounded-0" value="{{ old('day') }}" required>--}}
                            {{--</div>--}}
                            {{--<span class="col-1  font-weight-bold dot">.</span>--}}
                            {{--<div class="form-group{{ $errors->has('year') ? ' has-error' : '' }} col-4">--}}
                                {{--<input type="text" id="year" name="year" maxlength="4" placeholder="YYYY" class="form-control rounded-0" value="{{ old('year') }}" required>--}}
                            {{--</div>--}}
                        </div>

                        <div class="row errorDiv mb-3" style="color:red;">
                            {{--<div class="month" style="display: none;">Month must be 2 digits and Between 1-12.</div>--}}
                            {{--<div class="day" style="display: none;">Day must be 2 digits and Between 1-31.</div>--}}
                            {{--<div class="year" style="display: none;">Year must be 4 digits.</div>--}}
                            <div class="dob" style="display: none;">Age must be 18 and above.</div>

                        </div>

                        <button type="submit" class="btn cBtn w-100 font-weight-bold rounded-0">SUBMIT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{ asset('js/landing.js') }}"></script>

</body>
</html>
