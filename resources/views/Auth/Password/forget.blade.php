@extends('layouts.front')
@section('content')
    <div class="verification">
        <div class="card-body verification-form pt-6">
            <h3 class="font-bold text-center">Send Reset Link</h3>
            <p class="text-center font-2xl">Enter your email below to send password reset link.</p>
            
            @if(session()->has('resent'))
            <div class="bg-red-500 rounded-md text-danger text-center py-3 mt-3 mb-6  font-medium">
            We have sent you a fresh verification link.
            </div>

            @endif
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" placeholder="Enter your email..." class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-0 text-center">
                    <button type="submit" class="btn btn-success ">
                        Send Password Reset Link
                    </button>
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