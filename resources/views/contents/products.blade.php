@extends('layouts.account')
@section('breadcrumbs')
<div class="bread-crumbs-wrapper">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}" title="" itemprop="url">Home</a></li>
            <li class="breadcrumb-item active">My Account</li>
        </ol>
    </div>
</div>
@endsection
@section('content')
<div class="tabs-wrp">
    <h4 itemprop="headline">MY PRODUCTS</h4>
    <a href="{{route('vendors.products.create')}}" class="btn btn-default brd-rd3 pull-right">ADD PRODUCT</a>
    @if(count($products) > 0)
    <div class="order-list">
        <div class="statement-table">
            <table>
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td style="display: flex; justify-content:start; align-items:center;">
                            <img width="100" src="{{Storage::disk('admin')->url($product->image_url)}}" alt="order-img1.jpg" itemprop="image">
                            <span style="margin-left: 15px;">{{$product->title}}</span>
                        </td>
                        <td>
                            @if(count($product->categories) > 0)
                                @foreach($product->categories as $category)
                                    <span class="badge">{{$category->category->name}}</span>
                                @endforeach
                            @else 
                            <p>Uncategorized</p>
                            @endif
                        </td>
                        <td><span class="red-clr">${{$product->regular_price}}</span></td>
                        <td>
                            <a href="{{route('vendors.products.edit', $product->id)}}" class="btn btn-info btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="{{route('products.details', ['vendor' => $product->vendor_id, 'slug' => $product->slug])}}" class="btn btn-primary btn-sm" title="Details"><i class="fa fa-list"></i></a>
                            <button class="btn btn-danger btn-sm btn-delete" data-id="{{$product->id}}" title="Delete"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="pagination-wrapper text-center style2">
        <ul class="pagination justify-content-center">
            @include('pagination.limit_links',['paginator'=>$products])
        </ul>
    </div><!-- Pagination Wrapper -->
    @else 
    <br>
    <p>You dont have any products yet</p>
    @endif

</div>
@endsection

@section('scripts')
    <script>
        $('.btn-delete').on('click', function(){
            let product_id = $(this).data('id');
            Swal.fire({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this product!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then(async (result) => {
                    if (result.isConfirmed) {
                        let goDelete = await $.ajax({
                            url: "{{route('vendors.products.destroy')}}",
                            type: 'POST',
                            data: {
                                _token: $('meta[name="csrf-token"]').attr('content'),
                                product_id
                            }
                        });

                        if(goDelete.success){
                            Swal.fire({
                                title: "Success!",
                                text: goDelete.msg,
                                icon: "success",
                            }).then(()=>{
                               location.reload();
                            });
                        }else{
                            Swal.fire('Failed',goDelete.msg,'error');
                        }
                        
                    }
            });
        });
    </script>
@endsection