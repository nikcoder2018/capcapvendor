@extends('layouts.app')

@section('content')
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
                            <li class="wow bounceIn" data-wow-delay="0.2s"><div class="top-restaurant"><a class="brd-rd50" href="#" title="Restaurant 1" itemprop="url"><img src="{{asset('images/resource/top-restaurant1.png')}}" alt="top-restaurant1.png" itemprop="image"></a></div></li>
                            <li class="wow bounceIn" data-wow-delay="0.4s"><div class="top-restaurant"><a class="brd-rd50" href="#" title="Restaurant 2" itemprop="url"><img src="{{asset('images/resource/top-restaurant2.png')}}" alt="top-restaurant2.png" itemprop="image"></a></div></li>
                            <li class="wow bounceIn" data-wow-delay="0.6s"><div class="top-restaurant"><a class="brd-rd50" href="#" title="Restaurant 3" itemprop="url"><img src="{{asset('images/resource/top-restaurant3.png')}}" alt="top-restaurant3.png" itemprop="image"></a></div></li>
                            <li class="wow bounceIn" data-wow-delay="0.8s"><div class="top-restaurant"><a class="brd-rd50" href="#" title="Restaurant 4" itemprop="url"><img src="{{asset('images/resource/top-restaurant4.png')}}" alt="top-restaurant4.png" itemprop="image"></a></div></li>
                            <li class="wow bounceIn" data-wow-delay="1s"><div class="top-restaurant"><a class="brd-rd50" href="#" title="Restaurant 5" itemprop="url"><img src="{{asset('images/resource/top-restaurant5.png')}}" alt="top-restaurant5.png" itemprop="image"></a></div></li>
                            <li class="wow bounceIn" data-wow-delay="1.2s"><div class="top-restaurant"><a class="brd-rd50" href="#" title="Restaurant 5" itemprop="url"><img src="{{asset('images/resource/top-restaurant6.png')}}" alt="top-restaurant6.png" itemprop="image"></a></div></li>
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
                                                            <a href="{{route('vendors.details', $vendor->id)}}" title="" itemprop="url"><img src="{{asset('images/resource/most-popular-img1.png')}}" alt="most-popular-img1.png" itemprop="image"></a>
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