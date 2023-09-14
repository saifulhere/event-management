@extends('layouts.theme')
@section('frontend')
<!-- Hero Section Begin -->
<section class="hero-section set-bg bg-overlay" data-setbg="@if(isset($event) && !empty($event->bg_image))
   {{ asset('storage/'.$event->thumbnail) }}
   @else {{asset('frontend_assets/img/hero.jpg')}}
   @endif">
   <div class="bg-overlay"></div>
   <div class="container">
       <div class="row">
           <div class="col-lg-7">
               <div class="hero-text">
                   <span>@if(isset($event) && !empty($event->tagline))
                       {{$event->tagline}}
                       @else {{'event sub heading'}}
                   @endif</span>
                   <h2>@if(isset($event) && !empty($event->title))
                       {{$event->title}}
                       @else {{'event sub heading'}}
                   @endif</h2>
                   <a href="{{route('login')}}" class="primary-btn">Join Event</a>
               </div>
           </div>
           <div class="col-lg-5">
               <img src=" {{asset('frontend_assets/img/hero-right.png')}}" alt="Image">
           </div>
       </div>
   </div>
</section>
<!-- Hero Section End -->

{{-- EVENT TIME, LOCATION AND OTHER NECESSARY INFORMATION START --}}
<div class="container" style="margin-top:100px; margin-bottom:100px;">
    <div class="card mt-10" style="border: none;">
        <div class="card-body">
            <div class="text-center mb-2"><h1>Set Your Event</h1></div>
            @if(session('success'))
            <div class="alert alert-success text-center"> {{session('success')}} </div>
            @endif
            @if(session('wrong'))
            <div class="alert alert-danger text-center"> {{session('wrong')}} </div>
        @endif
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{route('event.create')}}" method="POST" enctype="multipart/form-data" >
                @csrf
                <div class="row mt-10">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Guest ID</label>
                            <input type="hidden" name="event_id" value="{{ $event->id}}">
                            <input type="text" class="form-control" id="guest_id" name="guest_id" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Your Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name')}}" placeholder="Enter your name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Your Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email')}}" placeholder="example@gmail.com">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="text">Your Phone</label>
                            <input type="text" class="form-control" name="phone" value="{{ old('phone')}}" placeholder="Enter phone number">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="text">Number of People</label>
                            <input type="number" class="form-control" id="email" name="number_of_people" value="{{ old('number_of_people')}}" placeholder="Event location...">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="text">Your Image</label>
                            <input type="file" class="form-control" name="image" value="{{ old('image')}}">
                        </div>
                    </div>
                    <div class="col-md-4 mt-3">
                        <div class="">
                            <button style="border: none;" class="primary-btn">Book Event</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</section>
<!-- Schedule Section End -->

<script>
    function generateGuestID() {
  // Generate a random number between 100000 and 999999 (inclusive)
        const min = 100;
        const max = 999;
        const randomID = 'EVNT' + ''+ Math.floor(Math.random() * (max - min + 1)) + min;
        return randomID;
    }

    // Usage example:
    const guestID = generateGuestID();
    document.getElementById('guest_id').value = guestID;

</script>
@endsection