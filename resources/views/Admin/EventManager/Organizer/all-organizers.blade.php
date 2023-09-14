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
          <h2 class="fw-bolder text-2xl">Event Organizers</h2>
          <a class="btn btn-primary btn-xl text-white shadow-lg" style="height: fit-content" href="{{ route('organizer.create')}}">Create New Event</a>
      </div>
        <table class="table my-5">
          <thead class="thead-dark bg-dark text-white">
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Tagline</th>
              <th scope="col">Phone</th>
              <th scope="col">Email</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($organizers as $organizer )
              <tr>
                  <th scope="row">{{$organizer->name}}</th>
                  <th >{{$organizer->tagline}}</th>
                  <td scope="row">{{$organizer->phone}}</td>
                  <td scope="row">{{$organizer->email}}</td>
                  <td>
                    <a class="btn btn-primary btn-sm" href="{{route('organizer.edit', $organizer->id)}}">Edit</a>
                  </td>
                </tr>
              @endforeach
          </tbody>
        </table>
				<div>
					{{$organizers->links()}}
				</div>
			</div>
		</div>
	</div>
	<!-- /.col-->
</div>
@endsection