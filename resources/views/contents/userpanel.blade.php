@extends('layouts.account')

@section('breadcrumbs')
<div class="bread-crumbs-wrapper">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#" title="" itemprop="url">Home</a></li>
            <li class="breadcrumb-item active">Profile</li>
        </ol>
    </div>
</div>
@endsection
@section('content')
<div class="dashboard-wrapper brd-rd5">
    <div class="welcome-note yellow-bg brd-rd5">
        <h4 itemprop="headline">WELCOME TO YOUR ACCOUNT</h4>
        <p itemprop="description">Things that get tricky are things like burgers and fries, or things that are deep-fried. We do have a couple of burger restaurants that are capable of doing a good</p>
        <img src="{{asset('images/resource/welcome-note-img.png')}}" alt="welcome-note-img.png" itemprop="image">
        <a class="remove-noti" href="#" title="" itemprop="url"><img src="{{asset('images/close-icon.png')}}" alt="close-icon.png" itemprop="image"></a>
    </div>

</div>
@endsection