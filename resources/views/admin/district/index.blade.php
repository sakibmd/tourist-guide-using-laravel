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
                      <h3 class="card-title float-left p-0 m-0"><strong>Manage District ({{ $districtcount }})</strong></h3>
                    <a href="{{route('admin.district.create')}}" class="btn btn-success btn-md float-right c-white">Add New <i class="fa fa-plus"></i></a>
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
                          <th width="25%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($districts as $key=>$district)
                        <tr>
                          <td>{{ $district->name }}</td>
                          <td>{{ $district->created_at->toFormattedDateString() }}</td>
                          <td>{{ $district->places->count() }}</td>
                          <td> 
                            <a href="{{ route('admin.district.edit', $district->id) }}" class="btn btn-info">Edit</a>
                             <button type="submit" onclick="handleDeleteDistrict( {{ $district->id }}) " class="btn btn-danger">Delete</button>
                          </td>
                        </tr>
                        @endforeach    
                        </tbody>
                      </table>
                    </div>

                     <!-- Modal -->
                <div class="modal fade" id="deleteDistrictModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                      <form action="" id="deleteDistrictForm" method="POST">
                          @csrf 
                          @method('DELETE')
                              <div class="modal-content">
                                  <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">District Delete</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                                  </div>
                                  <div class="modal-body">
                                      <div class="text-center">Are you sure to delete this district?</div>
                                  </div>
                                  <div class="modal-footer">
                                  <button type="button" class="btn btn-success" data-dismiss="modal">No, Go Back</button>
                                  <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                  </div>
                              </div>
                      </form>
                  </div>
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

 @section('scripts')
   <script>
       function handleDeleteDistrict(id){

          var form = document.getElementById('deleteDistrictForm')
          form.action = 'district/' + id 
          $('#deleteDistrictModal').modal('show')
          //console.log(form)
       }
   </script>
@endsection