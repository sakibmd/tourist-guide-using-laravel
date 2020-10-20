@extends('layouts.backend.master')
@section('title')
    Tourist Guide - Tour History
@endsection
@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

              	@include('partial.successMessage')

                <div class="card my-5 mx-4">
                    <div class="card-header  bg-dark">
                      <h3 class="card-title float-left p-0 m-0"><strong>Tour History  ({{ $historyList->count() }})</strong></h3>
                    </div>
                    <!-- card-header -->
                    @if ($historyList->count() > 0)
                    <div class="card-body">
                    <div class="table-responsive">
                      <table id="dataTableId" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Package</th>
                          <th>Price</th>
                          <th>Tour Date</th>
                          <th>Booking Date</th>
                          <th>Day</th>
                          <th>Guide</th>
                          <th>Guide Contact</th>
                          <th>Tourist Name</th>
                          <th>Tourist Contact</th>
                          <th>Tour Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($historyList as $list)
                        <tr>
                          <td>{{ $list->package_name }}</td>
                          <td>{{ $list->price }}</td>
                          <td>{{ $list->date }}</td>
                          <td>{{ $list->created_at->format('F d, Y') }}</td>
                          <td>{{ $list->day }}</td>
                          <td>
                              @isset($list->guide->name)
                                 {{ $list->guide->name }}
                              @else 
                                  His info is deleted by Admin
                              @endisset
                              
                          </td>
                          <td>
                            @isset($list->guide->contact)
                               {{ $list->guide->contact }}
                            @else 
                               deleted by admin
                            @endisset
                            
                        </td>
                          <td>{{ $list->tourist->name }}</td>
                          <td>{{ $list->tourist->contact }}</td>
                          <td>
                              @if ($list->is_completed == "yes")
                                  Completed
                              @else
                                @if($list->date > $currentDate)
                                Waiting
                                @else 
                                  Running
                                @endif 
                              @endif

                              
                          </td>
                          
                        </tr>
                        @endforeach    
                        </tbody>
                      </table>
                    </div>
                      
                    </div>
                    @else 
                      <h2 class="text-center text-info font-weight-bold m-3">No Tour History Found</h2>
                    @endif

                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
            </div>
        </div>
    </div><!-- /.container -->
 @endsection

