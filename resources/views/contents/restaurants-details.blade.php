@extends('layouts.app')

@section('content')
<div class="bread-crumbs-wrapper">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}" title="" itemprop="url">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('vendors')}}" title="" itemprop="url">Restaurant</a></li>
            <li class="breadcrumb-item active">Restaurant Details</li>
        </ol>
    </div>
</div>

<section>
    <div class="block gray-bg">
        <div class="sec-box">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="sec-wrapper">
                            <div class="row">
                                <div class="col-md-8 col-sm-12 col-lg-8">
                                    <div class="restaurant-detail-wrapper">
                                        <div class="restaurant-detail-info">
                                            <div class="restaurant-detail-thumb">
                                                <ul class="restaurant-detail-img-carousel">
                                                    <li><img class="brd-rd3" src="{{Storage::disk('admin')->url($vendor->profile->avatar)}}" alt="restaurant-detail-big-img1-1.jpg" itemprop="image"></li>
                                                </ul>
                                            </div>
                                            <div class="restaurant-detail-title">
                                                <h1 itemprop="headline">{{$vendor->vendor_name}}</h1>
                                                <div class="info-meta">
                                                    <span>{{$vendor->profile->address}}</span>
                                                    <span>{{$vendor->country}}</span>
                                                    <span>{{$vendor->city}}</span>
                                                </div>
                                                <p>{{$vendor->profile->about}}</p>
                                            </div>
                                            <div class="restaurant-detail-tabs">
                                                <ul class="nav nav-tabs">
                                                    <li class="active"><a href="#tab1-1" data-toggle="tab"><i class="fa fa-cutlery"></i> Products</a></li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane fade in active" id="tab1-1">
                                                        <div class="dishes-list-wrapper">
                                                            <ul class="dishes-list">
                                                                @foreach($products as $product)
                                                                <li class="wow fadeInUp" data-wow-delay="0.1s">
                                                                    <div class="featured-restaurant-box">
                                                                        <div class="featured-restaurant-thumb">
                                                                            <a href="#" title="" itemprop="url"><img src="{{Storage::disk('admin')->url($product->image_url)}}" itemprop="image"></a>
                                                                        </div>
                                                                        <div class="featured-restaurant-info">
                                                                            <h4 itemprop="headline"><a href="#" title="" itemprop="url">{{$product->title}}</a></h4>
                                                                            <span class="price">${{$product->regular_price}}</span>
                                                                            <p itemprop="description">{{$product->description}}</p>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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