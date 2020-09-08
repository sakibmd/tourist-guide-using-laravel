@extends('layouts.backend.master')
@section('title')
    Tourist Guide - show
@endsection
@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6 m-5">
			<div class="card">
				<div class="card-header"><strong>Details</strong></div>
				<div class="card-body">
					<table class="table">
						<tr >
							<td><img style="" class="img-fluid" src="{{ asset('storage/guide/'.$guide->image) }}" alt="image"></td>
						</tr>
						<tr>
							<th>Name</th>
							<td>{{ $guide->name }}</td>
						</tr>
						<tr>
							<th>Email</th>
							<td>{{ $guide->email }}</td>
						</tr>
						<tr>
							<th>Contact</th>
							<td>{{ $guide->contact }}</td>
						</tr>
						<tr>
							<th>Nid</th>
							<td>{{ $guide->nid }}</td>
						</tr>
						<tr>
							<th>Address</th>
							<td>{{ $guide->address }}</td>
						</tr>
					</table>
				</div>
				<div class="card-footer">
					<a href="{{ route('admin.guide.edit', $guide->id) }}" class="btn btn-info">Edit</a>
					<a href="{{ URL::previous() }}" class="btn btn-danger">Back</a>
				</div>
			</div>
		</div>	
	</div>
</div>


@endsection