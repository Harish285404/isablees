@extends('User.layouts.main')


@section('content')
     

  <main class="main-dashboard">
       @if(Session::has('message'))
<p class="alert alert-info">{{ Session::get('message') }}</p>
@endif
        <section class="edit-profile">
           
            <h1 class="top-main--headings">
                <div class="headings-arrow"> <img src="{{asset('Admin/images/headings-arrow.svg')}}">Dashboard</div>
            </h1>
              <form  action="{{ url('user/edit-user-data/'.Auth()->user()->id)}}" method="Post" enctype="multipart/form-data" class="account-form-detail" id="adduser">
                 @csrf
            <div class="profile-flex-box">
              
                
                <div class="user_image-block">
                    <div class="file-upload">
                        <div class="image-upload-wrap">
                            <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" name="image" />
                            <div class="drag-text">
                                <img src="{{asset('User-images/'.Auth()->user()->image)}}">
                            </div>
                        </div>
                        <div class="file-upload-content">
                            <img class="file-upload-image" src="#" alt="your image" />
                        </div>
                        <div class="upload-img">
                            <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Choose Image</button>
                        </div>
                    </div>
                     @if ($errors->has('image'))
                            <span class="text-danger">{{ $errors->first('image') }}</span><br>
                        @endif
                </div>
                <div class="user_details_main">
                    <div class="user_details">
                        <h3>Edit Profile</h3>
                        <p>Update the picture and personal details here.</p>
                        
                               
                            <div class="col">
                                <label>First Name</label>
                                 <div class="col-inner">
                                <input type="text" id="first_name" name="first_name" value="{{$data[0]->first_name }}">
                                   @if ($errors->has('first_name'))
                            <span class="text-danger">{{ $errors->first('first_name') }}</span><br>
                        @endif
                            </div>
                             </div>
                             <div class="col">
                                <label>Last Name</label>
                                <div class="col-inner">
                                <input type="text" id="last_name" name="last_name" value="{{$data[0]->last_name}}">
                                   @if ($errors->has('last_name'))
                            <span class="text-danger">{{ $errors->first('last_name') }}</span><br>
                           
                        @endif
                            </div>
                             </div>
                            <div class="col">
                                <label>Phone Number</label>
                                 <div class="col-inner">
                                <input type="tel" id="phone_number" name="phone_number" value="{{$data[0]->phone_number}}">
                                   @if ($errors->has('phone_number'))
                            <span class="text-danger">{{ $errors->first('phone_number') }}</span><br>
                        @endif
                            </div>
                             </div>
                            <div class="col">
                                <label>Alt Phone Number</label>
                                 <div class="col-inner">
                                <input type="tel" id="alt_phone_number" name="alt_phone_number" value="{{$data[0]->alt_phone_number}}">
                                   @if ($errors->has('phone_number'))
                            <span class="text-danger">{{ $errors->first('alt_phone_number') }}</span><br>
                        @endif
                            </div>
                             </div>
                            <div class="col">
                                <label>Email Address</label>
                                <div class="col-inner">
                                <input type="email" id="email" name="email" value="{{$data[0]->email}}" readonly>
                            </div>
                             </div>
                            <div class="col">
                                <label>Home Address</label>
                                 <div class="col-inner">
                                <input type="text" id="address" name="address" value="{{$data[0]->address}}">
                                   @if ($errors->has('address'))
                            <span class="text-danger">{{ $errors->first('address') }}</span><br>
                        @endif
                            </div>
                            </div>
                            <div class="account-dlt-btn account-save-btn">
                                <button type="submit" class="main-btn">Save</button>
                            </div>
                        
                    </div>
                    </form>
                </div>
            </div>
        </section>
    </main>


@endsection