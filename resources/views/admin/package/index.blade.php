@extends('layouts.backend.master')
@section('title')
    Package Add
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
         
           @include('partial.successMessage')  

            <div class="card my-5 mx-4">
                <div class="card-header bg-dark">
                  <h2 class="card-title float-left"><strong>Our All Package</strong></h2>
                   <a href="{{route('admin.package.create')}}" class="btn btn-success btn-md float-right c-white">Add New Package <i class="fa fa-plus"></i></a>
                </div>
                <!-- /.card-header -->     
            </div>
              <!-- /.card -->
        </div>
    </div>


    <div class="row">  
        @forelse ($packages as $package)
            <div class="col-md-4 my-3">
                <div class="card mx-2 my-3" style="border: 2px solid black">
                    <div class="card-header">
                        <img src="{{ asset('storage/packageImage/'.$package->package_image) }}" alt="" class="img-fluid">
                    </div>
                    <div class="card-body package-details">
                        <p>Package Name: {{ $package->name }}</p>
                        <p>Price: {{ $package->price }}</p>
                        <p>People: {{ $package->people }}</p>
                        
                    </div>
                    <div class="card-footer bg-dark" >
                        <div class="d-flex justify-content-between">
                            <div>
                                <a href="{{ route('admin.package.show', $package->id) }}" class="btn btn-info">Details</a>
                            </div>
                            <div>
                                <button type="submit" onclick="handleDeletePackage( {{ $package->id }}) " class="btn btn-danger">Remove</button> 

                            </div>
                        </div>
                    </div>



                <!-- Modal -->
                <div class="modal fade" id="deletePackageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="" id="deletePackageForm" method="POST">
                            @csrf 
                            @method('DELETE')
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Package Remove</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="text-center">Are you sure to delete this package?</div>
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
            </div>
        @empty 
            <h2 class="text-info m-auto"><strong>No Package Found</strong></h2>
        @endforelse
    </div>

</div><!-- /.container -->
@endsection

@section('scripts')
<script>
    function handleDeletePackage(id){
       var form = document.getElementById('deletePackageForm')
       form.action = 'package/' + id 
       $('#deletePackageModal').modal('show')
    }
</script>
@endsection