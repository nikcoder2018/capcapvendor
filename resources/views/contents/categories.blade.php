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
        <div class="fixed-bg" style="background-image: url(@if($AppBannerImg != '') {{Storage::disk('admin')->url($AppBannerImg)}} @else {{asset('images/topbg.jpg')}} @endif);"></div>
        <div class="page-title-wrapper text-center">
            <div class="col-md-8 col-sm-12 col-lg-8">
                <div class="page-title-inner">
                    <h1 itemprop="headline">Search your favourite food</h1>
                    <form class="restaurant-search-form brd-rd2" action="{{route('category', $category->slug)}}" method="GET">
                        <div class="row mrg10">
                            <div class="col-md-6 col-sm-5 col-lg-5 col-xs-12">
                                <div class="input-field brd-rd2"><input class="brd-rd2" name="keyword" type="text" placeholder="Search food"></div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-lg-4 col-xs-12">
                                <div class="input-field brd-rd2"><i class="fa fa-map-marker"></i><input class="brd-rd2" type="text" id="input-location" name="location" placeholder="Search Location"><i class="fa fa-location-arrow"></i></div>
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
            <li class="breadcrumb-item"><a href="{{route('home')}}" title="" itemprop="url">Home</a></li>
            <li class="breadcrumb-item"><a href="#" title="" itemprop="url">Category</a></li>
            <li class="breadcrumb-item active">{{$category->name}}</li>
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
                                                @if($vendor->profile != null)
                                                    @if($vendor->profile->avatar != null)
                                                        <a class="brd-rd50" href="{{route('vendors.details', $vendor->id)}}" title="{{$vendor->vendor_name}}" itemprop="url" style="background-image:url({{Storage::disk('admin')->url($vendor->profile->avatar)}});"></a>
                                                    @else 
                                                        <a class="brd-rd50" href="{{route('vendors.details', $vendor->id)}}" title="{{$vendor->vendor_name}}" itemprop="url" style="background-image:url({{asset('images/resource/top-restaurant1.png')}});"></a>
                                                    @endif
                                                @else 
                                                    <a class="brd-rd50" href="{{route('vendors.details', $vendor->id)}}" title="{{$vendor->vendor_name}}" itemprop="url" style="background-image:url({{asset('images/resource/top-restaurant1.png')}});"></a>
                                                @endif
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
                                                        @foreach($AppCategories as $cat)
                                                            @if(isset($cat['parent']))
                                                                <li><a href="{{route('category', $cat['parent']['slug'])}}" title="" itemprop="url">{{$cat['parent']['name']}}</a></li>
                                                            @else 
                                                                <li><a href="{{route('category', $cat->slug)}}" title="" itemprop="url">{{$cat->name}}</a></li>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </div>

                                            <h4 class="widget-title2 sudo-bg-red" itemprop="headline">Type</h4>
                                            <div class="widget-data">
                                                <ul>
                                                    <li><a href="javascript:void(0)" onclick="addUrlParameter('type', 'delivery')" itemprop="url">Delivery</a></li>
                                                    <li><a href="javascript:void(0)" onclick="addUrlParameter('type', 'take_away')" itemprop="url">Take Away</a></li>
                                                </ul>
                                            </div>

                                            <h4 class="widget-title2 sudo-bg-red" itemprop="headline">Tags</h4>
                                            <div class="widget-data">
                                                <ul>
                                                    @foreach($tags as $tag)
                                                        <li><a href="javascript:void(0)" onclick="addUrlParameter('tags', '{{$tag->tag}}')" itemprop="url">{{$tag->tag}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div><!--Sidebar -->
                                </div>
                                <div class="col-md-9 col-sm-12 col-lg-9">
                                    <h3 class="marginb-0" itemprop="headline">{{$category->name}}</h3>
                                    <div class="remove-ext">
                                        <div class="row">
                                            @if(count($categoryProducts) > 0)
                                                @foreach($categoryProducts as $product)
                                                <div class="col-md-6 col-sm-12 col-lg-6">
                                                    <div class="featured-restaurant-box wow fadeIn" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeIn;">
                                                        <div class="featured-restaurant-thumb">
                                                            @if($product->image_url != '')
                                                            <a href="{{route('products.details', ['vendor' => $product->vendor_id, 'slug' => $product->slug])}}" title="" itemprop="url"><img src="{{Storage::disk('admin')->url($product->image_url)}}" itemprop="image"></a>
                                                            @else 
                                                            <a href="{{route('products.details', ['vendor' => $product->vendor_id, 'slug' => $product->slug])}}" title="" itemprop="url"><img src="{{asset('images/resource/featured-restaurant-img1.jpg')}}" itemprop="image"></a>
                                                            @endif
                                                        </div>
                                                        <div class="featured-restaurant-info">
                                                            <span class="red-clr">{{$product->vendor->vendor_name}}</span>
                                                            <h4 itemprop="headline"><a href="{{route('products.details', ['vendor' => $product->vendor_id, 'slug' => $product->slug])}}" title="" itemprop="url">{{$product->title}}</a></h4>
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

@section('scripts')
    <script>
        function addUrlParameter(key,value){
            var url = new URL(window.location);
            var queryParams = new URLSearchParams(url.search);

            if(queryParams.has(key)){
                queryParams.set(key, value);
            }else{
                queryParams.append(key, value);
            }

            document.location.href = window.location.origin + window.location.pathname + '?' + queryParams.toString();
        }

        $( "#input-location").autocomplete({
            source: async function(request, response){
                let data = await $.ajax({
                    url: "{{route('locations.all')}}",
                    dataType: "json",
                    data:{
                        search: $( "#input-location").val()
                    },
                    type: "GET"
                });
                response($.map(data.locations, function(item){
                    return {
                        label: item.country.name + ',' + item.name,
                        value: item.country.name + ',' + item.name
                    };
                }));
            }
        });

        $('.restaurant-search-form').on('submit', function(e){
            e.preventDefault();
            let serializeArray = $(this).serializeArray();
            var url = new URL(window.location);
            var queryParams = new URLSearchParams(url.search);

            $.each(serializeArray, function(key, item){
                if(queryParams.has(item.name)){
                    queryParams.set(item.name, item.value);
                }else{
                    queryParams.append(item.name, item.value);
                }
            });

            document.location.href = window.location.origin + window.location.pathname + '?' + queryParams.toString();
        });
    </script>
@endsection