<div class="col-lg-3 col-md-3"> 
    <!-- Side Bar start -->
    <div class="sidebar">
         <!-- Jobs By Title -->
        {{-- <form action="" method="GET">
            <div class="widget">
                <h4 class="widget-title">{{__('Filter By Title')}}</h4>
                @foreach ($categories as $talent_category)
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
                                        @if (isset($categories) && count($categories))
                                            @if (count($categories) > 0)
                                                @foreach($talent_category['talent_list'] as $talent)
                                                    <li class="d-flex ">
                                                        @php
                                                            $checked = (in_array($talent['job_skill'], Request::get('job_skill', array()))) ? 'checked="checked"': ' ';
                                                        @endphp
                                                        <input type="checkbox" name="s[]" id="job_skill_{{$talent['job_skill_id']}}" value="{{$talent['job_skill'] }}" {{$checked}}>  
                                                        <label for="job_skill_{{$talent['job_skill_id']}}"></label>
                                                        {{$talent['job_skill']}}
                                                    </li>
                                                @endforeach
                                            @else
                                                <p class="text-muted">No results found</p>
                                            @endif
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach   
        
                <!-- title end --> 
                <span class="text text-primary view_more hide_vm">{{__('View More')}}</span> 
            </div>
                
            <div class="searchnt">
                <button type="submit" class="btn"><i class="fa fa-search" aria-hidden="true"></i> {{__('Search Skills')}}</button>
            </div>
        </form> --}}

        <div class="widget">
            <h4 class="widget-title">{{__('Filter By Title')}}</h4>
            @foreach ($categories as $talent_category)
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
                                    @if (isset($categories) && count($categories))
                                        @if (count($categories) > 0)
                                            @foreach($talent_category['talent_list'] as $talent)
                                                <li>
                                                    {{-- @php
                                                        $checked = (in_array($talent['job_skill'], Request::get('job_skill', array()))) ? 'checked="checked"': ' ';
                                                    @endphp
                                                    <input type="checkbox" name="s[]" id="job_skill_{{$talent['job_skill_id']}}" value="{{$talent['job_skill'] }}" {{$checked}}>
                                                    <label for="job_skill_{{$talent['job_skill_id']}}"></label>
                                                    {{$talent['job_skill']}} --}}
                                                    <a 
                                                        class="sidebarLink"
                                                        {{-- style="text-decoration:none; color: #212529;" --}}
                                                        href="/talents/{{$talent['job_skill']}}"
                                                    >
                                                        {{$talent['job_skill'] }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        @else
                                            <p class="text-muted">No results found</p>
                                        @endif
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach   
    
            <!-- title end --> 
            <span class="text text-primary view_more hide_vm">{{__('View More')}}</span> 
        </div>

        {{-- <form action="" method="GET">
            <div class="widget">
                <h4 class="widget-title">{{__('Filter By Title')}}</h4>
                @foreach ($categories as $talent_category)
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
                                        @if (isset($categories) && count($categories))
                                            @if (count($categories) > 0)
                                                @foreach($talent_category['talent_list'] as $talent)
                                                    <li class="d-flex ">
                                                        @php
                                                            $checked = (in_array($talent['job_skill_id'], Request::get('job_skill_id', array()))) ? 'checked="checked"': '';
                                                        @endphp
                                                        <input type="checkbox" name="job_skill_id[]" id="job_skill_{{$talent['job_skill_id']}}" value="{{$talent['job_skill_id']}}" {{$checked}}>  
                                                        <label for="job_skill_{{$talent['job_skill_id']}}"></label>
                                                        {{$talent['job_skill']}}
                                                    </li>
                                                @endforeach
                                            @else
                                                <p class="text-muted">No results found</p>
                                            @endif
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach   
        
                <!-- title end --> 
                <span class="text text-primary view_more hide_vm">{{__('View More')}}</span> 
            </div>
                
            <div class="searchnt">
                <button type="submit" class="btn"><i class="fa fa-search" aria-hidden="true"></i> {{__('Search Skills')}}</button>
            </div>
        </form> --}}

        {{-- <form action="" method="GET">
            <!-- Filter By Skill -->
            <div class="widget">
                <h4 class="widget-title">{{__('Jobs By Skill')}}</h4>
                <ul class="optionlist view_more_ul">
                    @if(isset($job_skills) && count($job_skills))
                    @if (count($job_skills) > 0)
                        @foreach($job_skills as $job_skill)

                            @php
                                $checked = (in_array($job_skill->job_skill_id, Request::get('job_skill_id', array())))? 'checked="checked"':'';
                            @endphp
                            <li>
                                <input type="checkbox" name="job_skill_id[]" id="job_skill_{{$job_skill->job_skill_id}}" value="{{$job_skill->job_skill_id}}" {{ $checked }}>
                                <label for="job_skill_{{$job_skill->job_skill_id}}"></label>
                                {{$job_skill->job_skill}} <!-- <span>{{App\Job::countNumJobs('job_skill_id', $job_skill->job_skill_id)}}</span> --> 
                            </li>
                        
                        @endforeach
                    @else
                        <p class="text-muted">No results found</p>
                    @endif  @endif
                </ul>
                <span class="text text-primary view_more hide_vm">{{__('View More')}}</span> 
            </div>
            <!-- Jobs By Skill end --> 

                <!-- button -->
                <div class="searchnt">
                    <button type="submit" class="btn"><i class="fa fa-search" aria-hidden="true"></i> {{__('Search Skills')}}</button>
                </div>
                <!-- button end--> 
            <!-- Side Bar end --> 
        </form> --}}
   
        {{-- <form action="" method="GET">
            <!-- Filter By Skill -->
            <div class="widget">
                <h4 class="widget-title">{{__('Jobs By Skill')}}</h4>
                <ul class="optionlist view_more_ul">
                    @if(isset($job_skills) && count($job_skills))
                    @if (count($job_skills) > 0)
                        @foreach($job_skills as $job_skill)

                            @php
                                $checked = (in_array($job_skill->job_skill_id, Request::get('job_skill_id', array())))? 'checked="checked"':'';
                            @endphp
                            <li>
                                <input type="checkbox" name="job_skill_id[]" id="job_skill_{{$job_skill->job_skill_id}}" value="{{$job_skill->job_skill_id}}" {{ $checked }}>
                                <label for="job_skill_{{$job_skill->job_skill_id}}"></label>
                                {{$job_skill->job_skill}} <!-- <span>{{App\Job::countNumJobs('job_skill_id', $job_skill->job_skill_id)}}</span> --> 
                            </li>
                        
                        @endforeach
                    @else
                        <p class="text-muted">No results found</p>
                    @endif  @endif
                </ul>
                <span class="text text-primary view_more hide_vm">{{__('View More')}}</span> 
            </div>
            <!-- Jobs By Skill end --> 

                <!-- button -->
                <div class="searchnt">
                    <button type="submit" class="btn"><i class="fa fa-search" aria-hidden="true"></i> {{__('Search Skills')}}</button>
                </div>
                <!-- button end--> 
            <!-- Side Bar end --> 
        </form> --}}
    </div>
</div>