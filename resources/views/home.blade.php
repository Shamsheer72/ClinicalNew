@extends('layouts.clinical')

@section('content')

@if((Auth::user()->verified == '0'))
<section class="login-sec verify-sec">
        <div class="container">
        <h4>Sign in Successful</h4>
          <div class="login-create-form">
            <h4>Verify Your Email Address</h4>
            <div class="verification-section">
              <div class="row">
                <div class="col-12 col-md-auto text-center email-verificatio-img">
                  <img src="images/verification-email.png">
                </div>
                <div class="col-12 col-md email-verificatio-text">
                  <div class="verify-sec-txt">
                      <p>You have not yet verified ownership of your email address {{Auth::user()->email}}</p>
                      <p>We request the use of validated email addresses to better ensure security and privacy. If you need to change the email address for your account to one that you can validate, <a href="#">please click here to update your account.</a></p>
                      <span>Click the “Send Verification email” button below to start the email verification.</span>
                    </div>
                  <div class="note-sec">
                    <p>Note that while you will now be able to continue as a logged-in user, some features of this website will not be
                    available until you complete the email verification, and accounts without a validated email may be locked in the future. </p>
                  </div>
                  <div class="verify-call">
                    <ul class="m-0 p-0">
                      <li>
                        <a href="{{url('/create/profile')}}">CONTINUE UNVERIFIED</a>
                      </li>
                      <li class="call-verify">
                        {{-- <a href="#">SEND VERIFICATION EMAIL</a> --}}
                        <form method="GET" action="{{ route('verified') }}">
                                @csrf
                        <button type="submit">
                                SEND VERIFICATION EMAIL
                        </button>
                        </form>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
</section>
@endif

@if((Auth::user()->verified == '1'))

<section class="login-sec verify-sec">
        <div class="container">
        <h4>Email address successfully verified</h4>
          <div class="login-create-form">
            <div class="verified-section">
              <div class="row align-items-center">
                <div class="col-12 col-md-auto text-center email-verificatio-img">
                  <img src="images/verified-email.png">
                </div>
                <div class="col-12 col-md email-verificatio-text">
                  <div class="verify-sec-txt">
                      <p>Thank you for verifying ownership of your email address.</p>
                    </div>
                  <div class="verify-call">
                    <ul class="m-0 p-0">
                      <li class="call-verify">
                        <a href="{{url('/create/profile')}}">CONTINUE</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
</section>
@endif

@endsection
