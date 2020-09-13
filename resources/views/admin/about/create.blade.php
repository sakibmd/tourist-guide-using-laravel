@extends('layouts.backend.master')
@section('title')
    Tourist Guide - About
@endsection
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card mt-5">
                    <div class="card-header  bg-dark">
                      <h3 class="card-title float-left"><strong>About</strong></h3>
                  
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

						<form action="{{ route('admin.about.store') }}" method="POST" >
					        @csrf
					   			 <div class="form-group">

						                <label for="content">Content</label>
						                <input id="content" type="hidden" name="content" value="{{ old('content')}}">
						                <trix-editor input="content"></trix-editor>
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

@section('scripts')
<script src="{{ asset('js/trix.js') }}"></script>
@endsection

@section('css')
<link href="{{ asset('css/trix.css') }}" rel="stylesheet">
@endsection
      
