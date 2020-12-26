@extends('layout')
@section('title','My Account')
@section('content')
<div class="profileArea allSectionPad">
    <div class="row">
        <div class="col-lg-3 col-md-12">
            @include('account-sidebar')
        </div>
        <div class="col-lg-9 col-md-12" style="background:#ffe7ca;">
            <div class="profileArea w-100 h-100 align-items-center justify-content-center d-flex">
                <div class="">
                    <h5 class="display-4">Hello! @if(Session::has('user')) {{Session::get('user')->name}} @endif</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection