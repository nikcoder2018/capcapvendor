@extends('layouts.account')

@section('plugins_css')
<link href="{{asset('plugins/bootstrap-fileupload/bootstrap-fileupload.css')}}" rel="stylesheet"/>
<link href="{{asset('plugins/summernote/summernote-bs4.css')}}" rel="stylesheet">
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
</style>
@endsection
@section('content')
<h4 itemprop="headline">Add product</h4>
<div class="account-settings-inner">
    <form class="form-add-product" action="{{route('vendors.products.store')}}" method="POST">
        @csrf
    <div class="row">
        <div class="col-md-8 col-sm-8 col-lg-8">
            <div class="profile-info-form-wrap">
                    <div class="row mrg20">
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <label>Product Name <sup>*</sup></label>
                            <input class="brd-rd3" type="text" name="title" placeholder="E.g. Blue Jeans">
                        </div>
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <label>Tags <sup>*</sup></label>
                            <input class="brd-rd3" type="text" name="slug" placeholder="E.g. blue-jeans">
                        </div>
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    Description
                                </div>
                                <div class="card-body brd-rd3">
                                    <div class="summernote"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    Pricing
                                </div>
                                <div class="card-body brd-rd3">
                                    <div class="form-group mt-3">
                                        <div class="row">
                                            <label class="col-sm-6 control-label" for="input-regular_price">Regular Price ($)</label>
                                            <div class="col-sm-6">
                                            <input type="number" placeholder="Regular Price" id="input-regular_price" name="regular_price" class="form-control" min="0" step="any" value="">
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
            </div>
        </div>

        <div class="col-md-4 col-sm-4 col-lg-4">
            <div class="card">
                <div class="card-header">
                    Category
                </div>
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

            <div class="card">
                <div class="card-header">Image</div>
                <div class="card-body">
                    <div class="profile-info text-center">
                        <div class="profile-thumb">
                            <img id="profile-display" src="{{asset('images/resource/profile-img1.jpg')}}" itemprop="image">
                        </div>
                        <div class="profile-img-upload-btn">
                            <label class="fileContainer brd-rd5 yellow-bg">
                                UPLOAD PICTURE
                                <input id="profile-upload" name="image" type="file"/>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">Tags</div>
                <div class="card-body">
                    <input name="tags" id="tagsinput" class="tagsinput" value="" />
                    <span class="badge badge-danger">NOTE!</span><span class="help-inline">Press enter or commas to separate tags</span>

                    <p class="mb-2 mt-3">Choose from your tags list:</p>
                    @foreach($tags as $tag)
                        <button type="button" data-id="{{$tag->id}}" data-tag="{{$tag->tag}}" class="btn btn-sm btn-primary btn-tag">{{$tag->tag}}</button>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="row mrg20">
        <div class="col-md-12">
            <span class="pull-right">
                <button type="submit" class="btn btn-success btn-sm">Save & Publish</button>
            </span>
        </div>
    </div>
    </form>
</div>   
@endsection

@section('plugins_js')
<script src="{{asset('plugins/bootstrap-fileupload/bootstrap-fileupload.js')}}"></script>
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
@endsection

@section('scripts')
    <script>
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
                        swal(resp.msg, {
                            icon: 'success'
                        }).then(()=>{
                            location.href = "{{route('vendors.products.index')}}";
                        });
                    }else{
                        swal(resp.msg, {
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
    </script>
@endsection