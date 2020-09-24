@extends('layouts.backend.master')
@section('title')
    Tourist Guide - Profile
@endsection
@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6 m-5">
			<div class="card">
				<div class="card-header bg-info"><strong>Your Profile</strong></div>
				<div class="card-body">
					<table class="table">
						<tr>
							<th></th>
							<td><img class="img-fluid" height="260px" width="180px"  style="border-radius: 10%;border:2px solid rgb(110, 110, 110);" src="{{  Auth::user()->image != 'default.png' ?  asset('storage/profile_photo/' . Auth::user()->image ) :  asset('assets/admin/img/user2-160x160.jpg')  }}" alt="image"></td>
						</tr>
						<tr>
							<th>Name</th>
							<td>{{ $user->name }}</td>
						</tr>
						<tr>
							<th>Email</th>
							<td>{{ $user->email }}</td>
						</tr>
						<tr>
							<th>Contact</th>
							<td>{{ $user->contact }}</td>
						</tr>
					</table>
				</div>
				<div class="card-footer">
					<a href="{{ route('user.profile.edit', $user->id) }}" class="btn btn-info">Edit</a>
				</div>
			</div>
		</div>	
	</div>
</div>


@endsection