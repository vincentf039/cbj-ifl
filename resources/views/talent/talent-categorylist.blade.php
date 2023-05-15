@extends('layouts.app')

@section('content') 
<!-- Header start --> 
@include('includes.header') 
<!-- Header end --> 
<!-- Inner Page Title start --> 
@include('includes.inner_page_title', ['page_title'=>__('Talent Search')]) 
<!-- @include('flash::message') -->
@include('includes.inner_top_search')


	<?php
		$job_skill_name = $job_skills->job_skill;
	?>
 

<!-- Inner Page Title end -->

<div class="listpgWraper">

    <div class="container">
			
            <!-- Search Result and sidebar start -->

            <div class="row pb-3"> 
				 <div class="col-lg-12 col-sm-12"> <h1><?=$job_skills->job_skill?></h1>
				<p class="d-block">Check out <?=$job_skills->job_skill?> with the skills you need for your next job.</p>
				</div>
			</div>
            <div class="row"> 

          
                <div class="col-lg-12 col-sm-12"> 
				<div class="row row-cols-1  row-cols-md-4 row-cols-lg-3">
					<!-- talent List -->      
                    
					   @if(isset($profile_skills) && count($profile_skills))  @foreach($profile_skills as $profile_skill)
						   <pre><?php //print_r($ProfileSummary[$user->id]);
					 
				/* 	   echo $profile_skill->user_id;
					   echo $profile_skill->profile_headline;
					   echo $profile_skill->keywords_tags;
				
					   echo $profile_skill->summary; */

							
					   ?></pre>
						<div class="col-lg-3 col-md-4"> 
						<div class="card user-card list-talent mb-4">
							<div>
								<h5 class="text-center pt-3">{{$profile_skill->first_name}}</h5>
							</div>
							<div class="card-block">
								<div class="p-4">
								<div class="user-image text-center">
								<?php
									if ($profile_skill->image != ""){
										$img = $profile_skill->image;
									}else{
										$img = "avatar7.png";
									}
								?>
									<img src="https://onlinebestjobs.ph/user_images/{{$img}}" class="rounded-circle img-thumbnail w-75" alt="User-Profile-Image">
								 
								</div>
								<h5 class="f-w-600 m-t-25 m-b-10"><?=$profile_skill->profile_headline?></h5>
								<span><?=$profile_skill->keywords_tags?></span>
								<p class="text-muted">Active | Male | Born 23.05.1992</p>
								<hr>
								<p class="m-t-15 text-muted"><?=$profile_skill->summary;?><p>
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
					
                        @endforeach @endif
					<!-- list end -->
				 </div>	
				<!-- Pagination Start -->

                {{-- <div class="pagiWrap">

                    <div class="row">

                        <div class="col-md-5">

                            <div class="showreslt">

                                {{__('Showing Pages')}} : {{ $ProfileSummary->firstItem() }} - {{ $ProfileSummary->lastItem() }} {{__('Total')}} {{ $ProfileSummary->total() }}

                            </div>

                        </div>

                        <div class="col-md-7 text-right">

                            @if(isset($ProfileSummary) && count($ProfileSummary))

                            {{ $ProfileSummary->appends(request()->query())->links() }}

                            @endif

                        </div>

                    </div>

                </div> --}}

                    <!-- Pagination end --> 

                   



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

@include('includes.footer')

@endsection

@push('styles')

<style type="text/css">

    .searchList li .jobimg {

        min-height: 80px;

    }

    .hide_vm_ul{

        height:100px;

        overflow:hidden;

    }

    .hide_vm{

        display:none !important;

    }

    .view_more{

        cursor:pointer;

    }

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

    if ($("#submit_alert").length > 0) {

    $("#submit_alert").validate({



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

 $(document).on('click','.swal-button--Login',function(){
        window.location.href = "{{route('login')}}";
     })
     $(document).on('click','.swal-button--register',function(){
        window.location.href = "{{route('register')}}";
     })

</script>

@include('includes.country_state_city_js')

@endpush