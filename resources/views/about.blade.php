@extends('layouts.frontend.master')
@section('title')
    Tourist Guide - About
@endsection

@section('css')

@endsection



@section('content')

<div class="container">
    <div class="row justify-content-center" style="margin-top: 130px">
        <h1 class="about"><strong>About Us</strong></h1>
    </div>
    <div class="row">
       @isset($about)
            <div class="row my-5 text-justify px-4">
                {!! $about->content !!}
            </div>
       @else
        
            <h2 class="my-5">Please update your about information</h2> 
       @endisset
    </div>
</div>



@endsection

@section('scripts')
   
@endsection

@section('css')

@endsection
      
