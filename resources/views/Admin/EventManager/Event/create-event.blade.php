@extends('layouts.app')
@section('content')

{{-- EVENT TIME, LOCATION AND OTHER NECESSARY INFORMATION START --}}
<div class="card mt-10">
    <div class="card-body">
        <div class="text-center fw-bolder mb-2">
            <h1>Set Your Event</h1>
        </div>
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
        <form action="{{route('event.create')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mt-10">
                <div class="col-md-12">
                    <div class="form-group">
                        <select name="organizer_id" class="form-control" id="">
                            <option value="">Select Organizer</option>
                            @foreach ($organizers as $organizer)
                            <option value="{{$organizer->id}}">{{$organizer->name}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Event Title</label>
                        <input type="text" class="form-control" id="title" oninput="generateSlug()" name="title" value="{{ old('title')}}" placeholder="Enter event title">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Event Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug')}}" placeholder="">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Event Tagline</label>
                        <input type="text" class="form-control" id="name" name="tagline" value="{{ old('tagline')}}" placeholder="Enter event tagline">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Event Short Description</label>
                        <textarea type="text" class="form-control" id="editor" rows="3" name="description" value="{{old('description')}}" placeholder="Enter event description..."></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="text">Event Location</label>
                        <input type="text" class="form-control" id="email" name="location" value="{{ old('location')}}" placeholder="Event location...">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Event Start Date & Time</label>
                        <input type="datetime-local" class="form-control" id="name" name="start_date" value="{{ old('start_date')}}" placeholder="Event start date">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="text">Event End Date & Time</label>
                        <input type="datetime-local" class="form-control" id="email" name="end_date" value="{{old('end_date')}}" placeholder="Event end date">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Booking Start Date & Time</label>
                        <input type="datetime-local" class="form-control" id="name" name="booking_start" value="{{old('booking_start')}}" placeholder="Event booking start date">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="text">Booking End Date & Time</label>
                        <input type="datetime-local" class="form-control" id="email" name="booking_end" value="{{old('booking_end')}}" placeholder="Event booking end date">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="text">Event Banner</label>
                        <input type="file" class="form-control" id="email" name="thumbnail">
                        <label for="text">Note: Banner size should be width:1600px x Height: 600px</label>
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
                <div class="col-md-12 mt-10" id="">
                    <h2>Event Guests</h2>

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

                    <div id="guests-container" class="bg-dark text-light p-10 mb-3">
                        <!-- Default guest input fields -->
                        <div class="row text-white mt-5">
                            <div class="form-group col-md-6">
                                <label for="guest_name">Guest Name</label>
                                <input type="text" name="guest_name[]" class="form-control" placeholder="Enter guest name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="guest_designation">Guest Designation</label>
                                <input type="text" name="guest_designation[]" class="form-control" placeholder="Enter guest designation">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="guest_about">About Guest</label>
                            <textarea name="guest_about[]" class="form-control" placeholder="Enter about guest"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="guest_image">Guest Image</label>
                            <input type="file" name="guest_image[]" class="form-control-file">
                        </div>
                    </div>

                    <button type="button" id="add-guest" class="btn btn-success" style="height: fit-content">Add Guest</button>

                </div>
                <div class="col-md-12 mt-5">
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
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    CKEDITOR.replace('editor');

</script>
<script>
    $(document).ready(function() {
        $('#add-guest').click(function() {
            var guestHtml = `
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="guest_name">Guest Name</label>
                        <input type="text" name="guest_name[]" class="form-control" placeholder="Enter guest name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="guest_designation">Guest Designation</label>
                        <input type="text" name="guest_designation[]" class="form-control" placeholder="Enter guest designation">
                    </div>
                </div>
                <div class="form-group">
                    <label for="guest_about">About Guest</label>
                    <textarea name="guest_about[]" class="form-control" placeholder="Enter about guest"></textarea>
                </div>
                <div class="form-group">
                    <label for="guest_image">Guest Image</label>
                    <input type="file" name="guest_image[]" class="form-control-file">
                </div>
            `;

            $('#guests-container').append(guestHtml);
        });
    });

</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addFeatureBtn = document.getElementById('add-feature-btn');
        const featuresContainer = document.getElementById('features-container');

        addFeatureBtn.addEventListener('click', function() {
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

<script>
    function generateSlug() {
        const title = document.getElementById('title').value;
        const slugField = document.getElementById('slug');

        const slug = title.toLowerCase().trim().replace(/[^a-zA-Z0-9-]+/g, '-');
        slugField.value = slug;
    }

</script>
@endsection
