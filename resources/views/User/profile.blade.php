@extends('User.layouts.main')


@section('content')

  <main class="main-dashboard">
        <section class="profile-detail">
            <h1 class="top-main--headings">
                <div class="headings-arrow"> <img src="{{asset('Admin/images/headings-arrow.svg')}}">Profile</div>
            </h1>
            <div class="profile-flex-box">
                <div class="user_image-block">
                    <div class="file-upload">
                        <div class="image-upload-wrap">
                            <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
                            <div class="drag-text">
                                <img src="{{asset('User-images/'.Auth()->user()->image)}}">
                            </div>
                        </div>
                        <div class="file-upload-content">
                            <img class="file-upload-image" src="#" alt="your image" />
                        </div>
                        <!--<div class="upload-img">-->
                        <!--    <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Choose Image</button>-->
                        <!--</div>-->
                    </div>
                </div>
                <div class="user_details_main">
                    <div class="user_details">
                        <div class="profile-detail-top-section">
                            <div class="left-sec">
                                <h3>Profile Details</h3>
                                <p>Update the picture and personal details here.</p>
                            </div>
                            <div class="ryt-main-btn">
                                <a class="main-btn" href="{{ url('user/edit-profile') }}">Edit Profile</a>
                            </div>
                        </div>
                        <form class="account-form-detail">
                            <div class="col">
                                <label>Name</label>
                                <a><?php echo $data[0]->first_name;  echo $data[0]->last_name; ?></a>
                            </div>
                            <div class="col">
                                <label>Phone Number</label>
                                <a><?php echo $data[0]->phone_number;?></a>
                            </div>
                            <div class="col">
                                <label>Alt Phone Number</label>
                                <a><?php echo $data[0]->alt_phone_number; ?></a>
                            </div>
                            <div class="col">
                                <label>Email Address</label>
                                <a><?php echo $data[0]->email; ?></a>
                            </div>
                            <div class="col">
                                <label>Home Address</label>
                                <a><?php echo $data[0]->address; ?></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>


@endsection