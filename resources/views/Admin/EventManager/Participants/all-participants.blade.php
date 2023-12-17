@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="card mb-4 border-0">
			<div class="card-body mb-5">
				@if(session('status'))
					<div class="alert alert-success text-center">
						{{session('status')}}
					</div>
				@endif
        @if(session('error'))
          <div class="alert alert-warning">
              {{session('error')}}
          </div>  
          @endif
          @if(session('success'))
          <div class="alert alert-success">
              {{session('success')}}
          </div>  
        @endif
        <div class="container d-flex justify-content-between">
          <h2 class="fw-bolder text-2xl">Event Participants List</h2>
          {{-- <a class="btn btn-primary btn-xl text-white shadow-lg" style="height: fit-content" href="{{ route('event.create')}}">Create New Event</a> --}}
      </div>
        <table class="table my-5">
          <thead class="thead-dark bg-dark text-white">
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Guest ID</th>
              <th scope="col">Event Title</th>
              <th scope="col">Phone</th>
              <th scope="col">N.O.People</th>
              <th scope="col">Paid Amount</th>
              <th scope="col">Trxn ID</th>
              <th scope="col">Payment Status</th>
              <th scope="col">Payment Method</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($participants as $participant )
              <tr>
                  <th scope="row">{{$participant->name}}</th>
                  <th scope="row">{{$participant->guest_id}}</th>
                  <td>{{$participant->event->title}}</td>
                  <td>{{$participant->phone}}</td>
                  <td>{{$participant->number_of_people}}</td>
                  <td>{{$participant->amount}}</td>
                  <td>{{$participant->trxn_id}}</td>
                  @if($participant->payment_status === 'Cancel!')
                  <td class="bg-danger text-white">{{$participant->payment_status}}</td>
                  @else
                    <td class="bg-success">{{$participant->payment_status}}</td>
                  @endif
                  <td>{{$participant->payment_method}}</td>
                  {{-- <td>
                    <a class="btn btn-primary btn-sm" href="{{route('event.edit', $event->id)}}">Edit</a>
                  </td> --}}
                  {{-- <td>
                      <a href="#" class="btn btn-success text-white btn-sm">Edit</a>
                  </td>
                  <td>
                      <a href="#" class="btn btn-primary text-white btn-sm">view</a>
                  </td>
                  <td>
                    <form action="#" method="POST">
                      @csrf
                      <button type="submit" class="btn btn-danger text-white btn-sm">Delete</button>
                    </form>
  
                  </td> --}}
                </tr>
              @endforeach
          </tbody>
        </table>
				<div>
					{{$participants->links()}}
				</div>
			</div>
		</div>
	</div>
	<!-- /.col-->
</div>
@endsection