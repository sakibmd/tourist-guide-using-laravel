@extends('layouts.frontend.master')
@section('title')
    Tourist Guide - Booking Form
@endsection


@section('content')


<div class="container all-places">
    <div class="row justify-content-center py-5">
        <h1><strong>Please Tell Us When will you go</strong></h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mb-5">
                <div class="card-header">
                    <strong>Fill up this form</strong>
                </div>
                <div class="card-body">
                    @include('partial.errors')
                    @include('partial.successMessage')
                    <form action="{{ route('store.package.booking') }}" method="get">
                        @csrf
                        <div class="form-group">
                            <select name="guide" class="form-control">
                                <option value="">select any guide</option>

                                @foreach ($guides as $guide)
                                    <option value="{{ $guide->id }}">{{ $guide->name }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="date">Select a date</label>
                            <input type="text" name="date" id="date" class="form-control"  value="{{ old('date' ) }}">
                        </div>

                        <input type="hidden" name="package_id" value="{{ $package->id }}">
                        <input type="hidden" name="package_name" value="{{ $package->name }}">
                        <input type="hidden" name="package_price" value="{{ $package->price }}">
                        <input type="hidden" name="day" value="{{ $package->day }}">

                        <div class="form-group">
                            <button type="submit" class="btn btn-success ">Submit</button>
                            <a href="{{ route('welcome') }}" class="btn btn-danger">Back</a>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
    
    
    
</div>



@endsection

@section('scripts')
<script src="{{ asset('js/flatpickr.js') }}"></script>
<script>
    flatpickr('#date', {
        minDate: "today",
        dateFormat: "F d, Y",
    })
</script>
@endsection

@section('css')
<link href="{{ asset('css/flatpickr.min.css') }}" rel="stylesheet">
@endsection