@extends('layouts.app')
@section('content')

{{-- EVENT TIME, LOCATION AND OTHER NECESSARY INFORMATION START --}}
<div class="card mt-10">
    <div class="card-body">
        @if(count($events)>0)
            <div class="text-center text-uppercase fw-bolder mb-2"><h1>Add Event Guest</h1></div>
        @endif
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

        @if(count($events)>0)
            <form action="{{route('guest.create')}}" method="POST" enctype="multipart/form-data" >
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
                    {{-- <div class="col-md-12">
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
                    </div> --}}
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
        @else
            <div class="text-center">
                <h3 class="text-dark">You have no events to add guest</h3>
                <p>Please! create an event first to add guest</p>
                <a href="{{route('event.create')}}" class="btn  btn-primary">Create Event Here</a>
            </div>
        @endif
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