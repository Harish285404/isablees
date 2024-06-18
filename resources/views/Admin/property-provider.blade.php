@extends('Admin.layouts.main')


@section('content')
<?php

   // $image=explode(',',$data[0]->image);


    // dd($image[0]);


// dd($data);


?>
<main class="main-dashboard">
     @if(Session::has('message'))
                <p class="alert alert-info">{{ Session::get('message') }}</p>
                @endif
        <section class="properties property-providers">
            <div class="main-sections-container">
                <h1 class="top-main--headings">
                    <div class="headings-arrow">Property Providers</div>
                </h1>
                <div class="main-section-inner-conatiner">
                    <div class="property-list-slider properties-tabbing">
                        <div class="providers-searc-box">
                            <h2 class="main--headings">Property Providers</h2>
                            <div class="top-seacrh-box">
                                <label>Search</label>
                                <input type="text" id="search">
                            </div>
                        </div>
                        <div id="tab-1" class="tabcontent" style="display: block;">
                            <div class="inner-grids">
                                   @foreach($data as $userdetails)
                                <a href="javascript:void(0); ">
                                          <div class="slider-img ">
                                              <img src="{{asset('Admin/images/tab-img-1.png')}} ">
                                        <div class="hover-btn-container">
                                            <form action="{{url('admin/provider-detail/'.$userdetails->provider_id)}}">
                                             
                                               <input type="hidden" name="id" value="{{$userdetails->provider_id}}">
                                                 <button class="view-btn" type="submit">View</button>
                                            </form>
                                        <form action="{{url('admin/delete-properties-provider/'.$userdetails->provider_id)}}">
                                               
                                                  <button class="delete-btn show_confirm">Delete</button>
                                            </form>
                                           
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2 class="top-heading">{{$userdetails->first_name}}</h2>
                                    </div>
                                </a>
                                     @endforeach
                              <!--   <a href="javascript:void(0); ">
                                         <div class="slider-img ">
                                        <img src="{{asset('Admin/images/tab-img-1.png')}} ">
                                        <div class="hover-btn-container">
                                            <form action="{{url('admin/provider-detail')}}">
                                                    
                                                 <button class="view-btn" type="submit">View</button>
                                            </form>
                                         <form action="#">
                                                    
                                                  <button class="delete-btn">Delete</button>
                                            </form>
                                           
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2 class="top-heading">Florence</h2>
                                    </div>
                                </a>
                                <a href="javascript:void(0); ">
                                          <div class="slider-img ">
                                        <img src="{{asset('Admin/images/tab-img-1.png')}} ">
                                        <div class="hover-btn-container">
                                            <form action="{{url('admin/provider-detail')}}">
                                                    
                                                 <button class="view-btn" type="submit">View</button>
                                            </form>
                                         <form action="#">
                                                    
                                                  <button class="delete-btn">Delete</button>
                                            </form>
                                           
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2 class="top-heading">Annie Marie</h2>
                                    </div>
                                </a>
                                <a href="javascript:void(0); ">
                                 <div class="slider-img ">
                                        <img src="{{asset('Admin/images/tab-img-1.png')}} ">
                                        <div class="hover-btn-container">
                                            <form action="{{url('admin/provider-detail')}}">
                                                    
                                                 <button class="view-btn" type="submit">View</button>
                                            </form>
                                         <form action="#">
                                                    
                                                  <button class="delete-btn">Delete</button>
                                            </form>
                                           
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2 class="top-heading">The Weekend</h2>
                                    </div>
                                </a>
                                <a href="javascript:void(0); ">
                                   <div class="slider-img ">
                                        <img src="{{asset('Admin/images/tab-img-1.png')}} ">
                                        <div class="hover-btn-container">
                                            <form action="{{url('admin/provider-detail')}}">
                                                    
                                                 <button class="view-btn" type="submit">View</button>
                                            </form>
                                         <form action="#">
                                                    
                                                  <button class="delete-btn">Delete</button>
                                            </form>
                                           
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2 class="top-heading">Dennis Lloyd</h2>
                                    </div>
                                </a>
                                <a href="javascript:void(0); ">
                                    <div class="slider-img ">
                                        <img src="{{asset('Admin/images/tab-img-1.png')}} ">
                                        <div class="hover-btn-container">
                                            <form action="{{url('admin/provider-detail')}}">
                                                    
                                                 <button class="view-btn" type="submit">View</button>
                                            </form>
                                         <form action="#">
                                                    
                                                  <button class="delete-btn">Delete</button>
                                            </form>
                                           
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2 class="top-heading">Florence</h2>
                                    </div>
                                </a>
                                <a href="javascript:void(0); ">
                                    <div class="slider-img ">
                                        <img src="{{asset('Admin/images/tab-img-1.png')}} ">
                                        <div class="hover-btn-container">
                                            <form action="{{url('admin/provider-detail')}}">
                                                    
                                                 <button class="view-btn" type="submit">View</button>
                                            </form>
                                         <form action="#">
                                                    
                                                  <button class="delete-btn">Delete</button>
                                            </form>
                                           
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2 class="top-heading">Annie Marie</h2>
                                    </div>
                                </a>
                                <a href="javascript:void(0); ">
                                    <div class="slider-img ">
                                        <img src="{{asset('Admin/images/tab-img-1.png')}} ">
                                        <div class="hover-btn-container">
                                            <form action="{{url('admin/provider-detail')}}">
                                                    
                                                 <button class="view-btn" type="submit">View</button>
                                            </form>
                                         <form action="#">
                                                    
                                                  <button class="delete-btn">Delete</button>
                                            </form>
                                           
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2 class="top-heading">The Weekend</h2>
                                    </div>
                                </a>
                                <a href="javascript:void(0); ">
                                    <div class="slider-img ">
                                        <img src="{{asset('Admin/images/tab-img-1.png')}} ">
                                        <div class="hover-btn-container">
                                            <form action="{{url('admin/provider-detail')}}">
                                                    
                                                 <button class="view-btn" type="submit">View</button>
                                            </form>
                                         <form action="#">
                                                    
                                                  <button class="delete-btn">Delete</button>
                                            </form>
                                           
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2 class="top-heading">Dennis Lloyd</h2>
                                    </div>
                                </a>
                                <a href="javascript:void(0); ">
                                    <div class="slider-img ">
                                        <img src="{{asset('Admin/images/tab-img-1.png')}} ">
                                        <div class="hover-btn-container">
                                            <form action="{{url('admin/provider-detail')}}">
                                                    
                                                 <button class="view-btn" type="submit">View</button>
                                            </form>
                                         <form action="#">
                                                    
                                                  <button class="delete-btn">Delete</button>
                                            </form>
                                           
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2 class="top-heading">Florence</h2>
                                    </div>
                                </a>
                                <a href="javascript:void(0); ">
                                    <div class="slider-img ">
                                        <img src="{{asset('Admin/images/tab-img-1.png')}} ">
                                        <div class="hover-btn-container">
                                            <form action="{{url('admin/provider-detail')}}">
                                                    
                                                 <button class="view-btn" type="submit">View</button>
                                            </form>
                                         <form action="#">
                                                    
                                                  <button class="delete-btn">Delete</button>
                                            </form>
                                           
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2 class="top-heading">Annie Marie</h2>
                                    </div>
                                </a>
                                <a href="javascript:void(0); ">
                                    <div class="slider-img ">
                                        <img src="{{asset('Admin/images/tab-img-1.png')}} ">
                                        <div class="hover-btn-container">
                                            <form action="{{url('admin/provider-detail')}}">
                                                    
                                                 <button class="view-btn" type="submit">View</button>
                                            </form>
                                         <form action="#">
                                                    
                                                  <button class="delete-btn">Delete</button>
                                            </form>
                                           
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2 class="top-heading">The Weekend</h2>
                                    </div>
                                </a> -->
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </main>
  
@endsection