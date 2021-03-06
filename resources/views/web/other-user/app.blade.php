<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="initial-scale=1,user-scalable=no">
    <link rel="icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="{{ elixir('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ elixir('assets/css/zoom.css') }}">
    <link rel="stylesheet" href="{{ elixir('assets/css/navbar.css') }}">
    <link rel="stylesheet" href="{{ elixir('assets/css/sidenav.css') }}">
</head>

<body>
<div class="container-fluid unToggled">
    @include('layouts.navbar')
    <div class="row">
        <div class="col-xs-12" id="user-sidenav">
            @include('layouts.other-sidebar')
        </div>
        <div class="col-lg-8 col-lg-offset-4 col-md-8 col-md-offset-4 col-sm-8 col-sm-offset-4 col-xs-12"
             id="content-area">
            @yield('content')
            @include('layouts.footer')
        </div>
    </div>
</div>
@include('web.component.back-top')

</body>
<script src="{{ elixir('js/jquery.js') }}"></script>
<script src="{{ elixir('js/bootstrap.js') }}"></script>
<script src="{{ elixir('assets/js/vue.min.js') }}"></script>
<script src="{{ elixir('js/zoom.min.js') }}"></script>
<script src="{{ elixir('assets/js/common.js')}}"></script>
@yield('extra-css-js')
</html>
