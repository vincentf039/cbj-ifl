<div class="my-2">
    @php
        $latestJobTags = explode(",", $latestJob->tags);
    @endphp
    <div class="jobTags">

        {{-- <div class="tags">
            <a href="#" class="tag">html</a>
            <a href="#" class="tag">html</a>
            <a href="#" class="tag">html</a>
            <a href="#" class="tag">html</a>
            <a href="#" class="tag">html</a>
            <a href="#" class="tag">html</a>
            <a href="#" class="tag">html</a>
            <a href="#" class="tag">html</a>
            <a href="#" class="tag">html</a>
            <a href="#" class="tag">html</a>
            <a href="#" class="tag">html</a>
            <a href="#" class="tag">html</a>
            <a href="#" class="tag">html</a>
            <a href="#" class="tag">html</a>
            <a href="#" class="tag">html</a>
            <a href="#" class="tag">html</a>
            <a href="#" class="tag">html</a>
            <a href="#" class="tag">html</a>
        </div> --}}
        @if(!empty($latestJob->tags))
            <div class="tags">
                @foreach ($latestJobTags as $tag)
                    <a href="#" class="tag">{{ $tag }}</a>
                @endforeach
            </div>
        @else
            <p class="text-muted">No tags available!</p>
        @endif

        <button class="prev text-muted"><span><i class="bi bi-caret-left"></i></span></button>
        <button class="next text-muted"><span><i class="bi bi-caret-right"></i></span></button>
    </div>
</div>

@push('styles')
    <style>
        .jobTags{
            position: relative;
        }
        /* .job-tags{
            white-space: nowrap;
            overflow-x: hidden;
            width: 100%;
        } */
        .jobTags .prev,
        .jobTags .next{
            position: absolute;
            bottom: -15%;
            border: none;
            outline: none;
            background: transparent;
        }
        .jobTags .prev span,
        .jobTags .next span{
            font-size: 30px;
        }
        .jobTags .next{
            right: 0%;
        }
        .jobTags .prev:hover span,
        .jobTags .next:hover span{
            color: #005ea6;
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
    <script>
        $(document).ready(function() {
            /************************************************
             *                 For Tags Arrow
            ************************************************/
            const jobTags = $('.jobTags').find('.tags');
            const prev = $('.prev');
            const next = $('.next');

            const maxScrollLeft = jobTags.get(0).scrollWidth - jobTags.get(0).clientWidth;
            console.log(jobTags.get(0).scrollWidth);

            // if($('body').width() <= 320) { jobTags.width(226); }
            // if($('body').width() <= 375) { jobTags.width(281); }
            // if($('body').width() <= 425) { jobTags.width(331); }
            // if($('body').width() <= 768) { jobTags.width(418); }
            // if($('body').width() <= 1024) { jobTags.width(674); }
            // if($('body').width() <= 1440 || $('body').width() >= 1440) { jobTags.width(783.5); }

            // console.log(jobTags.get(0));
            // console.log(jobTags.width());
            // console.log(jobTags[0].scrollWidth);
            
            // $(document).ready(function() {
            //     console.log(jobTags.get(0));
            //     console.log(jobTags.width());
            //     console.log(jobTags[0].scrollWidth);

            // });
            
        
            if(jobTags.scrollLeft() <= 0){
                prev.hide();
            }
        
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
                console.log(jobTags.get(0).scrollWidth);
                
                if(jobTags.scrollLeft() >= maxScrollLeft-100){
                    next.hide();
                }
                
                prev.show();
                
            });
        });
    </script>
@endpush