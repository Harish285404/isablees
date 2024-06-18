@extends('Admin.layouts.main')


@section('content')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link href="{{asset('Admin/css/owlCarousel-1.css')}} " rel="stylesheet">
    <link href="{{asset('Admin/css/owl-carousel-1.css')}}" rel="stylesheet">
    <link href="{{asset('Admin/css/style.css')}}" rel="stylesheet">

<main class="main-dashboard">
        <section class="dashboard single-property-list">
            <div class="main-sections-container">
                <h1 class="top-main--headings">
                    <div class="headings-arrow"> <img src="{{asset('Admin/images/headings-arrow.svg')}}">Name of Property Providers</div>
                </h1>
                <div class="main-section-inner-conatiner">
                    <div class="single-property-provider-detail">
                        <div class="detail-top-section">
                            <div class="left-section">
                                <h2 class="top-main--headings">{{$data[0]->first_name}}</h2>
                            </div>
                            <!-- <div class="right-section">
                                <button class="main-btn">Delete Provider</button>
                            </div> -->
                        </div>
                        <div class="detail-bottom-section">
                            <div class="left-section">
                                <img src="{{asset('Admin/images/dennis-loyd.png')}}">
                            </div>
                            <div class="right-section">
                                <ul>
                                    <li>
                                        <h2>
                                            Name of agent provider
                                        </h2>
                                        <p>
                                           {{$data[0]->first_name}}
                                        </p>
                                    </li>
                                    <li>
                                        <h2>
                                            Phone Number
                                        </h2>
                                        <p>
                                            {{$data[0]->phone_number}}
                                        </p>
                                    </li>
                                    <li>
                                        <h2>
                                            Email Address
                                        </h2>
                                        <p>
                                            {{$data[0]->email}}
                                        </p>
                                    </li>
                                    <li>
                                        <h2>
                                            Properties Sold
                                        </h2>
                                        <p>
                                            18
                                        </p>
                                    </li>
                                    <li>
                                        <h2>
                                            Number of Properties
                                        </h2>
                                        <p>
                                           {{count($data)}}
                                        </p>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="main-sections-container">
                <!--<h2 class="main--headings">Property List</h2>-->
                <div class="main-section-inner-conatiner">
                    <div class="property-list-slider  property-list">
                        <h3>Properties Listed</h3>
                        <div class="owl-carousel-1 owl-theme ">
                             @foreach($data as $userdetails)
                            <div class="item ">
                                <a href="javascript:void(0); ">
                                    <div class="slider-img ">
                                        <img src="{{asset('Admin/images/item-1.png')}} ">
                                    </div>
                                    <div class="detail">
                                        <h2 class="top-heading">{{$userdetails->property_name}}</h2>
                                        <div class="location-box">
                                            <div class="loc-icon">
                                                <img src="{{asset('Admin/images/loc-icon.svg')}}">
                                            </div>
                                            <div class="loc-text">
                                              {{$userdetails->location}}
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                              @endforeach
                       <!--      <div class="item ">
                                <a href="javascript:void(0); ">
                                    <div class="slider-img ">
                                        <img src="{{asset('Admin/images/item-2.png')}}">
                                    </div>
                                    <div class="detail">
                                        <h2 class="top-heading">Sunflower Suit</h2>
                                        <div class="location-box">
                                            <div class="loc-icon">
                                                <img src="{{asset('Admin/images/loc-icon.svg')}}">
                                            </div>
                                            <div class="loc-text">
                                                North Carolina, Usa
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item ">
                                <a href="javascript:void(0); ">
                                    <div class="slider-img ">
                                        <img src="{{asset('Admin/images/item-3.png')}}">
                                    </div>
                                    <div class="detail">
                                        <h2 class="top-heading">Co Apartment</h2>
                                        <div class="location-box">
                                            <div class="loc-icon">
                                                <img src="{{asset('Admin/images/loc-icon.svg')}}">
                                            </div>
                                            <div class="loc-text">
                                                North Carolina, Usa
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item ">
                                <a href="javascript:void(0); ">
                                    <div class="slider-img ">
                                        <img src="{{asset('Admin/images/item-4.png')}}">
                                    </div>
                                    <div class="detail">
                                        <h2 class="top-heading">Flexi Tower</h2>
                                        <div class="location-box">
                                            <div class="loc-icon">
                                                <img src="{{asset('Admin/images/loc-icon.svg')}}">
                                            </div>
                                            <div class="loc-text">
                                                North Carolina, Usa
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item ">
                                <a href="javascript:void(0); ">
                                    <div class="slider-img ">
                                        <img src="{{asset('Admin/images/item-5.png')}}">
                                    </div>
                                    <div class="detail">
                                        <h2 class="top-heading">Vista Tower</h2>
                                        <div class="location-box">
                                            <div class="loc-icon">
                                                <img src="{{asset('Admin/images/loc-icon.svg')}}">
                                            </div>
                                            <div class="loc-text">
                                                North Carolina, Usa
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div> -->
                        </div>
                    </div>
                    <div class="property-list-slider  for-rent">
                        <h3>Properties Sold</h3>
                        <div class="owl-carousel-2 owl-theme ">
                                  @foreach($data as $userdetails)
                            <div class="item ">
                                <a href="javascript:void(0); ">
                                    <div class="slider-img ">
                                        <img src="{{asset('Admin/images/item-1.png')}} ">
                                    </div>
                                    <div class="detail">
                                        <h2 class="top-heading">{{$userdetails->property_name}}</h2>
                                        <div class="location-box">
                                            <div class="loc-icon">
                                                <img src="{{asset('Admin/images/loc-icon.svg')}}">
                                            </div>
                                            <div class="loc-text">
                                              {{$userdetails->location}}
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                              @endforeach
                      <!--       <div class="item ">
                                <a href="javascript:void(0); ">
                                    <div class="slider-img ">
                                        <img src="{{asset('Admin/images/item-2.png')}}">
                                    </div>
                                    <div class="detail">
                                        <h2 class="top-heading">Sunflower Suit</h2>
                                        <div class="location-box">
                                            <div class="loc-icon">
                                                <img src="{{asset('Admin/images/loc-icon.svg')}}">
                                            </div>
                                            <div class="loc-text">
                                                North Carolina, Usa
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item ">
                                <a href="javascript:void(0); ">
                                    <div class="slider-img ">
                                        <img src="{{asset('Admin/images/item-3.png')}}">
                                    </div>
                                    <div class="detail">
                                        <h2 class="top-heading">Co Apartment</h2>
                                        <div class="location-box">
                                            <div class="loc-icon">
                                                <img src="{{asset('Admin/images/loc-icon.svg')}}">
                                            </div>
                                            <div class="loc-text">
                                                North Carolina, Usa
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item ">
                                <a href="javascript:void(0); ">
                                    <div class="slider-img ">
                                        <img src="{{asset('Admin/images/item-4.png')}}">
                                    </div>
                                    <div class="detail">
                                        <h2 class="top-heading">Flexi Tower</h2>
                                        <div class="location-box">
                                            <div class="loc-icon">
                                                <img src="{{asset('Admin/images/loc-icon.svg')}}">
                                            </div>
                                            <div class="loc-text">
                                                North Carolina, Usa
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item ">
                                <a href="javascript:void(0); ">
                                    <div class="slider-img ">
                                        <img src="{{asset('Admin/images/item-5.png')}}">
                                    </div>
                                    <div class="detail">
                                        <h2 class="top-heading">Vista Tower</h2>
                                        <div class="location-box">
                                            <div class="loc-icon">
                                                <img src="{{asset('Admin/images/loc-icon.svg')}}">
                                            </div>
                                            <div class="loc-text">
                                                North Carolina, Usa
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="{{asset('Admin/js/owl-carousel-1.js')}}"></script>
@endsection