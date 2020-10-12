@extends('layouts.backend.master')
@section('title')
    Tourist Guide - Places
@endsection
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

              	@include('partial.successMessage')

                <div class="card my-5 mx-4">
                    <div class="card-header  bg-dark">
                      <h3 class="card-title float-left p-0 m-0"><strong>Places with details ({{ $placeCount }})</strong></h3>
                    </div>
                    <!-- card-header -->
                    @if ($places->count() > 0)
                    <div class="card-body">
                    <div class="table-responsive">
                      <table id="dataTableId" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Name</th>
                          <th>Added By</th>
                           <th>District</th>
                           <th>Type</th>
                           <th>image</th>
                          <th >Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($places as $key=>$place)
                        <tr>
                          <td>{{ $place->name }}</td> 
                          <td>{{ $place->addedBy }}</td> 
                           <td>{{ $place->district->name }}</td>
                           <td>{{ $place->placetype->name }}</td>
                          <td>
                            <img style="height: 60px; width: 100px;" class="img-fluid" src="{{ asset('storage/place/'.$place->image) }}" alt="image">
                          </td>
                          <td> 
                            <a href="{{ route('user.place.show', $place->id) }}" class="btn btn-success">Details</a>

                          </td>
                        </tr>
                        @endforeach    
                        </tbody>
                      </table>
                    </div>

                      
                    </div>
                    @else 
                      <h2 class="text-center text-info font-weight-bold m-3">No Place Found</h2>
                    @endif
                    <div class="pagination ml-3">
                      {{ $places->links() }}
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
            </div>
        </div>
    </div><!-- /.container -->
 @endsection

