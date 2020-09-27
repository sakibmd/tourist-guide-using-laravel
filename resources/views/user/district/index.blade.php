@extends('layouts.backend.master')
@section('title')
    Tourist Guide - District
@endsection
@section('content')


<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">

              	@include('partial.successMessage')

                <div class="card mt-5">
                    <div class="card-header  bg-dark">
                      <h3 class="card-title float-left p-0 m-0"><strong>Our All District ({{ $districtcount }})</strong></h3>
                    </div>
                    <!-- card-header -->
                    @if ($districts->count() > 0)
                    <div class="card-body">
                    <div class="table-responsive">
                      <table id="dataTableId" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Name</th>
                          <th>Added</th>
                          <th>Place Count</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($districts as $key=>$district)
                        <tr>
                          <td>{{ $district->name }}</td>
                          <td>{{ $district->created_at->toFormattedDateString() }}</td>
                          <td>{{ $district->places->count() }}</td>
                        </tr>
                        @endforeach    
                        </tbody>
                      </table>
                    </div>

                    </div>
                    @else 
                      <h2 class="text-center text-info font-weight-bold m-3">No District Found</h2>
                    @endif
                    <div class="pagination">
                      {{ $districts->links() }}
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
            </div>
        </div>
    </div><!-- /.container -->
 @endsection
