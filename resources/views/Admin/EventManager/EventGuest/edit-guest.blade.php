@extends('layouts.app')
@section('content')

{{-- EVENT TIME, LOCATION AND OTHER NECESSARY INFORMATION START --}}
<div class="card mt-10">
    <div class="card-body">
        <div class="text-center uppercase fw-bolder mb-2"><h1>Add Event Guest</h1></div>
        @if(session('event'))
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

        {{-- @if(count($events)>0) --}}
            <form action="{{route('guest.update')}}" method="POST" enctype="multipart/form-data" >
                @csrf
                <div class="row mt-10">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Select Event</label>
                            <select name="event_id" class="form-control" id="">
                                <option value="">Select Event</option>
                                @foreach($events as $event)
                                <option value="{{$event->id}}">{{$event->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Guest Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name')}}" placeholder="Enter guest name">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Guest Designation</label>
                            <input type="text" class="form-control" id="name" name="designation" value="{{ old('designation')}}" placeholder="Enter guest designation">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Guest About</label>
                            <textarea type="text" class="form-control" id="name" rows="3" name="about" value="{{old('about')}}" placeholder="Enter guest about..."></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Guest Image</label>
                            <input type="file" class="form-control" id="name" name="profile">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="align-items-end">
                            <button type="submit" class="btn btn-primary shadow-lg">Save</button>
                            {{-- @if(isset($event))
                            <button type="submit" class="btn btn-primary shadow-lg">Update</button>
                            @else

                            @endif --}}
                        </div>
                    </div>
                </div>
            </form>
        {{-- @else --}}
            <div class="text-center">
                <h3>You have no events to add guest</h3>
                <p>Please! create an event first to add guest</p>
                <a href="{{route('event.create')}}" class="btn  btn-primary">Create Event Here</a>
            </div>
        {{-- @endif --}}
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