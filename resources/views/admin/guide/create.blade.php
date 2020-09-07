@extends('layouts.backend.master')
@section('title')
    Tourist Guide - Guide Add
@endsection
@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card mt-5">
                    <div class="card-header  bg-dark">
                      <h3 class="card-title float-left"><strong>Create Guide</strong></h3>
                  
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    


                  @include('partial.errors')

                    <form action="{{ route('admin.guide.store') }}" method="POST" enctype="multipart/form-data">
					        @csrf
					        <div class="form-group">
					          <label for="name"> Name: </label>
					          <input type="text" class="form-control" placeholder="Enter Name" id="name" name="name">
					        </div>
					          <div class="form-group">
					          <label for="nid"> Nid: </label>
					          <input type="text" class="form-control" placeholder="Enter Nid" id="nid" name="nid">
					        </div>
					          <div class="form-group">
					          <label for="email"> Email: </label>
					          <input type="text" class="form-control" placeholder="Enter Email " id="email" name="email">
					        </div>
					          <div class="form-group">
					          <label for="contact"> Contact: </label>
					          <input type="text" class="form-control" placeholder="Enter Contact" id="contact" name="contact">
					        </div>
					        <div class="form-group">
					          <label for="address"> Address: </label>
					          <input type="text" class="form-control" placeholder="Enter Address" id="address" name="address">
					        </div>
					         <div class="form-group">
					          <label for="image"> Image: </label>
					          <input type="file" class="form-control" id="image" name="image">
					        </div>

                  <div class="form-group">
                        <button type="submit" class="btn btn-success">Create</button>
                        <a href="{{ URL::previous() }}" class="btn btn-danger wave-effect" >Back</a>
                  </div>
					      

      				</form>
                     
                      
                    </div>
                   
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
            </div>
        </div>
    </div><!-- /.container -->





 @endsection