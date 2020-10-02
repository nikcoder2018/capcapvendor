@extends('layouts.account')

@section('breadcrumbs')
<div class="bread-crumbs-wrapper">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#" title="" itemprop="url">Home</a></li>
            <li class="breadcrumb-item active">Profile</li>
        </ol>
    </div>
</div>
@endsection
@section('content')
<div class="dashboard-wrapper brd-rd5">
    <div class="welcome-note yellow-bg brd-rd5">
        <h4 itemprop="headline">WELCOME TO YOUR ACCOUNT</h4>
        <p itemprop="description">Things that get tricky are things like burgers and fries, or things that are deep-fried. We do have a couple of burger restaurants that are capable of doing a good</p>
        <img src="{{asset('images/resource/welcome-note-img.png')}}" alt="welcome-note-img.png" itemprop="image">
        <a class="remove-noti" href="#" title="" itemprop="url"><img src="{{asset('images/close-icon.png')}}" alt="close-icon.png" itemprop="image"></a>
    </div>
    <div class="dashboard-title">
        <h4 itemprop="headline">SUGGESTED RESTAURANTS</h4>
        <span>Define <a class="red-clr" href="#" title="" itemprop="url">Search criteria</a> to search for specific</span>
    </div>
    <div class="restaurants-list">
        <div class="featured-restaurant-box style3 brd-rd5 wow fadeInUp" data-wow-delay="0.2s">
            <div class="featured-restaurant-thumb"><a href="#" title="" itemprop="url"><img src="assets/images/resource/restaurant-logo1-1.png" alt="restaurant-logo1-1.png" itemprop="image"></a></div>
            <div class="featured-restaurant-info">
                <span class="red-clr">5th Avenue New York 68</span>
                <h4 itemprop="headline"><a href="#" title="" itemprop="url">Domino's Pizza</a></h4>
                <ul class="post-meta">
                    <li><i class="fa fa-check-circle-o"></i> Min order $50</li>
                    <li><i class="flaticon-transport"></i> 30min</li>
                </ul>
            </div>
            <div class="view-menu-liks">
                <span class="red-bg brd-rd4 post-likes"><i class="fa fa-heart-o"></i> 12</span>
                <a class="brd-rd3" href="#" title="" itemprop="url">View Menu</a>
            </div>
        </div>
        <div class="featured-restaurant-box style3 brd-rd5 wow fadeInUp" data-wow-delay="0.3s">
            <div class="featured-restaurant-thumb"><a href="#" title="" itemprop="url"><img src="assets/images/resource/restaurant-logo1-2.png" alt="restaurant-logo1-2.png" itemprop="image"></a></div>
            <div class="featured-restaurant-info">
                <span class="red-clr">5th Avenue New York 68</span>
                <h4 itemprop="headline"><a href="#" title="" itemprop="url">Pizza Hut</a></h4>
                <ul class="post-meta">
                    <li><i class="fa fa-check-circle-o"></i> Min order $40</li>
                    <li><i class="flaticon-transport"></i> 30min</li>
                </ul>
            </div>
            <div class="view-menu-liks">
                <span class="red-bg brd-rd4 post-likes"><i class="fa fa-heart-o"></i> 20</span>
                <a class="brd-rd3" href="#" title="" itemprop="url">View Menu</a>
            </div>
        </div>
        <div class="featured-restaurant-box style3 brd-rd5 wow fadeInUp" data-wow-delay="0.4s">
            <div class="featured-restaurant-thumb"><a href="#" title="" itemprop="url"><img src="assets/images/resource/restaurant-logo1-3.png" alt="restaurant-logo1-3.png" itemprop="image"></a></div>
            <div class="featured-restaurant-info">
                <span class="red-clr">5th Avenue New York 68</span>
                <h4 itemprop="headline"><a href="#" title="" itemprop="url">Burger King</a></h4>
                <ul class="post-meta">
                    <li><i class="fa fa-check-circle-o"></i> Min order $100</li>
                    <li><i class="flaticon-transport"></i> 30min</li>
                </ul>
            </div>
            <div class="view-menu-liks">
                <span class="red-bg brd-rd4 post-likes"><i class="fa fa-heart-o"></i> 15</span>
                <a class="brd-rd3" href="#" title="" itemprop="url">View Menu</a>
            </div>
        </div>
    </div>
</div>
@endsection