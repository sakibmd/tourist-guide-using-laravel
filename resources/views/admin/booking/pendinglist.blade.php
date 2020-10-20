@extends('layouts.backend.master')
@section('title')
    Tourist Guide - Pending Booking
@endsection
@section('content')


<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

              	@include('partial.successMessage')

                <div class="card my-5 mx-4">
                    <div class="card-header  bg-dark">
                      <h3 class="card-title float-left p-0 m-0"><strong>Manage Pending Booking List ({{ $pendinglists->count() }})</strong></h3>
                    </div>
                    <!-- card-header -->
                    @if ($pendinglists->count() > 0)
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
                        @foreach ($pendinglists as $list)
                        <tr>
                          <td>
                            {{ $list->package_name }}
                          </td>
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
                            <button type="submit" onclick="handleApprove( {{ $list->id }}) " class="btn btn-info btn-sm mb-1">Approve</button>

                             <button type="submit" onclick="handleDelete( {{ $list->id }}) " class="btn btn-danger btn-sm">Remove</button>
                          </td>
                        </tr>
                        @endforeach    
                        </tbody>
                      </table>
                    </div>

                <!-- Modal -->
                <div class="modal fade" id="removeRequestModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                      <form action="" id="removeRequestForm" method="POST">
                          @csrf 
                              <div class="modal-content">
                                  <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Remove Request</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                                  </div>
                                  <div class="modal-body">
                                      <div class="text-center">Are you sure to remove this pending request?</div>
                                  </div>
                                  <div class="modal-footer">
                                  <button type="button" class="btn btn-success" data-dismiss="modal">No, Go Back</button>
                                  <button type="submit" class="btn btn-danger">Yes, Remove</button>
                                  </div>
                              </div>
                      </form>
                  </div>
              </div>


                <!-- Modal -->
                <div class="modal fade" id="approveRequestModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="" id="approveRequestForm" method="POST">
                            @csrf 
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Approve Booking Request</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="text-center">Are you sure to approve this booking request?</div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">No, Go Back</button>
                                    <button type="submit" class="btn btn-success">Yes, Approve</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
                      
                    </div>
                    @else 
                      <h2 class="text-center text-info font-weight-bold m-3">No Pending Request Found</h2>
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

        function handleApprove(id){
          var form = document.getElementById('approveRequestForm')
          form.action = 'approve/' + id 
          $('#approveRequestModal').modal('show')
        }

        function handleDelete(id){
          var form = document.getElementById('removeRequestForm')
          form.action = 'remove/' + id 
          $('#removeRequestModal').modal('show')
        }
       

       
   </script>
@endsection