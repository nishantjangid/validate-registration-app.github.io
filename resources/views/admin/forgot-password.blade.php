@extends('admin/layout')
@section('title','Forgot Password')
@section('content')
<div id="loginArea" >
    <div class="loginForm">
      @if(session('alertRight'))
      <div class="alert alert-success alert-box alert-dismissible fade show">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>{{session('alertRight')}}</strong>.
      </div>
      @endif
      @if(session('alertWrong'))
      <div class="alert alert-danger alert-box alert-dismissible fade show">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>This Email {{session('alertWrong')}} is not Registered. </strong>
      </div>
      @endif      
        {!!Form::open(array('url'=>'/admin/reset-password','method'=>'post','id'=>'resetPassForm')) !!}
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <div class="input-group-text bg-transparent">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-at" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FF5722" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <circle cx="12" cy="12" r="4" />
                        <path d="M16 12v1.5a2.5 2.5 0 0 0 5 0v-1.5a9 9 0 1 0 -5.5 8.28" />
                    </svg>
                  </div>
                </div>
                {{Form::text("email","",array('class' => 'form-control','id' => 'login_email','placeholder'=>'Enter Your Email'))}}
              </div>
              <div>
                <span class="emailValid err text-danger">@error('email'){{$message}} @enderror</span>
              </div>
            
              <div class="text-center">
                <button type="submit" class="btn allBtnStyle mb-4" id="resetPassBtn">Reset Password</button>
                <p><i class="fa fa-fw fa-arrow-left"></i> Back to Login <b><a href={{url('/admin/login')}}>Click Here</a></b></p>
              </div>
        {!!Form::close() !!}
    </div>
</div>
@endsection