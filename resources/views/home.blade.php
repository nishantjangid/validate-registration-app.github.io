@extends('layout')
@section('title','Home')
@section('content')
<div id="slider-container">
    <img src="{{asset('images/slider1.jpg  ')}}" alt="">
    <div class="sliderCaption">
        <h1>Hello!</h1><br>
        <p>Hope you all good</p>
    </div>
</div>
<div class="">
    {{-- Introduct Section Start--}}
    <div class="introduction allSectionPad">
        <div class="main-heading text-center">
            <h3>Who Am I</h3>
        </div>
        <div class="text-center">
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laboriosam magni, repellat expedita fugit culpa minus maiores voluptatibus in quidem. Repudiandae nesciunt odio aut ex debitis impedit enim laborum dignissimos dolorem. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laboriosam magni, repellat expedita fugit culpa minus maiores voluptatibus in quidem. Repudiandae nesciunt odio aut ex debitis impedit enim laborum dignissimos dolorem.</p>
        </div>
    </div>
    {{-- Introduct Section End--}}
    <div id="parallex1" style="background-image: url({{asset('images/parllex.jpg  ')}});">

    </div>
    {{-- service Section Start--}}
    <div class="serivces allSectionPad">
        <div class="main-heading text-center">
            <h3>Services</h3>
        </div>
        
        <div class="row align-items-center">
            <div class="col-lg-4 col-md-12 ">
                <div class="serivces-img w-100">
                    <img src="{{asset('images/blog-img-1.jpg  ')}}" alt="" class="w-100">
                </div>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="serivces-content text-justify">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod consequatur est voluptate sed cum molestias sequi nemo suscipit, repudiandae qui cupiditate consequuntur quia officia corporis? Veniam sapiente laboriosam voluptatibus quo.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod consequatur est voluptate sed cum molestias sequi nemo suscipit, repudiandae qui cupiditate consequuntur quia officia corporis? Veniam sapiente laboriosam voluptatibus quo.
                    </p>
                </div>                    
            </div>
            <div class="col-lg-8 col-md-12 ">
                <div class="serivces-content text-justify">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod consequatur est voluptate sed cum molestias sequi nemo suscipit, repudiandae qui cupiditate consequuntur quia officia corporis? Veniam sapiente laboriosam voluptatibus quo.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod consequatur est voluptate sed cum molestias sequi nemo suscipit, repudiandae qui cupiditate consequuntur quia officia corporis? Veniam sapiente laboriosam voluptatibus quo.
                    </p>
                </div> 
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="serivces-img w-100">
                    <img src="{{asset('images/blog-img-2.jpg  ')}}" alt="" class="w-100">
                </div>                                       
            </div>                
        </div>

    </div>
    {{-- service Section End--}}
</div>
@endsection