@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="text-center fw-bolder mb-2"><h1>Set your event here</h1></div>
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
        <form action="@if(isset($hero)){{route('update.hero')}} @else {{route('hero')}} @endif" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="form-group">
                <label for="name">Sub Heading</label>
                <input type="text" class="form-control" id="name" name="sub_heading" value="@if(isset($hero)){{$hero->sub_heading}}@endif" placeholder="Enter sub heading">
            </div>
            <div class="form-group">
                <label for="text">Heading Text</label>
                <input type="text" class="form-control" id="email" name="heading" value="@if(isset($hero)){{$hero->heading}}@endif" placeholder="Enter Heading text">
            </div>
            <div class="form-group">
                <label for="phone">Button Url</label>
                <input type="text" class="form-control" id="phone" name="btn_url" value="@if(isset($hero)){{$hero->btn_url}}@endif" placeholder="Enter button url">
            </div>
            <div class="form-group">
                <label for="message">Background Image</label>
                <input type="file" class="form-control" id="phone" name="bg_image" placeholder="Enter button url">
            </div>
            @if(isset($hero))
                <button type="submit" class="btn btn-primary shadow-lg">Update</button>
                @else
                <button type="submit" class="btn btn-primary shadow-lg">Set Event</button>
            @endif
        </form>
    </div>
</div>
@endsection