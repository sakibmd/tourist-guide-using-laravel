@extends('layouts.backend.master')
@section('title')
    Package Add
@endsection
@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card mt-5">
                    <div class="card-header  bg-dark">
                      <h3 class="card-title float-left"><strong>Add New Package</strong></h3>
                  
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    
                  @include('partial.errors')

                    <form action="{{ route('admin.package.store') }}" method="POST" enctype="multipart/form-data">
					        @csrf
					        <div class="form-group">
					          <label for="name"> Name: </label>
					          <input type="text" class="form-control" value="{{ old('name') }}" placeholder="Enter Name" id="name" name="name">
                            </div>
                            
                            <div class="form-group">
                                <label for="price"> Price: </label>
                                <input type="text" class="form-control" value="{{ old('price') }}" placeholder="Enter Price" id="price" name="price">
                            </div>

                            <div class="form-group">
                                <label for="people"> People: </label>
                                <input type="text" class="form-control" value="{{ old('people') }}" placeholder="Number of People" id="people" name="people">
                            </div>

                            <div class="form-group">
                                <label for="day"> Day: </label>
                                <input type="text" class="form-control" value="{{ old('day') }}" placeholder="Number of days" id="day" name="day">
                            </div>



                            {{-- <div class="form-group">
                                <label>Choose Guide</label>
                                <select class="form-control " name="guide" >
                                    <option value="">selece any guide</option>
                                    @foreach ($guides as $guide)
                                        <option value="{{ $guide->id }}" {{ old('guide') == $guide->id ? 'selected' : '' }}>
                                            {{ $guide->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div> --}}



                            <div class="form-group">
                                <label>Choose Places</label>
                                <select class="form-control select-tags" data-placeholder="Choose places" name="places[]" multiple>
                                    @foreach ($places as $place)
                                        <option value="{{ $place->id }}">
                                            {{ $place->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        

                            <div class="form-group">
                                <label for="description">Description</label>
                                <input id="description" type="hidden" name="description" value="{{ old('description')}}">
                                <trix-editor input="description"></trix-editor>
                            </div>

					        <div class="form-group">
					          <label for="package_image"> Image: </label>
                              <input type="file" id="package_image" class="form-control"name="package_image">
                            </div>
                            
                           

                    <div class="form-group">
                            <button type="submit" class="btn btn-success">Create</button>
                            <a href="{{ route('admin.package.index') }}" class="btn btn-danger wave-effect" >Back</a>
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
 <script src="{{ asset('js/jquery-1.12.4.min.js') }}"></script>
 <script src="{{ asset('js/chosen.jquery.min.js') }}"></script>
 <script>
     $(document).ready(function() {
         $('.select-tags').chosen();
     })
 </script>
 @endsection
 
 @section('css')
 <link href="{{ asset('css/trix.css') }}" rel="stylesheet">
 <link href="{{ asset('css/chosen.min.css') }}" rel="stylesheet">
 @endsection


