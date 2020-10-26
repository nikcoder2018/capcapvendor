@extends('layouts.app')

@section('stylesheets')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style>
    .loading {
        display: none;
        width: 16px;
        height: 16px;
        background-image: url(loading.gif);
        vertical-align: text-bottom;
    }
    /* autocomplete adds the ui-autocomplete-loading class to the textbox when it is _busy_, use general sibling combinator ingeniously */
    #input-search.ui-autocomplete-loading ~ .loading {
        display: inline-block;
    }

    .ui-front{
        z-index: 1;
    }

    .restaurant-search-form2{
        z-index: 2;
    }

</style>
@endsection
@section('content')
<section>
    <div class="block blackish low-opacity">
        <div class="fixed-bg" style="background-image: url({{'images/parallax2.jpg'}});"></div>
        <div class="restaurant-searching style2 text-center">
            <div class="restaurant-searching-inner">
                <span>Delicious <i>Food</i> </span>
                <h2 itemprop="headline">Order Delivery & Take-Out</h2>
                <form class="restaurant-search-form2 brd-rd30" action="{{route('vendors')}}" method="GET">
                    <input class="brd-rd30" id="input-search" name="location" type="text" placeholder="Search for a Location">
                    <span class="loading"></span>
                    <button class="brd-rd30 red-bg" type="submit">SEARCH</button>
                </form>
            </div>
        </div><!-- Restaurant Searching -->
    </div>
</section>

<section>
    <div class="block no-padding overlape-45">
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
                                            <a class="brd-rd50" href="#" title="Restaurant 1" itemprop="url">
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
                </div>
            </div>
        </div>
    </div>
</section><!-- top returents -->

<section>
    <div class="block remove-bottom">
        <div class="container">
            <div class="row">
                <div class="welcome-sec">
                    <div class="col-md-6 col-sm-6 col-lg-6">
                        <div class="welcome-secinfo">
                            <h2>Welcome To FoodChow</h2>
                            <span>We Create Delicious Memories</span>
                            <p>Proin luctus, justo sit amet laoreet venenatis, libero velit tincidunt mi, nec 
                                fermentum ante massa id quam. In gravida erat vel diam blandit consequat morbi. Ut interdum nuceu egestas arcu uspend isse sodales. Eiusmod tempor incidiunt labore velit dolore magna aliqu sed enimi nim.</p>
                            <a href="#" class="btn btn-danger">About us</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6">
                        <figure class="wow fadeIn" data-wow-delay="0.2s"><img src="{{asset('images/resource/image-pack.png')}}" alt=""></figure>
                    </div>
                </div>	
            </div>
        </div>
    </div>
</section><!-- welcome section -->

<section>
    <div class="block remove-bottom blackish low-opacity margin-bottom">
        <div class="fixed-bg" style="background-image: url({{asset('images/parallax3.jpg')}});"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <div class="title1-wrapper text-center text-white">
                        <div class="title1-inner">
                            <span>Website for Restaurant and Cafe</span>
                            <h2 itemprop="headline">Popular Localities </h2>
                        </div>
                    </div>
                    <div class="localities-wrapper">
                        <div class="localities-inner brd-rd2 wow fadeInUp" data-wow-delay="0.2s">
                            <div class="row">
                                <div class="col-md-4 col-sm-6 col-lg-4">
                                    <ul class="locat-list">
                                        <li>England <span>( 98 Places )</span></li>
                                        <li>Berkshire <span>( 98 Places )</span></li>
                                        <li>Bedfords <span>( 98 Places )</span></li>
                                        <li>Scotland <span>( 98 Places )</span></li>
                                        <li>Cambridges <span>( 98 Places )</span></li>
                                        <li>London <span>( 98 Places )</span></li>
                                        <li>Canada <span>( 98 Places )</span></li>
                                    </ul>
                                </div>
                                <div class="col-md-4 col-sm-6 col-lg-4">
                                    <ul class="locat-list">
                                        <li>England <span>( 98 Places )</span></li>
                                        <li>Berkshire <span>( 98 Places )</span></li>
                                        <li>Bedfords <span>( 98 Places )</span></li>
                                        <li>Scotland <span>( 98 Places )</span></li>
                                        <li>Cambridges <span>( 98 Places )</span></li>
                                        <li>London <span>( 98 Places )</span></li>
                                        <li>Canada <span>( 98 Places )</span></li>
                                    </ul>
                                </div>
                                <div class="col-md-4 col-sm-6 col-lg-4">
                                    <ul class="locat-list">
                                        <li>England <span>( 98 Places )</span></li>
                                        <li>Berkshire <span>( 98 Places )</span></li>
                                        <li>Bedfords <span>( 98 Places )</span></li>
                                        <li>Scotland <span>( 98 Places )</span></li>
                                        <li>Cambridges <span>( 98 Places )</span></li>
                                        <li>London <span>( 98 Places )</span></li>
                                        <li>Canada <span>( 98 Places )</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div><!-- Localities Wrapper -->
                </div>
            </div>
        </div>
    </div>
</section>

{{-- <section>
    <div class="block gray-bg top-padd210">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <div class="filters-wrapper">
                    <div class="title1-wrapper">
                        <i><img src="{{asset('images/resource/icon.png')}}" alt=""></i>
                        <div class="title1-inner">
                            <span>Your Favourite Food</span>
                            <h2 itemprop="headline">featured food</h2>
                        </div>
                    </div>
                    
                    <ul class="filter-buttons right">
                        <li class="active"><a class="brd-rd30" data-filter="*" href="#" itemprop="url">All</a></li>
                        <li><a class="brd-rd30" data-filter=".filter-item1" href="#" itemprop="url">Beverages</a></li>
                        <li><a class="brd-rd30" data-filter=".filter-item2" href="#" itemprop="url">Burgers</a></li>
                        <li><a class="brd-rd30" data-filter=".filter-item3" href="#" itemprop="url">Pasta</a></li>
                    </ul><!-- Filter Buttons -->
                    <div class="filters-inner style2">
                        <div class="row">
                            <div class="masonry">
                                <div class="col-md-6 col-sm-12 col-lg-6 filter-item filter-item1">
                                    <div class="featured-restaurant-box wow fadeIn" data-wow-delay="0.1s">
                                        <div class="featured-restaurant-thumb">
                                            <a href="food-detail.html" title="" itemprop="url"><img class="brd-rd50" src="assets/images/resource/featured-restaurant-img1.jpg" alt="featured-restaurant-img1.jpg" itemprop="image"></a>
                                        </div>
                                        <div class="featured-restaurant-info">
                                            <span class="red-clr">5th Avenue New York 68</span>
                                            <h4 itemprop="headline"><a href="food-detail.html" title="" itemprop="url">Pork Tenderloin Marinated</a></h4>
                                            <span class="price">$85.00</span>
                                            
                                            <ul class="post-meta">
                                                <li><i class="fa fa-check-circle-o"></i> Min order $50</li>
                                                <li><i class="flaticon-transport"></i> 30min</li>
                                            </ul>
                                            <span class="post-rate yellow-bg brd-rd2"><i class="fa fa-star yellow-clr"></i> 4.25</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-lg-6 filter-item filter-item2">
                                    <div class="featured-restaurant-box wow fadeIn" data-wow-delay="0.2s">
                                        <div class="featured-restaurant-thumb">
                                            <a href="food-detail.html" title="" itemprop="url"><img class="brd-rd50" src="assets/images/resource/featured-restaurant-img2.jpg" alt="featured-restaurant-img2.jpg" itemprop="image"></a>
                                        </div>
                                        <div class="featured-restaurant-info">
                                            <span class="red-clr">5th Avenue New York 68</span>
                                            <h4 itemprop="headline"><a href="food-detail.html" title="" itemprop="url">Baked Potato Pizza</a></h4>
                                            <span class="price">$70.00</span>
                                            
                                            <ul class="post-meta">
                                                <li><i class="fa fa-check-circle-o"></i> Min order $40</li>
                                                <li><i class="flaticon-transport"></i> 20min</li>
                                            </ul>
                                            <span class="post-rate yellow-bg brd-rd2"><i class="fa fa-star yellow-clr"></i> 4.03</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-lg-6 filter-item filter-item3">
                                    <div class="featured-restaurant-box wow fadeIn" data-wow-delay="0.3s">
                                        <div class="featured-restaurant-thumb">
                                            <a href="food-detail.html" title="" itemprop="url"><img class="brd-rd50" src="assets/images/resource/featured-restaurant-img3.jpg" alt="featured-restaurant-img3.jpg" itemprop="image"></a>
                                        </div>
                                        <div class="featured-restaurant-info">
                                            <span class="red-clr">5th Avenue New York 68</span>
                                            <h4 itemprop="headline"><a href="food-detail.html" title="" itemprop="url">Grilled Pork with Preserved</a></h4>
                                            <span class="price">$90.00</span>
                                            
                                            <ul class="post-meta">
                                                <li><i class="fa fa-check-circle-o"></i> Min order $60</li>
                                                <li><i class="flaticon-transport"></i> 45min</li>
                                            </ul>
                                            <span class="post-rate yellow-bg brd-rd2"><i class="fa fa-star yellow-clr"></i> 5.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-lg-6 filter-item filter-item2 filter-item3">
                                    <div class="featured-restaurant-box wow fadeIn" data-wow-delay="0.4s">
                                        <div class="featured-restaurant-thumb">
                                            <a href="food-detail.html" title="" itemprop="url"><img class="brd-rd50" src="assets/images/resource/featured-restaurant-img4.jpg" alt="featured-restaurant-img4.jpg" itemprop="image"></a>
                                        </div>
                                        <div class="featured-restaurant-info">
                                            <span class="red-clr">5th Avenue New York 68</span>
                                            <h4 itemprop="headline"><a href="food-detail.html" title="" itemprop="url">Chicken with White Sauce</a></h4>
                                            <span class="price">$85.00</span>
                                            
                                            <ul class="post-meta">
                                                <li><i class="fa fa-check-circle-o"></i> Min order $50</li>
                                                <li><i class="flaticon-transport"></i> 30min</li>
                                            </ul>
                                            <span class="post-rate yellow-bg brd-rd2"><i class="fa fa-star yellow-clr"></i> 4.25</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-lg-6 filter-item filter-item1 filter-item3">
                                    <div class="featured-restaurant-box wow fadeIn" data-wow-delay="0.5s">
                                        <div class="featured-restaurant-thumb">
                                            <a href="food-detail.html" title="" itemprop="url"><img class="brd-rd50" src="assets/images/resource/featured-restaurant-img5.jpg" alt="featured-restaurant-img5.jpg" itemprop="image"></a>
                                        </div>
                                        <div class="featured-restaurant-info">
                                            <span class="red-clr">5th Avenue New York 68</span>
                                            <h4 itemprop="headline"><a href="food-detail.html" title="" itemprop="url">Lemon-Rosemary Chicken</a></h4>
                                            <span class="price">$70.00</span>
                                            
                                            <ul class="post-meta">
                                                <li><i class="fa fa-check-circle-o"></i> Min order $40</li>
                                                <li><i class="flaticon-transport"></i> 20min</li>
                                            </ul>
                                            <span class="post-rate yellow-bg brd-rd2"><i class="fa fa-star yellow-clr"></i> 4.03</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-lg-6 filter-item filter-item1 filter-item2">
                                    <div class="featured-restaurant-box wow fadeIn" data-wow-delay="0.6s">
                                        <div class="featured-restaurant-thumb">
                                            <a href="food-detail.html" title="" itemprop="url"><img class="brd-rd50" src="assets/images/resource/featured-restaurant-img6.jpg" alt="featured-restaurant-img6.jpg" itemprop="image"></a>
                                        </div>
                                        <div class="featured-restaurant-info">
                                            <span class="red-clr">5th Avenue New York 68</span>
                                            <h4 itemprop="headline"><a href="food-detail.html" title="" itemprop="url">Black Pepper-Honey BBQ</a></h4>
                                            <span class="price">$90.00</span>
                                            
                                            <ul class="post-meta">
                                                <li><i class="fa fa-check-circle-o"></i> Min order $60</li>
                                                <li><i class="flaticon-transport"></i> 45min</li>
                                            </ul>
                                            <span class="post-rate yellow-bg brd-rd2"><i class="fa fa-star yellow-clr"></i> 5.00</span>
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
</section> --}}

@if(count($posts) > 0)
<section>
    <div class="block bottom-padd210">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <div class="title1-wrapper text-center">
                        <div class="title1-inner">
                            <span>Website for Restaurant and Cafe</span>
                            <h2 itemprop="headline">news update</h2>
                        </div>
                    </div>
                    <div class="remove-ext">
                        <div class="row">
                            @foreach($posts as $post)
                            <div class="col-md-4 col-sm-6 col-lg-4">
                                <div class="news-box wow fadeIn" data-wow-delay="0.2s">
                                    <div class="news-thumb">
                                        <a class="brd-rd2" href="{{route('blogs.details',$post->slug)}}" title="" itemprop="url">
                                            @if($post->thumbnail != '')
                                                <img src="{{Storage::disk('admin')->url($post->thumbnail)}}" itemprop="image">
                                            @else
                                                <img src="{{asset('images/resource/news-img1.jpg')}}" itemprop="image">
                                            @endif
                                        </a>
                                        <div class="news-btns">
                                            <a class="post-date red-bg" href="{{route('blogs.details',$post->slug)}}" title="" itemprop="url">{{date('M d', strtotime($post->created_at))}}</a>
                                            <a class="read-more" href="{{route('blogs.details',$post->slug)}}" itemprop="url">READ MORE</a>
                                        </div>
                                    </div>
                                    <div class="news-info">
                                        <h4 itemprop="headline"><a href="{{route('blogs.details',$post->slug)}}" title="" itemprop="url">{{$post->title}}</a></h4> <br>
                                        {{substr(strip_tags($post->content), 0, 128)}}
                                        @if(strlen(strip_tags($post->content)) > 128) ... @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@endsection

@section('scripts')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function() {
      $( "#input-search").autocomplete({
        source: async function(request, response){
            let data = await $.ajax({
                url: "{{route('locations.all')}}",
                dataType: "json",
                data:{
                    search: $( "#input-search").val()
                },
                type: "GET"
            });
            response($.map(data.locations, function(item){
                return {
                    label: item.country.name + ',' + item.name,
                    value: item.country.name + ',' + item.name
                };
            }));
        },
        select: function(event, ui){
            location.href = "restaurants?location="+ui.item.value;
        }
      });
    });

    </script>
@endsection
