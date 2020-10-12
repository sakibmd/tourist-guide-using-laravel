@extends('layouts.backend.master')
@section('title')
    Tourist Guide - Guide
@endsection
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

              	@include('partial.successMessage')

                <div class="card my-5 mx-4">
                    <div class="card-header  bg-dark">
                      <h3 class="card-title float-left p-0 m-0"><strong>All Guides Information ({{ $guideCount }})</strong></h3>
                    </div>
                    <!-- card-header -->
                    @if ($guides->count() > 0)
                    <div class="card-body">
                    <div class="table-responsive">
                      <table id="dataTableId" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Name</th>
                          <th>Email</th>
                           <th>Contact</th>
                           <th>image</th>
                          <th >Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($guides as $key=>$guide)
                        <tr>
                          <td>{{ $guide->name }}</td> 
                          <td>{{ $guide->email }}</td> 
                           <td>{{ $guide->contact }}</td>
                          <td>
                            <img style="height: 70px; width: 60px;" class="img-fluid" src="{{ asset('storage/guide/'.$guide->image) }}" alt="image">
                          </td>
                          <td> 
                            <a href="{{ route('user.guide.show', $guide->id) }}" class="btn btn-success">Details</a>
                          </td>
                        </tr>
                        @endforeach    
                        </tbody>
                      </table>
                    </div>

                    
                      
                    </div>
                    @else 
                      <h2 class="text-center text-info font-weight-bold m-3">No Guide Found</h2>
                    @endif
                    <div class="pagination">
                      {{ $guides->links() }}
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
            </div>
        </div>
    </div><!-- /.container -->
 @endsection
