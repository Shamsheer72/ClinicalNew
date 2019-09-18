@extends('layouts.clinical')

@section('content')
<section class="login-sec verify-sec">
        <div class="container">
        <h4>Review Your Profile</h4>
        <form action="/profiles/storestep" method="post" >
            {{ csrf_field() }}
          <div class="login-create-form">
            <div class="verified-section">
              <div class="pro-rev-sec">
                <div class="pro-rev-sec-inner">
                  <div class="row align-items-center">
                    <div class="col-12 col-md-5 profile-review-data">
                      <h1>{{$profile->patientfirst. " " .$profile->patientlast}}</h1>
                      <p>{{$profile->patientdate}} Vivamus pharetra vestibulum purus, vulputate ullamcorper tortor volutpat ut. Mauris rutrum neque ante, id euismod est finibus.</p>
                    </div>
                    <div class="col-12 col-md-7 profile-review-txt">
                      <p>{{$profile->nameofcharity}} Vivamus pharetra vestibulum purus, vulputate ullamcorper tortor volutpat ut. Mauris rutrum neque ante, id euismod est finibus.Vivamus pharetra vestibulum purus, vulputate ullamcorper tortor volutpat ut. Mauris rutrum neque ante, id euismod est finibus.Vivamus pharetra vestibulum purus, vulputate ullamcorper tortor volutpat ut. Mauris rutrum neque ante, id euismod est finibus.</p>
                    </div>
                  </div>
                </div>
                <div class="pro-rev-sec-inner">
                  <div class="row">
                    <div class="col-12 col-md-4 col-lg-3 profile-review-txt">
                      <h4>Section 1</h4>
                      <p>{{$profile->contactinfo}} {{$profile->addressinfo}}Vivamus pharetra vestibulum purus, vulputate ullamcorper tortor volutpat ut. Mauris rutrum neque ante, id euismod est finibus.Vivamus pharetra vestibulum purus, vulputate ullamcorper tortor volutpat ut. Mauris rutrum neque ante, id euismod est finibus.Vivamus pharetra vestibulum purus, vulputate ullamcorper tortor volutpat ut. Mauris rutrum neque ante, id euismod est finibus.</p>
                    </div>
                    <div class="col-12 col-md-4 col-lg-6 profile-review-txt">
                      <h4>Section 2</h4>
                      <p>{{$profile->companyinfo}} {{$profile->account_number}} {{$profile->bankname}}Vivamus pharetra vestibulum purus, vulputate ullamcorper tortor volutpat ut. Mauris rutrum neque ante, id euismod est finibus.Vivamus pharetra vestibulum purus, vulputate ullamcorper tortor volutpat ut. Mauris rutrum neque ante, id euismod est finibus.Vivamus pharetra vestibulum purus, vulputate ullamcorper tortor volutpat ut. Mauris rutrum neque ante, id euismod est finibus.</p>
                    </div>
                    <div class="col-12 col-md-4 col-lg-3 profile-review-txt">
                      <h4>Section 3</h4>
                      <p> {{$profile->credit_card_info}} {{$profile->ach_info}}Vivamus pharetra vestibulum purus, vulputate ullamcorper tortor volutpat ut. Mauris rutrum neque ante, id euismod est finibus.Vivamus pharetra vestibulum purus, vulputate ullamcorper tortor volutpat ut. Mauris rutrum neque ante, id euismod est finibus.Vivamus pharetra vestibulum purus, vulputate ullamcorper tortor volutpat ut. Mauris rutrum neque ante, id euismod est finibus.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="verify-call">
                <ul class="m-0 p-0">
                  <li class="call-verify">
                        <button type="submit" class="btn-typo-purple">Confirm</button>
                        {{-- <a href="#">Confirm</a> --}}
                  </li>
                  <li class="go-bck">
                        <a href="/create/profile">Go Back</a>
                  </li>
                </ul>
              </div>
            </div>
           </form>
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
