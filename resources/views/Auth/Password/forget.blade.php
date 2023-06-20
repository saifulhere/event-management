@extends('layouts.front')
@section('content')
    <div class="verification">
        <div class="card-body verification-form pt-6">
            <h3 class="font-bold text-center">Reset Password</h3>
            <p class="text-center font-2xl">Enter your email below to send password reset link.</p>
            <div class="form-wrapper">
                <label for="Email" class="text-dark label-input">Email</label>
                <input type="email" name="email" value="{{old('email')}}" class="input-bg form-control">
                @error('email')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                @enderror
            </div>
            
            @if(session()->has('resent'))
            <div class="bg-red-500 rounded-md text-danger text-center py-3 mt-3 mb-6  font-medium">
            We have sent you a fresh verification link.
            </div>

            @endif
            <form class="text-center" action="{{ route('verification.resend')}}" method="POST">
                @csrf
                <p class="text-center fw-bold">Didn't receive a code?</p>
                    <div class="flex p-6 pt-3 items-end">
                        <button type="submit" class="btn btn-success text-white">Resend</button>
                    </div>
            </form>
        </div>
        <style>
            .verification{
                background: #050262;
                height: 100vh;
                vertical-align: center;
                padding-top: 100px !important;
            }
            .verification-form{
                margin-top: 100px;
                margin: auto;
                background: #fff;
                width: 30% !important;
                justify-content: center;
                border-radius: 20px;
            }
            .verification-form>form{
                width:100%;
                background: none;
            }
        </style>
    </div>
@endsection