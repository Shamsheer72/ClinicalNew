@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
              {{-- <td>ID</td> --}}
              <td>First name</td>
              <td>Last name</td>
              <td>Date</td>
              <td>Address Info</td>
              <td>Contact Info</td>
              <td>Company Info</td>
              <td colspan="2">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($profiles as $profile)
            <tr>
                {{-- <td>{{$profile->id}}</td> --}}
                <td>{{$profile->patientfirst}}</td>
                <td>{{$profile->patientlast}}</td>
                <td>{{$profile->patientdate}}</td>
                <td>{{$profile->addressinfo}}</td>
                <td>{{$profile->contactinfo}}</td>
                <td>{{$profile->companyinfo}}</td>
                <td><a href="{{action('ProfilesController@edit',$profile->id)}}" class="btn btn-primary">Edit</a></td>
                <td>
                <form action="{{action('ProfilesController@destroy', $profile->id)}}" method="post">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
                </td>
            </tr>
            <td><a href="{{action('ProfilesController@confirm',$profile->id)}}" class="btn btn-primary">Confirm</a></td>
            <td><a href="{{action('ProfilesController@edit',$profile->id)}}" class="btn btn-primary">Go Back</a></td>
            @endforeach
        </tbody>
    </table>
<div>
@endsection
