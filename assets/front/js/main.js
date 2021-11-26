(function ($) {
	"use strict";

    jQuery(document).ready(function($){

       $(".mainmenu").meanmenu({
			meanMenuClose: 'X', 
			meanMenuCloseSize: '18px', 
			meanScreenWidth: '767', 
			meanExpandableChildren: true, 
			meanMenuContainer: '.mobileMenuActive', 
			onePage: true
		});

		$(".homepage-slides").owlCarousel({
			items: 1,
			smartSpeed: 300,
			margin: -1,
			loop: true,
			dots: true,
			autoplay: true,
			nav: true,
			navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
		});

		$(".homepage-slides").on("translate.owl.carousel", function(){ 
			$(".single-slide-item p").removeClass("animated fadeInDown").css("opacity", "0"); 
			$(".single-slide-item h2").removeClass("animated fadeInDown").css("opacity", "0"); 
			$(".single-slide-item .boxed-btn").removeClass("animated fadeInUp").css("opacity", "0"); 
		}); 

		$(".homepage-slides").on("translated.owl.carousel", function(){ 
			$(".single-slide-item p").addClass("animated fadeInDown").css("opacity", "1"); 
			$(".single-slide-item h2").addClass("animated fadeInDown").css("opacity", "1"); 
			$(".single-slide-item .boxed-btn").addClass("animated fadeInUp").css("opacity", "1"); 
		});

		$(window).on('scroll', function (){
			if ($(window).scrollTop() > 0) {
				$('body').addClass('sticky--menu');
			} else {
				$('body').removeClass('sticky--menu');
			}
		});

		//---------venobox-----------
        $('.venobox').venobox();

       //-----------Wow js-----------
       new WOW().init();
		
       //-----------testimonial style-10-----------
	    $(".t_carousel10").owlCarousel({
	        items: 1,
	        loop: true,
	        dots: false,
	        nav: true,
	        margin: 30,
	        autoplay: true,
	        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
	        smartSpeed: 1200
	    });

	    //-----------Blog Carousel-----------
		$(".blog-list").owlCarousel({
		    items: 3,
		    autoplay: true,
		    margin: 30,
			loop: true,
			nav: true,
			navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
		    smartSpeed: 800,
		    responsive : {
				0 : {
					items: 1,
				},
				768 : {
					items: 2,
				},
				992 : {
					items: 3
				}
			}
		});

		/*  Image popUp  */
		$(".image-popup").magnificPopup({
		   type: 'image',
		   mainClass: 'mfp-zoom-in',
		   removalDelay: 1000,
		   overflowY: 'scroll',
		   gallery:{
		    enabled:true
		   },
		   callbacks: {
		    beforeOpen: function() {
		     this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
		    },
		    open: function() {$('.goToTop').css('overflow-y', 'scroll');},
		    close: function() {$('.goToTop').css('overflow-y', 'hidden');}
		   },
		   closeOnContentClick: true,
		   midClick: true
		  });

		//-----------Replay button details-----------
		$(".replay-form p").click(function() {
			$(this).next(".replay-form form").slideToggle();
		});

		//---------Website Scroll bottom to top-----------
		$(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
			$('.scrollup').fadeIn();
			} else {
				$('.scrollup').fadeOut();
			}
		});

		$('.scrollup').click(function () {
			$("html, body").animate({
				scrollTop: 0
			}, 600);
			return false;
		});

			
    });


 	$(window).on('load', function() { 
	  $('.app-site-preloader-wrap').fadeOut(1000);
	});


}(jQuery));

