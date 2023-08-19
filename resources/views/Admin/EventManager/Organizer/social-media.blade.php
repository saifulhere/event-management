@extends('layouts.app')
@section('content')
{{-- EVENT ORGANIZER INFORMATION SETTING START --}}
<div class="card mt-10">
    <div class="card-body">
        <div class="text-center fw-bolder mb-2"><h1>Organizer Social Media</h1></div>
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

        <form action="@if(isset($organizer)){{route('social.media.update')}} @else {{route('organizer.social.media')}} @endif" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="row mt-10">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Facebook Profile</label>
                        <input type="text" class="form-control" id="name" name="facebook" value="@if(isset($socialMedia)) {{ $socialMedia->facebook }} @endif" placeholder="Enter facebook link">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="text">Instagram Profile</label>
                        <input type="text" class="form-control" id="email" name="instagram" value="@if(isset($socialMedia)){{$socialMedia->instagram}}@endif" placeholder="Organizer tagline...">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Twitter Profile</label>
                        <input type="text" class="form-control" id="name" name="twitter" value="@if(isset($socialMedia)) {{ $socialMedia->twitter }} @endif" placeholder="Enter facebook link">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="text">Linked in Profile</label>
                        <input type="text" class="form-control" id="email" name="linkedin" value="@if(isset($socialMedia)){{$socialMedia->linkedin}}@endif" placeholder="Organizer tagline...">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="align-items-end">
                        @if(isset($socialMedia))
                        <button type="submit" class="btn btn-primary shadow-lg">Update</button>
                        @else
                        <button type="submit" class="btn btn-primary shadow-lg">Save</button>
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
{{-- EVENT ORGANIZER INFORMATION SETTING START --}}

@endsection