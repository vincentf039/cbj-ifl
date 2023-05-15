@extends('layouts.app')

@section('content') 

<div class="container__ d-flex">
@include('flash::message')
    <div class="col-6 left__pane2" >

           <div class="useraccountwrap">

                <div class="userccountq">
                <div class="header__ d-flex flex-column  ">
                        <span class="logo__">
                            <a href="{{url('/')}}" class="logo" >
                                <img src="{{ asset('/') }}sitesetting_images/thumb/{{ $siteSetting->site_logo }}" style="max-width: 60%;" alt="{{ $siteSetting->site_name }}" />
                            </a>
                        </span>
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

                    <div class="tab-content">

                        <div id="candidate" class="formpanel tab-pane {{($c_or_e == 'candidate')? 'active':''}}">

                            <form class="form-horizontal" method="POST" action="{{ route('register') }}">

                                {{ csrf_field() }}

                                <input type="hidden" name="candidate_or_employer" value="candidate" />
                                    <div class="col-12 p-0 d-flex">
                                        <div class="pl-0 col-6 formrow{{ $errors->has('first_name') ? ' has-error' : '' }}">

                                        <input type="text" name="first_name" class="form-control" required="required" placeholder="{{__('First Name')}}" value="{{old('first_name')}}">

                                        @if ($errors->has('first_name')) <span class="help-block"> <strong>{{ $errors->first('first_name') }}</strong> </span> @endif </div>

                                        <div class="p-0 col-6 formrow{{ $errors->has('last_name') ? ' has-error' : '' }}">

                                    <input type="text" name="last_name" class="form-control" required="required" placeholder="{{__('Last Name')}}" value="{{old('last_name')}}">

                                    @if ($errors->has('last_name')) <span class="help-block"> <strong>{{ $errors->first('last_name') }}</strong> </span> @endif </div>
                                        
                                    </div>
                         
                              

                                <div class="formrow{{ $errors->has('email') ? ' has-error' : '' }}">

                                    <input type="email" name="email" class="form-control" required="required" placeholder="{{__('Email')}}" value="{{old('email')}}">

                                    @if ($errors->has('email')) <span class="help-block"> <strong>{{ $errors->first('email') }}</strong> </span> @endif </div>
                           
                            <div class="col-12 p-0 d-flex">
                                <div class="pl-0 col-6 formrow{{ $errors->has('password') ? ' has-error' : '' }}">

                                    <input type="password" name="password" class="form-control" required="required" placeholder="{{__('Password')}}" value="">

                                    @if ($errors->has('password')) <span class="help-block"> <strong>{{ $errors->first('password') }}</strong> </span> @endif </div>

                                <div class="p-0 col-6 formrow{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">

                                    <input type="password" name="password_confirmation" class="form-control" required="required" placeholder="{{__('Confirm')}}" value="">

                                    @if ($errors->has('password_confirmation')) <span class="help-block"> <strong>{{ $errors->first('password_confirmation') }}</strong> </span> @endif </div>
                            </div>
                                    

                                    <div class="formrow{{ $errors->has('is_subscribed') ? ' has-error' : '' }}">
                                        

    <?php

	$is_checked = '';

	if (old('is_subscribed', 1)) {

		$is_checked = 'checked="checked"';

	}

	?>

                                    

                                    <input type="checkbox" value="1" name="is_subscribed" {{$is_checked}} />
                                    {{__('Subscribe to Newsletter')}}

                                    @if ($errors->has('is_subscribed')) <span class="help-block"> <strong>{{ $errors->first('is_subscribed') }}</strong> </span> @endif </div>

                                    
                                    
                                    

                                <div class="formrow{{ $errors->has('terms_of_use') ? ' has-error' : '' }}">
                                    

                                    <input type="checkbox" value="1" name="terms_of_use" />

                                    <a href="{{url('cms/terms-of-use')}}">{{__('I accept Terms of Use')}}</a>

                                <div class="header__text newuser text-center">
                                    <span class="font-medium">
                                        {{__('Already have a BestJobs Account')}}? <a href="{{route('login')}}">{{__('Login')}}</a>
                                    </span>
                                </div>

                                    @if ($errors->has('terms_of_use')) <span class="help-block"> <strong>{{ $errors->first('terms_of_use') }}</strong> </span> @endif </div>

                             <div class="form-group d-flex justify-content-center col-12 col-sm-12 col-md-10 text-center mx-auto mobile-padding-no {{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                                    {!! app('captcha')->display() !!}
                                    @if ($errors->has('g-recaptcha-response')) <span class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong> </span> @endif
                                </div>

                                <input type="submit" class="btn" value="{{__('Register')}}">

                            </form>

                        </div>

                        <div id="employer" class="formpanel tab-pane fade {{($c_or_e == 'employer')? 'active':''}}">

                            <form class="form-horizontal" method="POST" action="{{ route('company.register') }}">

                                {{ csrf_field() }}

                                <input type="hidden" name="candidate_or_employer" value="employer" />

                                <div class="formrow{{ $errors->has('name') ? ' has-error' : '' }}">

                                    <input type="text" name="name" class="form-control" required="required" placeholder="{{__('Name')}}" value="{{old('name')}}">

                                    @if ($errors->has('name')) <span class="help-block"> <strong>{{ $errors->first('name') }}</strong> </span> @endif </div>

                                <div class="formrow{{ $errors->has('email') ? ' has-error' : '' }}">

                                    <input type="email" name="email" class="form-control" required="required" placeholder="{{__('Email')}}" value="{{old('email')}}">

                                    @if ($errors->has('email')) <span class="help-block"> <strong>{{ $errors->first('email') }}</strong> </span> @endif </div>
                            
                                <div class="col-12 p-0 d-flex">
                                    <div class="pl-0 col-6 formrow{{ $errors->has('password') ? ' has-error' : '' }}">

                                    <input type="password" name="password" class="form-control" required="required" placeholder="{{__('Password')}}" value="">

                                    @if ($errors->has('password')) <span class="help-block"> <strong>{{ $errors->first('password') }}</strong> </span> @endif </div>

                                    <div class="p-0 col-6 formrow{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">

                                    <input type="password" name="password_confirmation" class="form-control" required="required" placeholder="{{__('Confirm')}}" value="">

                                    @if ($errors->has('password_confirmation')) <span class="help-block"> <strong>{{ $errors->first('password_confirmation') }}</strong> </span> @endif </div>
                                </div>
                                
                                <div class="formrow{{ $errors->has('is_subscribed') ? ' has-error' : '' }}">

    <?php

	$is_checked = '';

	if (old('is_subscribed', 1)) {

		$is_checked = 'checked="checked"';

	}

	?>

                                    

                                    <input type="checkbox" value="1" name="is_subscribed" {{$is_checked}} />
                                    {{__('Subscribe to Newsletter')}}

                                    @if ($errors->has('is_subscribed')) <span class="help-block"> <strong>{{ $errors->first('is_subscribed') }}</strong> </span> @endif </div>


                                    

                                <div class="formrow{{ $errors->has('terms_of_use') ? ' has-error' : '' }}">

                                    <input type="checkbox" value="1" name="terms_of_use" />

                                    <a href="{{url('terms-of-use')}}">{{__('I accept Terms of Use')}}</a>

                                    <div class="header__text newuser text-center">
                                        <span class="font-medium">
                                            {{__('Already have a BestJobs Account')}}? <a href="{{route('login')}}">{{__('Login')}}</a>
                                        </span>
                                    </div>

                                    @if ($errors->has('terms_of_use')) <span class="help-block"> <strong>{{ $errors->first('terms_of_use') }}</strong> </span> @endif </div>

                            <div
                                    class="form-group d-flex justify-content-center col-12 col-sm-12 col-md-10 text-center mx-auto mobile-padding-no {{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                                    {!! app('captcha')->display() !!}
                                    @if ($errors->has('g-recaptcha-response')) <span class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong> </span> @endif
                                </div>

                                <input type="submit" class="btn" value="{{__('Register')}}">

                            </form>

                        </div>

                    </div>

                    <!-- sign up form -->

                    <!-- sign up form end--> 



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