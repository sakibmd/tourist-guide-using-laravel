@extends('layouts.backend.master')
@section('title')
    Tourist Guide - Type
@endsection
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
             
               @include('partial.successMessage')  

                <div class="card mt-5">
                    <div class="card-header bg-dark">
                      <h3 class="card-title float-left"><strong>Manage Place Type ({{ $typescount }})</strong></h3>
                      
                    <a href="{{route('admin.type.create')}}" class="btn btn-success btn-md float-right c-white">Add New <i class="fa fa-plus"></i></a>
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
                          <th width="25%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($types as $key=>$type)
                        <tr>
                          <td>{{ $type->name }}</td>
                          <td>{{ $type->created_at->toFormattedDateString() }}</td>
                          <td>{{ $type->places->count() }}</td>
                          <td>
                          
                              <a href="{{ route('admin.type.edit', $type->id) }}"  class="btn btn-info">Edit</a>
                              <button type="submit" onclick="handleDeleteType({{ $type->id }})" class="btn btn-danger">Delete</button>
                            </form>
                          </td>
                        </tr>
                        @endforeach    
                        </tbody>
                      </table>
                    </div>
                      

                     <!-- Modal -->
                <div class="modal fade" id="deleteTypeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                      <form action="" id="deleteTypeForm" method="POST">
                          @csrf 
                          @method('DELETE')
                              <div class="modal-content">
                                  <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">District Placetype</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                                  </div>
                                  <div class="modal-body">
                                      <div class="text-center">Are you sure to delete this place type?</div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-success" data-dismiss="modal">No, Go Back</button>
                                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                  </div>
                              </div>
                      </form>
                  </div>
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

 @section('scripts')
   <script>
       function handleDeleteType(id){
          var form = document.getElementById('deleteTypeForm')
          form.action = 'type/' + id 
          $('#deleteTypeModal').modal('show')
          //console.log(form)
       }
   </script>
@endsection