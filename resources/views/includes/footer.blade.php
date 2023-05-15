<!-- footer starts -->
<footer>
    <div class="b-btm">
        <div id="upper-footer" class="container">
            <div id="footer-logo">
                <img src="{{ asset('/') }}sitesetting_images/thumb/jobs-portal-white.png" alt="{{ asset('/') }}sitesetting_images/thumb/jobs-portal-white.png" />
            </div>
            <div id="footer-social-buttons">
                @include('includes.footer_social')
            </div>
            <div id="footer-language-selector">
                <div class="dropdown">
                    <button id="foot-lang-select" class="lang-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span>english</span><span class="caret"><i class="fa-solid fa-caret-down"></i></span>
                    </button>
                    <ul class="dropdown-content footer-language-btn btn-fade">
                        {{-- <li><a href="#">English <span><i class="fa-solid fa-check"></i></span></a></li> --}}
                        @foreach($siteLanguages as $siteLang)
                            <li>
                                <a href="javascript:;" onclick="event.preventDefault(); document.getElementById('locale-form-{{$siteLang->iso_code}}').submit();">
                                    {{$siteLang->native}}
                                </a>
                                <form id="locale-form-{{$siteLang->iso_code}}" action="{{ route('set.locale') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="locale" value="{{$siteLang->iso_code}}"/>
                                    <input type="hidden" name="return_url" value="{{url()->full()}}"/>
                                    <input type="hidden" name="is_rtl" value="{{$siteLang->is_rtl}}"/>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="middle-footer" class="container">
        <div class="mfdf">
            <div id="footer-candidate">
                <h3>{{__('Quick Links')}}</h3>
                <ul>
                    <li><a href="{{ route('index') }}">{{__('Home')}}</a></li>
                    <li><a href="{{ route('contact.us') }}">{{__('Contact Us')}}</a></li>
                    <li class="postad"><a href="{{ route('post.job') }}">{{__('Post a Job')}}</a></li>
                    <li><a href="{{ route('faq') }}">{{__('FAQs')}}</a></li>
                    @foreach($show_in_footer_menu as $footer_menu)
                    @php
                    $cmsContent = App\CmsContent::getContentBySlug($footer_menu->page_slug);
                    @endphp

                    <li class="{{ Request::url() == route('cms', $footer_menu->page_slug) ? 'active' : '' }}"><a href="{{ route('cms', $footer_menu->page_slug) }}">{{ $cmsContent->page_title }}</a></li>
                    @endforeach
                </ul>
            </div>
    
            <div id="footer-employers">
                <h3>{{__('Jobs By Functional Area')}}</h3>
                <ul class="quicklinks">
                    @php
                    $functionalAreas = App\FunctionalArea::getUsingFunctionalAreas(10);
                    @endphp
                    @foreach($functionalAreas as $functionalArea)
                    <li><a href="{{ route('job.list', ['functional_area_id[]'=>$functionalArea->functional_area_id]) }}">{{$functionalArea->functional_area}}</a></li>
                    @endforeach
                </ul>
            </div>
    
            <div id="footer-hlinks">
                <h3>{{__('Jobs By Industry')}}</h3>
                <ul class="quicklinks">
                    @php
                    $industries = App\Industry::getUsingIndustries(10);
                    @endphp
                    @foreach($industries as $industry)
                    <li><a href="{{ route('job.list', ['industry_id[]'=>$industry->industry_id]) }}">{{$industry->industry}}</a></li>
                    @endforeach
                </ul>
            </div>
    
            <div id="footer-account">
                <h3>{{__('Contact Us')}}</h3>
                <ul>
                    <li>{{ $siteSetting->site_street_address }}</li>
                    <li><a href="mailto:{{ $siteSetting->mail_to_address }}">{{ $siteSetting->mail_to_address }}</a></li>
                    <li><a href="tel:{{ $siteSetting->site_phone_primary }}">{{ $siteSetting->site_phone_primary }}</a></li>
                </ul>
            </div>
        </div>

        <div id="footer-newsletter">
            <h3><i class="fa-regular fa-envelope"></i>Sign Up for NewsLetter</h3>
            <p>Weekly breaking news, analysis and cutting edge advices on job searching.</p>
            <form class="d-flex" role="email">
                <input class="" type="email" placeholder="Enter your email address " aria-label="email address">
                <button class="btn" type="submit"><i class="fa-solid fa-arrow-right"></i></button>
            </form>
        </div>
    </div>
    <div id="lower-footer">
        <div class="text-center">
            {{__('Copyright')}} &copy; {{date('Y')}} {{ $siteSetting->site_name }}. {{__('All Rights Reserved')}}
        </div>
    </div>
</footer>
<!-- footer ends -->






{{--<div class="paylogos"><img src="{{asset('/')}}images/payment-icons.png" alt="" /></div>	 --}}
           
