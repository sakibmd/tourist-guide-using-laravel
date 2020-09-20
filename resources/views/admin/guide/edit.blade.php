@extends('layouts.backend.master')
@section('title')
    Tourist Guide - Guide Edit
@endsection
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card mt-5">
                    <div class="card-header bg-dark">
                      <h3 class="card-title float-left"><strong>Update Guide</strong></h3>
                  
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      @include('partial.errors')
                    <form action="{{ route('admin.guide.update',$guide->id) }}" method="POST" enctype="multipart/form-data">
					        @csrf
					        @method('PUT')

					        <div class="form-group">
						          <label for="name"> Name: </label>
						          <input type="text" class="form-control" placeholder="Enter Guide Name" id="name" name="name" 
						          value="{{ old('name',$guide->name) }}">
					        </div>

					   
					          <div class="form-group">
						          <label for="nid"> Nid: </label>
						          <input type="text" class="form-control" placeholder="Enter Guide nid" id="nid" name="nid" 
						          value="{{old('nid',$guide->nid) }}">
					        	</div>

					         <div class="form-group">
						          <label for="email"> Email: </label>
						          <input type="text" class="form-control" placeholder="Enter Email " id="email" name="email" 
						          value="{{old('email',$guide->email)}}">
					        </div>

					          <div class="form-group">
						          <label for="contact"> Contact: </label>
						          <input type="text" class="form-control" placeholder="Enter Contact" id="contact" name="contact"
						           value="{{old('contact',$guide->contact)}}">
					        </div>

					        <div class="form-group">
						          <label for="address"> Address: </label>
						          <input type="text" class="form-control" placeholder="Enter address" id="address" name="address"
						           value="{{old('address',$guide->address)}}">
					        </div>

					         <div class="form-group">
						          <label for="image"> Image: </label>
						          <input type="file" class="form-control" id="image" name="image">
					        </div>

					        <div class="form-group">
					          <label for="image"> Old Image</label>
					          <img src="{{ asset('storage/guide/'.$guide->image) }}" height="80px;" width="60px;">
       						</div>
					      

                 <div class="form-group">
                        <button type="submit" class="btn btn-success">Update</button>
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