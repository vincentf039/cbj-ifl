@extends('layouts.app')
@section('content') 
<!-- Header start --> 
@include('includes.header') 
<!-- Header end --> 
<!-- Inner Page Title start --> 
@include('includes.inner_page_title', ['page_title'=>__('Job Detail')]) 
<!-- Inner Page Title end -->
@include('flash::message')
@include('includes.inner_top_search')




@include('includes.footer')


@endsection