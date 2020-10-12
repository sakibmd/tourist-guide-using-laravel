@extends('layouts.backend.master')
@section('title')
    Package Details - {{ $package->name }}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                            <h2><strong>Package Details: </strong></h2>
                            <a href="{{ route('user.package') }}" class="btn btn-danger">Back</a> 
                            @auth
                                @if (Auth::user()->role_id == 2)
                                    <a href="{{ route('package.booking', $package->id) }}" class="btn btn-success">Book Now</a>
                                @endif
                            @endauth 
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            
            <table class="table">
                <tr>
                    <th>Package Name</th>
                    <td>{{ $package->name }}</td>
                </tr>
                <tr>
                    <th>Package Added By</th>
                    <td>{{ $package->added_by }}</td>
                </tr>
                <tr>
                    <th>Places</th>
                    <td>
                        @foreach ($package->places as $place)
                            <span style="background: orange; color:black" class="px-3 py-2">
                                <strong>{{ $place->name }}</strong>
                            </span>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <th>Package Price</th>
                    <td>{{ $package->price }}</td>
                </tr>
                <tr>
                    <th>People</th>
                    <td>{{ $package->people }}</td>
                </tr>
                <tr>
                    <th>Day</th>
                    <td>{{ $package->day }}</td>
                </tr>
            </table>
            <br>
            <h3 class="my-5 mx-3" style="color: whitesmoke; background-color: black; padding:12px;">Description & rules: </h3>
           <div style="text-align: justify">  {!! $package->description !!}</div>
        </div>
    </div>
@endsection