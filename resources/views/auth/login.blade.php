@extends('layouts.app')
@section('content')
<!-- Header start -->
<!-- Header end --> 
<div class="container__ d-flex">
@include('flash::message')
    <div class="col-6 left__pane" >
   
        <div class="useraccountwrap">

                    <div class="userccountq">
                    <div class="header__ d-flex flex-column  ">
                        <span class="logo__">
                            <a href="{{url('/')}}" class="logo" >
                                <img src="{{ asset('/') }}sitesetting_images/thumb/{{ $siteSetting->site_logo }}" style="max-width: 60%;" alt="{{ $siteSetting->site_name }}" />
                            </a>
                        </span>
                        <div class="header__text newuser text-center">
                            <span class="header__text">
                                Sign into Your BestJobs Account
                            </span>
                            <span> <hr></span>
                        </div>
                    </div>
                   
                       
                        <div class="userbtns">
                            <ul class="nav nav-tabs">
                                <?php
                                $c_or_e = old('candidate_or_employer', 'candidate');
                                ?>
                                <li class="nav-item"><a class="nav-link {{($c_or_e == 'candidate')? 'active':''}}" data-toggle="tab" href="#candidate" aria-expanded="true">{{__('Candidate')}}</a></li>
                                <li class="nav-item"><a class="nav-link {{($c_or_e == 'employer')? 'active':''}}" data-toggle="tab" href="#employer" aria-expanded="false">{{__('Employer')}}</a></li>
                            </ul>
                        </div>
                        
                        @if ($errors->has('email'))
                                            <span class="help-block p-3 mb-2 bg-danger text-white text-center">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                        @endif
                        @if ($errors->has('password'))
                                            <span class="help-block p-3 mb-2 bg-danger text-white text-center">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                        @endif
                        <div class="tab-content">
                            <div id="candidate" class="formpanel tab-pane {{($c_or_e == 'candidate')? 'active':''}}">
                                <!--   <div class="socialLogin">
                                            <h5>{{__('Login with Social')}}</h5>
                                            <a href="{{ url('login/jobseeker/facebook')}}" class="fb">
                                                <i class="fa fa-facebook" aria-hidden="true"></i>
                                            </a>
                                            <a href="{{ url('login/jobseeker/twitter')}}" class="tw">
                                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                            </a>
                                    </div> -->
                                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="candidate_or_employer" value="candidate" />
                                    <div class="formpanel">
                                        <div class="formrow{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="{{__('Email Address')}}">
                                        
                                        </div>
                                        <div class="formrow{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <input id="password" type="password" class="form-control" name="password" value="" required placeholder="{{__('Password')}}">
                                        </div>

                                        <input type="submit" class="btn" value="{{__('Login')}}">
                                    </div>
                                    <!-- login form  end--> 
                                </form>
                                <!-- sign up form -->
                        <!-- <div class="newuser"><i class="fa fa-user" aria-hidden="true"></i> {{__('New User')}}? <a href="{{route('register')}}">{{__('Register Here')}}</a></div>
                        <div class="newuser"><i class="fa fa-user" aria-hidden="true"></i> {{__('Forgot Your Password')}}? <a href="{{ route('password.request') }}">{{__('Click here')}}</a></div> -->
                        <div class="header__text newuser text-center">
                            <span class="font-medium">
                             {{__('Need a BestJobs Account')}}? <a href="{{route('register')}}">{{__('Create an Account')}}</a>
                            </span>
                        </div>
                        <div class="header__text newuser text-center"><span class="font-medium"> {{__('Forgot Your Password')}}? <a href="{{ route('password.request') }}">{{__('Click here')}}</a></span></a></div>
                        <!-- sign up form end-->
                            </div>
                            <div id="employer" class="formpanel tab-pane fade {{($c_or_e == 'employer')? 'active':''}}">
                                <!--      <div class="socialLogin">
                                        <h5>{{__('Login with Social')}}</h5>
                                            <a href="{{ url('login/employer/facebook')}}" class="fb">
                                                <i class="fa fa-facebook" aria-hidden="true"></i>
                                            </a>
                                            <a href="{{ url('login/employer/twitter')}}" class="tw">
                                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                            </a>
                                        </div> -->
                                <form class="form-horizontal" method="POST" action="{{ route('company.login') }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="candidate_or_employer" value="employer" />
                                    <div class="formpanel">
                                        <div class="formrow{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="{{__('Email Address')}}">
                                            
                                        </div>
                                        <div class="formrow{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <input id="password" type="password" class="form-control" name="password" value="" required placeholder="{{__('Password')}}">
                                          
                                        </div>   

                                        <input type="submit" class="btn" value="{{__('Login')}}">
                                    </div>
                                    <!-- login form  end--> 
                                </form>
                                <!-- sign up form -->
                                <div class="header__text newuser text-center">
                            <span class="font-medium">
                             {{__('Need a BestJobs Account')}}? <a href="{{route('register')}}">{{__('Create an Account')}}</a>
                            </span>
                        </div>
                        <div class="header__text newuser text-center"><span class="font-medium"> {{__('Forgot Your Password')}}? <a href="{{ route('password.request') }}">{{__('Click here')}}</a></span></a></div>
                        <!-- sign up form end-->
                            </div>
                        </div>
                        <!-- login form -->

                        

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
                <div class="owl-carousel testi2 owl-theme mt-4">
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
