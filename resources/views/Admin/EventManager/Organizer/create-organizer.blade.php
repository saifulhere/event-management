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

        <form action="{{route('organizer.create')}}" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="row mt-10">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Organizer Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" placeholder="Enter organizer name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="text">Organizer Tagline</label>
                        <input type="text" class="form-control" id="email" name="tagline" value="{{old('tagline')}}" placeholder="Organizer tagline...">
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="text">About Organizer</label>
                    <textarea name="about" class="form-control" placeholder="About organizer">{{old('about')}}</textarea>
                </div>
                <div class="col-md-6 mt-2">
                    <div class="form-group">
                        <label for="text">Organizer Phone</label>
                        <input type="text" class="form-control" id="email" name="phone" value="{{old('phone')}}" placeholder="Enter Heading text">
                    </div>
                </div>
                <div class="col-md-6 mt-2">
                    <div class="form-group">
                        <label for="text">Organizer Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="Enter Heading text">
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
                        <button type="submit" class="btn btn-primary shadow-lg">Save</button>
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