<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">
    

    <link rel="stylesheet" href="{{asset('css/icons.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/red-color.css')}}">
    <link rel="stylesheet" href="{{asset('css/yellow-color.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
</head>
<body itemscope>
    <main>
        @include('includes.preloader')
        @include('includes.header')

        @yield('content')

        @include('includes.footer')
        @include('includes.bottom-bar')
        @include('includes.popups')

    </main><!-- Main Wrapper -->

    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/plugins.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
</body>	
</html>