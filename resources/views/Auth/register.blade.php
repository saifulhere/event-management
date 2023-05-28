@extends('layouts.front')
@section('content')
<div class="wrapper register">
    <div class="inner mx-auto">
        <form action="">
            <h3>Register New User</h3>
            <div class="form-wrapper">
                <label for="" class="label-input">Name</label>
                <input type="text" class="form-control">
            </div>
            <div class="form-wrapper">
                <label for="" class="label-input">Username</label>
                <input type="text" class="form-control">
            </div>
            {{-- <div class="form-wrapper">
                <label for="" class="label-input">Account Status</label>
                <div class="form-holder">
                    <select name="" id="" style="width:220px;" class="form-control">
                        <option value="1" class="option">select account status</option>
                        <option value="2" class="option">Active</option>
                        <option value="3" class="option">Deactive</option>
                    </select>
                    <i class="zmdi zmdi-chevron-down"></i>
                </div>
            </div> --}}
            <div class="form-wrapper form-select">
                <label for="">User Type</label>
                <div class="form-holder">
                    <select name="" id="" style="width:220px;" class="form-control">
                        <option value="1" class="option">Select user type</option>
                        <option value="2" class="option">Administrator</option>
                        <option value="3" class="option">Event Manager</option>
                        <option value="4" class="option">User</option>
                    </select>
                    <i class="zmdi zmdi-chevron-down"></i>
                </div>
            </div>
            <div class="form-wrapper">
                <label for="" class="label-input">Email</label>
                <input type="text" class="form-control">
            </div>
            <div class="form-wrapper">
                <label for="" class="label-input">Phone</label>
                <input type="text" class="form-control">
            </div>
            <button type="submit">Register User</button>
        </form>
        <div class="image-holder">
            <img src="{{asset('images/registration-form-5.jpg')}}" alt="">
        </div>
    </div>
</div>
@endsection