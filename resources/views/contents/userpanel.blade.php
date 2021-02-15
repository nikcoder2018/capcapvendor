@extends('layouts.account')

@section('content')
<div class="dashboard-wrapper">
    <div class="welcome-note brd-rd5">
        <h4 itemprop="headline">{{$banner->title}}</h4>
        <p itemprop="description">{{$banner->subtitle}}</p>
        <img src="{{Storage::disk('admin')->url($banner->image)}}" alt="welcome-note-img.png" itemprop="image" style="width:100%;height:140px;">
        <a class="remove-noti" href="#" title="" itemprop="url"><img src="{{asset('images/close-icon.png')}}" alt="close-icon.png" itemprop="image"></a>
    </div>
    <div class="remove-ext text-center">
        <div class="row" style="display: flex; justify-content:center">
            <div class="col-md-4 col-sm-4 col-lg-3">
                <div class="step-box wow fadeIn" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeIn;">
                    <i><img src="{{asset('images/product.png')}}" alt="setp-img1.png" itemprop="image"> <span class="brd-rd50 red-bg">{{$totalProducts}}</span></i>
                    <div class="setp-box-inner">
                        <h5 itemprop="headline">Products</h5>
                    </div>
                </div><!-- Step Box -->
            </div>
            <div class="col-md-4 col-sm-4 col-lg-3">
                <div class="step-box wow fadeIn" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeIn;">
                    <i><img src="{{asset('images/phone.png')}}" alt="setp-img2.png" itemprop="image"> <span class="brd-rd50 red-bg">{{$totalPhoneViews}}</span></i>
                    <div class="setp-box-inner">
                        <h5 itemprop="headline">Last 30 Days Phone Views</h5>
                    </div>
                </div><!-- Step Box -->
            </div>
            <div class="col-md-4 col-sm-4 col-lg-3">
                <div class="step-box wow fadeIn" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeIn;">
                    <i><img src="{{asset('images/views.png')}}" alt="setp-img3.png" itemprop="image"> <span class="brd-rd50 red-bg">{{$totalProductVisits}}</span></i>
                    <div class="setp-box-inner">
                        <h5 itemprop="headline">Last 30 Days Product Views</h5>
                    </div>
                </div><!-- Step Box -->
            </div>
        </div>
    </div>
</div>
@endsection