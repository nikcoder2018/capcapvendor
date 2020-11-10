@extends('layouts.app')

@section('content')
<div class="bread-crumbs-wrapper">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#" title="" itemprop="url">Home</a></li>
            <li class="breadcrumb-item active">Blog Detail</li>
        </ol>
    </div>
</div>

<section>
    <div class="block less-spacing gray-bg">
        <div class="sec-box bottom-padd140">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="row">
                            
                            <div class="col-md-9 col-sm-12 col-lg-9">
                                <div class="blog-detail-wrapper">
                                    <div class="blog-detail-thumb wow fadeIn" data-wow-delay="0.2s">
                                        @if($blog->thumbnail != '')
                                            <img src="{{Storage::disk('admin')->url($blog->thumbnail)}}" itemprop="image">
                                        @else 
                                            <img src="{{asset('images/resource/blog-detial-img.jpg')}}" itemprop="image">
                                        @endif
                                    </div>
                                    <div class="blog-detail-info">
                                        <span class="post-detail-date red-clr"><i class="fa fa-clock-o"></i>{{date('F d, Y',strtotime($blog->created_at))}}</span>
                                        
                                    </div>
                                    <h1 itemprop="headline">{{$blog->title}}</h1>
                                    <div class="post-description">
                                        {!!$blog->content!!}
                                    </div>
                                    @if(count($blog->tags) > 0)
                                    <div class="post-tags red-clr">
                                        <span>Tags:</span>
                                        @foreach($blog->tags as $tag)
                                        <a href="#" title="" itemprop="url">#{{$tag->tag}}</a>
                                        @endforeach
                                    </div>
                                    @endif
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