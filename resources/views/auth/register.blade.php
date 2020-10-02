@extends('layouts.app')

@section('content')
<section>
    <div class="block">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <div class="login-register-wrapper">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-lg-6">
                                <div class="sign-popup-wrapper brd-rd5">
                                    <div class="sign-popup-inner brd-rd5">
                                        <div class="sign-popup-title text-center">
                                            <h4 itemprop="headline">SIGN UP</h4>
                                        </div>
                                        <form class="sign-form" action="{{route('register')}}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                                    <input class="brd-rd3 @error('username') is-invalid @enderror" name="username" type="text" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Username">
                                                    @error('username')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                        
                                                <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                                    <input class="brd-rd3 @error('email') is-invalid @enderror" name="email" type="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                
                                                <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                                    <input id="password" type="password" class="brd-rd3 @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                                    <input id="password-confirm" type="password" class="brd-rd3" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                                                </div>

                                                <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                                    <input class="brd-rd3 @error('vendor_name') is-invalid @enderror" name="vendor_name" type="text" value="{{ old('vendor_name') }}" required autocomplete="vendor_name" autofocus placeholder="Restaurant name">
                                                    @error('vendor_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                                    <input class="brd-rd3 @error('vat') is-invalid @enderror" name="vat" type="text" value="{{ old('vat') }}" required autocomplete="vat" autofocus placeholder="PIB (number unique)">
                                                    @error('vat')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                                    <input class="brd-rd3 @error('vat_sec') is-invalid @enderror" name="vat_sec" type="text" value="{{ old('vat_sec') }}" required autocomplete="vat_sec" autofocus placeholder="Matični broj (number unique)">
                                                    @error('vat_sec')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                                    <button class="red-bg brd-rd3" type="submit">REGISTER NOW</button>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                                    <a class="sign-btn" href="{{route('login')}}" title="" itemprop="url">Already Registered? Sign in</a>
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
        </div>
    </div>
</section>
@endsection
