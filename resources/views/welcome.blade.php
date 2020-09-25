@extends('layouts.frontend.master')
@section('title')
    Tourist Guide - Home
@endsection

@section('css')
<style>
    .places{
        margin-top: 60px;
        margin-bottom: 60px;
    }
</style>
@endsection



@section('content')
{{-- start banner --}}
<section id="banner">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<p class="promo-title">User Interface</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco. </p>
				<a href="" class="btn btn-details">Details</a>
			</div>
			<div class="col-md-6 text-center">
				<img src="{{ asset('frontend/img/13.png') }}" class="img-fluid" width="450px" style="margin-top:85px;margin-bottom: 20px; border-radius: 13px; height: 250px;">
			</div>
		</div>
	</div>
</section>
{{-- end banner --}}

{{-- start place --}}
<div class="container places">
    <div class="row justify-content-center">
        <h1><strong>Amazing Places</strong></h1>
    </div>
    @forelse ($places as $place)
        <div class="row my-5">
                    <div class="col-md-3">
                        <img  src="{{ asset('storage/place/'. $place->image) }}" alt="" srcset="" class="img-fluid" style="height: 190px; border-radius: 5%">
                    </div>
                    <div class="col-md-9">
                        <h2><strong>{{ $place->name }}</strong></h2>
                        <p>District: <strong>{{ $place->district->name }}</strong></p>
                        <p>Place Type: <strong>{{ $place->placetype->name }}</strong></p>
                        <a href="{{ route('place.details', $place->id) }}" class="btn btn-success">Details</a>
                        <hr>
                    </div>
                </div>
        @empty
            <h2 class="my-5 bg-info text-white text-center p-3">No Place Found. Please add some place.</h2>
        @endforelse
</div>
{{-- end place --}}


@endsection

@section('scripts')
   
@endsection

@section('css')

@endsection
      
