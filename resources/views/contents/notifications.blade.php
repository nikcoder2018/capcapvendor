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
<div class="tabs-wrp account-settings brd-rd5">
    <h4 itemprop="headline">Notifications</h4>
    <div class="account-settings-inner">
        <div class="row">
            <div class="col-md-12">
                <span class="check-box"><input type="checkbox" id="checkbox-newsletter" @if(auth()->user()->allow_newsletters == 1) checked @endif><label for="checkbox-newsletter">Allow receive newsletters</label></span>
            </div>
        </div>
    </div>
</div>   
@endsection

@section('scripts')
    <script>
        $('#checkbox-newsletter').on('change', function(){
            if($(this).prop('checked') == true){
                $.get("{{route('vendors.notifications.allownewsletter')}}", {status: 1});
            }else{
                $.get("{{route('vendors.notifications.allownewsletter')}}", {status: 0});
            }
        });
    </script>
@endsection