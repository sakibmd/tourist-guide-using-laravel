@extends('layouts.backend.master')
@section('title')
    Tourist Guide - All Users
@endsection
@section('content')


<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

              	@include('partial.successMessage')

                <div class="card my-5 mx-4">
                    <div class="card-header  bg-dark">
                      <h3 class="card-title float-left p-0 m-0"><strong>Manage Users ({{ $users->count() }})</strong></h3>
                    </div>
                    <!-- card-header -->
                    @if ($users->count() > 0)
                    <div class="card-body">
                    <div class="table-responsive">
                      <table id="dataTableId" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Contact</th>
                          <th>Photo</th>
                          <th>Member Since</th>
                          <th width="25%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $key=>$user)
                        <tr>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          <td>{{ $user->contact }}</td>
                          <td><img height="70" width="70" src="{{  $user->image != 'default.png' ?  asset('storage/profile_photo/' . $user->image ) :  asset('assets/admin/img/user2-160x160.jpg')  }}" alt="photo"></td>
                          <td>{{ $user->created_at->diffForHumans() }}</td>
                          <td> 
                              @if ($user->role_id == 2)
                              <button type="submit" class="btn btn-success" onclick="changeRole({{ $user->id }})">Make as Admin</button>
                              @endif
                          </td>
                        </tr>
                        @endforeach    
                        </tbody>
                      </table>
                    </div>

                     <!-- Modal -->
                <div class="modal fade" id="changeRoleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                      <form action="" id="changeRoleForm" method="POST">
                          @csrf 
                          @method('PUT')
                              <div class="modal-content">
                                  <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Manage Users</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                                  </div>
                                  <div class="modal-body">
                                      <div class="text-center">Are you sure to make him/her as Admin?</div>
                                  </div>
                                  <div class="modal-footer">
                                  <button type="button" class="btn btn-danger" data-dismiss="modal">No, Go Back</button>
                                  <button type="submit" class="btn btn-success">Yes, Change It</button>
                                  </div>
                              </div>
                      </form>
                  </div>
              </div>
                      
                    </div>
                    @else 
                      <h2 class="text-center text-info font-weight-bold m-3">No Users Found</h2>
                    @endif
                    <div class="pagination">
                      {{ $users->links() }}
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
       function changeRole(id){

          var form = document.getElementById('changeRoleForm')
          form.action = 'users/' + id 
          $('#changeRoleModal').modal('show')
          //console.log(form)
       }
   </script>
@endsection