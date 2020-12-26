@extends('admin/layout')
@if(request()->is('admin'))
    @section('title','Dashboard')
@elseif(request()->is('admin/view-employee'))
    @section('title','View Employee')
@elseif(request()->is('admin/insert-employee'))
    @section('title','Insert Employee')
@endif
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
                    @if(request()->is('admin'))
                        {{-- Dashboard Section --}}
                        <div class="row">
                            <div class="col-lg-4 col-md-12 col-12">
                                <div class="box">
                                    <div class="box-header">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#9c27b0" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <circle cx="9" cy="7" r="4" />
                                                <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                                <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                                            </svg>
                                        </span>
                                        <p>{{$totalEmployee}}</p>
                                    </div>
                                    <div class="box-footer">
                                        <b>Employees</b>
                                        <a href={{url('/admin/view-employee')}} class="text-info">View Details <i class="fa fa-fw fa-arrow-right"></i></a>                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 col-12">
                                <div class="box">
                                    <div class="box-header">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chart-bar" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#9c27b0" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <rect x="3" y="12" width="6" height="8" rx="1" />
                                                <rect x="9" y="8" width="6" height="12" rx="1" />
                                                <rect x="15" y="4" width="6" height="16" rx="1" />
                                                <line x1="4" y1="20" x2="18" y2="20" />
                                              </svg>
                                        </span>
                                        <p>0</p>
                                    </div>
                                    <div class="box-footer">
                                        <b>bars</b>
                                        <a href="javascript:void(0);" class="text-info">View Details <i class="fa fa-fw fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-lg-4 col-md-12 col-12">
                                <div class="box">
                                    <div class="box-header">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chart-pie" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#9c27b0" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <path d="M10 3.2a9 9 0 1 0 10.8 10.8a1 1 0 0 0 -1 -1h-6.8a2 2 0 0 1 -2 -2v-7a0.9 .9 0 0 0 -1 -.8" />
                                                <path d="M15 3.5a9 9 0 0 1 5.5 5.5h-4.5a1 1 0 0 1 -1 -1v-4.5" />
                                            </svg>
                                        </span>
                                        <p>0</p>
                                    </div>
                                    <div class="box-footer">
                                        <b>Pie</b>
                                        <a href="javascript:void(0);" class="text-info">View Details <i class="fa fa-fw fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>                                                        
                        </div>
                        {{-- Dashboard Section --}}
                    @elseif(request()->is('admin/view-employee'))
                        @include('admin/view-employee')
                    @elseif(request()->is('admin/insert-employee'))
                        @include('admin/insert-employee')
                    @endif
                </div>                
            </div>
        </div>
    </section>    
</div>
@endsection