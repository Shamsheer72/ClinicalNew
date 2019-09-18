@extends('layouts.clinical')

@section('content')
<section class="login-sec verify-sec">
        <div class="container">
        <h4>Review Your Profile</h4>
        <form action="/profiles/storestep" method="post" >
            {{ csrf_field() }}
          <div class="login-create-form">
            <h4>{{$profile->patientfirst. " " .$profile->patientlast}}</h4>
            <div class="verification-section">
              <div class="row">
                <div class="col">
                  <div class="verify-sec-txt">
                      <p>{{$profile->patientdate}}</p>
                      <p>{{$profile->contactinfo}}</a></p>
                      <span>{{$profile->addressinfo}}</span>
                    </div>
                  <div class="note-sec">
                    <p>{{$profile->companyinfo}}</p>
                    <p>{{$profile->account_number}}</a></p>
                    <p>{{$profile->bankname}}</a></p>
                    <p>{{$profile->nameofcharity}}</a></p>
                    <p>{{$profile->credit_card_info}}</a></p>
                    <p>{{$profile->ach_info}}</a></p>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <a type="button" href="/create/profile" class="btn-typo-purple">Go Back</a>
          {{-- <a type="button" href="/profile/thanks" class="btn-typo-purple">Thanks</a> --}}
          {{-- <a type="button" href="/products/create-step2" class="btn btn-warning">Back to Step 2</a> --}}
          <button type="submit" class="btn-typo-purple">Confirm</button>
        </div>

      </section>
    </form>
@endsection
