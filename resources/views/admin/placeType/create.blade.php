@extends('layouts.backend.master')
@section('title')
    Tourist Guide - Place Type Create
@endsection
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card mt-5">
                    <div class="card-header  bg-secondary">
                      <h3 class="card-title float-left"><strong>Create Place Type</strong></h3>
                  
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    


                  @include('partial.errors')

                    <form action="{{ route('admin.type.store') }}" method="POST" >
					        @csrf
					        <div class="form-group">
					          <label for="name"> Name: </label>
					          <input type="text" class="form-control" placeholder="Enter PlaceType Name" id="name" name="name">
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