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
          <h2 class="fw-bolder text-2xl">Event Guests</h2>
          <a class="btn btn-primary btn-xl text-white shadow-lg" style="height: fit-content" href="{{ route('guest.create')}}">Create New Event</a>
      </div>
        <table class="table my-5">
          <thead class="thead-dark bg-dark text-white">
            <tr>
              <th scope="col">Event Title</th>
              <th scope="col">Guest Name</th>
              <th scope="col">Designation</th>
              <th scope="col">About</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($guests as $guest )
              <tr>
                  <th scope="row">{{ $guest->events->title }}</th>
                  <th scope="row">{{$guest->name}}</th>
                  <td>{{$guest->designation}}</td>
                  <td>{{$guest->about}}</td>
                  <td>{{$guest->phone}}</td>
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
					{{$guests->links()}}
				</div>
			</div>
		</div>
	</div>
	<!-- /.col-->
</div>
@endsection