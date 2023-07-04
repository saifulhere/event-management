@extends('layouts.front')
@section('content')
<section class="h-100 gradient-form" style="background-color: #050262;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-5 shadow-lg">
          <div class="card rounded-3 text-black">
            <div class="row g-0">
              <div class="col-lg-12 shadow-lg">
                <div class="card-body p-md-5 mx-md-4">
  
                  <div class="text-center">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp"
                      style="width: 185px;" alt="logo">
                    <h4 class="mt-1 mb-3 pb-1">W3 Relations Team</h4>
                    <p class="text-center mb-5">User Account Login.</p>
                    @if(session()->has('status'))
                        <div class="bg-danger p-3 text-white rounded-lg">
                            {{session('status')}}
                        </div>
                    @elseif(session()->has('warning'))
                        <div class="bg-danger p-3 text-white rounded-lg">
                            {{session('warning')}}
                        </div>
                    @endif
                  </div>
  
                  <form action="{{route('login')}}" method="POST">
                        @csrf

                        <div class="form-outline mb-4">
                            <label class="form-label" for="Email address">Enter Your Email Address</label>
                            <input type="email" name="email" id="form2Example11" class="form-control"
                            placeholder="Enter Email" />
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" name="password" id="form2Example22" class="form-control" placeholder="Enter Your password" />
                        </div>

                        <div class="text-center pt-1 mb-5 pb-1">
                        <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Login</button>
                        <a class="text-muted" href="{{route('password.request')}}">Forgot password?</a>
                        </div>

                        <div class="d-flex align-items-center justify-content-center pb-4">
                        <p class="mb-0 me-2">Don't have an account?</p>
                        <a href="{{route('signup')}}" class="btn btn-outline-danger ml-3">Create new</a>
                        </div>
  
                  </form>
  
                </div>
              </div>
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