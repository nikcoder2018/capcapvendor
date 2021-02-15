@extends('layouts.account')
@section('breadcrumbs')
<div class="bread-crumbs-wrapper">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}" title="" itemprop="url">Home</a></li>
            <li class="breadcrumb-item active">Pricing</li>
        </ol>
    </div>
</div>
@endsection
@section('content')
<div class="tabs-wrp account-settings brd-rd5">
    <h4 itemprop="headline">Pricing</h4>
    <div class="account-settings-inner">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class="white-bg">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-lg-6">
                            <div class="price-box brd-rd12 text-center active wow fadeIn" data-wow-delay="0.2s" style="background-image: url(&quot;assets/images/price-bg.png&quot;); visibility: visible; animation-delay: 0.2s; animation-name: fadeIn;">
                                <div class="price-header">
                                    <h1 itemprop="headline"><sup>$</sup>99</h1>
                                    <h6 itemprop="headline">MONTHLY</h6>
                                    <h3 itemprop="headline">Basic</h3>
                                </div>
                                <ul class="price-body">
                                    
                                </ul>
                                <a class="brd-rd4" href="#" title="" itemprop="url">LEARN MORE</a>
                            </div><!-- Price Box -->
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-6">
                            <div class="price-box text-center wow fadeIn" data-wow-delay="0.4s" style="background-image: url(&quot;assets/images/price-bg.png&quot;); visibility: visible; animation-delay: 0.4s; animation-name: fadeIn;">
                                <div class="price-header">
                                    <h1 itemprop="headline"><sup>$</sup>99</h1>
                                    <h6 itemprop="headline">MONTHLY</h6>
                                    <h3 itemprop="headline">Premium</h3>
                                </div>
                                <ul class="price-body">
                                    
                                </ul>
                                <a class="brd-rd4" href="#" title="" itemprop="url">LEARN MORE</a>
                            </div><!-- Price Box -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection