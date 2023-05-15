<div id="overlay"></div>
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="d-flex justify-content-between align-items-center">
        <button class="btn close"><i class="fa-solid fa-x"></i></button>
        <a href="#" class="offcanvas-link" id="link" target="blank"><span><i class="fa-solid fa-up-right-from-square"></i></span>{{" Open in new tab"}}</a>
    </div>
    <div id="spinner-container" class="d-none">
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <div id="offcanvas-details"></div>
</div>


@push('styles')
    <style>
        #spinner-container{
            opacity: .3;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        #overlay{
            position: fixed;
            width: 0;
            height: 100%;
            top: 0;
            right: 0;
            background-color: rgba(0,0,0,0.5);
            z-index: 2;
            cursor: pointer;
        }
        .offcanvas{
            position: fixed;
            width: 0;
            height: 100%;
            padding: 1rem 1.5rem;
            top: 0;
            right: 0;
            background: white;
            overflow-x: hidden;
            z-index: 3;
            display: none;
            transition: 0.5s;
        }
        .close{
            float: none;
        }
        .offcanvas-link{cursor: pointer; color: #005ea6; position: relative; transition: all ease 0.5s;}
        .offcanvas-link::before{
            position: absolute;
            content: "";
            height: 1px;
            width: 100%;
            bottom: 0%;
            left: 0%;
            background: #005ea6;
            visibility: hidden;
            transform: scaleX(0);
            transition: all 0.2s ease-in-out 0s;
        }
        .offcanvas-link:hover::before{
            visibility: visible;
            transform: scaleX(1);
        }
        #offcanvas-details{
            overflow: visible;
        }
        .offcanvas-active{
            overflow: hidden;
        }
    </style>
@endpush

@push('scripts')
    <script>
        (function ($) {
            /************************************************
             *           OFFCANVAS CLOSE BUTTON
            ************************************************/
            $(document).on('click', '.close', function () {
                $('#overlay').css({"width":"0"});
                $('.offcanvas').animate({width:"0"}, function () {$(this).css("display", "none");});
                $("body").removeClass('offcanvas-active');
            });

            /************************************************
             *           GETTING DATA FOR OFFCANVAS
            ************************************************/

            $(document).on('click', '.viewDetails', function () {
                // to stop the body from scrolling and hide the scrollbar
                $('body').addClass('offcanvas-active');

                // to get the link when the title is clicked
                let link = $('#link').attr('href');
                let url = $(this).attr('href');
                link = url;
                $('#link').attr("href", link);

                // to trim the link to get the slug
                let parts = link.split("/");
                let slug = parts[parts.length - 1];

                //while the page is loading show the spinner
                $('#spinner-container').removeClass('d-none');

                $.ajax({
                    type: "GET",
                    url: "home/job-details/" + slug,
                    success: function (response) {
                        $('#spinner-container').addClass('d-none');
                        $('#offcanvas-details').empty().html(response);
                    },  
                    error: function(error){
                        console.log(error);
                    }
                });
            }); 
        })(jQuery);
    </script>
@endpush