<!-- featured jobs starts -->
<section id="featured-jobs">
    <div class="container">
        <div class="section-title py-5">
            <h2 class="title">{{__('Featured Jobs')}}</h2>
            <a href="{{route('job.list', ['is_featured'=>1])}}" class="browse-all">{{__('Browse All Jobs ')}}<span><i class="fa-solid fa-arrow-right"></i></span></a>
        </div>
    </div>
    <div class="container">
        <ul class="card hos">
            @if(isset($featuredJobs) && count($featuredJobs))
                @foreach($featuredJobs as $featuredJob)
                    <?php $company = $featuredJob->getCompany(); ?>
                    @if(null !== $company)
                        <div>
                            <li class="card-list hos">
                                <div class="featured-jobs">
                                    <a href="{{route('job.detail', [$featuredJob->slug])}}" class="clcl" title="{{$featuredJob->title}}">
                                        <div class="card-list-image">
                                            {{$company->printCompanyImage()}}
                                        </div>
                                        <div class="card-list-body">
                                            <div class="card-list-title"><h3>{{$featuredJob->title}}</h3></div>
                                            <div class="card-list-details">
                                                <ul>
                                                    <li>
                                                        <i class="fa-solid fa-building"></i>
                                                        {{$company->name}} 
                                                        <span><i class="fa-solid fa-circle-check"></i></span>
                                                    </li>
                                                    <li>
                                                        <i class="fa-solid fa-location-dot"></i>
                                                        {{$featuredJob->getCity('city')}}
                                                    </li>
                                                    <li>
                                                        <i class="fa-solid fa-briefcase"></i>
                                                        {{$featuredJob->getJobType('job_type')}}
                                                    </li>
                                                    <li>
                                                        <i class="fa-solid fa-clock"></i>
                                                        2 days ago 
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-list-button">
                                            <button href="{{route('job.detail', [$featuredJob->slug])}}" ><span>{{__('View Detail')}}</span></button>
                                        </div>
                                    </a>
                                </div>
                            </li>
                        </div>
                    @endif
                @endforeach
            @endif
        </ul>
    </div>
</section>
<!-- featured jobs ends -->