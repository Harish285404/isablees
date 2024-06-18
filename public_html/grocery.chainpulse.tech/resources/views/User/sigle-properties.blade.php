
@extends('User.layouts.main')


@section('content')
<?php
// dd($property);
?>
 <main class="main-dashboard">
        <section class="properties single-properties">
              @foreach($property as $sale)
            <div class="main-sections-container">
                <h2 class="main--headings">
                    <div class="headings-arrow">Property</div>
                </h2>
                <div class="main-section-inner-conatiner">
                    <div class="single-properties-top">
                    <h2 class="main--headings">{{ $sale->property_name}}</h2>
                    <a href="{{url('user/edit-property/'.$sale->id)}}" class="main-btn">+ Edit Property</a>
                </div>
               
                    <div class="main-slick-slider">
                        <div class="slider slider-for">
                           
                                @foreach($sale->image as $image=>$v)
                                        <div class="slick-items">
                                        <img src="{{asset('Property-images/'.$v)}} ">
                                 </div>
                                        @endforeach
                            
                            <!--<div class="slick-items">-->
                            <!--    <img src="{{asset('Admin/images/sl-img-2.png')}}">-->
                            <!--</div>-->
                            <!--<div class="slick-items">-->
                            <!--    <img src="{{asset('Admin/images/sl-img-3.png')}}">-->
                            <!--</div>-->
                            <!--<div class="slick-items">-->
                            <!--    <img src="{{asset('Admin/images/sl-img-4.png')}}">-->
                            <!--</div>-->
                            <!--<div class="slick-items">-->
                            <!--    <img src="{{asset('Admin/images/sl-img-5.png')}}">-->
                            <!--</div>-->
                            <!--<div class="slick-items">-->
                            <!--    <img src="{{asset('Admin/images/sl-img-6.png')}}">-->
                            <!--</div>-->
                            <!--<div class="slick-items">-->
                            <!--    <img src="{{asset('Admin/images/sl-img-7.png')}}">-->
                            <!--</div>-->
                            <!--<div class="slick-items">-->
                            <!--    <img src="{{asset('Admin/images/sl-img-1.png')}}">-->
                            <!--</div>-->
                            <!--<div class="slick-items">-->
                            <!--    <img src="{{asset('Admin/images/sl-img-2.png')}}">-->
                            <!--</div>-->
                        </div>
                        <div class="slider slider-nav">
                             @foreach($sale->image as $image=>$v)
                                        <div class="slick-items">
                                        <img src="{{asset('Property-images/'.$v)}} ">
                                 </div>
                                        @endforeach
                            <!--<div class="slick-items">-->
                            <!--    <img src="{{asset('Admin/images/sl-img-2.png')}}">-->
                            <!--</div>-->
                            <!--<div class="slick-items">-->
                            <!--    <img src="{{asset('Admin/images/sl-img-3.png')}}">-->
                            <!--</div>-->
                            <!--<div class="slick-items">-->
                            <!--    <img src="{{asset('Admin/images/sl-img-4.png')}}">-->
                            <!--</div>-->
                            <!--<div class="slick-items">-->
                            <!--    <img src="{{asset('Admin/images/sl-img-5.png')}}">-->
                            <!--</div>-->
                            <!--<div class="slick-items">-->
                            <!--    <img src="{{asset('Admin/images/sl-img-6.png')}}">-->
                            <!--</div>-->
                            <!--<div class="slick-items">-->
                            <!--    <img src="{{asset('Admin/images/sl-img-7.png')}}">-->
                            <!--</div>-->
                            <!--<div class="slick-items">-->
                            <!--    <img src="{{asset('Admin/images/sl-img-1.png')}}">-->
                            <!--</div>-->
                            <!--<div class="slick-items">-->
                            <!--    <img src="{{asset('Admin/images/sl-img-2.png')}}">-->
                            <!--</div>-->
                        </div>
                    </div>
                </div>
                <div class="main-section-inner-conatiner single-properties-content">
                    <ul>
                        <li>
                            <h2>Name of property</h2>
                            <p>{{ $sale->property_name}}</p>
                        </li>
                        <li>
                            <h2>Price</h2>
                            <p>${{ $sale->price}}</p>
                        </li>
                        <li>
                            <h2>Location</h2>
                            <p>{{ $sale->location}}</p>
                        </li>
                        <li>
                            <h2>Living areay</h2>
                            <p>{{ $sale->living_area}}</p>
                        </li>
                        <li>
                            <h2>Land area</h2>
                            <p>{{ $sale->land_area }}</p>
                        </li>
                        <li>
                            <h2>Number of pieces</h2>
                            <p>{{ $sale->pieces}}</p>
                        </li>
                        <li>
                            <h2>Number of rooms</h2>
                            <p>{{ $sale->rooms}}</p>
                        </li>
                       <li>
                            <h2>Project Type</h2>
                             <p>
                              @foreach($sale->project_type_ids as $image=>$v)
                                        
                                        
                               <?php $type =  App\Models\ProjectType::where('id',$v)->get(['title']); echo $type[0]['title'].','; ?>
                                        @endforeach
                                        </p>
                            
                        </li>
                        <li>
                            <h2>Outside</h2>
                            <!--<p>Garden Terrace</p>-->
                                 <p>
                             @foreach($sale->outside_ids as $image=>$v)
                                        
                                        
                           <?php $type =  App\Models\Outside::where('id',$v)->get(['title']); echo $type[0]['title'].','; ?>
                                        @endforeach
                                        </p>
                        </li>
                        <li>
                            <h2>Exposure</h2>
                            <!--<p>Not Overlooked, Nice View</p>-->
                            <p>
                             @foreach($sale->exposure_ids as $image=>$v)
                                        
                                        
                                <?php $type =  App\Models\Exposure::where('id',$v)->get(['title']); echo $type[0]['title'].','; ?>
                                        @endforeach
                                        </p>
                        </li>
                            <li>
                            <h2>Additional surfaces</h2>
                    
                            <p>
                                
                             @foreach($sale->surface_ids as $image=>$v)
                                        
                                        
                                <?php $type =  App\Models\Surfaces::where('id',$v)->get(['title']); echo $type[0]['title'].','; ?>
                                        @endforeach
                                        </p>
                        </li>
                    </ul>
                </div>
                @endforeach
        </section>
    </main>
        
@endsection