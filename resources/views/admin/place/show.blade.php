@extends('layouts.backend.master')
@section('title')
    Tourist Guide - Place Show
@endsection
@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card mt-5 mb-5 pl-5">
				<div class="card-body">
                    <div class="row mb-4">
                        <img  class="img-fluid" src="{{ asset('storage/place/'.$place->image) }}" alt="image">
                    </div>
                    <div class="row">
                        <h4>Place: <strong>{{ $place->name }}</strong></h4>  <span style="color: grey"> - Added By <span style="color: rgb(60, 43, 158); font-weight: bold">{{ $place->addedBy }}</span> on {{ $place->created_at->diffForHumans() }}</span>
                    </div>
                    <div class="row">
                        <p>District: <strong>{{ $place->district->name }}</strong></p>
                    </div>

                    <div class="row">
                        <p>Place Type: <strong>{{ $place->placetype->name }}</strong></p>
                    </div>

                    <div class="row mt-3 mb-5">
                        <p style="text-align: justify">{!! $place->description !!}</p>
                    </div>
				</div>
				<div class="card-footer">
					<a href="{{ route('admin.place.edit', $place->id) }}" class="btn btn-info">Edit</a>
					<a href="{{ route('admin.place.index') }}" class="btn btn-danger">Back</a>
				</div>
			</div>
		</div>	
	</div>
</div>


@endsection