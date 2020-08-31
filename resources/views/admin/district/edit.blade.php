@extends('layouts.backend.master')
@section('title')
    Tourist Guide - Edit District
@endsection
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card mt-5">
                    <div class="card-header  bg-secondary">
                      <h3 class="card-title float-left"><strong>Update District</strong></h3>
                  
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      @include('partial.errors')
                    <form action="{{ route('admin.district.update',$district->id) }}" method="POST" >
					        @csrf
					        @method('PUT')

					        <div class="form-group">
					          <label for="name"> Name: </label>
					          <input type="text" class="form-control" placeholder="Enter District Name" id="name" name="name" value="{{ old('name',$district->name) }}">
					        </div>
					      

					        <button type="submit" class="btn btn-success">Submit</button>
      				</form>
                     
                      
                    </div>
                   
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
            </div>
        </div>
    </div><!-- /.container -->
 @endsection