@extends('layouts.clinical')

@section('content')
<section class="login-sec">
    <div class="container">
      <div class="sign-up-feature">
        <h2 class="main-head">Why sign up for the<br>Clinical Match platform?</h2>
        <div class="row login-main-fture justify-content-center">
          <div class="col-auto mb-4 mb-md-0">
            <div class="login-feature">
              <img src="images/find-we-do-icon2.png">
              <h4>Feature<br>& Benefit #1</h4>
            </div>
          </div>
          <div class="col-auto mb-4 mb-md-0">
            <div class="login-feature">
              <img src="images/find-we-do-icon2.png">
              <h4>Feature<br>& Benefit #2</h4>
            </div>
          </div>
          <div class="col-auto mb-4 mb-md-0">
            <div class="login-feature">
              <img src="images/find-we-do-icon2.png">
              <h4>Feature<br>& Benefit #3</h4>
            </div>
          </div>
        </div>
      </div>
      <div class="new-accc">
        <h3>New to Clinical Match? <a class="btn-typo" href="{{ route('register') }}">CREATE YOUR NEW ACCOUNT</a></h3>
      </div>
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
        <div class="login-form-pg">
          <h3>Login</h3>
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-inputs">
              <div class="row">
                <div class="col-12 col-md-6 login-field">
                  <label>Username or email</label>
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="col-12 col-md-6 login-field">
                  <label>Password</label>
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror

                  @if (Route::has('password.request'))
                  <a class="frgt-pass" href="{{ route('password.request') }}">
                     Forgot your password?
                  </a>
                  @endif
                </div>
              </div>
            </div>
            <div class="text-center">
              <input type="submit" value="sign in to your account" class="btn-typo">
            </div>
          </form>
        </div>
    </div>
  </section>

@endsection
