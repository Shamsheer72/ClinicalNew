@extends('layouts.clinical')

@section('content')

<div class="container">

        @if ($errors->any())

            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />

        @endif

        @if(\Session::has('success'))

            <div class="alert alert-success">
                {{\Session::get('success')}}
            </div>

        @endif

<section class="login-sec verify-sec">
        <div class="container">
        <form method="post" action="{{url('/create/profile')}}" enctype="multipart/form-data">
                    @csrf
        <input type="hidden" value="{{csrf_token()}}" name="_token" />
        <h4>Create your profile and customize your platform.</h4>
        <div class="profile-selector">
          <h4>Who is this profile for?</h4>
        <div class="post-sec login-main-fture profile-tab">
           <div class="owl-carousel owl-theme owl-desktop-vw">
                @foreach($roles as $role)
                        <div class="item">
                            <div class="pro-tabbing">
                                <?php $roled = $role->name ; ?>
                                @if (isset($role->id) && $role->id == 2)
                                  <input type="radio" name="role" id="select_product" onclick="physhow();" value="<?php echo $role->id; ?>"><br>
                                  <label>{{ $roled }}</label>
                                  <span class="tooltiptext">{{ $roled }}</span>
                                @elseif (isset($role->id) && $role->id == 4)
                                  <input type="radio" name="role" id="select_product" onclick="patientvolshow();" value="<?php echo $role->id; ?>"><br>
                                  <label>{{ $roled }}</label>
                                  <span class="tooltiptext">{{ $role->name }}</span>
                                @elseif (isset($role->id) && $role->id == 5)
                                  <input type="radio" name="role" id="select_product" onclick="physhow();" value="<?php echo $role->id; ?>"><br>
                                  <label>{{ $roled }}</label>
                                  <span class="tooltiptext">{{ $roled }}</span>
                                @elseif (isset($role->id) && $role->id == 6)
                                  <input type="radio" name="role" id="select_product" onclick="physhow();" value="<?php echo $role->id; ?>"><br>
                                  <label>{{ $roled }}</label>
                                  <span class="tooltiptext">{{ $roled }}</span>
                                @elseif (isset($role->id) && $role->id == 7)
                                  <input type="radio" name="role" id="select_product" onclick="physhow();" value="<?php echo $role->id; ?>"><br>
                                  <label>{{ $roled }}</label>
                                  <span class="tooltiptext">{{ $roled }}</span>
                                @elseif (isset($role->id) && $role->id == 8)
                                  <input type="radio" name="role" id="select_product" onclick="physhow();" value="<?php echo $role->id; ?>"><br>
                                  <label>{{ $roled }}</label>
                                  <span class="tooltiptext">{{ $roled }}</span>
                                @else

                                @endif
                            </div>
                        </div>
                @endforeach
            </div>
        </div>

        </div>
          <div class="login-create-form">
            <div class="accordion" id="accordionExample">
              <div class="card" id="patientinfo">
                <div class="card-header" id="headingOne">
                  <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Patient Information
                    </button>
                  </h2>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12 col-md-6 login-form-fields">
                        <input id="patientfirst" type="text" placeholder="First Name*" value="<?php echo isset($profile->patientfirst) ? $profile->patientfirst : '' ?>" class="form-cont @error('patientfirst') is-invalid @enderror" name="patientfirst"   autocomplete="patientfirst" autofocus>
                        <span>First Name of the person that is needs a clinical trial</span>
                      </div>
                      <div class="col-12 col-md-6 login-form-fields">
                        <input id="patientlast" type="text" placeholder="Last Name*" class="form-cont @error('patientlast') is-invalid @enderror" name="patientlast" value="<?php echo isset($profile->patientlast) ? $profile->patientlast : ''; ?>"  autocomplete="patientlast" autofocus>
                      </div>
                      <div class="col-12 col-md-6 login-form-fields">
                        <input id="patientdate" type="date" placeholder="Date of Birth (MM/DD/YYYY)" class="form-cont @error('patientdate') is-invalid @enderror" name="patientdate" value="<?php echo isset($profile->patientdate) ? $profile->patientdate : ''; ?>"  autocomplete="patientdate" autofocus>
                      </div>
                      <div class="col-12 col-md-6 form-fields">
                        <ul class="checkbox-layout">
                          <li>
                            <input type="checkbox" value="1" name="clinicalstatus"  {{{ (isset($profile->clinicalstatus) && $profile->clinicalstatus == '1') ? "checked" : "" }}}>
                            <label>I am volunteering for a clinical study</label>
                          </li>
                          <li>
                            <input type="checkbox" value="1" name="medicalstatus" {{{ (isset($profile->medicalstatus) && $profile->medicalstatus == '1') ? "checked" : "" }}}>
                            <label>I have a medical condition</label>
                          </li>
                        </ul>
                      </div>
                      <div class="col-12 col-md-8 login-form-fields">
                        <div class="upload-file">
                          <input type="file" placeholder="Click here to upload your medical records" name="file_name[]" multiple>
                          Click here to upload your medical records
                        </div>
                        <span>Volunteers don’t have to upload medical records</span>
                      </div>
                      <div class="col-12 col-md-4 form-fields">
                        <div class="upload-btn text-right">
                          <a href="#">Upload</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card" id="continfo">
                <div class="card-header" id="headingTwo">
                  <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Contact Information
                    </button>
                  </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                  <div class="card-body">
                      <div class="row">
                          <div class="col-12 col-md-6 login-form-fields">
                            <input id="addressinfo" type="text" placeholder="Address Details*" class="form-cont @error('addressinfo') is-invalid @enderror" name="addressinfo" value="<?php echo isset($profile->addressinfo) ? $profile->addressinfo : ''; ?>" autocomplete="addressinfo" autofocus>
                          </div>
                          <div class="col-12 col-md-6 login-form-fields">
                            <input id="addressinfo" type="number" placeholder="Contact Number*" class="form-cont @error('contactinfo') is-invalid @enderror" name="contactinfo" value="<?php echo isset($profile->contactinfo) ? $profile->contactinfo : ''; ?>" autocomplete="contactinfo" autofocus>
                          </div>
                        </div>
                  </div>
                </div>
              </div>
              <div class="card" id="proinfo">
                <div class="card-header" id="headingThree">
                  <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      Professional Information
                    </button>
                  </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                  <div class="card-body">
                      <div class="row">
                          <div class="col-12 col-md-6 login-form-fields">
                            <input id="companyinfo" type="text" placeholder="Company Name*" class="form-control @error('companyinfo') is-invalid @enderror" name="companyinfo" value="<?php echo isset($profile->companyinfo) ? $profile->companyinfo : ''; ?>"  autocomplete="companyinfo" autofocus>
                          </div>
                          <div class="col-12 col-md-6 login-form-fields">
                            <input id="jobtitleinfo" type="text" placeholder="Job Title*" class="form-control @error('jobtitleinfo') is-invalid @enderror" name="jobtitleinfo" value="<?php echo isset($profile->jobtitleinfo) ? $profile->patientfirst : ''; ?>"  autocomplete="jobtitleinfo" autofocus>
                          </div>
                        </div>
                  </div>
                </div>
              </div>
              <div class="card" id="paymentinfo">
                <div class="card-header" id="headingThree">
                  <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                      Payment Information
                    </button>
                  </h2>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                  <div class="card-body">
                      <div class="row">
                          <div class="col-12 col-md-6 login-form-fields">
                            <input id="credit_card_info" type="text" placeholder="Credit Card Information*" class="form-cont @error('credit_card_info') is-invalid @enderror" name="credit_card_info" value="<?php echo isset($profile->credit_card_info) ? $profile->credit_card_info : ''; ?>" autocomplete="credit_card_info" autofocus>
                          </div>
                          <div class="col-12 col-md-6 login-form-fields">
                            <input id="ach_info" type="text" placeholder="ACH Details*" class="form-control @error('ach_info') is-invalid @enderror" name="ach_info" value="<?php echo isset($profile->ach_info) ? $profile->ach_info : ''; ?>" autocomplete="ach_info" autofocus>
                          </div>
                        </div>
                  </div>
                </div>
              </div>
              <div class="card" id="bankinfo">
                <div class="card-header" id="headingThree">
                  <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                      Banking Information
                    </button>
                  </h2>
                </div>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                  <div class="card-body">
                      <div class="row">
                          <div class="col-12 col-md-6 login-form-fields">
                            <input id="bankname" type="text" placeholder="Bank Name*" class="form-cont @error('bankname') is-invalid @enderror" name="bankname" value="<?php echo isset($profile->bankname) ? $profile->bankname : ''; ?>"  autocomplete="bankname" autofocus>
                          </div>
                          <div class="col-12 col-md-6 login-form-fields">
                            <input id="account_number" type="number" placeholder="Account Number*" class="form-cont @error('account_number') is-invalid @enderror" name="account_number" value="<?php echo isset($profile->account_number) ? $profile->account_number : ''; ?>"  autocomplete="account_number" autofocus>
                          </div>
                        </div>
                  </div>
                </div>
              </div>
              <div class="card" id="nonprofit">
                <div class="card-header" id="headingThree">
                  <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                      Non-Profit Information

                    </button>
                  </h2>
                </div>
                <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                  <div class="card-body">
                      <div class="row">
                          <div class="col-12 col-md-6 login-form-fields">
                            <input id="nameofcharity" type="text" placeholder="Name of Charity*" class="form-cont @error('nameofcharity') is-invalid @enderror" name="nameofcharity" value="<?php echo isset($profile->nameofcharity) ? $profile->nameofcharity : ''; ?>"  autocomplete="nameofcharity" autofocus>
                          </div>
                        </div>
                  </div>
                </div>
              </div>
              </div>
              <div class="reset-pass text-center">
                <a href="#">Reset password</a>
              </div>
              <div class="upload-btn text-center my-5">
                <input type="submit" value="COMPLETE"  data-toggle="modal" data-target="#exampleModalCenter">
              </div>
              <div class="all-secure text-center">
                  <img src="{{ asset('images/all-secure.png') }}">
                  <span>All of your information is secure.</span>
                </div>
          </div>
        </form>
          </div>

          <script>

                function physhow()
                {
                      document.getElementById('patientinfo').style.display ='block';
                      document.getElementById('continfo').style.display ='block';
                      document.getElementById('proinfo').style.display ='block';
                      document.getElementById('paymentinfo').style.display ='none';
                      document.getElementById('bankinfo').style.display ='block';
                      document.getElementById('nonprofit').style.display ='block';
                }

                function patientvolshow()
                {
                      document.getElementById('patientinfo').style.display ='block';
                      document.getElementById('continfo').style.display ='block';
                      document.getElementById('proinfo').style.display ='none';
                      document.getElementById('paymentinfo').style.display ='none';
                      document.getElementById('bankinfo').style.display ='block';
                      document.getElementById('nonprofit').style.display ='block';
                }


        </script>
</section>

@endsection
