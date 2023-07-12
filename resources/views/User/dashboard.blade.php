@extends('layouts.user-dashboard')
@section('content')
<div class="card">
    <div class="card-body">
        @if(session('status'))
        <div class="alert alert-success text-center"> {{session('status')}} </div>
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
        <div class="form-top position-relative mb-5">
            <div class="overlay"></div>
            <h1 class="p-5 position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center text-white form-heading">Book For The Event</h1>
        </div>
        <form action="{{ route('book.event') }}" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" readonly name="name" value="{{$user->name}}" placeholder="Enter sub heading">
                    </div>
                    <div class="form-group">
                        <label for="text">Passing Year</label>
                        <input type="text" class="form-control" id="passing_year" name="passing_year" value="{{ old('passing_year') }}" placeholder="Enter passing year...">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Age</label>
                        <input type="number" class="form-control" id="age" name="age" value="{{ old('age') }}" placeholder="Enter sub heading">
                    </div>
                    <div class="form-group">
                        <label for="text">Number of People</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity') }}" placeholder="Enter Heading text">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="text">Phone Number</label>
                        <input type="text" class="form-control" id="email" readonly name="phone" value="{{'+880 '.$user->phone}}" placeholder="Enter Heading text">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="message">Your Image <span class="bold">Image size should be 300 x 350 px and size under 3M B</span></label>
                        <input type="file" class="form-control" id="image" required name="image" placeholder="Enter button url">
                    </div>
                </div>
            </div>

                <button type="submit" class="btn btn-primary shadow-lg">Book Event</button>

        </form>
    </div>
</div>
<style>
    .form-top {
        min-height: 200px;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        background-image: url('https://media.istockphoto.com/id/1487036945/photo/international-group-of-young-people-laughing-at-camera-outside-happy-friends-taking-selfie.jpg?s=612x612&w=0&k=20&c=NFGvqBUUJJcIWV_U6x2EFflOxEO7T0tao9uHvuD7wjE=');
    }
    .form-heading {
        background-color: rgba(0, 0, 0, 0.5);
    }
    @media (min-width: 992px) {
        .header-fixed.subheader-fixed.subheader-enabled .wrapper {
            padding-top: 50px;
        }
    }

</style>
@endsection