@extends('layouts.backend.master')
@section('title')
    Tourist Guide - District
@endsection
@section('content')


<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
              	 @if(session('successMsg'))
    							  <div class="alert alert-success m-3" roles="alert">
    							   {{ session('successMsg') }} 
    					      </div> 
    					  @endif  

                <div class="card mt-5">
                    <div class="card-header">
                      <h3 class="card-title float-left"><strong>Manage District</strong></h3>
                      
                    <a href="{{route('admin.district.create')}}" class="btn-primary btn-sm float-right c-white">Add New <i class="fa fa-plus"></i></a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <div class="table-responsive">

                      <table id="dataTableId" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th width="10%">#</th>
                          <th>Name</th>
                          <th>Created at</th>
                          <th width="25%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($districts as $key=>$district)
                        <tr>
                          <td>{{ $key +1 }}</td>
                          <td>{{ $district->name }}</td>
                          <td>{{ $district->created_at->format('Y-m-d') }}</td>
                          <td>
                            <form action="{{route('admin.district.destroy',$district->id)}}" method="post">
                                @method('DELETE')
                               
                                @csrf
                              
                             
                              <a href="{{ route('admin.district.edit', $district->id) }}" 
                                class="btn btn-info">Edit</a>
                              <button type="submit" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger">Delete</button>
                            </form>
                          </td>
                        </tr>
                        @endforeach    
                        </tbody>
                      </table>
                    </div>
                      
                    </div>
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