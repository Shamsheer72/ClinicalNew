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

<div class="row">
    {{-- <a href="{{url('/profiles')}}" class="btn-typo-purple">Review Profile Details</a> --}}
    {{-- @if(isset($profile->id) && !empty($profile->id))
    <td><a href="{{action('ProfilesController@edit',$profile->id)}}" class="btn btn-primary">Edit</a></td>
    @endif --}}
</div>

    <div class="row">
    <form method="post" action="{{url('/create/profile')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <div class="card-header" >Create your profile and customize your information</div>
            <p>Who is this profile for</p>

            @foreach($roles as $role)
                 @if($role->name == 'Physicians')

                 @endif
                 {{ $role->name }}<input type="radio" name="role" id="select_product" onclick="show2();" value="<?php echo $role->id; ?>"><br>

            @endforeach
            {{-- <input type="radio" name="role" value="physicians" onclick="show1();" />
            Physicians
            <input type="radio" name="role" value="patientsandvolunteers" onclick="show2();" />
            Patients and Volunteers
            <br> --}}
            <div id="div1" class="hide">
            <hr><p>Patient Information</p>
            First Name
            <input id="patientfirst" type="text" value="<?php echo isset($profile->patientfirst) ? $profile->patientfirst : '' ?>" class="form-control @error('patientfirst') is-invalid @enderror" name="patientfirst"  required autocomplete="patientfirst" autofocus>
            @error('patientfirst')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            Last Name
            <input id="patientlast" type="text" class="form-control @error('patientlast') is-invalid @enderror" name="patientlast" value="<?php echo isset($profile->patientlast) ? $profile->patientlast : ''; ?>" required autocomplete="patientlast" autofocus>
            Date
            <input id="patientdate" type="date" class="form-control @error('patientdate') is-invalid @enderror" name="patientdate" value="<?php echo isset($profile->patientdate) ? $profile->patientdate : ''; ?>" required autocomplete="patientdate" autofocus>
            I am volunteering for a clinical study
            <input type="checkbox" value="Yes" name="one">
            <br>
            I have a Medical Condition
            <input type="checkbox" value="Yes" name="two">
            <br>
            Medical Records
            <input type="file" name="file_name[]" multiple>
            </div>
            </div>

            <div id="div2" class="hide">
            <hr><p>Personal Information</p>
            <br>
            Address
            <input id="addressinfo" type="text" class="form-control @error('addressinfo') is-invalid @enderror" name="addressinfo" value="<?php echo isset($profile->addressinfo) ? $profile->addressinfo : ''; ?>" required autocomplete="addressinfo" autofocus>
            Contact Information
            <input id="contactinfo" type="number" class="form-control @error('contactinfo') is-invalid @enderror" name="contactinfo" value="<?php echo isset($profile->contactinfo) ? $profile->contactinfo : ''; ?>" required autocomplete="contactinfo" autofocus>
            </div>

            <div id="div3" class="hide">
            <hr><p>Professional Information</p>
            <br>
            Company Information
            <input id="companyinfo" type="text" class="form-control @error('companyinfo') is-invalid @enderror" name="companyinfo" value="<?php echo isset($profile->companyinfo) ? $profile->companyinfo : ''; ?>" required autocomplete="companyinfo" autofocus>
            Job Title
            <input id="jobtitleinfo" type="text" class="form-control @error('jobtitleinfo') is-invalid @enderror" name="jobtitleinfo" value="<?php echo isset($profile->jobtitleinfo) ? $profile->patientfirst : ''; ?>" required autocomplete="jobtitleinfo" autofocus>
            </div>

            <div id="div4" class="hide">
            <hr><p>Payment Information</p>
            <br>
            Credit Card Information
            <input id="credit_card_info" type="text" class="form-control @error('credit_card_info') is-invalid @enderror" name="credit_card_info" value="<?php echo isset($profile->credit_card_info) ? $profile->credit_card_info : ''; ?>" required autocomplete="credit_card_info" autofocus>
            Ach Information
            <input id="ach_info" type="text" class="form-control @error('ach_info') is-invalid @enderror" name="ach_info" value="<?php echo isset($profile->ach_info) ? $profile->ach_info : ''; ?>" required autocomplete="ach_info" autofocus>
            </div>

            <div id="div5" class="hide">
            <hr><p>Banking Information</p>
            <br>
            Bank Name
            <input id="bankname" type="text" class="form-control @error('bankname') is-invalid @enderror" name="bankname" value="<?php echo isset($profile->bankname) ? $profile->bankname : ''; ?>" required autocomplete="bankname" autofocus>
            Account Number
            <input id="account_number" type="number" class="form-control @error('account_number') is-invalid @enderror" name="account_number" value="<?php echo isset($profile->account_number) ? $profile->account_number : ''; ?>" required autocomplete="account_number" autofocus>
            </div>

            <div id="div6" class="hide">
            <hr><p>Non Profit Information</p>
            <br>
            Name Of Charity
            <input id="nameofcharity" type="text" class="form-control @error('nameofcharity') is-invalid @enderror" name="nameofcharity" value="<?php echo isset($profile->nameofcharity) ? $profile->nameofcharity : ''; ?>" required autocomplete="nameofcharity" autofocus>
            </div>

            <button type="submit" class="btn-typo-purple">Complete</button>

            <script>
                    function show1()
                    {
                          document.getElementById('div1').style.display ='block';
                          document.getElementById('div2').style.display ='block';
                          document.getElementById('div3').style.display ='block';
                          document.getElementById('div4').style.display ='block';
                          document.getElementById('div5').style.display ='block';
                          document.getElementById('div6').style.display ='block';


                    }
                    function show2()
                    {
                          document.getElementById('div2').style.display = 'block';
                          document.getElementById('div1').style.display ='block';
                          document.getElementById('div3').style.display ='block';
                          document.getElementById('div4').style.display ='block';
                          document.getElementById('div5').style.display ='block';
                    }
            </script>
        </form>
    </div>
</div>
</section>
@endsection
