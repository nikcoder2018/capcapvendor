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

    .tagsinput {
    border: 1px solid #e3e6ed;
    border-radius: 6px;
    background: #fff;
    height: 100px;
    padding: 6px 1px 1px 6px;
    overflow-y: auto;
    text-align: left;
}
.tagsinput .tag {
    border-radius: 4px;
    background-color: #41cac0;
    color: #ffffff;
    cursor: pointer;
    margin-right: 5px;
    margin-bottom: 5px;
    overflow: hidden;
    line-height: 15px;
    padding: 6px 13px 8px 19px;
    position: relative;
    vertical-align: middle;
    display: inline-block;
    zoom: 1;
    *display: inline;
    -webkit-transition: 0.14s linear;
    -moz-transition: 0.14s linear;
    -o-transition: 0.14s linear;
    transition: 0.14s linear;
    -webkit-backface-visibility: hidden;
}
.tagsinput .tag:hover {
    background-color: #39b1a8;
    color: #ffffff;
    padding-left: 12px;
    padding-right: 20px;
}
.tagsinput .tag:hover .tagsinput-remove-link {
    color: #ffffff;
    opacity: 1;
    display: block\9;
}
.tagsinput input {
    background: transparent;
    border: none;
    color: #34495e;
    font-family: "Lato", sans-serif;
    font-size: 14px;
    margin: 0px;
    padding: 0 0 0 5px;
    outline: 0;
    margin-right: 5px;
    margin-bottom: 5px;
    width: inherit !important;
    float: right !important;
}
.tagsinput-remove-link {
    bottom: 0;
    color: #ffffff;
    cursor: pointer;
    font-size: 12px;
    opacity: 0;
    padding: 7px 7px 5px 0;
    position: absolute;
    right: 0;
    text-align: right;
    text-decoration: none;
    top: 0;
    width: 100%;
    z-index: 2;
    display: none\9;
}
.tagsinput-remove-link:before {
    color: #ffffff;
    content: "\f00d";
    font-family: "FontAwesome";
}
.tagsinput-add-container {
    vertical-align: middle;
    display: inline-block;
    zoom: 1;
    *display: inline;
}
.tagsinput-add {
    background-color: #d6dbdf;
    border-radius: 3px;
    color: #ffffff;
    cursor: pointer;
    margin-top: 10px;
    padding: 6px 9px;
    display: inline-block;
    zoom: 1;
    *display: inline;
    -webkit-transition: 0.25s;
    -moz-transition: 0.25s;
    -o-transition: 0.25s;
    transition: 0.25s;
    -webkit-backface-visibility: hidden;
}
.tagsinput-add:hover {
    background-color: #3bb8af;
}
.tagsinput-add:before {
    content: "\f067";
    font-family: "FontAwesome";
}
.tags_clear {
    clear: both;
    width: 100%;
    height: 0px;
}

</style>
@endsection
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
<h4 itemprop="headline">Add product</h4>
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
                            <form class="form-add-product" action="{{route('vendors.products.store')}}" method="POST">
                                @csrf
                                <div class="tab-content">
                                    <div class="tab-pane fade active in" id="product-tab1">
                                        <div class="restaurant-info-form brd-rd5">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-lg-12">
                                                    <label>Product Title <sup>*</sup></label>
                                                    <input class="brd-rd3" type="text" name="title" placeholder="E.g. Blue Jeans">
                                                </div>
                                                <div class="col-md-12 col-sm-612 col-lg-12">
                                                    <label>Description</label>
                                                    <textarea class="brd-rd3" name="description" cols="30" rows="10"></textarea>
                                                </div>

                                                <div class="col-md-12 col-sm-12 col-lg-12">
                                                    <h4 itemprop="headline">Select Image</h4>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-lg-12">
                                                    <div class="product-info text-center">
                                                        <div class="product-thumb">
                                                            <img id="profile-display" src="{{asset('images/resource/profile-img1.jpg')}}" itemprop="image">
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
                                                    <input class="brd-rd3" type="number" step="0.01" name="price" placeholder="Product Price">
                                                </div>
                                                <div class="col-md-12 col-sm-612 col-lg-12">
                                                    <label>Tags</label>
                                                    <div class="select-wrp">
                                                        <input name="tags" id="tagsinput" class="tagsinput" value="" />
                                                        <p class="mb-2 mt-3">Choose from your tags list:</p> <br>
                                                        @foreach($tags as $tag)
                                                            <button type="button" data-id="{{$tag->id}}" data-tag="{{$tag->tag}}" class="btn btn-sm btn-primary btn-tag">{{$tag->tag}}</button>
                                                        @endforeach
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
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="{{asset('js/jquery.tagsinput.js')}}"></script>
@endsection

@section('scripts')
    <script>
        $(".tagsinput").tagsInput();
        $('.btn-tag').on('click', function(){
            let tag = $(this).data('tag');
            let tagsInput = $('#tagsinput');
            if(!tagsInput.tagExist(tag)){
                tagsInput.importTags(tagsInput.val()+','+tag);
            }
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

        $('.form-add-product').on('change keypress', 'input', function(){
            $(this).removeClass("is-invalid is-valid");
            $(this).siblings('.invalid-feedback').remove();
            $(this).siblings('.valid-feedback').remove();
        });

        $('.step-buttons').on('click', 'a', function(){
            let tab = $(this).attr('tab');
            if(tab == 'tab2'){
                let title = $('input[name=title]').val();
                if(title == ''){
                    $('input[name=title]').siblings('.invalid-feedback').remove();
                    $('input[name=title]').siblings('.valid-feedback').remove();
                    $('input[name=title]').siblings('.invalid-feedback.valid-feedback').remove();
                    $('input[name=title]').addClass('is-invalid');
                    $('input[name=title]').before(`<div class="invalid-feedback" style="color:red">Product name is required</div>`);

                    $('html, body').animate({
                        scrollTop: $('#tab1').offset().top
                    }, 300);

                    return;
                }
            }
            if(tab == 'tab3'){
                let price = $('input[name=price]').val();
                if(price == ''){
                    $('input[name=price]').siblings('.invalid-feedback').remove();
                    $('input[name=price]').siblings('.valid-feedback').remove();
                    $('input[name=price]').siblings('.invalid-feedback.valid-feedback').remove();
                    $('input[name=price]').addClass('is-invalid');
                    $('input[name=price]').before(`<div class="invalid-feedback" style="color:red">Product price is required</div>`);

                    $('html, body').animate({
                        scrollTop: $('#tab2').offset().top
                    }, 300);

                    return;
                }
            }
            $('#'+tab).trigger('click');
            $('html, body').animate({
                scrollTop: $('#'+tab).offset().top
            }, 300);
        });
        $('#tab2').on('click', function(e){
            let title = $('input[name=title]').val();
            if(title == ''){
                $('input[name=title]').siblings('.invalid-feedback').remove();
                $('input[name=title]').siblings('.valid-feedback').remove();
                $('input[name=title]').siblings('.invalid-feedback.valid-feedback').remove();
                $('input[name=title]').addClass('is-invalid');
                $('input[name=title]').before(`<div class="invalid-feedback" style="color:red">Product name is required</div>`);

                $('html, body').animate({
                    scrollTop: $('#tab1').offset().top
                }, 300);
                e.stopPropagation();
                return;
            }
        });
        $('#tab3').on('click', function(){
            let price = $('input[name=price]').val();
                if(price == ''){
                    $('input[name=price]').siblings('.invalid-feedback').remove();
                    $('input[name=price]').siblings('.valid-feedback').remove();
                    $('input[name=price]').siblings('.invalid-feedback.valid-feedback').remove();
                    $('input[name=price]').addClass('is-invalid');
                    $('input[name=price]').before(`<div class="invalid-feedback" style="color:red">Product price is required</div>`);

                    $('html, body').animate({
                        scrollTop: $('#tab2').offset().top
                    }, 300);
                    e.stopPropagation();
                    return;
                }
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