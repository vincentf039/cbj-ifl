@php
$company = $job_details->getCompany();
@endphp

<div class="listpgWraper" style="padding: 20px 0;">
    <div class="container"> 
        @include('flash::message')
       
        <!-- Job Detail start -->
        <div class="row">
            <div class="col-lg-7"> 
				
				 <!-- Job Header start -->
        <div class="job-header">
            <div class="jobinfo">
               
                        <h2>{{$job_details->title}} - {{$company->name}}</h2>
                        <div class="ptext">{{__('Date Posted')}}: {{$job_details->created_at->format('M d, Y')}}</div>
						
						@if(!Auth::user() && !Auth::guard('company')->user())
                        <a href="{{route('login')}}"><i class="fa fa-sign-in" aria-hidden="true"></i> {{__('Login to View Salary')}} </a>
						@else
						@if(!(bool)$job_details->hide_salary)
                        <div class="salary">{{$job_details->getSalaryPeriod('salary_period')}}: <strong>{{$job_details->salary_from.' '.$job_details->salary_currency}} - {{$job_details->salary_to.' '.$job_details->salary_currency}}</strong></div>
                        @endif
						@endif
                    
            </div>
			
			<!-- Job Detail start -->
                <div class="jobmainreq">
                    <div class="jobdetail">
                       <h3><i class="fa fa-align-left" aria-hidden="true"></i> {{__('Job Detail')}}</h3>
						
							 <ul class="jbdetail">
                            <li class="row">
                                <div class="col-md-4 col-xs-5">{{__('Location')}}:</div>
                                <div class="col-md-8 col-xs-7">
                                    @if((bool)$job_details->is_freelance)
                                    <span>Freelance</span>
                                    @else
                                    <span>{{$job_details->getLocation()}}</span>
                                    @endif
                                </div>
                            </li>
                            <li class="row">
                                <div class="col-md-4 col-xs-5">{{__('Company')}}:</div>
                                <div class="col-md-8 col-xs-7"><a href="{{route('company.detail', $company->id)}}">{{$company->name}}</a></div>
                            </li>
                            <li class="row">
                                <div class="col-md-4 col-xs-5">{{__('Type')}}:</div>
                                <div class="col-md-8 col-xs-7"><span class="permanent">{{$job_details->getJobType('job_type')}}</span></div>
                            </li>
                            <li class="row">
                                <div class="col-md-4 col-xs-5">{{__('Shift')}}:</div>
                                <div class="col-md-8 col-xs-7"><span class="freelance">{{$job_details->getJobShift('job_shift')}}</span></div>
                            </li>
                            <li class="row">
                                <div class="col-md-4 col-xs-5">{{__('Career Level')}}:</div>
                                <div class="col-md-8 col-xs-7"><span>{{$job_details->getCareerLevel('career_level')}}</span></div>
                            </li>
								<li class="row">
                                <div class="col-md-4 col-xs-5">{{__('Positions')}}:</div>
                                <div class="col-md-8 col-xs-7"><span>{{$job_details->num_of_positions}}</span></div>
                            </li>
                            <li class="row">
                                <div class="col-md-4 col-xs-5">{{__('Experience')}}:</div>
                                <div class="col-md-8 col-xs-7"><span>{{$job_details->getJobExperience('job_experience')}}</span></div>
                            </li>
                            <li class="row">
                                <div class="col-md-4 col-xs-5">{{__('Gender')}}:</div>
                                <div class="col-md-8 col-xs-7"><span>{{$job_details->getGender('gender')}}</span></div>
                            </li>
                            <li class="row">
                                <div class="col-md-4 col-xs-5">{{__('Degree')}}:</div>
                                <div class="col-md-8 col-xs-7"><span>{{$job_details->getDegreeLevel('degree_level')}}</span></div>
                            </li>
                            <li class="row">
                                <div class="col-md-4 col-xs-5">{{__('Apply Before')}}:</div>
                                <div class="col-md-8 col-xs-7"><span>{{$job_details->expiry_date->format('M d, Y')}}</span></div>
                            </li> 
                            
                        </ul>
							
                    </div>
                </div>
			
			<hr>
            <div class="jobButtons">
                <a href="{{route('email.to.friend', $job_details->slug)}}" class="btn"><i class="fa fa-envelope" aria-hidden="true"></i> {{__('Email to Friend')}}</a>
                @if(Auth::check() && Auth::user()->isFavouriteJob($job_details->slug)) 
                    <a href="{{route('remove.from.favourite', $job_details->slug)}}" class="btn">
                        <i class="fa fa-floppy-o" aria-hidden="true"></i> 
                        {{__('Favourite Job')}} 
                    </a> 
                @else 
                    <a href="{{route('add.to.favourite', $job_details->slug)}}" class="btn">
                        <i class="fa fa-floppy-o" aria-hidden="true"></i> 
                        {{__('Add to Favourite')}}
                    </a> 
                @endif
                <a href="{{route('report.abuse', $job_details->slug)}}" class="btn report"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> {{__('Report Abuse')}}</a>
            </div>
        </div>
				
                <!-- Job Description start -->
                <div class="job-header">
                    <div class="contentbox">
                        <h3><i class="fa fa-file-text-o" aria-hidden="true"></i> {{__('Job Description')}}</h3>
                        <p>{!! $job_details->description !!}</p>                       
                    </div>
                </div>
				
				
				<div class="job-header benefits">
                    <div class="contentbox">
                        <h3><i class="fa fa-file-text-o" aria-hidden="true"></i> {{__('Benefits')}}</h3>
                        <p>{!! $job_details->benefits !!}</p>                       
                    </div>
                </div>
				
				<div class="job-header">
                    <div class="contentbox">                        
                        <h3><i class="fa fa-puzzle-piece" aria-hidden="true"></i> {{__('Skills Required')}}</h3>
                        <ul class="skillslist">
                            {!!$job_details->getJobSkillsList()!!}
                        </ul>
                    </div>
                </div>
				
				
                <!-- Job Description end -->
                
            </div>
            <!-- related jobs end -->

            <div class="col-lg-5"> 
				<div class="jobButtons applybox">
				@if($job_details->isJobExpired())
                <span class="jbexpire"><i class="fa fa-paper-plane" aria-hidden="true"></i> {{__('Job is expired')}}</span>
                @elseif(Auth::check() && Auth::user()->isAppliedOnJob($job_details->id))
                <a href="javascript:;" class="btn apply applied"><i class="fa fa-paper-plane" aria-hidden="true"></i> {{__('Already Applied')}}</a>
                @else
                <a href="{{route('apply.job', $job_details->slug)}}" class="btn apply"><i class="fa fa-paper-plane" aria-hidden="true"></i> {{__('Apply Now')}}</a>
                @endif
				</div>
				
				<div class="companyinfo">
					<h3><i class="fa fa-building-o" aria-hidden="true"></i> {{__('Company Overview')}}</h3>
                            <div class="companylogo"><a href="{{route('company.detail',$company->slug)}}">{{$company->printCompanyImage()}}</a></div>
                            <div class="title"><a href="{{route('company.detail',$company->slug)}}">{{$company->name}}</a></div>
                            <div class="ptext">{{$company->getLocation()}}</div>
                            <div class="opening">
                                <a href="{{route('company.detail',$company->slug)}}">
                                    {{App\Company::countNumJobs('company_id', $company->id)}} {{__('Current Jobs Openings')}}
                                </a>
                            </div>
                            <div class="clearfix"></div>
					<hr>
				<div class="companyoverview">
				
					<p>{{\Illuminate\Support\Str::limit(strip_tags($company->description), 250, '...')}} <a href="{{route('company.detail',$company->slug)}}">Read More</a></p>
					</div>
                        </div>
				
				<!-- related jobs start -->
                <div class="relatedJobs">
                    <h3>{{__('Related Jobs')}}</h3>
                    <ul class="searchList">
                        @if(isset($relatedJobs) && count($relatedJobs))
                        @foreach($relatedJobs as $relatedJob)
                        <?php $relatedJobCompany = $relatedJob->getCompany(); ?>
                        @if(null !== $relatedJobCompany)
                        <!--Job start-->
                        <li>
                            <div class="jobinfo">
                                <h3><a href="{{route('job.detail', [$relatedJob->slug])}}" title="{{$relatedJob->title}}">{{$relatedJob->title}}</a></h3>
                                <div class="companyName"><a href="{{route('company.detail', $relatedJobCompany->slug)}}" title="{{$relatedJobCompany->name}}">{{$relatedJobCompany->name}}</a></div>
                                <div class="location"><span>{{$relatedJob->getCity('city')}}</span></div>
                                <div class="location">
                                    <label class="fulltime">{{$relatedJob->getJobType('job_type')}}</label>
                                    <label class="partTime">{{$relatedJob->getJobShift('job_shift')}}</label> </div>
                            </div>
                            <div class="clearfix"></div>     
                        </li>
                        <!--Job end--> 
                        @endif
                        @endforeach
                        @endif

                        <!-- Job end -->
                    </ul>
                </div>
                
                <!-- Google Map start -->
                <!-- <div class="job-header">
                    <div class="jobdetail">
                        <h3><i class="fa fa-map-marker" aria-hidden="true"></i> {{__('Google Map')}}</h3>
                        <div class="gmap">
                            {!!$company->map!!}
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>
@push('styles')
<style type="text/css">
    .view_more{display:none !important;}
</style>
@endpush
@push('scripts') 
<script>
    $(document).ready(function ($) {
        $("form").submit(function () {
            $(this).find(":input").filter(function () {
                return !this.value;
            }).attr("disabled", "disabled");
            return true;
        });
        $("form").find(":input").prop("disabled", false);

        $(".view_more_ul").each(function () {
            if ($(this).height() > 100)
            {
                $(this).css('height', 100);
                $(this).css('overflow', 'hidden');
                //alert($( this ).next());
                $(this).next().removeClass('view_more');
            }
        });

        /************************************************
         *           GETTING DATA FOR OFFCANVAS
        ************************************************/

        
    });
</script> 
@endpush