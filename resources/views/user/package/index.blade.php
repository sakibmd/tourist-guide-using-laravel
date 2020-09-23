@extends('layouts.backend.master')
@section('title')
    All Package 
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
         
           @include('partial.successMessage')  

            <div class="card mt-5">
                <div class="card-header bg-dark">
                  <h2 class="card-title float-left"><strong>Our All Packages</strong></h2>
                </div>
                <!-- /.card-header -->     
            </div>
              <!-- /.card -->
        </div>
    </div>


    <div class="row">  
        @forelse ($packages as $package)
            <div class="col-md-4 my-3">
                <div class="card" style="background-color: rgb(226, 175, 80)">
                    <div class="card-header">
                        <img src="{{ asset('storage/packageImage/'.$package->package_image) }}" alt="" class="img-fluid">
                    </div>
                    <div class="card-body package-details">
                        <p>Package Name: {{ $package->name }}</p>
                        <p>Price: {{ $package->price }}</p>
                        <p>People: {{ $package->people }}</p>
                        <p>
                            <a href="{{ route('user.package.show', $package->id) }}" class="btn btn-info">Details</a>
                        </p>
                    </div>




                </div>
            </div>
        @empty 
            <h2 class="text-info m-auto"><strong>No Package Found</strong></h2>
        @endforelse
    </div>

</div><!-- /.container -->
@endsection

