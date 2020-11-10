<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {!!$AppHeaderScript!!}

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">
    
    <link rel="stylesheet" href="{{asset('plugins/sweetalert2/dist/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/icons.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

    @yield('plugins_css')
    
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/red-color.css')}}">
    <link rel="stylesheet" href="{{asset('css/yellow-color.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">

    <style>
        .swal2-popup {
            font-size: 1.6rem !important;
        }
    </style>
    @yield('stylesheets')
</head>
<body itemscope>
    <main>
        @include('includes.preloader')
        @include('includes.header')

        @yield('breadcrumbs')
        @if($AppDashboardBannerImg != '')
        <section>
            <div class="block">
                <div class="fixed-bg" style="background-image: url({{Storage::disk('admin')->url($AppDashboardBannerImg)}});"></div>
            </div>
        </section>
        @endif
        <section>
            <div class="block less-spacing gray-bg">
                <div class="sec-box bottom-padd140">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <div class="dashboard-tabs-wrapper">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12 col-lg-4">
                                            <div class="profile-sidebar brd-rd5 wow fadeIn" data-wow-delay="0.2s">
                                                @include('includes.userpanel-sidebar')
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-sm-12 col-lg-8">
                                            @yield('content')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- Section Box -->
            </div>
        </section>
        
        @include('includes.footer')
        @include('includes.bottom-bar')
        @include('includes.popups')

    </main><!-- Main Wrapper -->

    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/plugins.js')}}"></script>
    <script src="{{asset('plugins/sweetalert2/dist/sweetalert2.min.js')}}"></script>
    @yield('plugins_js')

    {!!$AppFooterScript!!}

    <script src="{{asset('js/main.js')}}"></script>

    @yield('scripts')
</body>	
</html>