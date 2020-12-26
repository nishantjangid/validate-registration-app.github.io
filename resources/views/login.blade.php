@extends('layout')
@section('title','Login')
@section('content')
<div class="col-md-6 offset-md-3">
  <div class="allSectionPad">
    <div class="main-heading text-center">
      <h3>Login</h3>
    </div>    
    @if(session('alertWrong'))
    <div class="alert alert-danger alert-box alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>{{session('alertWrong')}}</strong>
    </div>
    @endif      
    {{-- <div class="message"></div> --}}
    {!!Form::open(array('url'=>'login-user','method'=>'post','id'=>'loginForm')) !!}
      <div class="form-group">
        {{Form::label('email', 'E-Mail Address') }}
        {{Form::text("email","",array('class' => 'form-control','id' => 'login_email','placeholder'=>'Enter Your Email'))}}
      <span class="emailValid err text-danger">@error('email'){{$message}} @enderror</span>
      </div>
      <div class="form-group">
        {{Form::label('password', 'Password') }}
        {{Form::password("password",array('class' => 'form-control','id' => 'login_password','placeholder'=>'Enter Your Password'))}}
      <span class="passValid err text-danger">@error('password'){{$message}} @enderror</span>
      </div>
      <p><a href={{url('forgot-password')}}>Forgot password?</a></p>
      <p>Not registered yet <a href="{{url('registration')}}">click Here</a></p>      
      {{Form::submit("Login",array('class' => 'btn btn-success','id' => 'loginBtn'))}}

    {!!Form::close() !!}
    {{-- <form id="loginForm">
      @csrf
      <div class="form-group">
        <label for="email">Email address:</label>
        <input type="text" name="email" class="form-control" placeholder="Enter email" id="login_email">
        <span class="emailValid text-danger"></span>
      </div>
      <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" name="password" class="form-control" placeholder="Enter password" id="login_password">
        <span class="passValid text-danger"></span>
        
      </div>
      <p><a href="/forget-password">Forget password?</a></p>
      <p>Not registered yet <a href="/registration">click Here</a></p>

      <button type="submit" id="loginBtn" class="btn btn-success">Login</button>
    </form> --}}
  </div>

</div>
@endsection