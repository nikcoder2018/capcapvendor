@extends('layouts.app')

@section('content')
<section>
    <div class="block">
        <div style="background-image: url({{asset('images/topbg.jpg')}});" class="fixed-bg"></div>
        <div class="error-page-wrapper text-center">
            <div class="error-page-inner">
                <h1 itemprop="headline">404 <span class="red-clr">Error</span></h1>
                <h4 itemprop="headline"><span class="yellow-clr">Oops,</span> This Page Not Found!</h4>
                <p itemprop="description">Vivam pulput vehic Mauris porttitor erovel sapien Sed ut persp tatem semper mi, at ultricies odio.</p>
                <a class="brd-rd2 yellow-bg" href="#" title="" itemprop="url"><i class="fa fa-home"></i> BACK TO HOME</a>
            </div>
        </div><!-- Error Page Wrapper -->
    </div>
</section>   
@endsection