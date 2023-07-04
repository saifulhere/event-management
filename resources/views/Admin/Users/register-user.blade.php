@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="text-center fw-bolder mb-2">
                <h1>Events About</h1>
            </div>

            @if (session('status'))
                <div class="alert alert-success text-center">{{ session('status') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="@if (isset($about)){{ route('about.update') }}@else{{ route('about.store') }}@endif" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="sub_heading">Sub Heading</label>
                    <input type="text" name="sub_heading" value="@if (isset($about)){{ $about->sub_heading }}@endif" class="form-control" placeholder="Enter sub heading...">
                </div>

                <div class="form-group">
                    <label for="heading">Heading</label>
                    <input type="text" name="heading" value="@if (isset($about)){{ $about->heading }}@endif" class="form-control" placeholder="Enter content heading here...">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea placeholder="Enter event description here..." name="description" class="form-control" rows="3">@if (isset($about)){{ $about->description }}@endif</textarea>
                </div>

                <div class="form-group">
                    <label for="btn_url">Button URL</label>
                    <input type="text" name="btn_url" value="@if (isset($about)){{ $about->btn_url }}@endif" class="form-control" placeholder="Enter btn url">
                </div>

                <h2>Features</h2>

                @if (isset($about) && $about->features()->count() > 0)
                    @foreach ($about->features as $feature)
                        <div>
                            <label>Feature:</label>
                            <div class="d-flex justify-content-between align-items-center">
                                <input type="text" class="form-control" name="features[{{ $feature->id }}][feature]" value="{{ $feature->feature }}">
                                <a class="items-center ml-3" href="{{ route('features.destroy', $feature->id)}}"><i class="fa-solid fa-trash-can text-danger"></i></a>
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

                <button type="button" id="add-feature-btn" class="btn btn-success">Add Feature</button>

                @if (isset($about))
                    <button type="submit" class="btn btn-primary">Update About and Features</button>
                @else
                    <button type="submit" class="btn btn-primary">Save About and Features</button>
                @endif
            </form>
        </div>
    </div>

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
