@extends('layouts.backend.master')
@section('title')
    Tourist Guide - About
@endsection
@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
             
               @include('partial.successMessage')  

                <div class="card my-5 mx-4">
                    <div class="card-header bg-dark">
                      <h3 class="card-title float-left"><strong>About Us</strong></h3>
                      
                      @if (!$abouts->count() > 0)
                      <a href="{{route('admin.about.create')}}" class="btn btn-success btn-md float-right c-white">Add New <i class="fa fa-plus"></i></a>
                      @endif

                    </div>
                    <!-- /.card-header -->
                    @if ($abouts->count() > 0)

                     @foreach($abouts as $about)
                      <div class="card-body" style="text-align: justify;">
                         {!! $about->content !!}
                      </div>
                    <div class="card-footer">
                          <a href="{{ route('admin.about.edit', $about->id) }}"  class="btn btn-info">Edit Content</a>

                    </div>
                    @endforeach
                    @else
                    <h2 class="text-center text-info font-weight-bold m-3">No Content Found</h2>
                     @endif
                       
            </div>
                  <!-- /.card -->
            </div>
        </div>
    </div><!-- /.container -->
 @endsection

