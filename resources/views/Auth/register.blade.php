@extends('layouts.front')
@section('content')
<div class="wrapper register">
    <div class="inner mx-auto">
        <form action="{{route('admin.store')}}" method="POST">
            @csrf
            <h3>Register New User</h3>
            <div class="form-wrapper">
                <label for="" class="label-input">Name</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control">
                @error('name')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="form-wrapper">
                <label for="Username" class="label-input">Username</label>
                <input type="text" name="username" value="{{old('username')}}" class="form-control">
                @error('username')
                    <div class="text-danger">
                        {{$message}}
                    </div>
            @enderror
            </div>
            <div class="form-wrapper">
                <input type="hidden" name="status" value="active" class="form-control">
            </div>
            <div class="form-wrapper form-select">
                <label for="User Type">User Type</label>
                <div class="form-holder">
                    <select name="user_type" id="" style="width:220px;" class="form-control">
                        <option value="" class="option">Select user type</option>
                        <option value="admin" class="option">Administrator</option>
                        <option value="manager" class="option">Event Manager</option>
                        <option value="user" class="option">User</option>
                    </select>
                    <i class="zmdi zmdi-chevron-down"></i>
                </div>
                @error('user_type')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="form-wrapper">
                <label for="Email" class="label-input">Email</label>
                <input type="email" name="email" value="{{old('email')}}" class="form-control">
                @error('email')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                @enderror
            </div>
            <div class="form-wrapper">
                <label for="Phone" class="label-input">Phone</label>
                <input type="text" name="phone" value="{{old('phone')}}" class="form-control">
                @error('phone')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="form-wrapper">
                <label for="" class="label-input">Password</label>
                <input type="password" class="form-control">
            </div>
            <div class="form-wrapper">
                <label for="" class="label-input">Repeat Password</label>
                <input type="password" class="form-control">
            </div>
            <button type="submit">Register User</button>
        </form>
        <div class="image-holder">
            <img src="{{asset('images/registration-form-5.jpg')}}" alt="">
        </div>
    </div>
</div>
@endsection