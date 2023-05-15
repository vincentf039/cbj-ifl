"use strict";
/* ==== Jquery Functions ==== */

(function($) {
	$('.testi2').owlCarousel({
		items:1,
		loop:true,
		nav: false,
		dots: false,
		margin:10,
		autoplay:true,
		autoplayTimeout:5000,
		autoplayHoverPause:true,
	});
			
  
	/* ==== Testimonials Slider ==== */	
  	$(".testimonialsList").owlCarousel({      
	   loop:true,
		margin:30,
		nav: false,
		dots: false,
		responsiveClass:true,
		responsive:{
			0:{
				items:1,
				nav:false
			},
			768:{
				items:1,
				nav:false
			},
			1170:{
				items:2,
				nav:false,
				loop:true
			}
		}
  	});
	
	/* ==== employerList Slider ==== */	
  	$(".employerList").owlCarousel({      
	   loop:true,
		margin:20,
		dots: false,
		responsiveClass:true,
		responsive:{
			0:{
				items:3,
				nav:true
			},
			768:{
				items:5,
				nav:true
			},
			1170:{
				items:10,
				nav:true,
				loop:true
			}
		}
  	});

	/* ==== employerList Slider ==== */	
	// $(".job-tags").owlCarousel({      
	// 	loop:false,
	// 	 margin: 10,
	// 	 dots: false,
	// 	 nav: true,
	// 	 responsiveClass:true,
	// 	 responsive:{
	// 		 0:{
	// 			 items:3,
	// 			 nav:true
	// 		 },
	// 		 768:{
	// 			 items:5,
	// 			 nav:true
	// 		 },
	// 		 1170:{
	// 			 items:8,
	// 			 nav:true,
	// 			 loop:false
	// 		 }
	// 	 }
	//    });
	
	
	/* ==== Revolution Slider ==== */
	if($('.tp-banner').length > 0){
		$('.tp-banner').show().revolution({
			delay:6000,
	        startheight:550,
	        startwidth: 1140,
	        hideThumbs: 1000,
	        navigationType: 'none',
	        touchenabled: 'on',
	        onHoverStop: 'on',
	        navOffsetHorizontal: 0,
	        navOffsetVertical: 0,
	        dottedOverlay: 'none',
	        fullWidth: 'on'
		});
	}
	
	
	//Top search bar open/close
    if (!$('.srchbox').hasClass("searchStayOpen")) {
        $("#jbsearch").click(function() {
            $(".srchbox").addClass("openSearch");
            $(".additional_fields").slideDown();
        });


        $(".srchbox").click(function(e) {
            e.stopPropagation();
        });
    }

		
	
	
})(jQuery);

// vanilla js script
document.addEventListener("DOMContentLoaded", () => {
	$('#freelancer-section-cards').slick({
	  dots: true,
	  arrows: false,
	  infinite: false,
	  speed: 300,
	  slidesToShow: 3,
	  slidesToScroll: 1,
	  responsive: [
		{
		  breakpoint: 1025,
		  settings: {
			slidesToShow: 3,
			slidesToScroll: 1,
			dots: true
		  }
		},
		{
		  breakpoint: 769,
		  settings: {
			slidesToShow: 2,
			slidesToScroll: 1,
			dots: true
		  }
		},
		{
		  breakpoint: 600,
		  settings: {
			slidesToShow: 1,
			slidesToScroll: 1
		  }
		},
		{
		  breakpoint: 480,
		  settings: {
			slidesToShow: 1,
			slidesToScroll: 1
		  }
		}
		// You can unslick at a given breakpoint now by adding:
		// settings: "unslick"
		// instead of a settings object
	  ]
	});
  
	// to close the button div when user clicked outside the div
	const btnFade = (btn, div) => {
	  document.addEventListener('click', (e) => {
		const target = e.target
		const isClickInside = btn.contains(target);
		const isOpen = div.classList.contains('open');
	
		if(!isClickInside && isOpen) {
		  div.classList.remove('open');
		  div.classList.add('close');
	
		  setTimeout( () => {
			div.classList.remove('close');
		  }, 300);
		}
	  });
	};
  
	// to stop the div from closing when the user clicked inside the button div
	const clickedInsideDiv = (div) => {
	  div.addEventListener('click', (e) => {
		e.stopPropagation();
	  });
	};
  
	// to close and open the div
	const openClose = (btn, div) => {
	  btn.addEventListener('click', () => {
		const isOpen = div.classList.contains('open');
	
		if(isOpen) {
		  div.classList.remove('open');
		  div.classList.add('close');
	
		  setTimeout(() => {
			div.classList.remove('close');
		  }, 300);
		} else {
		  div.classList.toggle('open');
		}
	  });
	};
  
	// notification button
	const notification = document.querySelector('#notification');
	const notificationBtn = document.querySelector('#header .right-side .notifications .notification-btn');
	btnFade(notification, notificationBtn);
	clickedInsideDiv(notificationBtn);
	openClose(notification, notificationBtn);
  
	// messages button
	const messages = document.querySelector('#messages');
	const messagesBtn = document.querySelector('#header .right-side .notifications .messages-btn');
	btnFade(messages, messagesBtn);
	clickedInsideDiv(messagesBtn);
	openClose(messages, messagesBtn);
  
	// user button
	const user = document.querySelector('#user');
	const userBtn = document.querySelector('#header .right-side .user .user-btn');
	btnFade(user, userBtn);
	clickedInsideDiv(userBtn);
	openClose(user, userBtn);

	// footer language selector
	const footLangSelect = document.querySelector('#foot-lang-select');
	const footLangSelectBtn = document.querySelector('#footer-language-selector .footer-language-btn');
	btnFade(footLangSelect, footLangSelectBtn);
	clickedInsideDiv(footLangSelectBtn);
	openClose(footLangSelect, footLangSelectBtn);
  
  });
