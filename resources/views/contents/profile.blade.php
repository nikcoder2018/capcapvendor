@extends('layouts.account')
@section('stylesheets')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
<div class="tabs-wrp account-settings brd-rd5">
    <h4 itemprop="headline">PROFILE SETTINGS</h4>
    <div class="account-settings-inner">
        <form class="profile-info-form" action="{{route('vendors.profile.update')}}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$vendor->id}}">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-lg-4">
                    <div class="profile-info text-center">
                        <div class="profile-thumb brd-rd50">
                            @if($vendor->profile != null)
                                @if($vendor->profile->avatar != null)
                                    <img id="profile-display" src="{{Storage::disk('admin')->url($vendor->profile->avatar)}}" itemprop="image">
                                @else 
                                    <img id="profile-display" src="{{asset('images/resource/profile-img1.jpg')}}" itemprop="image">
                                @endif
                            @else 
                            <img id="profile-display" src="{{asset('images/resource/profile-img1.jpg')}}" itemprop="image">
                            @endif
                        </div>
                        <a class="red-clr change-password" href="#" title="" itemprop="url">Change Password</a>
                        <div class="profile-img-upload-btn">
                            <label class="fileContainer brd-rd5 yellow-bg">
                                UPLOAD PICTURE
                                <input id="profile-upload" type="file" name="avatar"/>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-sm-8 col-lg-8">
                    <div class="profile-info-form-wrap">
                        <div class="row mrg20">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <label>About</label>
                                <textarea class="brd-rd3" name="about">{!!isset($vendor->profile->about) ? $vendor->profile->about : ''!!}</textarea>
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <label>Phone No</label>
                                <input class="brd-rd3" name="phone" type="text" placeholder="Enter Your Phone No" value="{{isset($vendor->profile->phone) ? $vendor->profile->phone : ''}}">
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <label>Company Address</label>
                                <input class="brd-rd3" name="address" type="text" placeholder="Enter Your Company Address" value="{{isset($vendor->profile->address) ? $vendor->profile->address : ''}}">
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <label>Delivery Locations</label>
                                @php 
                                    $location = array(); 
                                    if($vendor->region != '')
                                        array_push($location, $vendor->region);
                                    if($vendor->country != '')
                                        array_push($location, $vendor->country);
                                    if($vendor->city != '')
                                        array_push($location, $vendor->city);
                                @endphp
                                <input class="brd-rd3" name="location" type="text" placeholder="Search Location" value="{{join(' • ', $location)}}">
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <label>Payment Terms</label>
                                <input class="brd-rd3" name="payment_terms" type="text" placeholder="Payment Terms" value="{{$vendor->profile->payment_terms}}">
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <label>Order Terms</label>
                                <input class="brd-rd3" name="order_terms" type="text" placeholder="Order Terms" value="{{$vendor->profile->order_terms}}">
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <label>Type Served</label>
                                <input class="brd-rd3" name="type_served" type="text" placeholder="Type Served" value="{{$vendor->profile->type_served}}">
                            </div>
                            <div class="col-md-12" style="display: flex; padding-bottom: 20px;">
                                <span class="check-box" style="margin-right: 5px">
                                    <input type="checkbox" id="checkbox1" @if($vendor->profile->dine_in_availabity == 1) checked @endif name="dine_in_availabity">
                                    <label for="checkbox1">Dine-in Available</label>
                                </span>
                                <span class="check-box">
                                    <input type="checkbox" name="take_away_availabity" @if($vendor->profile->take_away_availabity == 1) checked @endif id="checkbox2">
                                    <label for="checkbox2">Take Away Available</label>
                                </span>
                            </div>
                        </div>
                        <div class="row mrg20">
                            <div class="col-md-12">
                                <button class="btn btn-danger" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $('.profile-info-form').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(resp){
                if(resp.success){
                    Swal.fire({
                        title: 'success',
                        text: resp.msg,
                        icon: 'success'
                    }).then(()=>{
                        location.href = "{{route('vendors.profile')}}";
                    });
                }else{
                    swal(resp.msg, {
                        icon: 'error'
                    });
                }
            },
            error: function(resp){
                let form = $('.profile-info-form');
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

    $( "input[name=location]").autocomplete({
        source: async function(request, response){
            let data = await $.ajax({
                url: "{{route('locations.all')}}",
                dataType: "json",
                data:{
                    search: $( "input[name=location]").val()
                },
                type: "GET"
            });
            response($.map(data.locations, function(location){
                var loc = [];
                if(location.region != null){
                    loc.push(location.region);
                }
                if(location.country != null){
                    loc.push(location.country);
                }
                if(location.city != null){
                    loc.push(location.city);
                }
                return {
                    label: loc.join(' • '),
                    value: loc.join(' • ')
                };
            }));
        },
        change: function (ev, ui) {
            if (!ui.item) {
                $(this).val('');
            }
        },
        minLength: 0
    }).on('focus', function(event) {
        var self = this;
        $(self).autocomplete( "search", this.value);;
    });
</script>
@endsection