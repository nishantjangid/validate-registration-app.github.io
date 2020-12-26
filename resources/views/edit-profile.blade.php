@extends('layout')
@section('title','Edit Profile')
@php
    $hobArr = array();
    $hobArr = explode(",",$data->hobbies);

@endphp
@section('content')
<div class="profileArea allSectionPad">
    <div class="row">
        <div class="col-lg-3 col-md-12">
            @include('account-sidebar')
        </div>
        <div class="col-lg-9 col-md-12">
            <div class="editProfileArea">
                <div class="text-center">
                    <h4>Edit Profile</h4>
                </div>
                @if(session('alertRight'))
                <div class="alert alert-success alert-box alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>{{session('alertRight')}}</strong>.
                </div>
                @endif 

                {{-- <div class="message"></div> --}}

                {!!Form::open(array('url'=>'update-user','method'=>'post','enctype'=>'multipart/form-data','id'=>'editForm')) !!}
                <div class="form-group">
                    {{Form::label('Name', 'Name') }}
                    {{Form::text("name","$data->name",array('class' => 'form-control','id' => 'r_username','placeholder'=>'Enter Your Name'))}}
                    <span class="usernameValid err text-danger">@error('name'){{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    {{Form::label('email', 'E-Mail Address') }}
                    {{Form::text("email","$data->email",array('class' => 'form-control','id' => 'r_email','placeholder'=>'Enter Your Email'))}}
                    <span class="emailValid err text-danger">@error('email'){{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    {{Form::label('mobile', 'Mobile No') }}
                    {{Form::text("mobile","$data->mobile",array('class' => 'form-control','id' => 'r_mobile','placeholder'=>'Enter Your Mobile'))}}
                    <span class="mobileValid err text-danger">@error('mobile'){{$message}} @enderror</span>
                </div>  
                <div class="form-group">
                    {{Form::label('gender', 'Gender') }}&nbsp;&nbsp;
                    {{Form::radio("gender","male",$data->gender == "male",array('id' => ''))}} Male
                    {{Form::radio("gender","female",$data->gender == "female",array('id' => ''))}} Female
                    {{Form::radio("gender","other",$data->gender == "other",array('id' => ''))}} Other
                    <span class="genderValid err text-danger">@error('gender'){{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    {{Form::label('hobbies', 'Hobbies') }}&nbsp;&nbsp;
                    {{Form::checkbox("hobbies[]","Drawing",in_array("Drawing",$hobArr) ? 'Checked' : '',array('class' => 'checkBox'))}} Drawing&nbsp;&nbsp;
                    {{Form::checkbox("hobbies[]","Dancing",in_array("Dancing",$hobArr) ? 'Checked' : '',array('class' => 'checkBox'))}} Dancing&nbsp;&nbsp;
                    {{Form::checkbox("hobbies[]","Singing",in_array("Singing",$hobArr) ? 'Checked' : '',array('class' => 'checkBox'))}} Singing
                    <span class="d-block err hobbiesValid text-danger">@error('hobbies'){{$message}} @enderror</span>
                </div>                         
                <div class="form-group">
                    {{Form::label('country', 'Country') }}
                    {{Form::select("country",array(''=>'Select Country','India'=>'India','USA'=>'USA','Pakistan'=>'Pakistan'),"$data->country",['class'=>'form-control','id'=>'res_country'])}}
                    <span class="countryValid err text-danger">@error('country'){{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    {{Form::label('address', 'Address') }}
                    {{Form::textarea("address","$data->address",array('class' => 'form-control','id' => 'res_address','rows'=>'3','placeholder'=>'Enter Your Address'))}}
                    <span class="addressValid err text-danger">@error('address'){{$message}} @enderror</span>
                </div>                 
                <div class="form-group">
                    {{Form::label('profile', 'Profile Photo') }}
                    {{Form::file("profile",array('class' => 'form-control','id' => 'r_profile'))}}
                    <div class="profileValid err text-danger">@error('profile'){{$message}} @enderror</div>
                    {{Form::image("profiles/$data->profile","profile",array('class' => '','id' => 'r_profile','width'=>'200','height'=>'200'))}}
                </div>                      
                {{Form::text("id","$data->id",array('class' => 'form-control','hidden'=>'true'))}}
                {{Form::submit("Update",array('class' => 'btn btn-success','id' => 'updateBtn'))}}

                {!!Form::close() !!}

                    {{-- <form id="updateForm">
                        @csrf
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" name="username" class="form-control" placeholder="Enter your username" id="r_username" value="{{$data->name}}">
                            <span class="usernameValid text-danger"></span>
                        </div>        
                        <div class="form-group">
                          <label for="email">Email address:</label>
                          <input type="email" name="email" class="form-control" placeholder="Enter email" id="r_email" value="{{$data->email}}">
                          <span class="emailValid text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="mobile">Mobile No:</label>
                              <input type="text" name="mobile" class="form-control" placeholder="Enter your Mobile Number" id="r_mobile" value="{{$data->mobile}}">
                            <span class="mobileValid text-danger"></span>
                        </div>       
                        <input type="hidden" value="{{$data->id}}" name="id"> 
                        <button type="submit" id="updateBtn"  class="btn btn-success">Update</button>
                    </form>                      --}}
            </div>
        </div>
    </div>
</div>
@endsection