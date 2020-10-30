<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CapCap') }}</title>

    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">
    

    <link rel="stylesheet" href="{{asset('css/icons.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/red-color.css')}}">
    <link rel="stylesheet" href="{{asset('css/yellow-color.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
        .page-title-wrapper{
            display: flex !important;
            justify-content: center !important;
        }
        .loading {
            display: none;
            width: 16px;
            height: 16px;
            background-image: url(loading.gif);
            vertical-align: text-bottom;
        }
        /* autocomplete adds the ui-autocomplete-loading class to the textbox when it is _busy_, use general sibling combinator ingeniously */
        #input-search.ui-autocomplete-loading ~ .loading {
            display: inline-block;
        }

        .ui-front{
            z-index: 1;
        }

        .restaurant-search-form2{
            z-index: 2;
        }

    </style>
    @yield('stylesheets')
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
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function() {
        $( "#input-search").autocomplete({
            source: async function(request, response){
                    let data = await $.ajax({
                        url: "{{route('locations.all')}}",
                        dataType: "json",
                        data:{
                            search: $( "#input-search").val()
                        },
                        type: "GET"
                    });
                    response($.map(data.locations, function(item){
                        return {
                            label: item.country.name + ',' + item.name,
                            value: item.country.name + ',' + item.name
                        };
                    }));
                },
                select: function(event, ui){
                    location.href = "restaurants?location="+ui.item.value;
                }
            });
        });

    </script>
    @yield('scripts')
</body>	
</html>