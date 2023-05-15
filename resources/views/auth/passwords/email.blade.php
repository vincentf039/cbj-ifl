@extends('layouts.app')
@section('content')
<div class="container__ d-flex">

    <div class="col-6 left__pane d-flex align-items-center" >
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
                       
        <div class="useraccountwrap">
        <div class="header__ d-flex flex-column  ">
                        <span class="logo__">
                            <a href="{{url('/')}}" class="logo" >
                                <img src="{{ asset('/') }}sitesetting_images/thumb/{{ $siteSetting->site_logo }}" style="max-width: 60%;" alt="{{ $siteSetting->site_name }}" />
                            </a>
                        </span>
                        <div class="header__text newuser text-center">
                            <span class="font-medium">
                            Remember Your BestJobs Account Password
                            </span>
                        </div>
                        <span> <hr></span>
                    </div>
            <div class="userccountq " style="margin: 50px 0 150px;">
                <div class="tab-content">
                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}
                        <div class="formpanel">
                            <div class="formrow{{ $errors->has('email') ? ' has-error' : '' }}">
                
                                <input id="email" type="email" class="form-control" placeholder="{{__('Email Address')}}" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <input type="submit" class="btn" value="{{__('Send Password Reset Link')}}">
                        </div>
                        <div class="header__text newuser text-center">
                            <span class="font-medium">
                                {{__('Already have a BestJobs Account')}}? <a href="{{route('login')}}">{{__('Login')}}</a>
                            </span>
                        </div>
                        
                    </form>
                </div>
            </div>
    </div>
</div>
    <div class="col-6 right__pane vh100">
      
        <div class="testimonial2 py-5">
        <div class="titleTop">
            <div class="subtitle">{{__('Testimonials')}}</div>
            <h3>{{__('Success')}} <span>{{__('Stories')}}</span></h3>
        </div>
            <div class="container">
                <div class="heading">
                </div>
                <div class="owl-carousel owl-theme testi2 mt-4">
                <div class="item">
                    <div class="d-flex flex-row align-items-center position-relative">
                        <div class="col-lg-6 col-md-6 align-self-center">
                            <button class="btn rounded-circle btn-danger btn-md"><i class="icon-bubble"></i></button>
                            <h4 class="my-3">Customer Reviews</h4>
                            <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                            <h5 class="mt-4">Simon Duo</h5>
                            <h6 class="subtitle font-weight-normal">Partner, Brevin</h6>
                        </div>
                        <div class="col-lg-6 col-md-6 image-thumb d-none d-md-block">
                            <img src="https://www.wrappixel.com/demos/ui-kit/wrapkit/assets/images/testimonial/1.jpg" alt="wrapkit" class="rounded-circle img-fluid" />
                        </div>  
                        
                    </div>
                </div>
                <div class="item">
                    <div class="d-flex flex-row align-items-center position-relative">
                        <div class="col-lg-6 col-md-6 align-self-center">
                            <button class="btn rounded-circle btn-danger btn-md"><i class="icon-bubble"></i></button>
                            <h4 class="my-3">Customer Reviews</h4>
                            <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                            <h5 class="mt-4">Simon Duo</h5>
                            <h6 class="subtitle font-weight-normal">Partner, Brevin</h6>
                        </div>
                        <div class="col-lg-6 col-md-6 image-thumb d-none d-md-block">
                            <img src="https://www.wrappixel.com/demos/ui-kit/wrapkit/assets/images/testimonial/2.jpg" alt="wrapkit" class="rounded-circle img-fluid" />
                        </div>  
                        
                    </div>
                </div>
                <div class="item">
                    <div class="d-flex flex-row align-items-center position-relative">
                        <div class="col-lg-6 col-md-6 align-self-center">
                            <button class="btn rounded-circle btn-danger btn-md"><i class="icon-bubble"></i></button>
                            <h4 class="my-3">Customer Reviews</h4>
                            <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                            <h5 class="mt-4">Simon Duo</h5>
                            <h6 class="subtitle font-weight-normal">Partner, Brevin</h6>
                        </div>
                        <div class="col-lg-6 col-md-6 image-thumb d-none d-md-block">
                            <img src="https://www.wrappixel.com/demos/ui-kit/wrapkit/assets/images/testimonial/3.jpg" alt="wrapkit" class="rounded-circle img-fluid" />
                        </div>  
                        
                    </div>
                </div>
                </div>
            </div>
            </div>

        </div>                    
</div>

@endsection