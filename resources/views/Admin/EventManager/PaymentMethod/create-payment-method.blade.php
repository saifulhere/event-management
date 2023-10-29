@extends('layouts.app')
@section('content')
{{-- EVENT ORGANIZER INFORMATION SETTING START --}}
<div class="card mt-10">
    <div class="card-body">
        <div class="text-center fw-bolder mb-2"><h1>Add New Payment Method</h1></div>
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

        <form action="{{route('payment.create')}}" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="row mt-10">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Organizer Name</label>
                        <input type="text" class="form-control" id="payment_method" name="payment_method" value="{{old('payment_method')}}" placeholder="Enter payment method name">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="align-items-end">
                        <button type="submit" class="btn btn-primary shadow-lg">Add Payment Method</button>
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