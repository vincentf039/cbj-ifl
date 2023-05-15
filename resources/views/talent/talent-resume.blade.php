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

        

        <form action="{{route('job.list')}}" method="get">

            <!-- Search Result and sidebar start -->

            <div class="row"> 

            

                <div class="col-lg-12 col-sm-12"> 
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4">
					<!-- talent List -->      
                    
					   @if(isset($users) && count($users)) <?php $count_1 = 1; ?> @foreach($users as $user)
						<div class="col-md-3">
						<div class="card user-card list-talent mb-4">
							<div class="card-header">
								<h5>{{$user->first_name}}</h5>
							</div>
							<div class="card-block">
								<div class="p-4">
								<div class="user-image">
									<img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="img-radius" alt="User-Profile-Image">
									--{{$user->image}} --
								</div>
								<h6 class="f-w-600 m-t-25 m-b-10">Alessa Robert</h6>
								<p class="text-muted">Active | Male | Born 23.05.1992</p>
								<hr>
								<p class="text-muted m-t-15">Activity Level: 87%</p>
								<ul class="list-unstyled activity-leval">
									<li class="active"></li>
									<li class="active"></li>
									<li class="active"></li>
									<li></li>
									<li></li>
								</ul>
								<div class="bg-c-blue counter-block m-t-10 p-20">
									<div class="row">
										<div class="col-4">
											<i class="fa fa-comment"></i>
											<p>1256</p>
										</div>
										<div class="col-4">
											<i class="fa fa-user"></i>
											<p>8562</p>
										</div>
										<div class="col-4">
											<i class="fa fa-suitcase"></i>
											<p>189</p>
										</div>
									</div>
								</div>
								<p class="m-t-15 text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
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
					
                        <?php $count_1++; ?>
                        @endforeach @endif
					<!-- list end -->
				 </div>	
				<!-- Pagination Start -->

                    {{-- <div class="pagiWrap">

                        <div class="row">

                            <div class="col-md-5">

                                <div class="showreslt">

                                    {{__('Showing Pages')}} : {{ $jobs->firstItem() }} - {{ $jobs->lastItem() }} {{__('Total')}} {{ $jobs->total() }}

                                </div>

                            </div>

                            <div class="col-md-7 text-right">

                                @if(isset($jobs) && count($jobs))

                                {{ $jobs->appends(request()->query())->links() }}

                                @endif

                            </div>

                        </div>

                    </div> --}}

                    <!-- Pagination end --> 

                   



                </div>

				

				<div class="col-lg-3 col-sm-6 pull-right">

                    <!-- Sponsord By -->

                    <div class="sidebar">

                        <h4 class="widget-title">{{__('Sponsord By')}}</h4>

                        <div class="gad">{!! $siteSetting->listing_page_vertical_ad !!}</div>

                    </div>

                </div>

				

            </div>

        </form>

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