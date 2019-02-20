<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Booze Up!') }}</title>

    <!-- Styles -->
    @yield('add-styles')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- removed as per decdec 01/30/2019 --}}
    {{--@if(!Auth::user()->is_profile_complete)--}}
        {{--<script>--}}
            {{--var loc = location.pathname;--}}
            {{--if (loc != '/profile') {--}}
                {{--window.location = "/profile";--}}
            {{--}--}}
        {{--</script>--}}
    {{--@endif--}}
</head>
<body class="{{ $view_name }}">
    <div class="container-fluid" id="app">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-light w-100 pt-0 pb-0">
                <a class="navbar-brand" href="{{ url('index') }}">
                    <img src="{{ asset('images/BoozeUp_Logo_red.png') }}" alt="Booze Up!" class="brand">
                </a>

                <form class="form-inline search ml-auto mr-2">
                    <input class="form-control rounded-0 col-sm-10" type="search" placeholder="Search for product, brand, type, seller" aria-label="Search">
                    <button class="btn rounded-0 col-sm-2" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <form class="form-inline search2 ml-auto mr-2">
                        <input class="form-control rounded-0 mr-auto col-10 col-md-10" type="search" placeholder="Search for product, brand, type, seller" aria-label="Search">
                        <button class="btn rounded-0 col-2 col-md-1" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('index') }}">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('news') }}">NEWS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('about') }}">ABOUT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('booze') }}">BOOZE</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('products') }}">PRODUCTS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact-us.index') }}">CONTACT</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav">
                        <li class="nav-item dup1">
                            <a class="nav-link iconRed" data-toggle="modal" data-target=".cart-modal"><i class="fa fa-shopping-cart" aria-hidden="true"></i> ({{ $carts->count() }})</a>
                        </li>
                        {{--<li class="nav-item dup1">--}}
                            {{--<a class="nav-link iconRed" href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a>--}}
                        {{--</li>--}}
                        <li class="nav-item dropdown profile">
                            <a class="nav-link dropdown-toggle iconRed" href="#" id="profileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                <span class="dup1 user">Hi {{ (Auth::user()->first_name) ? Auth::user()->first_name : Auth::user()->shop_name }}!</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown">
                                <a class="dropdown-item" href="{{ url('profile') }}">Profile</a>
                                <a class="dropdown-item" href="{{ url('wishlist') }}">Wishlist</a>
                                @if( Auth::user()->role_id === 3 )
                                    <a class="dropdown-item" href="{{ url('inventory') }}">Inventory</a>
                                @endif
                                <a class="dropdown-item" href="{{ url('transaction') }}">Transactions</a>

                                <a class="dropdown-item dup2" href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Shopping Cart</a>
                                {{--<a class="dropdown-item dup2" href="#"><i class="fa fa-envelope" aria-hidden="true"></i> Messages</a>--}}
                                <a href="{{ route('logout') }}" class="dropdown-item dup2 btn cBtn rounded-0"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out" aria-hidden="true"></i> LOG OUT
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                        <li class="nav-item dup1">
                            <a href="{{ route('logout') }}" class="btn cBtn rounded-0"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out" aria-hidden="true"></i> LOG OUT
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="content">
            <div class="row">
                @yield('content')
            </div>
        </div>


        <footer>
            <div class="row">
                <div class="footer-left d-block col-lg-6 col-md-4">
                    <ul>
                        <li>
                            <a href="{{ url('index') }}">
                                <img src="{{ asset('images/BoozeUp_Logo.png') }}" alt="Booze Up!" class="brand">
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('index') }}">HOME</a>
                        </li>
                        <li>
                            <a href="{{ url('news') }}">NEWS</a>
                        </li>
                        <li>
                            <a href="{{ url('about') }}">ABOUT</a>
                        </li>
                        <li>
                            <a href="{{ url('booze') }}">BOOZE</a>
                        </li>
                        <li>
                            <a href="{{ url('products') }}">PRODUCTS</a>
                        </li>
                        <li>
                            <a href="{{ route('contact-us.index') }}">CONTACT</a>
                        </li>
                    </ul>
                </div>

                <div class="footer-right d-block text-right col-lg-6 col-md-8">
                    <ul>
                        <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ab adipisci.</li>
                        <li>A ab adipisci corporis doloremque exercitationem expedita.</li>
                    </ul>
                </div>
            </div>

        </footer>


        {{-- Cart modal --}}
        @include('shared.carts')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('add-scripts')

</body>
</html>
