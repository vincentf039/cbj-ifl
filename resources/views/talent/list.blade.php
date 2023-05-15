@extends('layouts.app')

@section('content') 
<!-- Header start --> 
@include('includes.header') 
<!-- Header end --> 
<!-- Inner Page Title start --> 
@include('includes.inner_page_title', ['page_title'=>__('Talent Search')]) 
<!-- @include('flash::message') -->
@include('includes.inner_top_search')

<!-- Inner Page Title end -->

<div class="listpgWraper">

    <div class="container">

        <!-- Search Result and sidebar start -->
        <div class="row"> 
            
            @include('talent.talent-list-side-bar')
    
            <div class="col-lg-9 col-md-9"> 
                
                <div class="row row-cols-1  row-cols-md-3 row-cols-lg-3">
                   
                    <!-- talent List -->
                    @if (isset($_GET['job_skill']))
                        @if(isset($filteredUsers) && count($filteredUsers)) <?php $count_1 = 1; ?> @foreach($filteredUsers as $filteredUser)
                            <div class="col-lg-4 col-md-6"> 
                                <div class="card user-card list-talent mb-4">
                                    <div>
                                        <h5 class="text-center pt-3">{{ $filteredUser->first_name }}</h5>
                                    </div>
                                    <div class="card-block">
                                        <div class="p-4">
                                            <div class="user-image text-center">
                                                @php
                                                    if ($filteredUser->image != "") {
                                                        $img = $filteredUser->image;
                                                    } else {
                                                        $img = "avatar7.png";
                                                    }
                                                @endphp

                                                <img src="https://onlinebestjobs.ph/user_images/{{$img}}" class="rounded-circle img-thumbnail w-75" alt="User-Profile-Image">
                                            
                                            </div>
                                                {{-- job --}}
                                                @foreach ($filteredUser->profileSummary as $profile)
                                                
                                                    @if (!isset($profile))
                                                        <h5 class="f-w-600 m-t-25 m-b-5">Profile Headline</h5>
                                                    @else
                                                        <h5 class="f-w-600 m-t-25 m-b-5">{{ $profile->profile_headline}}</h5>
                                                    @endif
                                                @endforeach
                                            <div id="skill-box">
                                                {{-- skill --}}
                                                @if (isset($filteredUser->ProfileSummary))
                                                    @foreach ($filteredUser->ProfileSummary as $profSummary)
                                                        @if (isset($profSummary->keywords_tags))
                                                            <span> {{ $profSummary->keywords_tags}}</span>
                                                        @else
                                                            <span>N/A</span>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                
                                                {{-- <span id="show-more">show more... </span>--}}
                                            </div>
                                            <hr>
                                            {{-- active | gender | date of birth --}}
                                            <p class="text-muted">

                                                @if ($filteredUser->is_active == 1) <span>Active</span> @else <span>Inactive</span> @endif | 

                                                @if ($filteredUser->gender_id == 1) <span>Female</span> @else <span>Male</span> @endif | 

                                                @if (isset($filteredUser->date_of_birth)) <span>Born</span> {{ optional($filteredUser->date_of_birth)->format('m.d.Y') }} @else <span>N/A</span> @endif
                                            </p>

                                            <hr>
                                            {{-- bio --}}
                                            {{-- @foreach ($user->profileSummary as $profile)
                                                @if ($profile !== null)
                                                    <p class="m-t-15 text-muted"> {{ $profile->summary }}<p>
                                                @else --}}
                                                    <p class="m-t-15 text-muted"> Lorem ipsum dolor sit amet.<p>
                                                {{-- @endif
                                            @endforeach --}}
                                            <hr>
                                            <div class="row justify-content-center user-social-link">
                                                <div class="col-auto"><a href="#!"><i class="fa fa-facebook text-facebook"></i></a></div>
                                                <div class="col-auto"><a href="#!"><i class="fa fa-twitter text-twitter"></i></a></div>
                                                <div class="col-auto"><a href="#!"><i class="fa fa-dribbble text-dribbble"></i></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @php 
                                $count_1++;
                                //$proSum = [];
                            @endphp
                        @endforeach @endif
                    @else
                        @if(isset($users) && count($users)) <?php $count_1 = 1; ?> @foreach($users as $user)
                            <div class="col-lg-4 col-md-6"> 
                                <div class="card user-card list-talent mb-4">
                                    <div>
                                        <h5 class="text-center pt-3">{{ $user->first_name }}</h5>
                                    </div>
                                    <div class="card-block">
                                        <div class="p-4">
                                            <div class="user-image text-center">
                                                @php
                                                    if ($user->image != "") {
                                                        $img = $user->image;
                                                    } else {
                                                        $img = "avatar7.png";
                                                    }
                                                @endphp

                                                <img src="https://onlinebestjobs.ph/user_images/{{$img}}" class="rounded-circle img-thumbnail w-75" alt="User-Profile-Image">
                                            
                                            </div>

                                                {{-- job --}}
                                                @foreach ($user->profileSummary as $profile)
                                                    @if (isset($profile))
                                                        <h5 class="f-w-600 m-t-25 m-b-5">{{ $profile->profile_headline }}</h5>
                                                    @else
                                                        <h5 class="f-w-600 m-t-25 m-b-5">Wordpress Developer</h5>  
                                                    @endif
                                                @endforeach
                                            <div id="skill-box">
                                                {{-- skill --}}
                                                @if (isset($user->ProfileSummary))
                                                    @foreach ($user->ProfileSummary as $profSummary)
                                                        @if (isset($profSummary->keywords_tags))
                                                            <span> {{ $profSummary->keywords_tags}}</span>
                                                        @endif
                                                    @endforeach
                                                
                                                @endif
                                                
                                                {{-- <span id="show-more">show more... </span>--}}
                                            </div>
                                            {{-- active | gender | date of birth --}}
                                            <p class="text-muted">

                                                @if ($user->is_active == 1) <span>active</span> @else <span>Inactive</span> @endif | 

                                                @if ($user->gender_id == 1) <span>female</span> @else <span>male</span> @endif | 

                                                @if (isset($user->date_of_birth)) <span>Born</span> {{ optional($user->date_of_birth)->format('m.d.Y') }} @else <span>N/A</span> @endif
                                            </p>

                                            <hr>
                                            {{-- bio --}}
                                            {{-- @foreach ($user->profileSummary as $profile)
                                                @if ($profile !== null)
                                                    <p class="m-t-15 text-muted"> {{ $profile->summary }}<p>
                                                @else --}}
                                                    <p class="m-t-15 text-muted"> Lorem ipsum dolor sit amet.<p>
                                                {{-- @endif
                                            @endforeach --}}
                                            <hr>
                                            <div class="row justify-content-center user-social-link">
                                                <div class="col-auto"><a href="#!"><i class="fa fa-facebook text-facebook"></i></a></div>
                                                <div class="col-auto"><a href="#!"><i class="fa fa-twitter text-twitter"></i></a></div>
                                                <div class="col-auto"><a href="#!"><i class="fa fa-dribbble text-dribbble"></i></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @php 
                                $count_1++;
                                //$proSum = [];
                            @endphp
                        @endforeach @endif
                    @endif
                    <!-- list end -->
                    
                </div>	

                <!-- Pagination Start -->
                <div class="pagiWrap mb-3">

                    @if (isset($filteredUsers) && count($filteredUsers))    
                        <div class="row">
                            <div class="col-md-5">
                                <div class="showreslt">
                                    {{__('Showing Pages')}} : {{ $filteredUsers->firstItem() }} - {{ $filteredUsers->lastItem() }} {{__('Total')}} {{ $filteredUsers->total() }}
                                </div>
                            </div>
                            <div class="col-md-7 text-right">
                                {{ $filteredUsers->appends(request()->query())->links () }}
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-md-5">
                                <div class="showreslt">
                                    {{__('Showing Pages')}} : {{ $users->firstItem() }} - {{ $users->lastItem() }} {{__('Total')}} {{ $users->total() }}
                                </div>
                            </div>
                            <div class="col-md-7 text-right">
                                @if(isset($users) && count($users))
                                    {{ $users->appends(request()->query())-> links () }}
                                @endif
                            </div>
                        </div>
                    @endif

                </div>
                <!-- Pagination end --> 

            </div>

            <div class="col-lg-3 col-sm-6 pull-right">

                <!-- Sponsord By -->

                <div class="sidebar">

                    <h4 class="widget-title">{{__('Sponsored By')}}</h4>

                    <div class="gad">{!! $siteSetting->listing_page_vertical_ad !!}</div>

                </div>

            </div>

        </div>

    </div>

</div>

<div class="modal fade" id="show_alert" role="dialog">

    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">

            <form id="submit_alert">

                @csrf

                <input type="hidden" name="search" value="{{ Request::get('search') }}">

                <input type="hidden" name="country_id" value="@if(isset(Request::get('country_id')[0])) {{ Request::get('country_id')[0] }} @endif">

                <input type="hidden" name="state_id" value="@if(isset(Request::get('state_id')[0])){{ Request::get('state_id')[0] }} @endif">

                <input type="hidden" name="city_id" value="@if(isset(Request::get('city_id')[0])){{ Request::get('city_id')[0] }} @endif">

                <input type="hidden" name="functional_area_id" value="@if(isset(Request::get('functional_area_id')[0])){{ Request::get('functional_area_id')[0] }} @endif">

                <div class="modal-header">

                    <h4 class="modal-title">Job Alert</h4>

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>

                <div class="modal-body">

					

					<h3>Get the latest <strong>{{ ucfirst(Request::get('search')) }}</strong> jobs  @if(Request::get('location')!='') in <strong>{{ ucfirst(Request::get('location')) }}</strong>@endif sent straight to your inbox</h3>

					

                    <div class="form-group">

                        <input type="text" class="form-control" name="email" id="email" placeholder="Enter your Email"

                            value="@if( Auth::check() ) {{Auth::user()->email}} @endif">

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    <button type="submit" class="btn btn-primary">Submit</button>

                </div>

            </form>

        </div>
    </div>

</div>

<!-- back to top -->
@include('includes.back_to_top')

@include('includes.footer')

@endsection

@push('styles')

<style type="text/css">
    .searchList li .jobimg { min-height: 80px; }
    .hide_vm_ul{ height:100px; overflow:hidden; }
    .hide_vm{ display:none !important; }
    .view_more{ cursor:pointer; }
    /* #show-more{ cursor: pointer; text-align: right;}
    #show-more:hover{ color: #3c39e9; text-decoration: underline;}
    #skill-box{ display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden;} */
</style>

@endpush

@push('scripts') 

<script>
$('.btn-job-alert').on('click', function() {
    @if(Auth::user())
     $('#show_alert').modal('show');
    @else
        swal({
            title: "Save Job Alerts",
            text: "To save Job Alerts you must be Registered and Logged in",
            icon: "error",
            buttons: {
                Login: "Login",
                register: "Register",
                hello: "OK",
            },
        });
    @endif

})

     $(document).ready(function ($) {
        $("#search-job-list").submit(function () {
            $(this).find(":input").filter(function () {
                return !this.value;
            }).attr("disabled", "disabled");
            return true;
        });

        $("#search-job-list").find(":input").prop("disabled", false);

        $(".view_more_ul").each(function () {
            if ($(this).height() > 100)
            {
                $(this).addClass('hide_vm_ul');
                $(this).next().removeClass('hide_vm');
            }
        });

        $('.view_more').on('click', function (e) {
            e.preventDefault();
            $(this).prev().removeClass('hide_vm_ul');
            $(this).addClass('hide_vm');
        });



    });

    if ($("#submit_alert").length > 0) 
    {
        $("#submit_alert").validate(
        {
            rules: {
                email: {
                    required: true,
                    maxlength: 5000,
                    email: true
                }

            },

            messages: {
                email: {
                    required: "Email is required",
                }
            },

            submitHandler: function(form) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({

                    url: "{{route('subscribe.alert')}}",
                    type: "GET",
                    data: $('#submit_alert').serialize(),

                    success: function(response) {
                        $("#submit_alert").trigger("reset");
                        $('#show_alert').modal('hide');

                        swal({
                            title: "Success",
                            text: response["msg"],
                            icon: "success",
                            button: "OK",
                        });

                    }

                });

            }

        })

    }

$(document).on('click','.swal-button--Login',function(){ window.location.href = "{{route('login')}}";});
$(document).on('click','.swal-button--register',function(){window.location.href = "{{route('register')}}";});

</script>

@include('includes.country_state_city_js')

@endpush