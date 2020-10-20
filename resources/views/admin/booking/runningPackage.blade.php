@extends('layouts.backend.master')
@section('title')
    Tourist Guide - Running Package
@endsection
@section('content')


<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

              	@include('partial.successMessage')

                <div class="card my-5 mx-4">
                    <div class="card-header  bg-dark">
                      <h3 class="card-title float-left p-0 m-0"><strong>Running Package List ({{ $runningLists->count() }})</strong></h3>
                    </div>
                    <!-- card-header -->
                    @if ($runningLists->count() > 0)
                    <div class="card-body">
                    <div class="table-responsive">
                      <table id="dataTableId" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Package</th>
                          <th>Price</th>
                          <th>Tour Date</th>
                          <th>Booking Date</th>
                          <th>Guide</th>
                          <th>Tourist Name</th>
                          <th>Tourist Contact</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($runningLists as $list)
                        <tr>
                          <td>{{ $list->package_name }}</td>
                          <td>{{ $list->price }}</td>
                          <td>{{ $list->date }}</td>
                          <td>{{ $list->created_at->format('F d, Y') }}</td>
                          <td>
                              @isset($list->guide->name)
                                 {{ $list->guide->name }}
                              @else 
                                  His info is deleted by Admin
                              @endisset
                              
                          </td>
                          <td>{{ $list->tourist->name }}</td>
                          <td>{{ $list->tourist->contact }}</td>
                          <td> 
                            
                            <button type="submit" onclick="handleTourComplete( {{ $list->id }}) " class="btn btn-success btn-sm">Complete</button>

                          </td>
                        </tr>
                        @endforeach    
                        </tbody>
                      </table>
                    </div>

                <!-- Modal -->
                <div class="modal fade" id="completeTourModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                      <form action="" id="completeTourForm" method="POST">
                          @csrf 
                              <div class="modal-content">
                                  <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                                  </div>
                                  <div class="modal-body">
                                      <div class="text-center">Are you sure to make this tour complete?</div>
                                  </div>
                                  <div class="modal-footer">
                                  <button type="button" class="btn btn-danger" data-dismiss="modal">No, Go Back</button>
                                  <button type="submit" class="btn btn-success">Yes, Complete</button>
                                  </div>
                              </div>
                      </form>
                  </div>
              </div>


              
                      
                    </div>
                    @else 
                      <h2 class="text-center text-info font-weight-bold m-3">0 Running tour right now</h2>
                    @endif

                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
            </div>
        </div>
    </div><!-- /.container -->
 @endsection

 @section('scripts')
   <script>

        function handleTourComplete(id){
          var form = document.getElementById('completeTourForm')
          form.action = 'package/complete/' + id 
          $('#completeTourModal').modal('show')
        }

       
       

       
   </script>
@endsection