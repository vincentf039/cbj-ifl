<ul class="hos">
    <li class="footer-social-buttons hos">
        @if ((string)$siteSetting->facebook_address !== '')
            <a href="{{ $siteSetting->facebook_address }}" target="_blank" title="facebook">
                <i class="fa-brands fa-facebook-f" aria-hidden="true"></i>
            </a>
        @endif
    </li>
    <li class="footer-social-buttons hos">
        @if ((string)$siteSetting->google_plus_address !== '')
            <a href="{{ $siteSetting->google_plus_address }}" target="_blank" title="google plus">
                <i class="fa-brands fa-google-plus-g" aria-hidden="true"></i>
            </a>
        @endif
    </li>
    <li class="footer-social-buttons hos">
        @if ((string)$siteSetting->pinterest_address !== '')
            <a href="{{ $siteSetting->pinterest_address }}" target="_blank" title="pinterest">
                <i class="fa-brands fa-pinterest-p" aria-hidden="true"></i>
            </a>
        @endif
    </li>
    <li class="footer-social-buttons hos">
        @if ((string)$siteSetting->twitter_address !== '')
            <a href="{{ $siteSetting->twitter_address }}" target="_blank" title="twitter">
                <i class="fa-brands fa-twitter" aria-hidden="true"></i>
            </a>
        @endif
    </li>
    <li class="footer-social-buttons hos">
        @if ((string)$siteSetting->instagram_address !== '')
            <a href="{{ $siteSetting->instagram_address }}" target="_blank" title="instagram">
                <i class="fa-brands fa-instagram" aria-hidden="true"></i>
            </a>
        @endif
    </li>
    <li class="footer-social-buttons hos">
        @if ((string)$siteSetting->linkedin_address !== '')
            <a href="{{ $siteSetting->linkedin_address }}" target="_blank" title="linked in">
                <i class="fa-brands fa-linkedin-in" aria-hidden="true"></i>
            </a>
        @endif
    </li>
    <li class="footer-social-buttons hos">
        @if ((string)$siteSetting->youtube_address !== '')
            <a href="{{ $siteSetting->youtube_address }}" target="_blank" title="youtube">
                <i class="fa-brands fa-youtube" aria-hidden="true"></i>
            </a>
        @endif
    </li>
    <li class="footer-social-buttons hos">
        @if ((string)$siteSetting->tumblr_address !== '')
            <a href="{{ $siteSetting->tumblr_address }}" target="_blank" title="tumblr">
                <i class="fa-brands fa-tumblr" aria-hidden="true"></i>
            </a>
        @endif
    </li>
    <li class="footer-social-buttons hos">
        @if ((string)$siteSetting->flickr_address !== '')
            <a href="{{ $siteSetting->flickr_address }}" target="_blank" title="flickr">
                <i class="fa-brands fa-flickr" aria-hidden="true"></i>
            </a>
        @endif
    </li>
</ul>