@extends('layouts.app')
@section('stylesheets')
    <style>
        .display-center{
            display: flex !important;
            justify-content: center !important;
        }
    </style>
@endsection
@section('content')
<section>
    <div class="block">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <div class="login-register-wrapper">
                        <div class="row display-center">
                            <div class="col-md-6 col-sm-12 col-lg-6">
                                <div class="sign-popup-wrapper brd-rd5">
                                    <div class="sign-popup-inner brd-rd5">
                                        <div class="sign-popup-title text-center">
                                            <h4 itemprop="headline">{{ __('Reset Password') }}</h4>
                                        </div>
                                        <form method="POST" class="sign-form" action="{{ route('password.update') }}">
                                                @csrf
                                                <input type="hidden" name="token" value="{{ $token }}">
    
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                                    <input id="email" class="brd-rd3 @error('email') is-invalid @enderror" name="email" type="email" value="{{ $email ?? old('email') }}" placeholder="Email Address" required autocomplete="email" autofocus>
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                                    <input id="password" type="password" class="brd-rd3 @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}" name="password" required autocomplete="new-password">
                        
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                        
                                                <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                                    <input id="password-confirm" type="password" class="brd-rd3" placeholder="{{ __('Confirm Password') }}" name="password_confirmation" required autocomplete="new-password">
                                                </div>

                                                <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                                    <button class="red-bg brd-rd3" type="submit">{{ __('Reset Password') }}</button>
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
