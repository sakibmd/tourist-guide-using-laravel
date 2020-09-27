@extends('layouts.frontend.master')
@section('title')
    Tourist Guide - {{ $placetype->name }}
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


<div class="container all-places">
    <div class="row justify-content-center py-5">
        <h1><strong>Amazing Places in "{{ $placetype->name }} Category"</strong></h1>
    </div>
    <div class="row">
        @forelse ($places as $place)
            <div class="col-md-4 my-3">
                <div class="card">
                    <div class="card-header">
                        <img  src="{{ asset('storage/place/'. $place->image) }}" alt="" srcset="" class="img-fluid" style="height: 190px; border-radius: 5%">
                    </div>
                    <div class="card-body">
                        <h2><strong>{{ $place->name }}</strong></h2>
                        <p>District: <strong>{{ $place->district->name }}</strong></p>
                        <p>Place Type: <strong>{{ $place->placetype->name }}</strong></p>
                        <a href="{{ route('place.details', $place->id) }}" class="btn btn-success">Details</a>
                    </div>
                </div>
            </div> 
        @empty
            <h2 class="my-5 bg-info text-white text-center p-3">No Place Found In This Type Right Now.</h2>
        @endforelse
    </div>
    <div class="row">
        <a href="{{ route('welcome') }}" class="btn btn-danger my-5">Back to home</a>
    </div>
</div>



@endsection

@section('scripts')
   
@endsection

@section('css')

@endsection
      
