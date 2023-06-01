@extends('layouts.front')
@section('content')
    <div class="verification">
        <div class="card-body verification-form pt-6 p-2">
            <h3 class="font-bold fw-bold text-center">Login to</h3>
            @if(session()->has('status'))
            <div class="bg-red rounded-md text-dark text-center py-3 mt-3 mb-6">
                {{session('status')}}
            </div>

            @endif
            <form class="registration-form" action="{{ route('login')}}" method="POST">
                @csrf
                <div class="form-wrapper">
                    <label for="Email" class="text-dark label-input">Email</label>
                    <input type="email" name="email" value="{{old('email')}}" class="input-bg form-control">
                    @error('email')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-wrapper">
                    <label for="Email" class="label-input text-dark">Password</label>
                    <input type="password" name="password" value="{{old('email')}}" class="input-bg form-control">
                    @error('password')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="d-flex justify-content-between">
                    <p class="text-center fw-bold">Foget password?</p>
                    <p class="text-center fw-bold">Reset Password</p>
                </div>
                <div class="flex p-6 pt-3 items-end">
                    <button type="submit" class="btn btn-success text-white">Login</button>
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
            .input-bg{
                background: #050262;
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