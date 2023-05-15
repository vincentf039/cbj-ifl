<div class="col-md-3 col-sm-6"> 
	<div class="jobreqbtn">
	@if (Request::get('search') != '' || Request::get('functional_area_id') != '' || Request::get('country_id') != ''|| Request::get('state_id') != '' || Request::get('city_id') != ''|| Request::get('city_id') != '')
	<a class="btn btn-job-alert" href="javascript:;">
		<i class="fa fa-bell" style="font-size:1.125rem;"></i> {{__('Save Job Alert')}} </a>
	@else
	<a class="btn btn-job-alert-disabled" disabled href="javascript:;">
		<i class="fa fa-bell" style="font-size:1.125rem;"></i> {{__('Save Job Alert')}}</a>
	@endif
	
	
	@if(Auth::guard('company')->check())
	<a href="{{ route('post.job') }}" class="btn"><i class="fa fa-file-text" aria-hidden="true"></i> {{__('Post Job')}}</a>
	@else
	<a href="{{url('my-profile#cvs')}}" class="btn"><i class="fa fa-file-text" aria-hidden="true"></i> {{__('Upload Your Resume')}}</a>
	@endif
	</div>
    <!-- Side Bar start -->
    <div class="sidebar">
        <input type="hidden" name="search" value="{{Request::get('search', '')}}"/>
        
        <!-- Jobs By Title -->
        <div class="widget pb-0">
            <h4 class="widget-title">{{__('Jobs By Title')}}</h4>
            @foreach ($talent_categories as $talent_category)
                <div class="accordion" id="accordionExample">
                <div class="">
                   
                        <ul class=" view_more_ul">
                            <li class="">
                                
                                <button class="btn btn-categ pl-0 pr-0 w-100 text-left d-flex justify-content-between align-items-center collapsed" style="font-size: 14px; " type="button" data-toggle="collapse" data-target="#{{str_replace(' ', '', $talent_category['category'])}}" aria-expanded="false" aria-controls="collapseExample">
                                {{$talent_category['category']}} <i class="fa fa-angle-right pl-2 pr-2 "></i>
                               
                                </button>
                                
                                
                            </li>
                        </ul>    
                
                    <div class="collapse" id="{{str_replace(' ', '', $talent_category['category'])}}">
                        <div class="card-body">
                            <ul class="optionlist view_more_ul">
                          
                                @foreach($talent_category['talent_list'] as $talent)
                                
                                    <li class="d-flex ">
                                        @php
                                            $checked = (in_array($talent['job_skill'], Request::get('job_skill', array()))) ? 'checked="checked"': '';
                                        @endphp
                                        <input type="checkbox" name="job_skill[]" id="job_skill_{{$talent['job_skill_id']}}" value="{{$talent['job_skill']}}" {{$checked}}>  
                                        <label for="job_skill_{{$talent->job_skill_id}}"></label>
                                        {{$talent['job_skill']}}

                                       
                                    </li>

                                @endforeach
                                {{-- @if(isset($jobTitlesArray) && count($jobTitlesArray))
                                    @foreach($jobTitlesArray as $key=>$jobTitle)
                                        <li>
                                            @php
                                            $checked = (in_array($jobTitle, Request::get('job_title', array())))? 'checked="checked"':'';
                                            @endphp
                                            <input type="checkbox" name="job_title[]" id="job_title_{{$key}}" value="{{$jobTitle}}" {{$checked}} >
                                            <label for="job_title_{{$key}}"></label>
                                            {{$jobTitle}} <span>{{App\Job::countNumJobs('title', $jobTitle)}}</span> 
                                        </li>
                                    @endforeach
                                @endif  --}}
                            </ul>
                     
                        </div>
                    </div>
                </div>
            </div>
               
            
            @endforeach    
            <!-- title end --> 
            <span class="text text-primary view_more hide_vm">{{__('View More')}}</span> </div>

      
        <!-- Jobs By Experience -->
        <div class="widget">
            <h4 class="widget-title">{{__('Jobs By Experience')}}</h4>
            <ul class="optionlist view_more_ul">
                @if(isset($jobExperienceIdsArray) && count($jobExperienceIdsArray))
                @foreach($jobExperienceIdsArray as $key=>$job_experience_id)
                @php
                $jobExperience = App\JobExperience::where('job_experience_id','=',$job_experience_id)->lang()->active()->first();			  
                @endphp
                @if(null !== $jobExperience)
                @php
                $checked = (in_array($jobExperience->job_experience_id, Request::get('job_experience_id', array())))? 'checked="checked"':'';
                @endphp
                <li>
                    <input type="checkbox" name="job_experience_id[]" id="job_experience_{{$jobExperience->job_experience_id}}" value="{{$jobExperience->job_experience_id}}" {{$checked}}>
                    <label for="job_experience_{{$jobExperience->job_experience_id}}"></label>
                    {{$jobExperience->job_experience}} <!-- <span>{{App\Job::countNumJobs('job_experience_id', $jobExperience->job_experience_id)}}</span> --> 
                </li>
                @endif
                @endforeach
                @endif
            </ul>
            <span class="text text-primary view_more hide_vm">{{__('View More')}}</span> </div>
        <!-- Jobs By Experience end --> 

        <!-- Jobs By Job Type -->
        <div class="widget">
            <h4 class="widget-title">{{__('Job Type')}}</h4>
            <ul class="optionlist view_more_ul">
                @if(isset($jobTypeIdsArray) && count($jobTypeIdsArray))
                @foreach($jobTypeIdsArray as $key=>$job_type_id)
                @php
                $jobType = App\JobType::where('job_type_id','=',$job_type_id)->lang()->active()->first();
                @endphp
                @if(null !== $jobType)
                @php
                $checked = (in_array($jobType->job_type_id, Request::get('job_type_id', array())))? 'checked="checked"':'';
                @endphp
                <li>
                    <input type="checkbox" name="job_type_id[]" id="job_type_{{$jobType->job_type_id}}" value="{{$jobType->job_type_id}}" {{$checked}}>
                    <label for="job_type_{{$jobType->job_type_id}}"></label>
                    {{$jobType->job_type}} <!-- <span>{{App\Job::countNumJobs('job_type_id', $jobType->job_type_id)}}</span> --> </li>
                @endif
                @endforeach
                @endif
            </ul>
            <span class="text text-primary view_more hide_vm">{{__('View More')}}</span> </div>
        <!-- Jobs By Job Type end --> 

        <!-- Jobs By Job Shift -->
        <div class="widget">
            <h4 class="widget-title">{{__('Job Shift')}}</h4>
            <ul class="optionlist view_more_ul">
                @if(isset($jobShiftIdsArray) && count($jobShiftIdsArray))
                @foreach($jobShiftIdsArray as $key=>$job_shift_id)
                @php
                $jobShift = App\JobShift::where('job_shift_id','=',$job_shift_id)->lang()->active()->first();
                @endphp
                @if(null !== $jobShift)
                @php
                $checked = (in_array($jobShift->job_shift_id, Request::get('job_shift_id', array())))? 'checked="checked"':'';
                @endphp
                <li>
                    <input type="checkbox" name="job_shift_id[]" id="job_shift_{{$jobShift->job_shift_id}}" value="{{$jobShift->job_shift_id}}" {{$checked}}>
                    <label for="job_shift_{{$jobShift->job_shift_id}}"></label>
                    {{$jobShift->job_shift}} <!-- <span>{{App\Job::countNumJobs('job_shift_id', $jobShift->job_shift_id)}}</span> --> </li>
                @endif
                @endforeach
                @endif
            </ul>
            <span class="text text-primary view_more hide_vm">{{__('View More')}}</span> </div>
        <!-- Jobs By Job Shift end --> 


        <!-- Jobs By Degree Level -->
        <div class="widget">
            <h4 class="widget-title">{{__('Jobs By Degree Level')}}</h4>
            <ul class="optionlist view_more_ul">
                @if(isset($degreeLevelIdsArray) && count($degreeLevelIdsArray))
                @foreach($degreeLevelIdsArray as $key=>$degree_level_id)
                @php
                $degreeLevel = App\DegreeLevel::where('degree_level_id','=',$degree_level_id)->lang()->active()->first();
                @endphp
                @if(null !== $degreeLevel)
                @php
                $checked = (in_array($degreeLevel->degree_level_id, Request::get('degree_level_id', array())))? 'checked="checked"':'';
                @endphp
                <li>
                    <input type="checkbox" name="degree_level_id[]" id="degree_level_{{$degreeLevel->degree_level_id}}" value="{{$degreeLevel->degree_level_id}}" {{$checked}}>
                    <label for="degree_level_{{$degreeLevel->degree_level_id}}"></label>
                    {{$degreeLevel->degree_level}} <!-- <span>{{App\Job::countNumJobs('degree_level_id', $degreeLevel->degree_level_id)}}</span> --> </li>
                @endif
                @endforeach
                @endif
            </ul>
            <span class="text text-primary view_more hide_vm">{{__('View More')}}</span> </div>
        <!-- Jobs By Degree Level end --> 


        <!-- Jobs By Industry -->
        <div class="widget">
            <h4 class="widget-title">{{__('Jobs By Industry')}}</h4>
            <ul class="optionlist view_more_ul">
                @if(isset($industryIdsArray) && count($industryIdsArray))
                @foreach($industryIdsArray as $key=>$industry_id)
                @php
                $industry = App\Industry::where('id','=',$industry_id)->lang()->active()->first();
                @endphp
                @if(null !== $industry)
                @php
                $checked = (in_array($industry->id, Request::get('industry_id', array())))? 'checked="checked"':'';
                @endphp
                <li>
                    <input type="checkbox" name="industry_id[]" id="industry_{{$industry->id}}" value="{{$industry->id}}" {{$checked}}>
                    <label for="industry_{{$industry->id}}"></label>
                    {{$industry->industry}} <!-- <span>{{App\Job::countNumJobs('industry_id', $industry->id)}}</span> --> </li>
                @endif
                @endforeach
                @endif
            </ul>
            <span class="text text-primary view_more hide_vm">{{__('View More')}}</span> </div>
        <!-- Jobs By Industry end --> 

        <!-- Jobs By Skill -->
        <div class="widget">
            <h4 class="widget-title">{{__('Jobs By Skill')}}</h4>
            <ul class="optionlist view_more_ul">
                @if(isset($skillIdsArray) && count($skillIdsArray))
                @foreach($skillIdsArray as $key=>$job_skill_id)
                @php
                $jobSkill = App\JobSkill::where('job_skill_id','=',$job_skill_id)->lang()->active()->first();
                @endphp
                @if(null !== $jobSkill)

                @php
                $checked = (in_array($jobSkill->job_skill_id, Request::get('job_skill_id', array())))? 'checked="checked"':'';
                @endphp
                <li>
                    <input type="checkbox" name="job_skill_id[]" id="job_skill_{{$jobSkill->job_skill_id}}" value="{{$jobSkill->job_skill_id}}" {{$checked}}>
                    <label for="job_skill_{{$jobSkill->job_skill_id}}"></label>
                    {{$jobSkill->job_skill}} <!-- <span>{{App\Job::countNumJobs('job_skill_id', $jobSkill->job_skill_id)}}</span> --> </li>
                @endif
                @endforeach
                @endif
            </ul>
            <span class="text text-primary view_more hide_vm">{{__('View More')}}</span> </div>
        <!-- Jobs By Industry end --> 


        <div class="widget">
            <h4 class="widget-title">{{__('Jobs By Functional Areas')}}</h4>
            <ul class="optionlist view_more_ul">
                @if(isset($functionalAreaIdsArray) && count($functionalAreaIdsArray))
                @foreach($functionalAreaIdsArray as $key=>$functional_area_id)
                @php
                $functionalArea = App\FunctionalArea::where('functional_area_id','=',$functional_area_id)->lang()->active()->first();
                @endphp
                @if(null !== $functionalArea)
                @php
                $checked = (in_array($functionalArea->functional_area_id, Request::get('functional_area_id', array())))? 'checked="checked"':'';
                @endphp
                <li>
                    <input type="checkbox" name="functional_area_id[]" id="functional_area_id_{{$functionalArea->functional_area_id}}" value="{{$functionalArea->functional_area_id}}" {{$checked}}>
                    <label for="functional_area_id_{{$functionalArea->functional_area_id}}"></label>
                    {{$functionalArea->functional_area}} <!-- <span>{{App\Job::countNumJobs('functional_area_id', $functionalArea->functional_area_id)}}</span> -->
                </li>                
                @endif
                @endforeach
                @endif

            </ul>
            <!-- title end --> 
            <span class="text text-primary view_more hide_vm">{{__('View More')}}</span> </div>


        <!-- Top Companies -->
        <div class="widget">
            <h4 class="widget-title">{{__('Jobs By Company')}}</h4>
            <ul class="optionlist view_more_ul">
                @if(isset($companyIdsArray) && count($companyIdsArray))
                @foreach($companyIdsArray as $key=>$company_id)
                @php
                $company = App\Company::where('id','=',$company_id)->active()->first();
                @endphp
                @if(null !== $company)
                @php
                $checked = (in_array($company->id, Request::get('company_id', array())))? 'checked="checked"':'';
                @endphp
                <li>
                    <input type="checkbox" name="company_id[]" id="company_{{$company->id}}" value="{{$company->id}}" {{$checked}}>
                    <label for="company_{{$company->id}}"></label>
                    {{$company->name}} <!-- <span>{{App\Job::countNumJobs('company_id', $company->id)}}</span>  -->
                </li>
                @endif
                @endforeach
                @endif
            </ul>
            <span class="text text-primary view_more hide_vm">{{__('View More')}}</span> </div>
        <!-- Top Companies end --> 

        <!-- Salary -->
        <div class="widget">
            <h4 class="widget-title">{{__('Salary Range')}}</h4>
            <div class="form-group">
                {!! Form::number('salary_from', Request::get('salary_from', null), array('class'=>'form-control', 'id'=>'salary_from', 'placeholder'=>__('Salary From'))) !!}
            </div>
            <div class="form-group">
                {!! Form::number('salary_to', Request::get('salary_to', null), array('class'=>'form-control', 'id'=>'salary_to', 'placeholder'=>__('Salary To'))) !!}
            </div>
            <div class="form-group">
                {!! Form::select('salary_currency', ['' =>__('Select Salary Currency')]+$currencies, Request::get('salary_currency'), array('class'=>'form-control', 'id'=>'salary_currency')) !!}
            </div>
            <!-- Salary end --> 

            <!-- button -->
            <div class="searchnt">
                <button type="submit" class="btn"><i class="fa fa-search" aria-hidden="true"></i> {{__('Search Jobs')}}</button>
            </div>
            <!-- button end--> 
        </div>
        <!-- Side Bar end --> 
    </div>
</div>