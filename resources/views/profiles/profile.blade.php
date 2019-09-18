@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create your profile and customize your information</div>
                <br>
                <p>Who is this profile for</p>
                        <input type="radio" name="tab" value="physicians" onclick="show1();" />
                        Physicians
                        <input type="radio" name="tab" value="patientsandvolunteers" onclick="show2();" />
                        Patients and Volunteers

                            <div id="div1" class="hide">
                            <hr><p>Patient Information</p>
                            First Name
                            {{-- {{ $user->profile->patientfirst }} --}}
                            <input id="patientfirst" type="text" class="form-control @error('patientfirst') is-invalid @enderror" name="patientfirst" value="{{ old('patientfirst') }}" required autocomplete="patientfirst" autofocus>
                            @error('firstname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            Last Name
                            <input id="patientlast" type="text" class="form-control @error('patientlast') is-invalid @enderror" name="patientlast" value="{{ old('patientlast') }}" required autocomplete="patientlast" autofocus>
                            Date
                            <input id="patientdate" type="date" class="form-control @error('patientdate') is-invalid @enderror" name="patientdate" value="{{ old('patientdate') }}" required autocomplete="patientdate" autofocus>
                            I am volunteering for a clinical study
                            <input type="checkbox" value="Yes" name="one">
                            I have a Medical Condition
                            <input type="checkbox" value="Yes" name="two">
                            </div>

                            <div id="div2" class="hide">
                            <hr><p>Personal Information</p>
                            Address
                            <input id="addressinfo" type="text" class="form-control @error('addressinfo') is-invalid @enderror" name="addressinfo" value="{{ old('addressinfo') }}" required autocomplete="addressinfo" autofocus>
                            Contact Information
                            <input id="contactinfo" type="text" class="form-control @error('contactinfo') is-invalid @enderror" name="contactinfo" value="{{ old('contactinfo') }}" required autocomplete="contactinfo" autofocus>
                            </div>
            </div>

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

            <form method="GET" action="/nextpage">
                @csrf
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Upload
                            </button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>

<style>
.hide
{
  display: none;
}
p
{
  font-weight: bold;
}
</style>
@endsection
