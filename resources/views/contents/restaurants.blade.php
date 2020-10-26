@extends('layouts.app')
@section('stylesheets')
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
@endsection
@section('content')
<section>
    <div class="block">
        <div class="fixed-bg" style="background-image: url({{asset('images/topbg.jpg')}});"></div>
        <div class="page-title-wrapper text-center">
            <div class="col-md-8 col-sm-12 col-lg-8">
                <div class="page-title-inner">
                    <h1 itemprop="headline">Search your favourite restaurant location</h1>
                    <form class="restaurant-search-form brd-rd2">
                        <div class="row mrg10">
                            <div class="col-md-10 col-sm-9 col-lg-9 col-xs-12">
                                <div class="input-field brd-rd2">
                                    <input class="brd-rd2" id="input-search" name="location" type="text" placeholder="Search for Location" value="{{$location}}">
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-3 col-lg-3 col-xs-12">
                                <button class="brd-rd2 red-bg" type="submit">SEARCH</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="bread-crumbs-wrapper">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#" title="" itemprop="url">Home</a></li>
            <li class="breadcrumb-item"><a href="#" title="" itemprop="url">Search</a></li>
            <li class="breadcrumb-item active">Restaurants Found</li>
        </ol>
    </div>
</div>

<section>
    <div class="block gray-bg bottom-padd210">
        <div class="sec-box">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="top-restaurants-wrapper">
                        <ul class="restaurants-wrapper style2">
                            @php $delay = 0; @endphp
                            @if(count($AppTopVendors) > 0)
                                @foreach($AppTopVendors as $vendor)
                                    <li class="wow bounceIn" data-wow-delay="{{$delay+=0.2}}s">
                                        <div class="top-restaurant">
                                            <a class="brd-rd50" href="{{route('vendors.details', $vendor->id)}}" title="{{$vendor->vendor_name}}" itemprop="url">
                                                @if($vendor->profile != null)
                                                    @if($vendor->profile->avatar != null)
                                                        <img src="{{Storage::disk('admin')->url($vendor->profile->avatar)}}" itemprop="image">
                                                    @else 
                                                        <img src="{{asset('images/resource/top-restaurant1.png')}}" itemprop="image">
                                                    @endif
                                                @else 
                                                <img src="{{asset('images/resource/top-restaurant1.png')}}" itemprop="image">
                                                @endif
                                            </a>
                                        </div>
                                    </li>
                                @endforeach
                            @endif                        
                        </ul>
                    </div>
                        <div class="sec-wrapper top-padd80">
                            <div class="row">
                                <div class="col-md-3 col-sm-5 col-lg-3">
                                    <div class="sidebar">
                                        <div class="widget style2 Search_filters">
                                            <h4 class="widget-title2 sudo-bg-red" itemprop="headline">Search Filters</h4>
                                            <div class="widget-data">
                                                <ul>
                                                    <li><a href="#" title="" itemprop="url">Fast Food</a> <span>30</span></li>
                                                    <li><a href="#" title="" itemprop="url">North Indian</a> <span>28</span></li>
                                                    <li><a href="#" title="" itemprop="url">Chinese</a> <span>25</span></li>
                                                    <li><a href="#" title="" itemprop="url">Bakery</a> <span>11</span></li>
                                                    <li><a href="#" title="" itemprop="url">Mughlai</a> <span>7</span></li>
                                                    <li><a href="#" title="" itemprop="url">Pizza</a> <span>6</span></li>
                                                    <li><a href="#" title="" itemprop="url">Ice Cream</a> <span>6</span></li>
                                                    <li><a href="#" title="" itemprop="url">Rolls</a> <span>6</span></li>
                                                    <li><a href="#" title="" itemprop="url">Cafe</a> <span>5</span></li>
                                                    <li><a href="#" title="" itemprop="url">Italian</a> <span>5</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="widget style2 quick_filters">
                                            <h4 class="widget-title2 sudo-bg-red" itemprop="headline">Quick Filters</h4>
                                            <div class="widget-data">
                                                <ul>
                                                    <li><span class="radio-box"><input type="radio" name="filter" id="filt1-1"><label for="filt1-1">Promotions</label></span></li>
                                                    <li><span class="radio-box"><input type="radio" name="filter" id="filt1-2"><label for="filt1-2">Bookmarked</label></span></li>
                                                    <li><span class="radio-box"><input type="radio" name="filter" id="filt1-3"><label for="filt1-3">Pure veg</label></span></li>
                                                    <li><span class="radio-box"><input type="radio" name="filter" id="filt1-4"><label for="filt1-4">Free Delivery</label></span></li>
                                                    <li><span class="radio-box"><input type="radio" name="filter" id="filt1-5"><label for="filt1-5">Online Payments</label></span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div><!--Sidebar -->
                                </div>
                                <div class="col-md-9 col-sm-12 col-lg-9">
                                    <div class="remove-ext">
                                        <div class="row">
                                            @if(count($vendors) > 0)
                                                @foreach($vendors as $vendor)
                                                <div class="col-md-6 col-sm-6 col-lg-6">
                                                    <div class="featured-restaurant-box with-bg style2 brd-rd12 wow fadeIn" data-wow-delay="0.1s">
                                                        <div class="featured-restaurant-thumb">
                                                            <a href="{{route('vendors.details', $vendor->id)}}" title="" itemprop="url">
                                                                @if($vendor->profile != null)
                                                                    @if($vendor->profile->avatar != null)
                                                                        <img src="{{Storage::disk('admin')->url($vendor->profile->avatar)}}" itemprop="image">
                                                                    @else 
                                                                    <img src="{{asset('images/resource/most-popular-img1.png')}}" itemprop="image">                                                                    @endif
                                                                @else 
                                                                <img src="{{asset('images/resource/most-popular-img1.png')}}" itemprop="image">
                                                                @endif
                                                            </a>
                                                        </div>
                                                        <div class="featured-restaurant-info">
                                                            <span class="red-clr">{{$vendor->address}}</span>
                                                            <h4 itemprop="headline"><a href="{{route('vendors.details', $vendor->id)}}" title="" itemprop="url">{{$vendor->vendor_name}}</a></h4>
                                                            <span class="food-types">Type served: <a href="#" title="" itemprop="url">Apple Juice</a>, <a href="#" title="" itemprop="url">BB.Q</a></span>
                                                            <ul class="post-meta">
                                                                <li><i class="fa fa-check-circle-o"></i> Min order $50</li>
                                                                <li><i class="flaticon-transport"></i> 30min</li>
                                                                <li><i class="flaticon-money"></i> Accepts cash & online payments</li>
                                                            </ul>
                                                            <a class="brd-rd30" href="{{route('vendors.details', $vendor->id)}}" title="Order Online"><i class="fa fa-angle-double-right"></i> Visit Store</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            @else 
                                                <p>No restaurants found!</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- Section Box -->
    </div>
</section>
@endsection


@section('scripts')
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
@endsection