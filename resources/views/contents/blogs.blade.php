@extends('layouts.app')

@section('content')
<div class="bread-crumbs-wrapper">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#" title="" itemprop="url">Home</a></li>
            <li class="breadcrumb-item active">Blog Grid</li>
        </ol>
    </div>
</div>

<section>
    <div class="block less-spacing gray-bg">
        <div class="sec-box">
            <div class="container">
                <div class="row">
                    @if(count($blogs) > 0)
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="remove-ext">
                            <div class="row">
                                @foreach($blogs as $blog)
                                    <div class="col-md-4 col-sm-6 col-lg-4">
                                        <div class="news-box wow fadeIn" data-wow-delay="0.1s">
                                            <div class="news-thumb">
                                                <a class="brd-rd2" href="{{route('blogs.details',$blog->slug)}}" title="" itemprop="url">
                                                    @if($blog->thumbnail != '')
                                                        <img src="{{Storage::disk('admin')->url($blog->thumbnail)}}" itemprop="image">
                                                    @else
                                                        <img src="{{asset('images/resource/news-img1.jpg')}}" itemprop="image">
                                                    @endif
                                                </a>
                                                <div class="news-btns">
                                                    <a class="post-date red-bg" href="#" title="" itemprop="url">{{date('M d', strtotime($blog->created_at))}}</a>
                                                    <a class="read-more" href="{{route('blogs.details',$blog->slug)}}" itemprop="url">READ MORE</a>
                                                </div>
                                            </div>
                                            <div class="news-info">
                                                <h4 itemprop="headline"><a href="{{route('blogs.details',$blog->slug)}}" title="" itemprop="url">{{$blog->title}}</a></h4>
                                                <p itemprop="description">
                                                    {{substr(strip_tags($blog->content), 0, 128)}}
                                                    @if(strlen(strip_tags($blog->content)) > 128) ... @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="pagination-wrapper text-center">
                            <ul class="pagination justify-content-center">
                                @include('pagination.limit_links',['paginator'=>$blogs])
                            </ul>
                        </div><!-- Pagination Wrapper -->
                    </div>
                    @else 
                        <p>No blogs found!</p>
                    @endif
                </div>
            </div>
        </div><!-- Section Box -->
    </div>
</section>
@endsection

@section('scripts')

@endsection