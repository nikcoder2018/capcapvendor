@extends('layouts.account')

@section('plugins_css')
<link href="{{asset('plugins/bootstrap-fileupload/bootstrap-fileupload.css')}}" rel="stylesheet"/>
<link href="{{asset('plugins/summernote/summernote-bs4.css')}}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@section('stylesheets')
<style>
    .category-list{
        padding: 1rem;
    }

    .category-list ul{
        list-style: none;
    }
    .category-list label{
        font-weight: 400;
    }
    .category-list .children{
        padding-left: 25px !important;
    }
    #categoryTab .nav-link{
        padding: .3rem .5rem !important;
    }

    #categoryTabContent{
        border-bottom: 1px solid #dee2e6;
        border-left: 1px solid #dee2e6;
        border-right: 1px solid #dee2e6;

        max-height: 250px;
        overflow-y: scroll;
        overflow-x: hidden;
    }
    .product-img-upload-btn{
        display: block;
        margin-left: 10px;
    }
    .product-thumb {
        height: 260px;
        width: 260px;
        display: inline-block;
        overflow: hidden;
        margin-bottom: 14px;
    }
    .product-thumb>img {
        width: 100%;
        height: 100%;
    }
    .product-info {
        float: left;
        width: 100%;
        margin-top: 10px;
        display: flex;
    }
    .product-img-upload-btn>label {
        padding: 13px 30px;
        font-size: 10px;
        letter-spacing: 0;
        font-family: Poppins;
        font-weight: 700;
        display: inline-block;
        margin-bottom: 0;
    }

    .product-img-upload-btn>label.yellow-bg:hover {
        color: #fff;
    }

    .product-img-upload-btn .fileContainer {
        overflow: hidden;
        position: relative;
    }

    .product-img-upload-btn .fileContainer [type=file] {
        cursor: inherit;
        display: block;
        font-size: 999px;
        filter: alpha(opacity=0);
        min-height: 100%;
        min-width: 100%;
        opacity: 0;
        position: absolute;
        right: 0;
        text-align: right;
        top: 0;
    }

    .product-info>p {
        font-size: 12px;
        color: #a2a2a2;
        letter-spacing: .3px;
        margin-bottom: 0;
    }
</style>
@endsection
@section('content')
<h4 itemprop="headline">Edit product</h4>
<div class="account-settings-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="reservation-tabs-wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <div class="reservation-tabs-list brd-rd5">
                            <ul class="nav nav-tabs brd-rd5" style="display: flex; align-items: center;">
                                <li class="active">
                                    <a href="#product-tab1" id="tab1" data-toggle="tab" aria-expanded="false">
                                    <span class="brd-rd50">1</span> Step</a>
                                </li>
                                <li class="">
                                    <a href="#product-tab2" id="tab2" data-toggle="tab" aria-expanded="true">
                                        <span class="brd-rd50">2</span> Step
                                    </a>
                                </li>

                                <li class="">
                                    <a href="#product-tab3" id="tab3" data-toggle="tab" aria-expanded="false">
                                        <span class="brd-rd50">3</span> Step
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9 col-sm-12 col-lg-12">
                        <div class="reservation-tab-content">
                            <form class="form-add-product" action="{{route('vendors.products.update')}}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{$product->id}}">
                                <div class="tab-content">
                                    <div class="tab-pane fade active in" id="product-tab1">
                                        <div class="restaurant-info-form brd-rd5">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-lg-12">
                                                    <label>Product Title <sup>*</sup></label>
                                                    <input class="brd-rd3" type="text" name="title" placeholder="E.g. Blue Jeans" value="{{$product->title}}">
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-lg-12">
                                                    <label>Product Slug <sup>*</sup></label>
                                                    <input class="brd-rd3" type="text" name="slug" placeholder="E.g. blue-jeans" value="{{$product->slug}}">
                                                </div>
                                                <div class="col-md-12 col-sm-612 col-lg-12">
                                                    <label>Description</label>
                                                    <textarea class="brd-rd3 summernote" cols="30" rows="10">{!!$product->description!!}</textarea>
                                                </div>

                                                <div class="col-md-12 col-sm-12 col-lg-12">
                                                    <h4 itemprop="headline">Select Image</h4>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-lg-12">
                                                    <div class="product-info text-center">
                                                        <div class="product-thumb">
                                                            @if($product->image_url != '')
                                                            <img id="profile-display" src="{{asset(Storage::disk('admin')->url($product->image_url))}}" itemprop="image">
                                                            @else
                                                            <img id="profile-display" src="{{asset('images/resource/profile-img1.jpg')}}" itemprop="image">
                                                            @endif
                                                        </div>
                                                        <div class="product-img-upload-btn">
                                                            <label class="fileContainer brd-rd5 yellow-bg">
                                                                UPLOAD PICTURE
                                                                <input id="profile-upload" name="image" type="file"/>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-lg-12">
                                                    <div class="step-buttons">
                                                        <a class="brd-rd3 red-bg" tab="tab2" title="" itemprop="url">Next Step</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="product-tab2"> 
                                        <div class="row" style="margin: 0px !important; padding: 10px 40px; float: left; width: 100%; background-color: #f9f9f9;">
                                            <h4 itemprop="headline">Category</h4>
                                            <div class="card">
                                                <div class="card-body">
                                                    <ul class="nav nav-tabs" id="categoryTab" role="tablist">
                                                        <li class="nav-item active">
                                                            <a class="nav-link" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">All categories</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="mostused-tab" data-toggle="tab" href="#mostused" role="tab" aria-controls="mostused" aria-selected="false">Most used</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content" id="categoryTabContent">
                                                        <div class="tab-pane fade active in" id="all" role="tabpanel" aria-labelledby="all-tab">
                                                            <ul class="category-list">
                                                                {!!$categoriesHTML!!}
                                                            </ul>
                                                        </div>
                                                        <div class="tab-pane fade" id="mostused" role="tabpanel" aria-labelledby="mostused-tab">
                                
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="restaurant-info-form">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-612 col-lg-12">
                                                    <label>Price<sup>*</sup></label>
                                                    <input class="brd-rd3" type="number" step="0.01" name="price" placeholder="Product Price" value="{{$product->regular_price}}">
                                                </div>
                                                <div class="col-md-12 col-sm-612 col-lg-12">
                                                    <label>Tags</label>
                                                    <div class="select-wrp">
                                                    <select name="tags" class="tags-input" multiple="multiple">
                                                        @foreach($tags as $tag)
                                                            @php 
                                                                $selected = '';
                                                            @endphp 
                                                            @foreach($product->tags as $ptag)
                                                                @if($tag->tag == $ptag->tag)
                                                                    @php $selected = 'selected'; @endphp
                                                                @endif
                                                            @endforeach
                                                            <option value="{{$tag->tag}}" {{$selected}}>{{$tag->tag}}</option>
                                                        @endforeach
                                                    </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-lg-12">
                                                    <div class="step-buttons">
                                                        <a class="brd-rd3 red-bg" tab="tab3" title="" itemprop="url">Next Step</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="product-tab3">
                                        <div class="restaurant-info-form brd-rd5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="check-box">
                                                        <input type="checkbox" name="delivery" id="checkbox-delivery" @if($product->delivery == 1) checked @endif>
                                                        <label for="checkbox-delivery">Delivery</label>
                                                    </div>
                                                    <div class="row location-input" @if($product->delivery != 1) style="display: none" @endif>
                                                        <div class="col-md-6">
                                                            <label>Location</label>
                                                            <input class="brd-rd3" type="text" id="input-location" name="delivery_location" value="{{$product->delivery_location}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="check-box">
                                                        <input type="checkbox" name="take_away" id="checkbox-takeway" @if($product->take_away == 1) checked @endif>
                                                        <label for="checkbox-takeway">Take Away</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-lg-12">
                                                    <div class="step-buttons">
                                                        <button class="brd-rd3 red-bg">Publish</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>   
@endsection

@section('plugins_js')
<script src="{{asset('plugins/bootstrap-fileupload/bootstrap-fileupload.js')}}"></script>
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
@endsection

@section('scripts')
    <script>
        $('.tags-input').select2({
            theme: "classic"
        });
        $( "#input-location").autocomplete({
        source: async function(request, response){
            let data = await $.ajax({
                url: "{{route('locations.all')}}",
                dataType: "json",
                data:{
                    search: $( "#input-location").val()
                },
                type: "GET"
            });
            response($.map(data.locations, function(item){
                return {
                    label: item.country.name + ',' + item.name,
                    value: item.country.name + ',' + item.name
                };
            }));
        }
      });

        $('.form-add-product').on('submit', function(e){
            e.preventDefault();
            let formData = new FormData(this);
            formData.append('description', $(this).find('.summernote').summernote('code'));
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data:  formData,
                contentType: false,
                cache: false,
                processData:false,
                success: function(resp){
                    if(resp.success){
                        Swal.fire({
                            title: 'Success!',
                            text: resp.msg,
                            icon: 'success'
                        }).then(()=>{
                            location.href = "{{route('vendors.products.index')}}";
                        });
                    }else{
                        Swal.fire({
                            title: 'Failed!',
                            text: resp.msg,
                            icon: 'error'
                        });
                    }
                },
                error: function(resp){
                    let form = $('.form-add-product');
                    $.each(resp.responseJSON.errors, function(name, error){
                        form.find('#input-'+name).siblings('.invalid-feedback').remove();
                        form.find('#input-'+name).siblings('.valid-feedback').remove();
                        form.find('#input-'+name).siblings('.invalid-feedback.valid-feedback').remove();
                        form.find('#input-'+name).addClass('is-invalid');
                        form.find('#input-'+name).after(`
                            <div class="invalid-feedback">
                            ${error}
                            </div>
                        `);
                    });
                }
            });
        });

        $('.form-add-product').on('change keypress keyup', 'input[name=title]', async function(){
            const slug = await $.ajax({
                url: "{{route('slugify')}}",
                type: "POST",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    text: $(this).val()
                }
            });

            if(slug){
                $('.form-add-product').find('input[name=slug]').val(slug);
            }
        });
        $('.form-add-product').on('change keypress', 'input', function(){
            $(this).removeClass("is-invalid is-valid");
            $(this).siblings('.invalid-feedback').remove();
            $(this).siblings('.valid-feedback').remove();
        });

        $('.summernote').summernote({
            height: 250,                 // set editor height

            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor

            focus: true                 // set focus to editable area after initializing summernote
        });

        $('.step-buttons').on('click', 'a', function(){
            let tab = $(this).attr('tab');
            $('#'+tab).trigger('click');
            $('html, body').animate({
                scrollTop: $('#'+tab).offset().top
            }, 300);
        });

        $('#checkbox-delivery').on('change', function(){
            if($(this).prop('checked') == true){
                $('.location-input').show();
            }else{
                $('.location-input').hide();
            }
        })
    </script>
@endsection