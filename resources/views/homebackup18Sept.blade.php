@extends('layouts.clinical')

@section('content')

<section class="login-sec verify-sec">
        <div class="container">
        @if(\Session::has('success'))
                <div class="alert alert-success">
                    {{\Session::get('success')}}
                </div>
        @endif
        <h4>Sign in Successful</h4>
          <div class="login-create-form">
            @if((Auth::user()->verified == '0'))
                <h4>Verify Your Email Address</h4>
            @endif
            @if((Auth::user()->verified == '1'))
               <h4>Email Address Successfully Verified</h4>
            @endif
            <div class="verification-section">
              <div class="row">
                <div class="col-auto">
                  <img src="images/verification-email.png">
                </div>
                <div class="col">
                  <div class="verify-sec-txt">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('warning'))
                    <div class="alert alert-warning">
                        {{ session('warning') }}
                    </div>
                   @endif

                    @if((Auth::user()->verified == '0'))

                      <p>You have not yet verified ownership of your email address {{Auth::user()->email}}</p>
                      <p>We request the use of validated email addresses to better ensure security and privacy. If you need to change the email address for your account to one that you can validate, <a href="#">please click here to update your account.</a></p>
                      <span>Click the “Send Verification email” button below to start the email verification.</span>
                    </div>

                  <div class="note-sec">
                    <p>Note that while you will now be able to continue as a logged-in user, some features of this website will not be
                    available until you complete the email verification, and accounts without a validated email may be locked in the future. </p>
                    @endif

                    @if((Auth::user()->verified == '1'))
                    <p>Thank you for verifying the ownership of your email address {{Auth::user()->email}}</p>
                    <br>
                    <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{url('/create/profile')}}" class="btn-typo-purple">Continue</a>
                            </div>
                    </div>
                    {{-- <button type = "button" name="buttonlogin" id="buttonlogin">Login</button> --}}
                    @endif

                    @if((Auth::user()->verified == '0'))
                    <div class="form-group row mb-0">
                        <div class="col-md-4">
                            <a href="{{url('/create/profile')}}" class="btn-typo-purple-light">Continue Unverified</a>
                        </div>
                    </div>

                    <form method="GET" action="{{ route('verified') }}">
                    @csrf
                    <div class="form-group row mb-0">
                        <div class="col-md-4">
                            <button type="submit" class="btn-typo-purple">
                                Send Verification Email
                            </button>
                        </div>
                    </div>
                    </form>
                    @endif
                  </div>
                </div>
              </div>
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
