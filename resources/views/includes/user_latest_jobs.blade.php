<div class=" border radius-5">

	<div class="p-4 border-bottom"><h3>Jobs you might like</h3></div>
		
        <div class="jobslist newjbox row">
			<p class="px-4">Search for positions that match the hiring criteria of a client with your experience. ordered by most pertinent first.</p>
            @if(isset($latestJobs) && count($latestJobs))
                @foreach($latestJobs as $latestJob)
                    <?php $company = $latestJob->getCompany(); ?>
                    @if(null !== $company)
                        <!--Job start-->
                       
                            <div class="jobint p-4 border-bottom hover-highlight"> 
                                
                                <h4 class="py-2"><a href="{{route('job.detail', [$latestJob->slug])}}" title="{{$latestJob->title}}">{{$latestJob->title}}</a></h4>
									<div class="description">{{$company->name}} - <span>{{$latestJob->getCity('city')}}</span></div>
                                <p class="" style="line-height:1.5">{{$latestJob->description}}</p>
                                 <div class="jobloc mt-2">
                                            <label class="fulltime" title="{{$latestJob->getJobType('job_type')}}">{{$latestJob->getJobType('job_type')}}</label>
                                </div>
                            </div>
							
                        <!--Job end--> 
                    @endif
                @endforeach
            @endif
            
        </div>
        <!--view button-->
        <div class="viewallbtn"><a href="{{route('job.list')}}">{{__('View All Latest Jobs')}}</a></div>
        <!--view button end--> 
</div>