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
@section('content')
@include('includes.search-panel', ['location' => $location])

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
                                <div class="col-md-12 col-sm-12 col-lg-12">
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
                                                            @if($vendor->profile->type_served != null)<span class="food-types">Type served: {{$vendor->profile->type_served}}</span>@endif
                                                            <ul class="post-meta">
                                                                @if($vendor->profile->order_terms != null)<li><i class="fa fa-check-circle-o"></i> {{$vendor->profile->order_terms}}</li>@endif
                                                                @if($vendor->profile->payment_terms != null)<li><i class="flaticon-money"></i> {{$vendor->profile->payment_terms}}</li>@endif
                                                            </ul>
                                                            <div>
                                                                <a class="brd-rd30 restaurants-button show-phone-number" href="javascript:void()" vendor-id="{{$vendor->id}}" phone-number="{{$vendor->profile->phone}}"><i class="fa fa-phone"></i> Show phone number</a>
                                                                <a class="brd-rd30 restaurants-button" href="{{route('vendors.details', $vendor->id)}}" title="Order Online"><i class="fa fa-angle-double-right"></i> Visit Store</a>    
                                                            </div>
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