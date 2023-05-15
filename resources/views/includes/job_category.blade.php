<div class="border rounded radius-5 mt-3">  
    <div class="usernavwrap">
        <div class="switchbox">
            <div class="txtlbl">
                {{__('Job Category')}}
                  <!-- Button trigger modal -->
                <button type="button" id="modal-btn" class="btn" data-toggle="modal" data-target="#categoryModal">
                    <i class="fa-solid fa-pen-to-square" data-bs-toggle="tooltip" title="Edit job Category"></i>
                </button>
            </div>
            <div class="clearfix"></div>
        </div>
        <ul class="usernavdash">
          @if (isset($jobCategoryLinks)  && count($jobCategoryLinks))
            @foreach ($jobCategoryLinks as $jobCategoryLink)
              @if (($jobCategoryLink->model_name == 'JobSkill'))
                @php
                  $jobSkills = App\JobSkill::where('job_skill_id', $jobCategoryLink->job_category_id)->where('lang', 'en')->get();
                @endphp

                @foreach ($jobSkills as $jobSkill)
                  {{-- <li class=""><a href="#"><i class="fa-solid fa-table-list" aria-hidden="true"></i> {{$jobSkill['job_skill']}}</a></li> --}}
                  <li class="">
                    <a href="{{ route('job.list') }}?search=&job_skill%5B%5D={{ str_replace(' ', '+', $jobSkill['job_skill']) }}">
                      <i class="fa-solid fa-table-list" aria-hidden="true"></i> {{ $jobSkill['job_skill'] }}
                    </a>
                  </li>
                  
                @endforeach
                
              @endif

              @if (($jobCategoryLink->model_name == 'JobExperience'))

                @php
                  $jobExperiences = App\JobExperience::where('job_experience_id', $jobCategoryLink->job_category_id)->where('lang', 'en')->get();
                @endphp

                @foreach ($jobExperiences as $jobExperience)
                    {{-- <li class=""><a href="{{route('job.list')}}"><i class="fa-solid fa-table-list" aria-hidden="true"></i> {{$jobExperience['job_experience']}}</a></li> --}}
                    <li class="">
                      <a href="{{ route('job.list') }}?search=&job_experience_id%5B%5D={{ $jobExperience['job_experience_id'] }}">
                        <i class="fa-solid fa-table-list" aria-hidden="true"></i> {{ $jobExperience['job_experience'] }}
                      </a>
                    </li>
                @endforeach
                
              @endif

              @if (($jobCategoryLink->model_name == 'JobType'))

                @php
                  $jobTypes = App\JobType::where('job_type_id', $jobCategoryLink->job_category_id)->where('lang', 'en')->get();
                @endphp

                @foreach ($jobTypes as $jobType)
                  {{-- <li class=""><a href="#"><i class="fa-solid fa-table-list" aria-hidden="true"></i> {{$jobType['job_type']}}</a></li> --}}
                  <li class="">
                    <a href="{{ route('job.list') }}?search=&job_type_id%5B%5D={{ $jobType['job_type_id'] }}">
                      <i class="fa-solid fa-table-list" aria-hidden="true"></i> {{ $jobType['job_type'] }}
                    </a>
                  </li>
                @endforeach
                
              @endif

              @if (($jobCategoryLink->model_name == 'JobShift'))

                @php
                  $jobShifts = App\JobShift::where('job_shift_id', $jobCategoryLink->job_category_id)->where('lang', 'en')->get();
                @endphp

                @foreach ($jobShifts as $jobShift)
                  {{-- <li class=""><a href="#"><i class="fa-solid fa-table-list" aria-hidden="true"></i> {{$jobShift['job_shift']}}</a></li> --}}
                  <li class="">
                    <a href="{{ route('job.list') }}?search=&job_shift_id%5B%5D={{ $jobShift['job_shift_id'] }}">
                      <i class="fa-solid fa-table-list" aria-hidden="true"></i> {{ $jobShift['job_shift'] }}
                    </a>
                  </li>
                @endforeach
                
              @endif

              @if (($jobCategoryLink->model_name == 'DegreeLevel'))

                @php
                  $degreeLevels = App\DegreeLevel::where('degree_level_id', $jobCategoryLink->job_category_id)->where('lang', 'en')->get();
                @endphp

                @foreach ($degreeLevels as $degreeLevel)
                  {{-- <li class=""><a href="#"><i class="fa-solid fa-table-list" aria-hidden="true"></i> {{$degreeLevel['degree_level']}}</a></li> --}}
                  <li class="">
                    <a href="{{ route('job.list') }}?search=&degree_level_id%5B%5D={{ $degreeLevel['degree_level_id'] }}">
                      <i class="fa-solid fa-table-list" aria-hidden="true"></i> {{ $degreeLevel['degree_level'] }}
                    </a>
                  </li>
                @endforeach
                
              @endif

              @if (($jobCategoryLink->model_name == 'Industry'))

                @php
                  $industries = App\Industry::where('industry_id', $jobCategoryLink->job_category_id)->where('lang', 'en')->get();
                @endphp

                @foreach ($industries as $industry)
                  {{-- <li class=""><a href="#"><i class="fa-solid fa-table-list" aria-hidden="true"></i> {{$industry['industry']}}</a></li> --}}
                  <li class="">
                    <a href="{{ route('job.list') }}?search=&industry_id%5B%5D={{ $industry['industry_id']}}">
                      <i class="fa-solid fa-table-list" aria-hidden="true"></i> {{ $industry['industry'] }}
                    </a>
                  </li>
                @endforeach
                
              @endif

              @if (($jobCategoryLink->model_name == 'FunctionalArea'))

                @php
                  $functionalAreas = App\FunctionalArea::where('functional_area_id', $jobCategoryLink->job_category_id)->where('lang', 'en')->get();
                @endphp

                @foreach ($functionalAreas as $functionalArea)
                  {{-- <li class=""><a href="#"><i class="fa-solid fa-table-list" aria-hidden="true"></i> {{$functionalArea['functional_area']}}</a></li> --}}
                  <li class="">
                    <a href="{{ route('job.list') }}?search=&functional_area_id%5B%5D={{ $functionalArea['functional_area_id']}}">
                      <i class="fa-solid fa-table-list" aria-hidden="true"></i> {{ $functionalArea['functional_area'] }}
                    </a>
                  </li>
                @endforeach
                
              @endif

              @if (($jobCategoryLink->model_name == 'Company'))

                @php
                  $companies = App\Company::where('id', $jobCategoryLink->job_category_id)->get();
                @endphp

                @foreach ($companies as $company)
                  {{-- <li class=""><a href="#"><i class="fa-solid fa-table-list" aria-hidden="true"></i> {{$company['name']}}</a></li> --}}
                  <li class="">
                    <a href="{{ route('job.list') }}?search=&company_id%5B%5D={{ $company['id']}}">
                      <i class="fa-solid fa-table-list" aria-hidden="true"></i> {{ $company['name'] }}
                    </a>
                  </li>
                @endforeach
                
              @endif
            
            @endforeach
          @else
              <p class="text-muted">No Category Saved!</p>
          @endif
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">{!! $siteSetting->dashboard_page_ad !!}</div>
    </div>
</div>

  <!-- Modal -->
  <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="category-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="category-modal">Edit Job Categories</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="saved-job-category-message"></div>
          <form action="{{__('saved-job-categories')}}" method="GET" id="save-job-category-form">
            @csrf
            @include('includes.job_category_accordions')
          </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="submit-category">
              <i class="fa-solid fa-floppy-disk"></i>
              <span>{{__('Save')}}</span>
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>

  @push('styles')
    <style>
        #modal-btn{
            background: transparent;
            border: none;
        }
        #modal-btn i{
            font-size: 18px;
        }
        #modal-btn:hover i{
            color: #005ea6;
        }
        #saved-job-category-message{
          background: #facfcf;
          color: #d13838;
          border-radius: 5px;
          padding: 5px 10px;
          display: none;
        }
        .muted{
          cursor: not-allowed;
          pointer-events: none;
          border: none;
          outline: none;
          background: #d4d4d4;
        }
    </style>
  @endpush
  
  @push('scripts')
    <script>
        (function ($){
          /************************************************************
           *      Get the value of the categories in the modal
          ************************************************************/
          $(document).on('click', '#submit-category', function (e) {
            e.preventDefault();
            const savedCategories = {};

            let jobsBySkill = $(".jobs-by-title:checkbox:checked").map(function () { return this.value; }).get();
            console.log(jobsBySkill);
            savedCategories['job_skill_id'] = jobsBySkill;
            
            let jobsByExperience = $(".jobs-by-experience:checkbox:checked").map(function () { return this.value; }).get();
            savedCategories['job_experience_id'] = jobsByExperience;

            let jobsByType = $(".jobs-by-type:checkbox:checked").map(function () { return this.value; }).get();
            savedCategories['job_type_id'] = jobsByType;

            let jobsByShift = $(".jobs-by-shift:checkbox:checked").map(function () { return this.value; }).get();
            savedCategories['job_shift_id'] = jobsByShift;

            let jobsByDegree = $(".jobs-by-degree:checkbox:checked").map(function () { return this.value; }).get();
            savedCategories['degree_level_id'] = jobsByDegree;

            let jobsByIndustry = $(".jobs-by-industry:checkbox:checked").map(function () { return this.value; }).get();
            savedCategories['industry_id'] = jobsByIndustry;

            let jobsByFunctionalArea = $(".jobs-by-functional-area:checkbox:checked").map(function () { return this.value; }).get();
            savedCategories['functional_area_id'] = jobsByFunctionalArea;

            let jobsByCompany = $(".jobs-by-company:checkbox:checked").map(function () { return this.value; }).get();
            savedCategories['company_id'] = jobsByCompany;

            if(jobsBySkill.length == 0 && jobsByExperience.length == 0 && jobsByType.length == 0 && jobsByShift.length == 0 && jobsByDegree.length == 0 && jobsByIndustry.length == 0 && jobsByFunctionalArea.length == 0 && jobsByCompany.length == 0){
              $('#saved-job-category-message').show();
              $('#saved-job-category-message').text("Please select at least one");
              setTimeout(() => {
                $('#saved-job-category-message').hide();
              }, 3000);
              $('#categoryModal').on('hidden.bs.modal', function () {
                $('#saved-job-category-message').hide()
              })
            } else {
              $(this).addClass('muted');
              $(this).text('Saving...');
              $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
              $.ajax({
                type: "GET",
                url: "{{route('saved.categories')}}",
                data: {'savedCategories':savedCategories},
                success: function (response) {
                  $('#categoryModal').modal('hide');
                  $('body').removeClass('modal-open').css({"padding-right":"0"});
                  $('#submit-category').text('Save');
                  $('#submit-category').removeClass('muted');
                  $('body').empty().html(response);
                },
                error: function (response) {
                  console.log(response);
                }
              });
            }

          });

        })(jQuery);
    </script>
  @endpush