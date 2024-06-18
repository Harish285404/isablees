@extends('User.layouts.main')


@section('content')

<main class="main-dashboard">
        <section class="Sales">
            <div class="main-sections-container">
                <h1 class="top-main--headings">
                    <div class="headings-arrow"> <img src="{{asset('Admin/images/headings-arrow.svg')}}">Sales List’s</div>
                </h1>
                <div class="main-section-inner-conatiner">
                    <!--<div class="providers-searc-box">-->
                    <!--    <h2 class="main--headings">Property List</h2>-->
                    <!--    <div class="top-seacrh-box">-->
                    <!--        <label>Search</label>-->
                    <!--        <input type="text" id="search">-->
                    <!--    </div>-->
                    <!--</div>-->
                    <div class="main-table">
                        <table id="datatable-responsive">
                            <thead>
                          
                                <tr class="heading">
                                    <th></th>
                                    <th>Name</th>
                                    <th>Purchased By</th>
                                    <th>Sold By</th>
                                    <th>Price</th>
                                </tr>
                                </thead>
                                  <tbody>
                                       @foreach($data as $sales)
                                <tr style='cursor: pointer; cursor: hand;' data-href="https://immotep.chainpulse.tech/user/sales-detail/<?php echo $sales->id ?>">
                                   
                                   
                                   
                                       <?php 
  $country = App\Models\User::where('id',$sales->user_id)->get(['id','first_name']);

   ?>
                                    <td>
      <?php  $sales->image =  explode(',', $sales->image);   ?>
                                       @foreach($sales->image as $image=>$v)
                                         @if($image == '0')
                                        <img src="{{asset('Property-images/'.$v)}} ">
                                        @endif
                                        @endforeach


                                   </td>
                                    <td><b>{{$sales->property_name}}</b>
                                        <p><img src="{{asset('Admin/images/loc-icon.svg')}}">{{$sales->location}}</p>
                                    </td>
                                    <td><?php echo $country[0]['first_name']; ?></td>
                                    <td>{{$sales->first_name}}</td>
                                    <td>${{$sales->price}}</td>

                                </a>
                                </tr>
                                @endforeach
                           <!--      <tr>
                                    <td><img src="{{asset('Admin/images/tb-img-2.png')}}"></td>
                                    <td><b>The Caligary</b>
                                        <p><img src="{{asset('Admin/images/loc-icon.svg')}}">North Carolina, Usa</p>
                                    </td>
                                    <td>Rooney</td>
                                    <td>Aminah</td>
                                    <td>$8550.00</td>
                                </tr>
                                <tr>
                                    <td><img src="{{asset('Admin/images/tb-img-3.png')}}"></td>
                                    <td><b>Covery</b>
                                        <p><img src="{{asset('Admin/images/loc-icon.svg')}}">North Carolina, Usa</p>
                                    </td>
                                    <td>Rooney</td>
                                    <td>Aminah</td>
                                    <td>$8550.00</td>
                                </tr>
                                <tr>
                                    <td><img src="{{asset('Admin/images/tb-img-4.png')}}"></td>
                                    <td><b>Flexi Tower</b>
                                        <p><img src="{{asset('Admin/images/loc-icon.svg')}}">North Carolina, Usa</p>
                                    </td>
                                    <td>Rooney</td>
                                    <td>Aminah</td>
                                    <td>$8550.00</td>
                                </tr>
                                <tr>
                                    <td><img src="{{asset('Admin/images/tb-img-5.png')}}"></td>
                                    <td><b>The Stars</b>
                                        <p><img src="{{asset('Admin/images/loc-icon.svg')}}">North Carolina, Usa</p>
                                    </td>
                                    <td>Rooney</td>
                                    <td>Aminah</td>
                                    <td>$8550.00</td>
                                </tr>
                                <tr>
                                    <td><img src="{{asset('Admin/images/tb-img-6.png')}}"></td>
                                    <td><b>Covery</b>
                                        <p><img src="{{asset('Admin/images/loc-icon.svg')}}">North Carolina, Usa</p>
                                    </td>
                                    <td>Rooney</td>
                                    <td>Aminah</td>
                                    <td>$8550.00</td>
                                </tr> -->
                            </tbody>
                            <tfooter></tfooter>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script>
jQuery(document).ready(function($) {
    $('*[data-href]').on('click', function() {
        window.location = $(this).data("href");
    });
});
</script>
@endsection