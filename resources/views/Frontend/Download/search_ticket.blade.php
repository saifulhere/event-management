@extends('layouts.theme')
@section('frontend')
<div class="container mt-5 mb-5">
    <div class="w-50 mx-auto">
        <div class="text-center">
            <h2>
                Download Ticket
            </h2>
        </div>
        <div class="d-flex justify-content-center mt-3">
            <form action="{{route('pdf.view')}}" method="POST">
                @csrf
                <div class="row mt-10 w-75 mx-auto" id="form1">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Payment Number</label>
                            <input type="text" class="form-control" value="{{old('payment_number')}}" id="payment_number" name="payment_number">
                            @error('guest_id')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <div class="d-flex justify-content-end">
                            <button type="submit" style="border: none; border-radius:.25rem; height:fit-content;" class="primary-btn form-control">Search Ticket</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="d-flex justify-content-center mt-3">
        @if(session('ticket'))
        @php
        $ticket = session('ticket');
        @endphp
        <div>
            <div class="name">
                <h2>{{$ticket->event->title}}</h2>
            </div>
            <div>
                <h5>
                    {{$ticket->name}}
                </h5>
                <p>{{$ticket->phone}}</p>
            </div>
            <div>
                <a href="{{route('pdf.convert', $ticket->id)}}" type="submit" style="border: none; border-radius:.25rem; height:fit-content;" class="primary-btn form-control">Download</a>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
