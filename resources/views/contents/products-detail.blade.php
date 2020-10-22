@extends('layouts.account')

@section('content')
<div class="tabs-wrp">
    <div class="restaurant-detail-wrapper">
        <div class="restaurant-detail-info">
            <div class="restaurant-detail-thumb">
                <ul class="restaurant-detail-img-carousel">
                    <li><img class="brd-rd3" src="{{Storage::disk('admin')->url($product->image_url)}}" alt="restaurant-detail-big-img1-1.jpg" itemprop="image"></li>
                </ul>
            </div>
            <div class="restaurant-detail-title">
                <h1 itemprop="headline">{{$product->title}}</h1> <br>
                <span class="price">${{$product->regular_price}}</span> <br>
                {!!$product->description!!} <br>
                <a class="brd-rd3" href="#" title="" itemprop="url">Contact Vendor</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>

    </script>
@endsection