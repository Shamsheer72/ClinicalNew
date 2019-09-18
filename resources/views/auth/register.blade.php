@extends('layouts.clinical')

@section('content')
<section class="login-sec">
        <div class="container">
          <div class="sign-up-feature">
            <h2 class="main-head">Why sign up for the<br>Clinical Match platform?</h2>
            <div class="post-sec login-main-fture">
                  <div class="owl-carousel owl-theme owl-desktop-vw">
                    <div class="item">
                      <div class="login-feature">
                        <img src="images/find-we-do-icon2.png">
                        <h4>Feature<br>& Benefit #1</h4>
                      </div>
                    </div>
                    <div class="item">
                      <div class="login-feature">
                        <img src="images/find-we-do-icon2.png">
                        <h4>Feature<br>& Benefit #2</h4>
                      </div>
                    </div>
                    <div class="item">
                      <div class="login-feature">
                        <img src="images/find-we-do-icon2.png">
                        <h4>Feature<br>& Benefit #3</h4>
                      </div>
                    </div>
                  </div>
            </div>
          </div>
          <div class="already-accc">
            <h3>Already have an account? <a href="{{ route('login') }}">Click here to login</a></h3>
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
            <form method="POST" action="{{ route('register') }}">
                            @csrf
                <div class="form-inputs">
                  <div class="row">
                    <div class="col-12 col-md-6 login-form-fields">
                      <img src="{{ asset('images/user.png') }}"> <input id="firstname" type="text" placeholder="First Name*" class="form-control-clinical @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>
                      @error('firstname')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="col-12 col-md-6 login-form-fields">
                       <input id="lastname" type="text" placeholder="Last Name*" class="form-control-clinical @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
                            @error('lastname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="col-12 col-md-6 login-form-fields">
                      <img src="{{ asset('images/email.png') }}"><input id="email" type="email" placeholder="Email Address (your Account Name)*" class="form-control-clinical @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    <div class="col-12 col-md-6 login-form-fields">
                        <input id="email-confirm" type="email" class="form-control-clinical" placeholder="Confirm Email*" name="email_confirmation" required autocomplete="email">
                    </div>

                    <div class="col-12 col-md-6 login-form-fields">
                        <img src="{{ asset('images/password.png') }}"><input id="password" type="password" placeholder="Password*" class="form-control-clinical @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="col-12 col-md-6 login-form-fields">
                        <input id="password-confirm" type="password" placeholder="Confirm Password*" class="form-control-clinical" name="password_confirmation" required autocomplete="new-password">
                    </div>
                  </div>
                </div>
                <div class="login-terms">
                  <label>Would you like to be notified if you are a match to new trials or if there
                      are other relevant research updates?</label>
                  <div class="login-trms-cndtins">
                    <ul>
                      <li>
                        <input type="radio" name="login-term">
                        <label>Yes, I would like to receive email notifications of new matches or other relevant research updates.</label>
                      </li>
                      <li>
                        <input type="radio" name="login-term">
                        <label>No, I would not like to receive email notifications of new matches or other relevant research updates.</label>
                      </li>
                    </ul>
                    <p>By submitting this form, you agree that you have read, understand and accept our Privacy Policy and <a href="#">Terms & Conditions</a>.</p>
                  </div>
                </div>
                <div class="all-secure">
                  <img src="images/all-secure.png">
                  <span>All of your information is secure.</span>
                </div>
                <input type="submit" value="submit" class="btn-typo">
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
