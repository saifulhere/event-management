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

{{-- EVENT ORGANIZER INFORMATION SETTING START --}}
<div class="card mt-10">
    <div class="card-body">
        <div class="text-center fw-bolder mb-2"><h1>Organizer Information</h1></div>
        @if(session('success'))
           <div class="alert alert-success text-center"> {{session('success')}} </div>
        @endif
        @if(session('fail'))
        <div class="alert alert-danger text-center"> {{session('fail')}} </div>
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
        <form action="@if(isset($organizer)){{route('update.organizer')}} @else {{route('organizer')}} @endif" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="row mt-10">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Organizer Name</label>
                        <input type="text" class="form-control" id="name" name="organizer_name" value="@if(isset($organizer)) {{ $organizer->organizer_name }} @endif" placeholder="Enter organizer name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="text">Organizer Tagline</label>
                        <input type="text" class="form-control" id="email" name="organizer_tagline" value="@if(isset($organizer)){{$organizer->tag_line}}@endif" placeholder="Organizer tagline...">
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="text">About Organizer</label>
                    <textarea name="about_organizer" class="form-control" placeholder="About organizer">@if (isset($organizer)) {{ $organizer->about_organizer}} @endif</textarea>
                </div>
                <div class="col-md-6 mt-2">
                    <div class="form-group">
                        <label for="text">Organizer Phone</label>
                        <input type="text" class="form-control" id="email" name="organizer_phone" value="@if(isset($organizer)){{$organizer->phone}}@endif" placeholder="Enter Heading text">
                    </div>
                </div>
                <div class="col-md-6 mt-2">
                    <div class="form-group">
                        <label for="text">Organizer Email</label>
                        <input type="email" class="form-control" id="email" name="organizer_email" value="@if(isset($organizer)){{$organizer->email}}@endif" placeholder="Enter Heading text">
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


{{-- EVENT TIME, LOCATION AND OTHER NECESSARY INFORMATION START --}}
<div class="card mt-10">
    <div class="card-body">
        <div class="text-center fw-bolder mb-2"><h1>Event Time, Location & Others Info.</h1></div>
        @if(session('event'))
           <div class="alert alert-success text-center"> {{session('event')}} </div>
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
        <form action="@if(isset($event)){{route('update.event')}} @else {{route('event')}} @endif" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="row mt-10">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Event Title</label>
                        <input type="text" class="form-control" id="name" name="title" value="@if(isset($event)) {{ $event->title }} @endif" placeholder="Enter organizer name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="text">Event Location</label>
                        <input type="text" class="form-control" id="email" name="location" value="@if(isset($event)){{$event->location}}@endif" placeholder="Organizer tagline...">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Event Start Date & Time</label>
                        <input type="datetime-local" class="form-control" id="name" name="start_date" value="@if(isset($event)){{$event->start_date}}@endif" placeholder="Enter organizer name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="text">Event End Date & Time</label>
                        <input type="datetime-local" class="form-control" id="email" name="end_date" value="@if(isset($event)){{$event->end_date}}@endif" placeholder="Organizer tagline...">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Booking Start Date & Time</label>
                        <input type="datetime-local" class="form-control" id="name" name="booking_start" value="@if(isset($event)){{$event->booking_start}}@endif" placeholder="Enter organizer name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="text">Booking End Date & Time</label>
                        <input type="datetime-local" class="form-control" id="email" name="booking_end" value="@if(isset($event)){{$event->booking_end}}@endif" placeholder="Organizer tagline...">
                    </div>
                </div>
                <div class="col-md-12">
                    <h2>Event Features</h2>

                    @if (isset($event) && $event->features()->count() > 0)
                        @foreach ($event->features as $feature)
                            <div>
                                <label>Feature:</label>
                                <div class="d-flex justify-content-between align-items-center">
                                    <input type="text" class="form-control" name="features[{{ $feature->id }}][feature]" value="{{ $feature->feature }}">
                                    <a class="items-center ml-3" href="{{ route('event.features.destroy', $feature->id)}}"><i class="fa-solid fa-trash-can text-danger"></i></a>
                                </div>
                            </div>
                        @endforeach
                    @endif
    
                    <div id="features-container">
                        <div class="form-group">
                            <label for="features">Feature</label>
                            <input type="text" name="new_features[]" class="form-control" placeholder="Add more feature">
                        </div>
                    </div> 
                    <button type="button" id="add-feature-btn" class="btn btn-success" style="height: fit-content">Add Feature</button>       
                </div>
                <div class="col-md-12">
                    <div class="align-items-end">
                        @if(isset($event))
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
{{-- EVENT TIME, LOCATION AND OTHER NECESSARY INFORMATION END --}}

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const addFeatureBtn = document.getElementById('add-feature-btn');
        const featuresContainer = document.getElementById('features-container');

        addFeatureBtn.addEventListener('click', function () {
            const featureInput = document.createElement('input');
            featureInput.setAttribute('type', 'text');
            featureInput.setAttribute('name', 'new_features[]');
            featureInput.setAttribute('class', 'form-control');
            featureInput.setAttribute('placeholder', 'Add new feature');

            const featureFormGroup = document.createElement('div');
            featureFormGroup.setAttribute('class', 'form-group');
            featureFormGroup.appendChild(featureInput);

            featuresContainer.appendChild(featureFormGroup);
        });
    });
</script>

@endsection