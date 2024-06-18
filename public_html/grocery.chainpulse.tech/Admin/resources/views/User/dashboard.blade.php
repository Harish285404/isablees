@extends('User.layouts.main')


@section('content')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link href="./Admin/css/owlCarousel-1.css " rel="stylesheet">
    <link href="./Admin/css/owl-carousel-1.css" rel="stylesheet">
    <link href="./Admin/css/style.css" rel="stylesheet">
<main class="main-dashboard">

   <style>
        .badge.red {
    background: #ee2b8b;
}
.badge-overlay {
    position: absolute;
    left: 0%;
    top: 0px;
    width: 100%;
    height: 100%;
    overflow: hidden;
    pointer-events: none;
    z-index: 100;
    -webkit-transition: width 1s ease, height 1s ease;
    -moz-transition: width 1s ease, height 1s ease;
    -o-transition: width 1s ease, height 1s ease;
    transition: width 0.4s ease, height 0.4s ease
}
.badge {
    margin: 0;
    padding: 0;
    color: white;
    padding: 10px 10px;
    font-size: 15px;
    font-family: Arial, Helvetica, sans-serif;
    text-align: center;
    line-height: normal;
    text-transform: uppercase;
    background: #ed1b24;
}

.badge::before, .badge::after {
    content: '';
    position: absolute;
    top: 0;
    margin: 0 -1px;
    width: 100%;
    height: 100%;
    background: inherit;
    min-width: 55px
}

.badge::before {
    right: 100%
}

.badge::after {
    left: 100%
}
.top-right {
    position: absolute;
    top: 0;
    right: 0;
    -ms-transform: translateX(30%) translateY(0%) rotate(45deg);
    -webkit-transform: translateX(30%) translateY(0%) rotate(45deg);
    transform: translateX(30%) translateY(0%) rotate(45deg);
    -ms-transform-origin: top left;
    -webkit-transform-origin: top left;
    transform-origin: top left;
}
    </style>

        <section class="dashboard">
            <div class="details-container">
               <div class="inner-box details">
                    <div class="top-section">
                        <h1 class="heading">Details</h1>
                        <div class="select-box">
                            <select name="months" id="store">
                                <option value="D">This Day</option>
                                <option value="W">This week</option>
                                <option value="M">This month</option>
                                <option value="Y">This year</option>
                              </select>
                        </div>
                    </div>
                    <div class="sold-recent-container" >
                        <div class="details-text sold-text" id="progress1old">
                            <div class="left-section">
                                <img src="./Admin/images/sold-icon.svg">
                                <div class="text" id="progress1old">
                                    <h2 class="top-heading">Sold</h2>
                                    <progress class="progress progress1" max="<?php echo $property_count;?>" value="<?php echo $sold;?>"></progress>
                                </div>
                            </div>

                            <div class="right-section" id="old">
                                <h3><?php echo $sold;?></h3>
                            </div>
                        </div>

                        <div class="details-text sold-text" id="progress1new" style="display:none;" >
                           
                        </div>
                 
                        <div class="details-text recent-text" id="progressrent" >
                            <div class="left-section">
                                <img src="./Admin/images/sold-icon.svg">
                                <div class="text" id="progressrent">
                                    <h2 class="top-heading">Rented</h2>
                                    <progress class="progress progress1" max="<?php echo $property_count;?>" value="<?php echo $rent;?>"></progress>
                                </div>

                            </div>
                            <div class="right-section" id="rentold">
                                <h3><?php echo $rent;?></h3>
                            </div>

                        </div>

                          <div class="details-text recent-text" id="progress1rent" style="display:none;">
                           
                
                        </div>
                    </div>
                </div>
                <div class="inner-box statistics">
                    <div class="top-section">
                        <div class="heading">Statistics</div>
                        <div class="select-box">
                            <select name="months" id="chart">
                                 <option value="D">This Day</option>
                                <option value="W">This week</option>
                                <option value="M">This month</option>
                                <option value="Y">This year</option>
                              </select>
                        </div>
                    </div>
                 <div id="donut"></div>

                  <div id="donutchart"  style="display: none;"></div>
                </div>
                <div class="inner-box recently-sold">
                    <div class="top-section">
                        <div class="heading">Recently Sold</div>
                    </div>
                    <div class="recently-sold-container">
                             @foreach($soldproperty as $sold)
                        <div class="recently-sold-items">
                            <div class="left-section">
                                <div class="image">
                                    <img src="./Admin/images/sold-img-1.png">
                                </div>
                                <div class="detail">
                                  <h2 class="top-heading">{{$sold->property_name}}</h2>
                                    <div class="location-box">
                                        <div class="loc-icon">
                                            <img src="./Admin/images/loc-icon.svg">
                                        </div>
                                         <div class="loc-text">
                                            {{$sold->location}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                           <div class="right-section">
                                <div class="price">+${{$sold->price}}</div>
                            </div>
                        </div>
                        @endforeach
                      <!--   <div class="recently-sold-items">
                            <div class="left-section">
                                <div class="image">
                                    <img src="./Admin/images/sold-img-2.png">
                                </div>
                                <div class="detail">
                                    <h2 class="top-heading">Flexi Tower</h2>
                                    <div class="location-box">
                                        <div class="loc-icon">
                                            <img src="./Admin/images/loc-icon.svg">
                                        </div>
                                        <div class="loc-text">
                                            North Carolina, Usa
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="right-section">
                                <div class="price">+$120</div>
                            </div>
                        </div> -->
                       <!--  <div class="recently-sold-items">
                            <div class="left-section">
                                <div class="image">
                                    <img src="./Admin/images/sold-img-3.png">
                                </div>
                                <div class="detail">
                                    <h2 class="top-heading">Vista Tower</h2>
                                    <div class="location-box">
                                        <div class="loc-icon">
                                            <img src="./Admin/images/loc-icon.svg">
                                        </div>
                                        <div class="loc-text">
                                            North Carolina, Usa
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="right-section">
                                <div class="price">+$120</div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>

            <div class="main-sections-container">
                <h2 class="main--headings">Property List</h2>
                <div class="main-section-inner-conatiner">
                    <div class="property-list-slider  property-list">
                        <h3>For Sale</h3>
                        <div class="owl-carousel-1 owl-theme ">
                              @foreach($saledata as $sale)
                            <div class="item ">
                                <a href="javascript:void(0); ">
                                    <div class="slider-img ">
                                        @foreach($sale->image as $image=>$v)
                                         @if($image == '0')
                                        <img src="{{asset('Property-images/'.$v)}} ">
                                        @endif
                                        @endforeach
                                           @if($sale->status == '2')
                                            <div class="badge-overlay">
                                                <span class="top-right badge red">Sold</span>
                                            </div>
                                             @endif
                                    </div>
                                    <div class="detail">
                                        <h2 class="top-heading">{{$sale->property_name}}</h2>
                                        <div class="location-box">
                                            <div class="loc-icon">
                                                <img src="./Admin/images/loc-icon.svg">
                                            </div>
                                            <div class="loc-text">
                                               {{$sale->location}}
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        <!--     <div class="item ">
                                <a href="javascript:void(0); ">
                                    <div class="slider-img ">
                                        <img src="./Admin/images/item-2.png ">
                                    </div>
                                    <div class="detail">
                                        <h2 class="top-heading">Sunflower Suit</h2>
                                        <div class="location-box">
                                            <div class="loc-icon">
                                                <img src="./Admin/images/loc-icon.svg">
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
                                        <img src="./Admin/images/item-3.png ">
                                    </div>
                                    <div class="detail">
                                        <h2 class="top-heading">Co Apartment</h2>
                                        <div class="location-box">
                                            <div class="loc-icon">
                                                <img src="./Admin/images/loc-icon.svg">
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
                                        <img src="./Admin/images/item-4.png ">
                                    </div>
                                    <div class="detail">
                                        <h2 class="top-heading">Flexi Tower</h2>
                                        <div class="location-box">
                                            <div class="loc-icon">
                                                <img src="./Admin/images/loc-icon.svg">
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
                                        <img src="./Admin/images/item-5.png ">
                                    </div>
                                    <div class="detail">
                                        <h2 class="top-heading">Vista Tower</h2>
                                        <div class="location-box">
                                            <div class="loc-icon">
                                                <img src="./Admin/images/loc-icon.svg">
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
                        <h3>For Rent</h3>
                        <div class="owl-carousel-2 owl-theme ">
                                @foreach($rentdata as $rent)
                            <div class="item ">
                                <a href="javascript:void(0); ">
                                    <div class="slider-img ">
                                        @foreach($rent->image as $image=>$v)
                                         @if($image == '0')
                                        <img src="{{asset('Property-images/'.$v)}} ">
                                        @endif
                                        @endforeach
                                         @if($rent->status == '1')
                                            <div class="badge-overlay">
                                                <span class="top-right badge red">Rented</span>
                                            </div>
                                             @endif
                                    </div>
                                       <div class="detail">
                                        <h2 class="top-heading">{{$rent->property_name}}</h2>
                                        <div class="location-box">
                                            <div class="loc-icon">
                                                <img src="{{asset('Admin/images/loc-icon.svg')}}">
                                            </div>
                                            <div class="loc-text">
                                               {{$rent->location}}
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                                             @endforeach
                     <!--        <div class="item ">
                                <a href="javascript:void(0); ">
                                    <div class="slider-img ">
                                        <img src="./Admin/images/item-2.png ">
                                    </div>
                                    <div class="detail">
                                        <h2 class="top-heading">Sunflower Suit</h2>
                                        <div class="location-box">
                                            <div class="loc-icon">
                                                <img src="./Admin/images/loc-icon.svg">
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
                                        <img src="./Admin/images/item-3.png ">
                                    </div>
                                    <div class="detail">
                                        <h2 class="top-heading">Co Apartment</h2>
                                        <div class="location-box">
                                            <div class="loc-icon">
                                                <img src="./Admin/images/loc-icon.svg">
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
                                        <img src="./Admin/images/item-4.png ">
                                    </div>
                                    <div class="detail">
                                        <h2 class="top-heading">Flexi Tower</h2>
                                        <div class="location-box">
                                            <div class="loc-icon">
                                                <img src="./Admin/images/loc-icon.svg">
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
                                        <img src="./Admin/images/item-5.png ">
                                    </div>
                                    <div class="detail">
                                        <h2 class="top-heading">Vista Tower</h2>
                                        <div class="location-box">
                                            <div class="loc-icon">
                                                <img src="./Admin/images/loc-icon.svg">
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
<script src="./Admin/js/owl-carousel-1.js"></script>   

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
         


      }
    </script> 
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Sales',     11],
          ['Rental',      2],
        
        ]);

        var options = {
          pieHole: 0.4,
           'width':300,
          colors: [ '#1e90ff', '#ffbf00'],
           'height':200
        };

        var chart = new google.visualization.PieChart(document.getElementById('donut'));
        chart.draw(data, options);
      }
    </script> 
    
@endsection