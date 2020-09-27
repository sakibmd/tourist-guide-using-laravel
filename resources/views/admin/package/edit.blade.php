@extends('layouts.backend.master')
@section('title')
    Package Edit - {{ $package->name }}
@endsection
@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card mt-5">
                    <div class="card-header  bg-dark">
                      <h3 class="card-title float-left"><strong>Update Package</strong></h3>
                  
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    
                  @include('partial.errors')

                    <form action="{{ route('admin.package.update', $package->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
					        <div class="form-group">
					          <label for="name"> Name: </label>
					          <input type="text" class="form-control" value="{{ old('name', $package->name) }}" placeholder="Enter Name" id="name" name="name">
                            </div>
                            
                            <div class="form-group">
                                <label for="price"> Price: </label>
                                <input type="text" class="form-control" value="{{ old('price', $package->price) }}" placeholder="Enter Price" id="price" name="price">
                            </div>

                            <div class="form-group">
                                <label for="people"> People: </label>
                                <input type="text" class="form-control" value="{{ old('people', $package->people) }}" placeholder="Number of People" id="people" name="people">
                            </div>

                            <div class="form-group">
                                <label for="day"> Day: </label>
                                <input type="text" class="form-control" value="{{ old('day', $package->day) }}" placeholder="Number of days" id="day" name="day">
                            </div>



                            <div class="form-group">
                                <label>Choose Places</label>
                                <select class="form-control select-tags" name="places[]" multiple>
                                    @foreach ($places as $place)

                                        <option value="{{ $place->id }}"  
                                            @foreach($package->places as $selectedPlaces) 
                                                {{ $selectedPlaces->id == $place->id ? 'selected' : '' }}
                                            @endforeach
                                        >
                                            {{ $place->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        

                            <div class="form-group">
                                <label for="description">Description</label>
                                <input id="description" type="hidden" name="description" value="{{ old('description', $package->description)}}">
                                <trix-editor input="description"></trix-editor>
                            </div>

					        <div class="form-group">
					          <label for="package_image"> Image: </label>
                              <input type="file" id="package_image" class="form-control"name="package_image">
                            </div>
                            
                           

                        <div class="form-group">
                                <button type="submit" class="btn btn-success">Update</button>
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


