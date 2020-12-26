@extends('admin/layout')
@section('title','Edit Employee')
@php
    $hobArr = array();
    $hobArr = explode(",",$data->hobbies);

@endphp
@section('content')

<div class="d-flex">
    <section id="sidebar">
        @include('admin/sidebar')
    </section>
    <section id="dashboard">
        <div class="dashboardHeader d-flex align-items-center">
            <div class="sidebarBtn m-3">
                <button class="btn btnStyle "><i class="fa fa-fw fa-bars"></i></button>
            </div>
            {{-- <div class="searchBtn d-flex align-items-center">
                <input type="text" name="search" class="form-control w-100" placeholder="Search...">
                <button class="btn btnStyle"><i class="fa fa-fw fa-search"></i></button>
            </div> --}}
            <div class="profileinfo ml-auto p-3">
                <a href={{url('admin/logout')}} class="btn btnStyle"><i class="fa fa-fw fa-power-off"></i> Logout</a>
            </div>            
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="dashboardContainer">
                    <div class="formContainer">
                        <div class="text-center py-3">
                            <h3 class="font-weight-bold">Upate Employee</h3>
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
                            
                        <div class="formArea">
                            {!!Form::open(array('url'=>'/admin/editEmployee','method'=>'post','enctype'=>'multipart/form-data','id'=>'editForm'))!!}
                            <div class="form-group">
                                {{Form::label('name', 'Name') }}
                                {{Form::text("name","$data->name",array('class' => 'form-control','id' => 'username','placeholder'=>'Enter Your Name'))}}
                                <span class="usernameValid err text-danger">@error('name'){{$message}} @enderror</span>
                            </div>
                            <div class="form-group">
                                {{Form::label('email', 'E-Mail Address') }}
                                {{Form::text("email","$data->email",array('class' => 'form-control','id' => 'email','placeholder'=>'Enter Your Email'))}}
                                <span class="emailValid err text-danger">@error('email'){{$message}} @enderror</span>
                            </div>
                            <div class="form-group">
                                {{Form::label('mobile', 'Mobile No') }}
                                {{Form::text("mobile","$data->mobile",array('class' => 'form-control','id' => 'mobile','placeholder'=>'Enter Your Mobile Number'))}}
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
                                <span class="d-block hobbiesValid err text-danger">@error('hobbies'){{$message}} @enderror</span>
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
                                {{Form::file("profile",array('class' => 'form-control','id' => 'profile'))}}
                                <div class="profileValid err text-danger">@error('profile'){{$message}} @enderror</div>
                                {{Form::image("profiles/$data->profile","profile",array('class' => 'img-responsive','id' => 'r_profile','width'=>'150','height'=>'150'))}}                                
                            </div>     
                            {{Form::text("id","$data->id",array('hidden'=>'true'))}}
                            {{Form::submit("Update",array('class' => 'btn btn-success','id' => 'updateBtn'))}}            
                            <a href="{{route('view-employee')}}" class="btn btn-danger">Cancel</a>
                            {!!Form::close()!!}
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </section>    
</div>
@endsection