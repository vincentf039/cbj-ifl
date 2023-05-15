<div id="back-to-top" aria-label="back-to-top">
    <button id="scroll-to-top"><i class="fa-solid fa-angle-up"></i></button>
</div>
@push('scripts')
    <script>
        (function ($){
            $(document).on('click', '#scroll-to-top', function () {
                window.scrollTo({top: 0, behavior: 'smooth'});
            });

            // toggle 'scroll to top' based on scroll position
            const scrollToTop = document.getElementById('scroll-to-top');
            window.addEventListener('scroll', e => {
                scrollToTop.style.display = window.scrollY > 600? 'block' : 'none';
            });
        })(jQuery);
    </script>
@endpush