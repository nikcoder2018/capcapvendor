@extends('layouts.app')
@section('stylesheets')
<style>
    .restaurants-button{
        float: left;
        font-size: 12px;
        font-family: Poppins;
        font-weight: 600;
        letter-spacing: .1px;
        background-color: #272727;
        padding: 10.5px 20px;
        margin-top: 20px;
        color: #fff;
        text-transform: uppercase;
    }
    .restaurants-button:hover{
        color: #fff !important;
    }
    .restaurants-button:focus{
        color: #fff !important;
    }
</style>
@endsection
@section('breadcrumbs')
<div class="bread-crumbs-wrapper">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}" title="" itemprop="url">Home</a></li>
            <li class="breadcrumb-item active">My Account</li>
        </ol>
    </div>
</div>
@endsection
@section('content')
@include('includes.search-panel',['location' => ''])

<div class="bread-crumbs-wrapper">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#" title="" itemprop="url">Home</a></li>
            <li class="breadcrumb-item active">Food Details</li>
        </ol>
    </div>
</div>

<section>
    <div class="block gray-bg bottom-padd210">
        <div class="sec-box bottom-padd140">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="sec-wrapper">
                            <div class="row">
                                <div class="col-md-8 col-sm-12 col-lg-8">
                                    <div class="">
                                        <div class="restaurant-detail-info">
                                            <div class="restaurant-detail-thumb">
                                                <ul class="restaurant-detail-img-carousel">
                                                    <li><img class="brd-rd3" src="{{Storage::disk('admin')->url($product->image_url)}}" itemprop="image"></li>
                                                </ul>

                                            </div>
                                            <div class="restaurant-detail-title">
                                                <h1 itemprop="headline">{{$product->title}}</h1> <br>
                                                <span class="price">${{$product->regular_price}}</span>
                                                
                                                <div>
                                                    {!!$product->description!!}
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 col-lg-4">
                                    <div class="featured-restaurant-box with-bg style2 brd-rd12 wow fadeIn" data-wow-delay="0.1s">
                                        <div class="featured-restaurant-thumb">
                                            <a href="{{route('vendors.details', $product->vendor->id)}}" title="" itemprop="url">
                                                @if($product->vendor->profile != null)
                                                    @if($product->vendor->profile->avatar != null)
                                                        <img src="{{Storage::disk('admin')->url($product->vendor->profile->avatar)}}" itemprop="image">
                                                    @else 
                                                    <img src="{{asset('images/resource/most-popular-img1.png')}}" itemprop="image">                                                                    @endif
                                                @else 
                                                <img src="{{asset('images/resource/most-popular-img1.png')}}" itemprop="image">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="featured-restaurant-info">
                                            <span class="red-clr">{{$product->vendor->address}}</span>
                                            <h4 itemprop="headline"><a href="{{route('vendors.details', $product->vendor->id)}}" title="" itemprop="url">{{$product->vendor->vendor_name}}</a></h4>
                                            <span class="food-types">Type served: <a href="#" title="" itemprop="url">Apple Juice</a>, <a href="#" title="" itemprop="url">BB.Q</a></span>
                                            <ul class="post-meta">
                                                <li><i class="fa fa-check-circle-o"></i> Min order $50</li>
                                                <li><i class="flaticon-transport"></i> 30min</li>
                                                <li><i class="flaticon-money"></i> Accepts cash & online payments</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div>
                                        <a class="brd-rd30 restaurants-button show-phone-number" href="javascript:void()" vendor-id="{{$product->vendor->id}}" phone-number="{{$product->vendor->profile->phone}}"><i class="fa fa-phone"></i> Show phone number</a>
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

<section>
    <div class="block no-padding red-bg">
        <img class="bottom-clouds-mockup" src="{{asset('images/resource/clouds2.png')}}" alt="clouds2.png" itemprop="image">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <div class="app-sec">
                        <div class="row">
                            <div class="col-md-4 hidden-sm col-md-offset-1 col-sm-4 col-sm-offset-0 col-lg-4 col-lg-offset-1">
                                <div class="app-mockup text-right overlape-110 wow fadeInUp" data-wow-delay="0.2s"><img src="{{asset('images/resource/app-mockup.png')}}" alt="app-mockup.png" itemprop="image"></div>
                            </div>
                            <div class="col-md-6 col-md-offset-1 col-sm-12 col-sm-offset-0 col-lg-6 col-lg-offset-1">
                                <div class="app-info">
                                    <h4 itemprop="headline">The Best Food Delivery App</h4>
                                    <p itemprop="description">We have a launch team that focuses on one city at a time. At the end of the day, we're a marketplace. In order to make an effective marketplace, you need critical mass. We need enough restaurants that  quality and variety</p>
                                    <div class="app-download-btns">
                                        <a class="wow zoomInUp" data-wow-delay="0.2s" href="#" title="Google Play Store" itemprop="url" target="_blank"><img src="{{asset('images/resource/app-download-btn1.png')}}" alt="app-download-btn1.png" itemprop="image"></a>
                                        <a class="wow zoomInUp" data-wow-delay="0.4s" href="#" title="Apple App Store" itemprop="url" target="_blank"><img src="{{asset('images/resource/app-download-btn2.png')}}" alt="app-download-btn2.png" itemprop="image"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- App Section -->
                </div>
            </div>
        </div>
    </div>
</section><!-- red section -->
@endsection

@section('scripts')
<script>
    $('.show-phone-number').on('click', function(){
        let vendor_id = $(this).attr('vendor-id');

        if($(this).hasClass('clicked')){
            $(this).html('<i class="fa fa-phone"></i> Show phone number');
            $(this).removeClass('clicked');
        }else{
            let phoneNumber = $(this).attr('phone-number');
            $(this).text(phoneNumber);
            $(this).addClass('clicked');

            $.get("{{route('vendors.view_phone')}}",{vendor_id});
        }
        
    });
</script>
@endsection