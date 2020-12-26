@extends('layout')
@section('title', 'Registration')
@section('content')
<div class="col-md-8 offset-md-2">
  <div class="allSectionPad">
    <div class="main-heading text-center">
      <h3>Registration</h3>
    </div>    
    @if(session('alertWrong'))
    <div class="alert alert-danger alert-box alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>{{session('alertWrong')}}</strong>.
    </div>
    @endif  
    @if(session('alertRight'))
    <div class="alert alert-success alert-box alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>{{session('alertRight')}}</strong>.
    </div>
    @endif        
    {{-- <div class="message"></div> --}}
    {!!Form::open(array('url'=>'register-user','method'=>'post','enctype'=>'multipart/form-data','id'=>'resForm')) !!}
      <div class="form-group">
        {{Form::label('Name', 'Name') }}
        {{Form::text("name","",array('class' => 'form-control','id' => 'r_username','placeholder'=>'Enter Your Name'))}}
        <span class="usernameValid err text-danger">@error('name'){{$message}} @enderror</span>
      </div>
      <div class="form-group">
        {{Form::label('email', 'E-Mail Address') }}
        {{Form::text("email","",array('class' => 'form-control','id' => 'r_email','placeholder'=>'Enter Your Email'))}}
        <span class="emailValid err text-danger">@error('email'){{$message}} @enderror</span>
      </div>
      <div class="form-group">
        {{Form::label('password', 'Password') }}
        {{Form::password("password",array('class' => 'form-control','id' => 'r_password','placeholder'=>'Enter Your Password'))}}
        <span class="passValid err text-danger">@error('password'){{$message}} @enderror</span>
      </div>
      <div class="form-group">
        {{Form::label('mobile', 'Mobile No.') }}
        {{Form::text("mobile","",array('class' => 'form-control','id' => 'res_mobile','placeholder'=>'Enter Your Mobile Number'))}}
        <span class="mobileValid err text-danger">@error('mobile'){{$message}} @enderror</span>
      </div> 
      <div class="form-group">
        {{Form::label('gender', 'Gender') }}&nbsp;&nbsp;
        {{Form::radio("gender","male",true,array('id' => ''))}} Male
        {{Form::radio("gender","female",'',array('id' => ''))}} Female
        {{Form::radio("gender","other",'',array('id' => ''))}} Other
        <span class="genderValid err text-danger">@error('gender'){{$message}} @enderror</span>
      </div>
      <div class="form-group">
        {{Form::label('hobbies', 'Hobbies') }}&nbsp;&nbsp;
        {{Form::checkbox("hobbies[]","Drawing",'',array('class' => 'checkBox'))}} Drawing&nbsp;&nbsp;
        {{Form::checkbox("hobbies[]","Dancing",'',array('class' => 'checkBox'))}} Dancing&nbsp;&nbsp;
        {{Form::checkbox("hobbies[]","Singing",'',array('class' => 'checkBox'))}} Singing
        <span class="d-block hobbiesValid err text-danger">@error('hobbies'){{$message}} @enderror</span>
      </div>                         
      <div class="form-group">
        {{Form::label('country', 'Country') }}
        {{Form::select("country",array(''=>'Select Country','India'=>'India','USA'=>'USA','Pakistan'=>'Pakistan'),'Select Country',['class'=>'form-control','id'=>'res_country'])}}
        <span class="countryValid err text-danger">@error('country'){{$message}} @enderror</span>
      </div>
      <div class="form-group">
        {{Form::label('address', 'Address') }}
        {{Form::textarea("address","",array('class' => 'form-control','id' => 'res_address','rows'=>'3','placeholder'=>'Enter Your Address'))}}
        <span class="addressValid err text-danger">@error('address'){{$message}} @enderror</span>
      </div>      
      <div class="form-group">
        {{Form::label('profile', 'Profile Photo') }}
        {{Form::file("profile",array('class' => 'form-control','id' => 'r_profile'))}}
        <span class="profileValid err text-danger">@error('profile'){{$message}} @enderror</span>
      </div>           
      <p>Already registered <a href={{url('login')}}>click here</a></p> 
      {{Form::submit("Register",array('class' => 'btn btn-success submitForm','id' => 'regisBtn'))}}

    {!!Form::close() !!}

    {{-- <form id="registrationForm">
      @csrf
      <div class="form-group">
          <label for="username">Username:</label>
          <input type="text" name="username" class="form-control" placeholder="Enter Your Username" id="r_username">
          <span class="usernameValid text-danger"></span>
          
      </div>        
      <div class="form-group">
        <label for="email">Email address:</label>
        <input type="email" name="email" class="form-control" placeholder="Enter Your Email" id="r_email">
        <span class="emailValid text-danger"></span>
      </div>
      <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" name="password" class="form-control" placeholder="Enter Your Password" id="r_password">
        <span class="passValid text-danger"></span>
      </div>
      <div class="form-group">
          <label for="mobile">Mobile No:</label>
            <input type="text" name="mobile" class="form-control" placeholder="Enter Your Mobile Number" id="r_mobile">
          <span class="mobileValid text-danger"></span>
      </div>        
      <p>Already Registered <a href="/login">Click Here</a></p>
      <button type="submit" id="regisBtn"  class="btn btn-success">Register</button>
    </form>     --}}
  </div>
</div>
@endsection