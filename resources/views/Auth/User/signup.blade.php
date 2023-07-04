@extends('layouts.front')
@section('content')
<section class="h-100 gradient-form" style="background-color: #050262;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-6 shadow-lg">
          <div class="card rounded-3 text-black">
            <div class="row g-0">
              <div class="col-lg-12">
                <div class="card-body p-md-5 mx-md-4">
                  <div class="text-center">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp"
                      style="width: 185px;" alt="logo">
                    <h4 class="mt-1 mb-5 pb-1">We are W3 Relations Team</h4>
                  </div>
  
                  <form action="{{ route('signup') }}" method="POST">
                    @csrf
                    <p>Provide Necessary Information below</p>
  
                    <div class="d-flex justify-content-between">
                        <div class="form-outline mb-4">
                            <label class="form-label" for="name">Full name</label>
                            <input type="text" id="form2Example11" name="name" value="{{old('name')}}" class="form-control"
                              placeholder="Your name" />
                            @error('name')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="name">Username(optional)</label>
                            <input type="text" id="form2Example11" name="username" value="{{old('username')}}" class="form-control"
                              placeholder="Your username" />
                            @error('username')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="form-outline">
                            <input type="hidden" id="form2Example11" name="status" value="active" class="form-control"
                              placeholder="Phone number or email address" />
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="form-outline mb-4">
                            <label class="form-label" for="name">Email</label>
                            <input type="email" id="form2Example11" name="email" value="{{old('email')}}" class="form-control"
                              placeholder="example@mail.com" />
                            @error('email')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="username">Phone</label>
                            <input type="text" id="form2Example11" name="phone" value="{{old('phone')}}" class="form-control"
                              placeholder="Enter phone" />
                            @error('phone')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="form-outline mb-4">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" id="form2Example11" name="password"  class="form-control"
                            placeholder="Enter Password"/>
                            @error('password')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="password_confirmation">Repeat Password</label>
                            <input type="password" id="form2Example11" name="password_confirmation" class="form-control"
                            placeholder="Repeat Password"/>
                            @error('password_confirmation')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="text-center pt-1 mb-5 pb-1">
                      <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Register</button>
                    </div>
  
                    <div class="d-flex align-items-center justify-content-center pb-4">
                      <p class="mb-0 me-2">Already have an account?</p>
                      <a href="{{route('login')}}" class="btn btn-outline-danger ml-3">Login</a>
                    </div>
  
                  </form>
                </div>
              </div>
              {{-- <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                  <h4 class="mb-4">We are more than just a company</h4>
                  <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
              </div> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
    <style>
        .gradient-custom-2 {
        /* fallback for old browsers */
        background: #fccb90;

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
        }

        @media (min-width: 768px) {
        .gradient-form {
        height: 100vh !important;
        }
        }
        @media (min-width: 769px) {
        .gradient-custom-2 {
        border-top-right-radius: .3rem;
        border-bottom-right-radius: .3rem;
        }
        }
    </style>
  </section>
@endsection