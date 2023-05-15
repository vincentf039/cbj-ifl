<div class=" border radius-5">
    <div class="section">
        <div class="container">
            <div class="">
                <h3>Jobs you might like</h3>
                <div class="topsearchwrap">
                    <div class="tabswrap">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item"><a data-toggle="tab" href="#bestMatches" class="nav-link active" aria-expanded="true">{{__('Best Matches')}}</a></li>
                                    <li class="nav-item"><a data-toggle="tab" href="#mostRecent" class="nav-link" aria-expanded="false">{{__('Most Recent')}}</a></li>
                                    <li class="nav-item">
                                        <a data-toggle="tab" href="#savedJobs" class="nav-link" aria-expanded="false">
                                            {{__('Saved Jobs')}}
                                            @if ($savedJobs->total() != 0)
                                                ({{$savedJobs->total()}})
                                            @endif
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                        
                    <div class="tab-content" id="jobsby">
                        <!-----------------------------------------
                                        BEST MATCHES
                        ------------------------------------------>
                        <div class="tab-pane fade show active" id="bestMatches" role="tabpanel" aria-labelledby="bestMatches-tab">
                            <!--Categories start-->
                            @if ($matchingJobs->isEmpty())
                                <div class="text-center my-5">
                                    <p class="text-muted">No jobs that matches your expertise <br> try again after sometime </p>
                                </div>
                            @else
                                <div class="jobslist newjbox row">
                                    <p class="px-4">Search for positions that match the hiring criteria of a client with your experience. ordered by most pertinent first.</p>
                                    @if(isset($matchingJobs) && count($matchingJobs))
                                        @foreach($matchingJobs as $matchingJob)
                                            <?php $company = $matchingJob->getCompany(); ?>
                                            @if(null !== $company)
                                                <!--Job start-->
                                                    <div class="jobint p-4 border-bottom hover-highlight w-100" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"> 
                                                        <div class="jobs-title py-2 d-flex justify-content-between align-items-center">
                                                            <h4 style="border-bottom: none">
                                                                {{-- <a href="{{route('job.detail', [$matchingJob->slug])}}" title="{{$matchingJob->title}}">{{$matchingJob->title}}</a> --}}
                                                                <a href="{{route('job.detail', [$matchingJob->slug])}}" id="{{$matchingJob->title}}" class="viewDetails" title="{{$matchingJob->title}}">{{$matchingJob->title}}</a>
                                                            </h4>
                                                            <div class="upvote-btn mr-5">
                                                                <button class="dislike" data-bs-toggle="tooltip" title="Dislike"><span><i class="fa-regular fa-thumbs-down"></i></span></button>
                                                                @if(Auth::check() && Auth::user()->isFavouriteJob($matchingJob->slug))
                                                                    <a href="{{route('remove.job', $matchingJob->slug)}}"  role="button" class="liked" data-bs-toggle="tooltip" title="Remove from saved">
                                                                        <span><i class="fa-solid fa-heart"></i></span>
                                                                    </a> 
                                                                @else 
                                                                    <a href="{{route('save.job', $matchingJob->slug)}}" role="button" class="like" data-bs-toggle="tooltip" title="Save job">
                                                                        <span><i class="fa-regular fa-heart"></i></span>
                                                                    </a> 
                                                                @endif
                                                                
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="description my-3">
                                                            <p class="desk-desc text-muted">Fixed-price - Expert - Est. Budget: $150 - Posted 11 hours ago</p>

                                                            <div class="mobile-description">
                                                                <div><span class="text-muted mb-3">Fixed-price - Posted 11 hours ago</span></div>
                                                                <div class="d-flex justify-content-between">
                                                                    <div>$150 <span class="text-muted mt-2">Budget</span></div>
                                                                    <div>Expert Level<span class="text-muted mt-2">Experience Level</span></div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- description --}}
                                                        <div class="jobDescription">
                                                            <p class="paraphrase" style="line-height:1.5">{{$matchingJob->description}}</p>
                                                            
                                                            <div class="show-more">
                                                                <span class="underline">show more</span>
                                                            </div>
                                                        </div>

                                                        <div class="jobloc mt-2">
                                                            <label class="fulltime" title="{{$matchingJob->getJobType('job_type')}}">{{$matchingJob->getJobType('job_type')}}</label>
                                                        </div>

                                                        {{-- tags --}}
                                                        <div class="my-2">
                                                            @php
                                                                $matchingJobTags = explode(",", $matchingJob->tags);
                                                            @endphp
                                                            <div class="jobTags">
                                                                <div class="tags">
                                                                    @if(!empty($matchingJob->tags))
                                                                        @foreach ($matchingJobTags as $tag)
                                                                            <a href="#" class="tag">{{ $tag }}</a>
                                                                        @endforeach
                                                                    @else
                                                                        <p class="text-muted">No tags available!</p>
                                                                    @endif
                                                                </div>
                                                                
                                                                <button class="prev text-muted"><span><i class="bi bi-caret-left"></i></span></button>
                                                                <button class="next text-muted"><span><i class="bi bi-caret-right"></i></span></button>
                                                            </div>
                                                        </div>

                                                        {{-- proposals --}}
                                                        <div>
                                                            <p><span class="text-muted">Proposals:</span><span>50+</span></p>
                                                        </div>

                                                        {{-- payment verification and location --}}
                                                        <div>
                                                            <div class="sjcpvr">
                                                                <span class="payVerified"><i class="bi bi-patch-check-fill"></i></span>
                                                                <span class="text-muted">Payment Verified</span>
                                                                <span class="rating">
                                                                    <i class="fa-solid fa-star"></i>
                                                                    <i class="fa-solid fa-star"></i>
                                                                    <i class="fa-solid fa-star"></i>
                                                                    <i class="fa-solid fa-star"></i>
                                                                    <i class="fa-solid fa-star"></i>
                                                                </span>
                                                            </div>
                                                            <div class="sjcts">
                                                                <span>6k+ </span>
                                                                <span class="text-muted">spent</span>
                                                            </div>
                                                            <div class="sjcloc">
                                                                <span class="text-muted"><i class="fa-solid fa-location-dot"></i></span>
                                                                <span class="text-muted">{{$matchingJob->getCity('city')}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <!--Job end--> 
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            @endif

                            @if ($matchingJobs->total() > 19)
                                <!-- Pagination Start -->
                                <div class="pagiWrap mt-5">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="showreslt">
                                                {{__('Showing Pages')}} : {{ $matchingJobs->firstItem() }} - {{ $matchingJobs->lastItem() }} {{__('Total')}} {{ $matchingJobs->total() }}
                                            </div>
                                        </div>
                                        <div class="col-md-7 text-right">
                                            @if(isset($matchingJobs) && count($matchingJobs))
                                            {{ $matchingJobs->appends(request()->query())->links() }}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- Pagination end --> 
                            @endif

                            <!--view button-->
                            <div class="viewallbtn"><a href="{{route('job.list')}}">{{__('View All Latest Jobs')}}</a></div>
                            <!--view button end--> 
                            <!--Categories end-->
                        </div>
                        
                        <!-----------------------------------------
                                        MOST RECENT
                        ------------------------------------------>
                        <div class="tab-pane fade show" id="mostRecent" role="tabpanel" aria-labelledby="mostRecent-tab">
                            <!--mostRecent start-->
                            @if ($latestJobs->isEmpty())
                                <div class="text-center my-5">
                                    <p class="text-muted">No jobs available for the moment <br> try again after sometime </p>
                                </div>
                            @else
                                <div class="jobslist newjbox row">
                                    <p class="px-4">Search for positions that match the hiring criteria of a client with your experience. ordered by most pertinent first.</p>
                                    @if(isset($latestJobs) && count($latestJobs))
                                        @foreach($latestJobs as $latestJob)
                                            <?php $company = $latestJob->getCompany(); ?>
                                            @if(null !== $company)
                                                <!--Job start-->
                                            
                                                    <div class="jobint p-3 border-bottom hover-highlight w-100" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"> 
                                                        
                                                        <div class="jobs-title py-2 d-flex justify-content-between align-items-center">
                                                            <h4 style="border-bottom: none">
                                                                <a href="{{route('job.detail', [$latestJob->slug])}}" class="viewDetails" title="{{$latestJob->title}}">{{$latestJob->title}}</a>
                                                            </h4>
                                                            <div class="upvote-btn mr-5">
                                                                <button class="dislike" data-bs-toggle="tooltip" title="Dislike"><span><i class="fa-regular fa-thumbs-down"></i></span></button>
                                                                @if(Auth::check() && Auth::user()->isFavouriteJob($latestJob->slug))
                                                                    <a href="{{route('remove.job', $latestJob->slug)}}"  role="button" class="liked" data-bs-toggle="tooltip" title="Remove from saved">
                                                                        <span><i class="fa-solid fa-heart"></i></span>
                                                                    </a> 
                                                                @else 
                                                                    <a href="{{route('save.job', $latestJob->slug)}}" role="button" class="like" data-bs-toggle="tooltip" title="Save job">
                                                                        <span><i class="fa-regular fa-heart"></i></span>
                                                                    </a> 
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="description my-3">
                                                            {{-- {{$company->name}} - <span>{{$latestJob->getCity('city')}}</span> --}}
                                                            <p class="desk-desc text-muted">Fixed-price - Expert - Est. Budget: $150 - Posted 11 hours ago</p>

                                                            <div class="mobile-description">
                                                                <div><span class="text-muted mb-3">Fixed-price - Posted 11 hours ago</span></div>
                                                                <div class="d-flex justify-content-between">
                                                                    <div>$150 <span class="text-muted mt-2">Budget</span></div>
                                                                    <div>Expert Level<span class="text-muted mt-2">Experience Level</span></div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- description --}}
                                                        <div class="jobDescription">
                                                            <p class="paraphrase" style="line-height:1.5">{{$latestJob->description}}</p>
                                                            
                                                            <div class="show-more">
                                                                <span class="underline">show more</span>
                                                            </div>
                                                        </div>

                                                        <div class="jobloc mt-2">
                                                            <label class="fulltime" title="{{$latestJob->getJobType('job_type')}}">{{$latestJob->getJobType('job_type')}}</label>
                                                        </div>

                                                        {{-- tags --}}
                                                        <div class="my-2">
                                                            @php
                                                                $latestJobTags = explode(",", $latestJob->tags);
                                                            @endphp
                                                            <div class="jobTags">
                                                                <div class="tags">
                                                                    @if(!empty($latestJob->tags))
                                                                        @foreach ($latestJobTags as $tag)
                                                                            <a href="#" class="tag">{{ $tag }}</a>
                                                                        @endforeach
                                                                    @else
                                                                        <p class="text-muted">No tags available!</p>
                                                                    @endif
                                                                </div>
                                                                
                                                                <button class="prev text-muted"><span><i class="bi bi-caret-left"></i></span></button>
                                                                <button class="next text-muted"><span><i class="bi bi-caret-right"></i></span></button>
                                                            </div>
                                                        </div>

                                                        {{-- proposals --}}
                                                        <div>
                                                            <p><span class="text-muted">Proposals:</span><span>50+</span></p>
                                                        </div>

                                                        {{-- payment verification and location --}}
                                                        <div>
                                                            <div class="sjcpvr">
                                                                <span class="payVerified"><i class="bi bi-patch-check-fill"></i></span>
                                                                <span class="text-muted">Payment Verified</span>
                                                                <span class="rating">
                                                                    <i class="fa-solid fa-star"></i>
                                                                    <i class="fa-solid fa-star"></i>
                                                                    <i class="fa-solid fa-star"></i>
                                                                    <i class="fa-solid fa-star"></i>
                                                                    <i class="fa-solid fa-star"></i>
                                                                </span>
                                                            </div>
                                                            <div class="sjcts">
                                                                <span>6k+ </span>
                                                                <span class="text-muted">spent</span>
                                                            </div>
                                                            <div class="sjcloc">
                                                                <span class="text-muted"><i class="fa-solid fa-location-dot"></i></span>
                                                                <span class="text-muted">{{$latestJob->getCity('city')}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <!--Job end--> 
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            @endif
                            <!--mostRecent end-->

                            @if ($latestJobs->total() > 19)
                                <!-- Pagination Start -->
                                <div class="pagiWrap mt-5">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="showreslt">
                                                {{__('Showing Pages')}} : {{ $latestJobs->firstItem() }} - {{ $latestJobs->lastItem() }} {{__('Total')}} {{ $latestJobs->total() }}
                                            </div>
                                        </div>
                                        <div class="col-md-7 text-right">
                                            @if(isset($latestJobs) && count($latestJobs))
                                            {{ $latestJobs->appends(request()->query())->links() }}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- Pagination end --> 
                            @endif

                            <!--view button-->
                            <div class="viewallbtn"><a href="{{route('job.list')}}">{{__('View All Latest Jobs')}}</a></div>
                            <!--view button end--> 

                        </div>
                        
                        <!-----------------------------------------
                                        SAVED JOBS
                        ------------------------------------------>
                        <div class="tab-pane fade show" id="savedJobs" role="tabpanel" aria-labelledby="savedJobs-tab">
                            <!--Categories start-->
                            @if (count($savedJobs) == 0)
                                <div class="text-center my-5">
                                    <p class="text-muted">No saved jobs</p>
                                </div>
                            @else
                                <div class="jobslist newjbox row">
                                    <p class="px-4">Search for positions that match the hiring criteria of a client with your experience. ordered by most pertinent first.</p>
                                    @if(isset($savedJobs) && count($savedJobs))
                                        @foreach($savedJobs as $savedJob)
                                            <?php $company = $savedJob->getCompany(); ?>
                                            @if(null !== $company)
                                                <!--Job start-->
                                                    <div class="jobint p-4 border-bottom hover-highlight w-100" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" style="position: relative"> 
                                                        <div class="jobs-title py-2 d-flex justify-content-between align-items-center">
                                                            <h4 style="border-bottom: none">
                                                                <a href="{{route('job.detail', [$savedJob->slug])}}" class="viewDetails" title="{{$savedJob->title}}">{{$savedJob->title}}</a>
                                                            </h4>
                                                            <div class="upvote-btn mr-5">
                                                                <button class="dislike" data-bs-toggle="tooltip" title="Dislike"><span><i class="fa-regular fa-thumbs-down"></i></span></button>
                                                                @if(Auth::check() && Auth::user()->isFavouriteJob($savedJob->slug))
                                                                    <a href="{{route('remove.job', $savedJob->slug)}}"  role="button" class="liked" data-bs-toggle="tooltip" title="Remove from saved">
                                                                        <span><i class="fa-solid fa-heart"></i></span>
                                                                    </a> 
                                                                @else 
                                                                    <a href="{{route('save.job', $savedJob->slug)}}" role="button" class="like" data-bs-toggle="tooltip" title="Save job">
                                                                        <span><i class="fa-regular fa-heart"></i></span>
                                                                    </a> 
                                                                @endif
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="description my-3">
                                                            <p class="desk-desc text-muted">Fixed-price - Expert - Est. Budget: $150 - Posted 11 hours ago</p>

                                                            <div class="mobile-description">
                                                                <div><span class="text-muted mb-3">Fixed-price - Posted 11 hours ago</span></div>
                                                                <div class="d-flex justify-content-between">
                                                                    <div>$150 <span class="text-muted mt-2">Budget</span></div>
                                                                    <div>Expert Level<span class="text-muted mt-2">Experience Level</span></div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- description --}}
                                                        <div class="jobDescription">
                                                            <p class="paraphrase" style="line-height:1.5">{{$savedJob->description}}</p>
                                                            
                                                            <div class="show-more">
                                                                <span class="underline">show more</span>
                                                            </div>
                                                        </div>

                                                        <div class="jobloc mt-2">
                                                            <label class="fulltime" title="{{$savedJob->getJobType('job_type')}}">{{$savedJob->getJobType('job_type')}}</label>
                                                        </div>

                                                        {{-- tags --}}
                                                        <div class="my-2">
                                                            @php
                                                                $savedJobTags = explode(",", $savedJob->tags);
                                                            @endphp
                                                            <div class="jobTags">
                                                                <div class="tags">
                                                                    @if(!empty($savedJob->tags))
                                                                        @foreach ($savedJobTags as $tag)
                                                                            <a href="#" class="tag">{{ $tag }}</a>
                                                                        @endforeach
                                                                    @else
                                                                        <p class="text-muted">No tags available!</p>
                                                                    @endif
                                                                </div>
                                                                
                                                                <button class="prev text-muted"><span><i class="bi bi-caret-left"></i></span></button>
                                                                <button class="next text-muted"><span><i class="bi bi-caret-right"></i></span></button>
                                                            </div>
                                                        </div>

                                                        {{-- proposals --}}
                                                        <div>
                                                            <p><span class="text-muted">Proposals:</span><span>50+</span></p>
                                                        </div>

                                                        {{-- payment verification and location --}}
                                                        <div>
                                                            <div class="sjcpvr">
                                                                <span class="payVerified"><i class="bi bi-patch-check-fill"></i></span>
                                                                <span class="text-muted">Payment Verified</span>
                                                                <span class="rating">
                                                                    <i class="fa-solid fa-star"></i>
                                                                    <i class="fa-solid fa-star"></i>
                                                                    <i class="fa-solid fa-star"></i>
                                                                    <i class="fa-solid fa-star"></i>
                                                                    <i class="fa-solid fa-star"></i>
                                                                </span>
                                                            </div>
                                                            <div class="sjcts">
                                                                <span>6k+ </span>
                                                                <span class="text-muted">spent</span>
                                                            </div>
                                                            <div class="sjcloc">
                                                                <span class="text-muted"><i class="fa-solid fa-location-dot"></i></span>
                                                                <span class="text-muted">{{$savedJob->getCity('city')}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <!--Job end--> 
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            @endif

                            @if ($savedJobs->total() > 9)
                                <!-- Pagination Start -->
                                <div class="pagiWrap mt-5">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="showreslt">
                                                {{__('Showing Pages')}} : {{ $savedJobs->firstItem() }} - {{ $savedJobs->lastItem() }} {{__('Total')}} {{ $savedJobs->total() }}
                                            </div>
                                        </div>
                                        <div class="col-md-7 text-right">
                                            @if(isset($savedJobs) && count($savedJobs))
                                            {{ $savedJobs->appends(request()->query())->links() }}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- Pagination end --> 
                            @endif

                            <!--view button-->
                            <div class="viewallbtn"><a href="{{route('job.list')}}">{{__('View All Latest Jobs')}}</a></div>
                            <!--view button end--> 
                            <!--Categories end-->
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@push('styles')
    <style>
        .paraphrase {
            white-space: nowrap; 
            width: 100%;
            overflow: hidden;
            text-overflow: ellipsis;
            transition: all ease-in-out 0.5s;
        }
        .sjcpvr .rating, .desk-desc {
            display: none;
        }
        .sjcpvr, .sjcts, .sjcloc {
                margin: 0 5px 5px 0;
        }
        .mobile-description, .mobile-description span {
            display: block;
        }
        @media screen and (min-width: 426px){
            .sjcpvr, .sjcts, .sjcloc {
                display: inline-block;
            }
            .desk-desc {
                display: block
            }
            .mobile-description {
                display: none;
            }
            .sjcpvr .rating {
                display: inline-block;
            }
        }
        @media screen and (max-width: 320px) {
            .jobs-title h4{
                padding: 0;
            }
        }
        .tags {
            white-space: nowrap;
            overflow-x: hidden;
            width: 100%
        }

        .tags a{ text-decoration: none; } 

        .tag {
            background: #eee;
            border-radius: 3px 0 0 3px;
            color: #999;
            display: inline-block;
            height: 25px;
            line-height: 26px;
            padding: 0 20px 0 23px;
            position: relative;
            margin: 0 10px 10px 0;
            text-decoration: none;
            -webkit-transition: color 0.2s;
            transition: color 0.2s;
        }

        .tag::before {
            background: #fff;
            border-radius: 10px;
            box-shadow: inset 0 1px rgba(0, 0, 0, 0.25);
            content: '';
            height: 6px;
            left: 10px;
            position: absolute;
            width: 6px;
            top: 10px;
        }

        .tag::after {
            background: #fff;
            border-bottom: 13px solid transparent;
            border-left: 10px solid #eee;
            border-top: 13px solid transparent;
            content: '';
            position: absolute;
            right: 0;
            top: 0;
        }

        .tag:hover {
            background-color: #005ea6;
            color: white;
        }

        .tag:hover::after {
            border-left-color: #005ea6; 
        }
    </style>
@endpush

@push('scripts')
@include('includes.immediate_available_btn')
    <script>
        (function ($){
            /************************************************
             *      For viewing details in offcanvas
            ************************************************/
                $(document).on('click', '.viewDetails', function (e) {
                    e.preventDefault();
                    $('#overlay').css({"width":"100%"});
                    if($('body').width() <= 425){
                        $('.offcanvas').css({"display":"block","width":"100%"});
                    } else {
                        $('.offcanvas').css({"display":"block","width":"70%"});
                    }
                });

                $(document).on('click', '#overlay', function () {
                    $('#overlay').css({"width":"0"});
                    $('.offcanvas').animate({width:"0"}, function () {$(this).css("display", "none");});
                    $("body").removeClass('offcanvas-active');
                });

            /************************************************/

            /************************************************
             *      For Description to Show More or Less
            ************************************************/
                // let $paragraph = $('.jobDescription .paraphrase');
                // $paragraph.each(function () {
                //     let text = $(this).text();
                //     if(text.length <= 149){
                //         $(this).closest('.jobDescription').find('.show-more').hide()
                //         console.log();
                //     } else {
                //         let firstPart = text.substring(0,210);
                //         let secondPart = text.substring(210);
                //         $(this).text(firstPart);
                //         $("<span class='readMore'>"+ secondPart +"</span>").appendTo($(this));
                //         $('.show-more').show();
                //     }
                // });

                let $paragraph = $('.jobDescription .paraphrase');
                $paragraph.each(function () {
                    let text = $(this).text();
                    if(text.length <= 210){
                        $(this).siblings().find("span").hide()
                    }
                });

                $(document).on('click', '.show-more', function(){
                    if($(this).find("span").text() == "show more"){
                        $(this).prev().css({"text-overflow":"unset", "overflow":"unset", "white-space":"normal"});
                    } else {
                        $(this).prev().css({"text-overflow":"ellipsis", "overflow":"hidden", "white-space":"nowrap"});
                    }
                    $(this).find("span").text($(this).find("span").text() == "show more" ? "show less" : "show more");
                });

                // $(document).on('click', '.show-more', function(){
                //     $paragraph = $(this).prev().find('.readMore').slideToggle();
                //     console.log($paragraph.text());
                //     $(this).find("span").text($(this).find("span").text() == "show more" ? "show less" : "show more");
                    
                // });

            /************************************************/

            /************************************************
             *                 For Tags Arrow
            ************************************************/
                const jobTags = $('.jobTags').find('.tags');
                const prev = $('.prev');
                const next = $('.next');

                next.hide();
                
                if(jobTags.scrollLeft() <= 0){
                    prev.hide();
                }

                jobTags.each(function (index) {
                        const maxScrollLeft = $(this).get(0).scrollWidth - $(this).get(0).clientWidth;
                        if(maxScrollLeft > 0){
                            $(this).closest('.jobTags').find('.next').show();
                        }
                });
                
                $('.nav-link').click(function (e) {
                    jobTags.each(function (index) {
                        const maxScrollLeft = $(this).get(0).scrollWidth - $(this).get(0).clientWidth;
                        // console.log(index + ': ' + $(this).get(0).clientWidth);
                        if(maxScrollLeft > 0){
                            $(this).closest('.jobTags').find('.next').show();
                        }
                    });
                });

            
                $(document).on('click', '.prev', function(e) {
                    e.preventDefault();
                    const prev = $(this).closest('.jobTags').find('.prev');
                    const next = $(this).closest('.jobTags').find('.next');
                    $(this).closest('.jobTags').find('.tags').animate({scrollLeft: "-=100px"}, "slow");
                    const jobTags = $(this).closest('.jobTags').find('.tags');
                    
                    if(jobTags.scrollLeft() <= 100){
                        prev.hide();
                    }
                    
                    next.show();
                });
            
                $(document).on('click', '.next', function(e) {
                    e.preventDefault();
                    const prev = $(this).closest('.jobTags').find('.prev');
                    const next = $(this).closest('.jobTags').find('.next');
                    $(this).closest('.jobTags').find('.tags').animate({scrollLeft: "+=100px"}, "slow");
                    const jobTags = $(this).closest('.jobTags').find('.tags');
                    const maxScrollLeft = jobTags.get(0).scrollWidth - jobTags.get(0).clientWidth;
                    
                    if(jobTags.scrollLeft() >= maxScrollLeft-100){
                        next.hide();
                    }
                    
                    prev.show();
                    
                });

            /************************************************/

            /************************************************
             *                   For Tooltips
            ************************************************/
                const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
                const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

            /************************************************/

        })(jQuery);
    </script>
@endpush