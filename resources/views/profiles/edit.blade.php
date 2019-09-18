@extends('layouts.app')

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
    <div class="row">
    <form method="post" action="{{action('ProfilesController@update', $id)}}">
        {{csrf_field()}}
        <input name="_method" type="hidden" value="PATCH">
        <div class="form-group">

            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <div class="card-header">Create your profile and customize your information</div>
            <p>Who is this profile for ?</p>
            <input type="radio" name="role" value="physicians" {{ ($profile->role=="3")? "checked" : "" }} onclick="show1();" />
            Physicians
            <input type="radio" name="role" value="patientsandvolunteers" {{ ($profile->role=="patientsandvolunteers")? "checked" : "" }} onclick="show2();" />
            Patients and Volunteers
            <br>

            <div id="div1" class="hide">
            <hr><p>Patient Information</p>
            First Name
            <input id="patientfirst" type="text" class="form-control @error('patientfirst') is-invalid @enderror" name="patientfirst" value="{{$profile->patientfirst}}" required autocomplete="patientfirst" autofocus>
            @error('firstname')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            Last Name
            <input id="patientlast" type="text" class="form-control @error('patientlast') is-invalid @enderror" name="patientlast" value="{{$profile->patientlast}}" required autocomplete="patientlast" autofocus>
            Date
            <input id="patientdate" type="date" class="form-control @error('patientdate') is-invalid @enderror" name="patientdate" value="{{$profile->patientdate}}" required autocomplete="patientdate" autofocus>
            I am volunteering for a clinical study
            <input type="checkbox" value="Yes" name="one">
            <br>
            I have a Medical Condition
            <input type="checkbox" value="Yes" name="two">

            </div>

            <div id="div2" class="hide">
            <hr><p>Personal Information</p>
            Address
            <input id="addressinfo" type="text" class="form-control @error('addressinfo') is-invalid @enderror" name="addressinfo" value="{{$profile->addressinfo}}" required autocomplete="addressinfo" autofocus>
            Contact Information
            <input id="contactinfo" type="text" class="form-control @error('contactinfo') is-invalid @enderror" name="contactinfo" value="{{$profile->contactinfo}}" required autocomplete="contactinfo" autofocus>
            </div>

            <div id="div2" class="hide">
                    <hr><p>Professional Information</p>
                    <br>
                    Company Information
                    <input id="companyinfo" type="text" class="form-control @error('companyinfo') is-invalid @enderror" name="companyinfo" value="{{ old('companyinfo') }}" required autocomplete="companyinfo" autofocus>
                    Job Title
                    <input id="jobtitleinfo" type="text" class="form-control @error('jobtitleinfo') is-invalid @enderror" name="jobtitleinfo" value="{{ old('jobtitleinfo') }}" required autocomplete="jobtitleinfo" autofocus>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>

            <script>
                    function show1()
                    {
                          document.getElementById('div1').style.display ='block';
                          document.getElementById('div2').style.display ='block';

                    }
                    function show2()
                    {
                          document.getElementById('div2').style.display = 'block';
                          document.getElementById('div1').style.display ='none';
                    }
            </script>
        </form>
    </div>
</div>
@endsection
