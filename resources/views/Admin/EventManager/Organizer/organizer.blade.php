@extends('layouts.app')
@section('content')
{{-- EVENT ORGANIZER INFORMATION SETTING START --}}
<div class="card mt-10">
    <div class="card-body">
        <div class="text-center fw-bolder mb-2"><h1>Organizer Information</h1></div>
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

        <form action="@if(isset($organizer)){{route('event.organizer.update')}} @else {{route('event.organizer')}} @endif" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="row mt-10">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Organizer Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="@if(isset($organizer)) {{ $organizer->name }} @endif" placeholder="Enter organizer name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="text">Organizer Tagline</label>
                        <input type="text" class="form-control" id="email" name="tagline" value="@if(isset($organizer)){{$organizer->tagline}}@endif" placeholder="Organizer tagline...">
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="text">About Organizer</label>
                    <textarea name="about" class="form-control" placeholder="About organizer">@if (isset($organizer)) {{ $organizer->about}} @endif</textarea>
                </div>
                <div class="col-md-6 mt-2">
                    <div class="form-group">
                        <label for="text">Organizer Phone</label>
                        <input type="text" class="form-control" id="email" name="phone" value="@if(isset($organizer)){{$organizer->phone}}@endif" placeholder="Enter Heading text">
                    </div>
                </div>
                <div class="col-md-6 mt-2">
                    <div class="form-group">
                        <label for="text">Organizer Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="@if(isset($organizer)){{$organizer->email}}@endif" placeholder="Enter Heading text">
                    </div>
                </div>
                <div class="col-md-12 mt-2">
                    <div class="form-group">
                        <label for="text">Organizer Banner </label>
                        <input type="file" class="form-control" id="email" name="image" placeholder="Enter Heading text">
                        <label for="banner" class="text-small">Note: Banner size should be width:1600px x Height: 600px</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="align-items-end">
                        @if(isset($organizer))
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

<style>
@media (min-width: 993px){
    .content {
        padding-top: 0px !important;
    }
}

</style>

@endsection