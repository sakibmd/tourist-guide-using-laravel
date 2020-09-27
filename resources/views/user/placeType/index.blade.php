@extends('layouts.backend.master')
@section('title')
    Tourist Guide - Place Type
@endsection
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
             
               @include('partial.successMessage')  

                <div class="card mt-5">
                    <div class="card-header bg-dark">
                      <h3 class="card-title float-left"><strong>Place Types ({{ $typescount }})</strong></h3>
                    </div>
                    <!-- /.card-header -->
                    @if ($types->count() > 0)
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
                        @foreach ($types as $key=>$type)
                        <tr>
                          <td>{{ $type->name }}</td>
                          <td>{{ $type->created_at->toFormattedDateString() }}</td>
                          <td>{{ $type->places->count() }}</td>
                        </tr>
                        @endforeach    
                        </tbody>
                      </table>
                    </div>
                      
                     
            </div> <!-- /.card-body -->
              @else 
                 <h2 class="text-center text-info font-weight-bold m-3">No Place Type Found</h2>
              @endif

               <div class="pagination">
                  {{ $types->links() }}
                </div>
                   
            </div>
                  <!-- /.card -->
            </div>
        </div>
    </div><!-- /.container -->
 @endsection
