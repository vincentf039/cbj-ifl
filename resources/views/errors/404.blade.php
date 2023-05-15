
@extends('layouts.app')
@section('content')
<!-- Header start -->
@include('includes.header')
<!-- Header end --> 
<!-- Inner Page Title start -->
@include('includes.inner_page_title', ['page_title'=>__('Page Not Found')])
<!-- Inner Page Title end -->
<div class="about-wraper"> 
    <!-- About -->
    <div class="container">
        <div class="row">
            <div class="col-md-12"> 
                <h2 class="text-dark">{{__('The requested page does not exist.')}}</h2>
                <div class="d-flex align-items-center">
                    <a class="errorButton" href="{{url('/')}}" >{{__('Go To Home')}}</a>
                    <p class="text-muted errorP">or</p>
                    <a class="errorButton2" href="{{url('/')}}" >{{__('Contact Us')}}</a>
                </div>
            </div>      
        </div>
    </div>  
</div>
@include('includes.footer')
@endsection