@php use Illuminate\Support\Facades\Storage; @endphp
@extends('layouts.app')
@section('stylesheets')
    <style>
        .page-title-wrapper{
            display: flex !important;
            justify-content: center !important;
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
                    <h1 itemprop="headline">Search your favourite food</h1>
                    <form class="restaurant-search-form brd-rd2" action="{{route('category', $category->slug)}}" method="GET">
                        <div class="row mrg10">
                            <div class="col-md-10 col-sm-9 col-lg-9 col-xs-12">
                                <div class="input-field brd-rd2"><input class="brd-rd2" type="text" name="search" placeholder="Food Name" value="{{$search}}"></div>
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
            <li class="breadcrumb-item active">Food</li>
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
                                            <h4 class="widget-title2 sudo-bg-red" itemprop="headline">Categories</h4>
                                            <div class="widget-data">
                                                <ul>
                                                    @if(count($AppCategories) > 0)
                                                        @foreach($AppCategories as $category)
                                                            @if(isset($category['parent']))
                                                                <li><a href="{{route('category', $category['parent']['slug'])}}" title="" itemprop="url">{{$category['parent']['name']}}</a></li>
                                                            @else 
                                                                <li><a href="{{route('category', $category->slug)}}" title="" itemprop="url">{{$category->slug}}</a></li>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div><!--Sidebar -->
                                </div>
                                <div class="col-md-9 col-sm-12 col-lg-9">
                                    <h3 class="marginb-0" itemprop="headline">{{$category->name}}</h3>
                                    <div class="remove-ext">
                                        <div class="row">
                                            @if(count($products) > 0)
                                                @foreach($products as $product)
                                                <div class="col-md-6 col-sm-12 col-lg-6">
                                                    <div class="featured-restaurant-box wow fadeIn" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeIn;">
                                                        <div class="featured-restaurant-thumb">
                                                            @if($product->image_url != '')
                                                            <a href="food-detail.html" title="" itemprop="url"><img src="{{Storage::disk('admin')->url($product->image_url)}}" itemprop="image"></a>
                                                            @else 
                                                            <a href="food-detail.html" title="" itemprop="url"><img src="{{asset('images/resource/featured-restaurant-img1.jpg')}}" itemprop="image"></a>
                                                            @endif
                                                        </div>
                                                        <div class="featured-restaurant-info">
                                                            <span class="red-clr">{{$product->vendor->vendor_name}}</span>
                                                            <h4 itemprop="headline"><a href="food-detail.html" title="" itemprop="url">{{$product->title}}</a></h4>
                                                            <span class="price">${{$product->regular_price}}</span>
    
                                                            <ul class="post-meta">
                                                                <li><i class="fa fa-check-circle-o"></i> Min order $50</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            @else 
                                            <p>No products found!</p>
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