@extends('layouts.user-dashboard')
@section('content')
<div class="layout-content">
    <!-- Content -->
    <div class="container flex-grow-1 container-p-y">
        <div class="form-top position-relative mb-5">
            <div class="overlay"></div>
            <h1 class="p-5 position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center text-white form-heading">Book For The Event</h1>
        </div>
      <!-- Header -->
      <div class="container-m-nx container-m-ny theme-bg-white mb-4 position-relative">
        <div class="media col-md-10 col-lg-8 col-xl-7 py-5 mx-auto">
          <img src="{{ asset('storage/'.$user->bookedEvent->image)}}" alt="" class="d-block ui-w-100 ">
          <div class="media-body ml-5">
            <h4 class="font-weight-bold mb-4">{{$user->name}} </h4>

            <div class="text-muted mb-4">
              Lorem ipsum dolor sit amet, nibh suavitate qualisque ut nam. Ad harum primis electram duo, porro principes ei has.
            </div>

            <a  class="d-inline-block text-body">
              <strong>{{ $user->bookedEvent->passing_year }}</strong>
              <span class="text-muted">Passing Year</span>
            </a>
            <a  class="d-inline-block text-body ml-3">
              <strong>{{ $user->bookedEvent->age }}</strong>
              <span class="text-muted">Age</span>
            </a>
            <a  class="d-inline-block text-body ml-3">
                <strong>{{ $user->bookedEvent->quantity }}</strong>
                <span class="text-muted">Number of People</span>
            </a>
          </div>
        </div>
        @if($user->bookedEvent->payment_status === 'pending')
            <div class="position-absolute payment-button">
                <a href="" class="btn btn-primary top-10 left-0">Proceed to Payment</a>
            </div>
        @elseif($user->bookedEvent->payment_status === 'paid')
            <div class="position-absolute payment-button">
                <a href="" class="btn btn-primary top-10 left-0">Download</a>
            </div>
        @endif
        <div class="media col-md-10 col-lg-8 col-xl-7 py-5 mx-auto">
            <h4 class="font-weight-bold mb-4">Payment Status</h4>
            <a class="btn btn-primary ml-5" style="height: fit-content">{{$user->bookedEvent->payment_status}}</a>
        </div>
        <hr class="m-0">
      </div>
      <!-- Header -->
    </div>
    <!-- / Content -->



  </div>

<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection