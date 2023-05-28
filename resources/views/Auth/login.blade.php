@extends('layouts.front')
@section('content')
<div class="wrapper register">
    <div class="inner mx-auto">
        <form action="">
            <h3>Login to account</h3>
            <div class="form-wrapper">
                <label for="" class="label-input">Email or Phone</label>
                <input type="text" class="form-control">
            </div>
            <div class="form-wrapper">
                <label for="" class="label-input">Password</label>
                <input type="password" class="form-control">
            </div>
            <button >Login</button>
        </form>
        <div class="image-holder">
            <img src="{{asset('images/registration-form-5.jpg')}}" alt="">
        </div>
    </div>
</div>
@endsection