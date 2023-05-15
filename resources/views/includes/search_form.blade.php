@if(Auth::guard('company')->check())

<form action="{{route('job.seeker.list')}}" method="get">
	<div class="banner-text hos">
		<h3>
			<strong>{{__('One million success stories')}}.</strong>
			
		</h3>
	</div>
	<div class="search hos">
		<div class="search-1">
			<label>Where?</label>
			<div class="search-input-1 border-end">
				<span><i class="fa-solid fa-location-dot"></i></span>
				<input type="text"  name="search" id="empsearch" value="{{Request::get('search', '')}}" placeholder="{{__('Enter Skills or Job Seeker Details')}}" autocomplete="off" aria-label="search"/>
				<button class="btn search-btn"><span>{{__('Search Job Seeker')}}</span></button>
			</div>
		</div>
	</div>
</form>

@else

<div class="banner-text hos">
	<h3>
		<strong>Hire experts or be hired for any job, any time.</strong>
		{{__('Search Top Talent Board for Virtual Work in the Philippines')}}.
	</h3>
</div>
<form action="{{route('job.list')}}" method="get">
	<div class="search hos">
		<div class="search-1">
			<label>Where?</label>
			<div class="search-input-1 border-end">
				<span><i class="fa-solid fa-location-dot"></i></span>
				<input type="text"  name="search" id="jbsearch" value="{{Request::get('search', '')}}" placeholder="{{__('Search jobs')}}" autocomplete="off" aria-label="Search"/>
			</div>
		</div>
		<div class="search-2">
			<label>What job you want?</label>
			<div class="search-input-2">
				<input type="text"  name="search" id="jbsearch" value="{{Request::get('search', '')}}" placeholder="{{__('Search Talent Resume')}}" autocomplete="off" aria-label="Search"/>
				<button class="btn search-btn"><span>Search</span></button>
			</div>
		</div>
	</div>
	
	<div class="">	
		<div class="srchbox">
			<div class="srcsubfld additional_fields">
	
				<div class="row">
					<!--<div class="col-md-{{((bool)$siteSetting->country_specific_site)? 12:6}}">
						<div class="srform">
							<label for="">{{__('Select Functional Area')}}</label>
							{!! Form::select('functional_area_id[]', ['' => __('Select Functional Area')]+$functionalAreas, Request::get('functional_area_id', null), array('class'=>'form-control', 'id'=>'functional_area_id')) !!}
						</div> 
					</div>	-->
					@if((bool)$siteSetting->country_specific_site)
						{!! Form::hidden('country_id[]', Request::get('country_id[]', $siteSetting->default_country_id), array('id'=>'country_id')) !!}
					@else
						<!-- <div class="col-md-6">
							<div class="srform">
								<label for="">{{__('Select Country')}}</label>
								{!! Form::select('country_id[]', ['' => __('Select Country')]+$countries, Request::get('country_id', $currentCountry->id ?? $siteSetting->default_country_id), array('class'=>'form-control', 'id'=>'country_id')) !!}
							</div>
						</div>	 -->
					@endif
				</div>
	
	
				<!-- <div class="row">
					<div class="col-md-6"><div class="srform">
						<label for="">{{__('Select State')}}</label>
						<span id="state_dd">
							{!! Form::select('state_id[]', ['' => __('Select State')], Request::get('state_id', null), array('class'=>'form-control', 'id'=>'state_id')) !!}
						</span>
					</div>	
					<div class="col-md-6"> <div class="srform">
						<label for="">{{__('Select City')}}</label>
						<span id="city_dd">
							{!! Form::select('city_id[]', ['' => __('Select City')], Request::get('city_id', null), array('class'=>'form-control', 'id'=>'city_id')) !!}
						</span>
					</div>	
				</div>	 -->
			</div>
	
	
	
		</div>	
	
		<!--	<div class="srchbtn"><input type="submit" class="btn" value="{{__('Search Job')}}"></div> -->
	
	
	
	</div>

</form>

@endif

<div class="banner-total hos">
	<ul>
		<li class="border-end">
			<strong>53</strong>
			<span>Jobs Posted</span>
		</li>
		<li class="border-end">
			<strong>118</strong>
			<span>Tasks Posted</span>
		</li>
		<li>
			<strong>41</strong>
			<span>Freelancers</span>
		</li>
	</ul>
</div>