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
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>

<body class="{{ $view_name }} fixed-nav sticky-footer bg-dark" id="page-top">

@extends('layouts.admin-navigation')

<div class="content-wrapper">
    <div class="container-fluid" id="app">

        @yield('content')

    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
        <div class="container">
            <div class="text-center">
                <small>Copyright © Booze Up! 2017</small>
            </div>
        </div>
    </footer>


    <!-- Scripts -->
    <script src="{{ asset('js/admin.js') }}"></script>
</div>
</body>

</html>
