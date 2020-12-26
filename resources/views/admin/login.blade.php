@extends('admin/layout')
@section('title','Login')
@section('content')
<div id="loginArea" >
    <div class="loginForm">
      @if(session('alertWrong'))
      <div class="alert alert-danger alert-box alert-dismissible fade show">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>This Email's {{session('alertWrong')}} Password does not Matched </strong>.
      </div>
      @endif      
        {!!Form::open(array('url'=>'/admin-login','method'=>'post','id'=>'loginForm')) !!}
            <div class="input-group mb-2">
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
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text bg-transparent">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-key" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#607D8B" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <circle cx="8" cy="15" r="4" />
                        <line x1="10.85" y1="12.15" x2="19" y2="4" />
                        <line x1="18" y1="5" x2="20" y2="7" />
                        <line x1="15" y1="8" x2="17" y2="10" />
                      </svg>
                  </div>
                </div>
                {{Form::password("password",array('class' => 'form-control','id' => 'login_password','placeholder'=>'Enter Your Password'))}}
              </div>  
              <div>
                <span class="passValid err text-danger">@error('password'){{$message}} @enderror</span>
            </div>

              <div class="text-center">
                <button type="submit" class="btn allBtnStyle mb-4" id="loginBtn">Sign in</button>
                <p>Forgot Password <b><a href="{{url('admin/forgot-password')}}">Click Here</a></b> ?</p>
              </div>
        {!!Form::close() !!}
    </div>
</div>
@endsection