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
                                            <h4 itemprop="headline">SIGN IN</h4>
                                        </div>
                                        <form method="POST" class="sign-form" action="{{ route('login') }}">
                                                @csrf
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                                    <input id="email" class="brd-rd3 @error('email') is-invalid @enderror" name="email" type="email" value="{{ old('email') }}" placeholder="Email Address" required autocomplete="email" autofocus>
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                                    <input id="password" class="brd-rd3 @error('password') is-invalid @enderror" name="password" type="password" placeholder="Password"required autocomplete="current-password">
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                                    <button class="red-bg brd-rd3" type="submit">SIGN IN</button>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                                    <a class="sign-btn" href="{{ route('register') }}" title="" itemprop="url">Not a member? Sign up</a>
                                                    @if (Route::has('password.request'))
                                                        <a class="recover-btn" href="{{ route('password.request') }}" title="" itemprop="url">Recover my password</a>
                                                    @endif
                                                    
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-lg-6">
                                <
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
