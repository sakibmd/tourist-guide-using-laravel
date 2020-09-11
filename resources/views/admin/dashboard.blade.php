@extends('layouts.backend.master')
@section('title')
    Tourist Guide - Dashboard
@endsection
@section('content')
<div class="container">
    <div class="row text-center">
        <div class="col-12">
            <h2 class="welcome">Welcome To Admin Panel - <span class="welcome-name">{{ Auth::user()->name }}</span></h2>
        </div>
    </div>
</div>
 @endsection

