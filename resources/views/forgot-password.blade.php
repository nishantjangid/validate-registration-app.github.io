@extends('layout')
@section('title','Forgot Password')
@section('content')
<div class="col-md-6 offset-md-3">
  <div class="allSectionPad">
    <div class="main-heading text-center">
      <h3>Forgot Your Password?</h3>
    </div>    

    @if(session('alertRight'))
    <div class="alert alert-success alert-box alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>{{session('alertRight')}}</strong>.
    </div>
    @endif 
    @if(session('alertWrong'))
    <div class="alert alert-danger alert-box alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>{{session('alertWrong')}}</strong>.
    </div>
    @endif  
    
    {{-- <div class="message"></div> --}}
    <p>Remember then <a href={{url('login')}}>click Here</a></p>
    {!!Form::open(array('url'=>'forgotPassword','method'=>'post','id'=>'forgetPassForm')) !!}      
      <div class="form-group">
        {{Form::label('email', 'E-Mail Address') }}
        {{Form::text("email","",array('class' => 'form-control','id' => 'f_email','placeholder'=>'Enter Your Email'))}}
        <span class="emailValid err text-danger">@error('email'){{$message}} @enderror</span>
      </div>
      <div class="form-group">
        {{Form::label('newpassword', 'New Password') }}
        {{Form::password("password",array('class' => 'form-control','id' => 'f_newpassword','placeholder'=>'Enter New Password'))}}
        <span class="passValid err text-danger">@error('password'){{$message}} @enderror</span>
      </div>    
      {{Form::submit("Change",array('class' => 'btn btn-success','id' => 'changePasswordBtn'))}}

    {!!Form::close() !!}

    {{-- <form id="forgetPassForm">
      @csrf
      <p>Remember then <a href="/login">click Here</a></p>
      <div class="form-group">
        <label for="email">Email address:</label>
        <input type="text" name="email" class="form-control" placeholder="Enter Email" id="f_email" >
        <span class="emailValid text-danger"></span>
      </div>
      <div class="form-group">
        <label for="pwd">New Password:</label>
        <input type="password" name="password" class="form-control" placeholder="Enter New Password" id="f_newpassword" >
        <span class="passValid text-danger"></span>        
      </div>
      <button type="submit" id="changePasswordBtn" class="btn btn-success">Change</button>
    </form> --}}
  </div>

</div>
@endsection