@extends('User.layouts.main')


@section('content')
<main class="main-dashboard">
        @if(Session::has('message'))
<p class="alert alert-info">{{ Session::get('message') }}</p>
@endif
        <section class="change-password">
            <h1 class="top-main--headings">
                <div class="headings-arrow"> <img src="{{asset('Admin/images/headings-arrow.svg')}}">Profile</div>
            </h1>
            <div class="main-section-inner-conatiner">
                <div class="user_details">
                    <h2 class="main--headings">Change Password</h2>
                    <form class="account-form-detail" method="post" action="{{url('user/update-password')}}">
                        @csrf
                        <div class="col">
                            <label>Current Password</label>
                            <input type="text" id="oldpass" name="oldpass">
                            <div class="row">
                    @if ($errors->has('oldpass'))
                            <span class="text-danger">{{ $errors->first('oldpass') }}</span><br>
                        @endif
                       </div>
                        </div>
                        <div class="col">
                            <label>New Password</label>
                            <input type="text" id="newpass" name="newpass">
                            <div class="row" >
                    @if ($errors->has('newpass'))
                            <span class="text-danger">{{ $errors->first('newpass') }}</span><br>
                        @endif
                       </div>
                        </div>
                        <div class="col">
                            <label>Confirm New Password</label>
                            <input type="text" id="cnewpass" name="cnewpass">
                            <div class="row" >
                    @if ($errors->has('cnewpass'))
                            <span class="text-danger">{{ $errors->first('cnewpass') }}</span><br>
                        @endif
                       </div>
                        </div>
                        <div class="account-dlt-btn account-save-btn">
                            <button type="submit" class="main-btn">update</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>


@endsection