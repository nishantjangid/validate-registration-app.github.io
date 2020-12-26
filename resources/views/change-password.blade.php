@extends('layout')
@section('title','Change Password')
@section('content')
<div class="profileArea allSectionPad">
    <div class="row">
        <div class="col-lg-3 col-md-12">
            @include('account-sidebar')
        </div>
        <div class="col-lg-9 col-md-12">
            <div class="editProfileArea">
                <div class="text-center">
                    <h4>Change Password</h4>
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
                
                {!!Form::open(array('url'=>'changePassword','method'=>'post','id'=>'changePasswordForm')) !!}
                <div class="form-group">
                    {{Form::label('newpassword', 'New Password') }}
                    {{Form::password("new_password",array('class' => 'form-control','id' => 'password','placeholder'=>'Enter New Password'))}}
                <span class="passValid err text-danger">@error('new_password'){{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    {{Form::label('confirmpassword', 'Confirm Password') }}
                    {{Form::password("confirm_password",array('class' => 'form-control','id' => 'cpassword','placeholder'=>'Enter Confirm Password'))}}
                <span class="cpassValid err text-danger">
                    @error('confirm_password'){{$message}} @enderror
                    @if(session('passMatch'))
                        {{session('passMatch')}}
                    @endif                 

                </span>
                </div>                
                {{Form::submit("Update",array('class' => 'btn btn-success','id' => 'updatePassBtn'))}}

                {!!Form::close() !!}

                    {{-- <form id="changePasswordForm">
                        @csrf
                        <div class="form-group">
                            <label for="pwd">New Password:</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter New password" id="password" >
                            <span class="passValid text-danger"></span>        
                        </div>
                        <div class="form-group">
                            <label for="pwd">Confirm Password:</label>
                            <input type="password" name="cpassword" class="form-control" placeholder="Enter Confirm password" id="cpassword" >
                            <span class="cpassValid text-danger"></span>        
                        </div>
                        <button type="submit" id="updatePassBtn"  class="btn btn-success">Update</button>
                      </form>                      --}}

            </div>
        </div>
    </div>
</div>
@endsection