@extends('layouts.clinical')

@section('content')
<section class="login-sec">
        <div class="container">
          <div class="already-accc">
            <h3>Don't  have an account? <a href="{{ route('register') }}">Click here to Sign Up</a></h3>
          </div>
          <div class="login-create-form">
            <div class="sign-up-social">
              <ul>
                <li class="login-facebook">
                  <a href="{{ url('/login/facebook') }}"><i class="fa fa-facebook" aria-hidden="true"></i> Sign up with Facebook</a>
                </li>
                <li class="login-google">
                  <a href="{{ url('/login/google') }}"><img src="images/google.png"> Sign up with Google</a>
                </li>
              </ul>
            </div>
            <div class="login-form">
            <form method="POST" action="{{ route('login') }}">
                            @csrf
                <div class="form-inputs">
                  <div class="row">
                    <div class="col-12 col-md-6 login-form-fields">
                        <img src="images/email.png"><input id="email" type="email" placeholder="Email Address (your Account Name)*" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                <div class="col-12 col-md-6 login-form-fields">
                        <input id="password" type="password" placeholder="Password*" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                </div>
                </div>
                </div>
                <div class="all-secure">
                  <img src="images/all-secure.png">
                  <span>All of your information is secure.</span>
                </div>
                <input type="submit" value="login" class="btn-typo">
                @if (Route::has('password.request'))
                <a class="btn-typo" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
              </form>
            </div>
          </div>
          <div class="terms-privacy">
            <ul>
              <li>
                <a href="#">Terms</a>
              </li>
              <li>
                <a href="#">Privacy</a>
              </li>
            </ul>
          </div>
        </div>
      </section>

@endsection
