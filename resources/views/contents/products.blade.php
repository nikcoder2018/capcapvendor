@extends('layouts.account')

@section('content')
<div class="tabs-wrp">
    <h4 itemprop="headline">MY PRODUCTS</h4>
    <a href="{{route('vendors.products.create')}}" class="btn btn-default brd-rd3 pull-right">ADD PRODUCT</a>
    @if(count($products) > 0)
    <div class="order-list">
        @foreach($products as $product)
        <div class="order-item brd-rd5">
            <div class="order-thumb brd-rd5">
                <a href="#" title="" itemprop="url"><img src="{{Storage::disk('admin')->url($product->image_url)}}" alt="order-img1.jpg" itemprop="image"></a>
            </div>
            <div class="order-info">
                <h4 itemprop="headline"><a href="#" title="" itemprop="url">{{$product->title}}</a></h4>
                <p itemprop="description">{!!$product->description!!}</p> <br>
                <span class="price">${{$product->regular_price}}</span>
                <a class="brd-rd2" href="{{route('vendors.products.detail', $product->id)}}" title="" itemprop="url">Product Detail</a>
            </div>
        </div>
        @endforeach
    </div>
    <div class="pagination-wrapper text-center style2">
        <ul class="pagination justify-content-center">
            <li class="page-item prev"><a class="page-link brd-rd2" href="#" itemprop="url">PREV</a></li>
            <li class="page-item"><a class="page-link brd-rd2" href="#" itemprop="url">1</a></li>
            <li class="page-item"><a class="page-link brd-rd2" href="#" itemprop="url">2</a></li>
            <li class="page-item active"><span class="page-link brd-rd2">3</span></li>
            <li class="page-item"><a class="page-link brd-rd2" href="#" itemprop="url">4</a></li>
            <li class="page-item"><a class="page-link brd-rd2" href="#" itemprop="url">5</a></li>
            <li class="page-item">........</li>
            <li class="page-item"><a class="page-link brd-rd2" href="#" itemprop="url">18</a></li>
            <li class="page-item next"><a class="page-link brd-rd2" href="#" itemprop="url">NEXT</a></li>
        </ul>
    </div><!-- Pagination Wrapper -->
    @else 
    <p>You dont have any products yet</p>
    @endif

</div>
@endsection

@section('scripts')
    <script>

    </script>
@endsection