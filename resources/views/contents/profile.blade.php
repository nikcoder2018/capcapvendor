@extends('layouts.account')

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
                                <label>Country</label>
                                <input class="brd-rd3" name="country" type="text" placeholder="Enter Your Country" value="{{isset($vendor->profile->country) ? $vendor->profile->country : ''}}">
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-6">
                                <label>State</label>
                                <input class="brd-rd3" name="state" type="text" placeholder="Enter Your State" value="{{isset($vendor->profile->state) ? $vendor->profile->state : ''}}">
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-6">
                                <label>City</label>
                                <input class="brd-rd3" name="city" type="text" placeholder="Enter Your City" value="{{isset($vendor->profile->city) ? $vendor->profile->city : ''}}">
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-6">
                                <label>Location - Latitude</label>
                                <input class="brd-rd3" name="latitude" type="text" value="{{isset($vendor->profile->location) ? explode(',',$vendor->profile->location)[0] : ''}}">
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-6">
                                <label>Location - Longitude</label>
                                <input class="brd-rd3" name="longitude" type="text" value="{{isset($vendor->profile->location) ? explode(',',$vendor->profile->location)[0] : ''}}">
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
    </script>
@endsection