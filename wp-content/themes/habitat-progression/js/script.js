/*  Table of Contents 
01. MENU ACTIVATION
02. FITVIDES RESPONSIVE VIDEOS
03. MOBILE MENU
04. SHOW/HIDE MOBILE MENU
05. GALLERY JS
06. SCROLL TO TOP MENU JS 
07. prettyPhoto JS
08. PRELOADER JS
09. STICKY HEADER JS
10. ONE PAGE NAVIGATION JS
11. MatchHeight
*/

jQuery(document).ready(function($) {
	 'use strict';
	
/*
=============================================== 01. MENU ACTIVATION  ===============================================
*/
	 jQuery('nav#site-navigation ul.sf-menu, #progression-header-top-left-container ul.sf-menu, #progression-header-top-right-container ul.sf-menu').superfish({
			 	popUpSelector: 'ul.sub-menu,.sf-mega', 	// within menu context
	 			delay:      	200,                	// one second delay on mouseout
	 			speed:      	0,               		// faster \ speed
		 		speedOut:    	200,             		// speed of the closing animation
				animation: 		{opacity: 'show'},		// animation out
				animationOut: 	{opacity: 'hide'},		// adnimation in
		 		cssArrows:     	true,              		// set to false
			 	autoArrows:  	true                    // disable generation of arrow mark-up
	 });
	 
	 
/*
=============================================== 02. FITVIDES RESPONSIVE VIDEOS  ===============================================
*/
	 $("#content-pro").fitVids();
	 
	 
/*
=============================================== 03. MOBILE MENU  ===============================================
*/
	 	
   	$('ul.mobile-menu-pro').slimmenu({
   	    resizeWidth: '960',
   	    collapserTitle: 'Menu',
   	    easingEffect:'easeInOutQuint',
   	    animSpeed:'medium',
   	    indentChildren: false,
   		childrenIndenter: '- '
   	});
	
	
	$('.mobile-menu-icon-pro').click(function(e){
		e.preventDefault();
		$('#main-nav-mobile').stop().slideToggle(400);
		$("#masthead-pro").toggleClass("active-mobile-icon-pro");
	});


/*
=============================================== 04. SHOW/HIDE CART AND SEARCH  ===============================================
*/	
	var hidesearch = false;
	var hidecart = false;
	var clickOrTouch = (('ontouchend' in window)) ? 'touchend' : 'click';
	
 	$("#habitat-header-search-icon i.fa-search").on(clickOrTouch, function(e) {
		var clicks = $(this).data('clicks');
		  if (clicks) {
		     $("#habitat-header-search-icon").removeClass("active-search-icon-pro");
		     $("#habitat-header-search-icon").addClass("hide-search-icon-pro");
			 
		  } else {
		     $("#habitat-header-search-icon").addClass("active-search-icon-pro");
			  $("#habitat-header-search-icon").removeClass("hide-search-icon-pro");
		  }
		  $(this).data("clicks", !clicks);
		  
 	  
 	});
	
	if ($(this).width() > 959) {

	    $("#progression-shopping-cart-toggle").hover(function(){
	        if (hidecart) clearTimeout(hidecart);
			$("#progression-shopping-cart-toggle").addClass("activated-class");
			$("#progression-shopping-cart-toggle").removeClass("hover-out-class");
	    }, function() {
	        hidecart = setTimeout(function() { 
				$("#progression-shopping-cart-toggle").removeClass("activated-class");
				$("#progression-shopping-cart-toggle").addClass("hover-out-class");
			}, 200);
			
	    });
		
	}
	
	
	

/*
=============================================== 05. GALLERY JS  ===============================================
*/	
    $('.progression-studios-gallery').flexslider({
		animation: "fade",      
		slideDirection: "horizontal", 
		slideshow: false,   
		smoothHeight: false,
		slideshowSpeed: 7000,  
		animationSpeed: 1000,        
		directionNav: true,             
		controlNav: true,
		prevText: "",    
		nextText: "", 
    });
	
	


/*
=============================================== 06. SCROLL TO TOP MENU JS  ===============================================
*/
  	// browser window scroll (in pixels) after which the "back to top" link is shown
  	var offset = 150,
  	
	//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
  	offset_opacity = 1200,
  	
	//duration of the top scrolling animation (in ms)
  	scroll_top_duration = 700,
  	
	//grab the "back to top" link
  	$back_to_top = $('#pro-scroll-top');

	//hide or show the "back to top" link
	$(window).scroll(function(){
  		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
  		if( $(this).scrollTop() > offset_opacity ) { 
  			$back_to_top.addClass('cd-fade-out');
  		}
  	});

	//smooth scroll to top
	$back_to_top.on('click', function(event){
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
		}, scroll_top_duration
	);
	});
	
	/* Scroll to link inside page */
	$('a.scroll-to-link').click(function(){
	  $('html, body').animate({
	    scrollTop: $( $.attr(this, 'href') ).offset().top - top_offset
	  }, 400);
	  return false;
	});
	


/*
=============================================== 07. prettyPhoto JS  ===============================================
*/

  	$(".progression-program-item-image [data-rel^='prettyPhoto'], .progression-studios-default-program-single .progression-studios-program-image a[data-rel^='prettyPhoto'], .images a[data-rel^='prettyPhoto'], .progression-studios-feaured-portfolio a[data-rel^='prettyPhoto'], .progression-studios-feaured-image a[data-rel^='prettyPhoto']").prettyPhoto({
			theme: 'pp_default', /* light_rounded / dark_rounded / light_square / dark_square / facebook */
  			hook: 'data-rel',
			opacity: 0.7,
  			show_title: false, /* true/false */
  			deeplinking: false, /* Allow prettyPhoto to update the url to enable deeplinking. */
  			overlay_gallery: false, /* If set to true, a gallery will overlay the fullscreen image on mouse over */
  			custom_markup: '',
			default_width: 900,
			default_height: 506,
  			social_tools: '' /* html or false to disable */
  	});
	
  	$("a.lightbox, .lightbox a, .type-event a.post-thumbnail").prettyPhoto({
			theme: 'pp_default', /* light_rounded / dark_rounded / light_square / dark_square / facebook */
  			hook: 'class',
			opacity: 0.7,
  			show_title: false, /* true/false */
  			deeplinking: false, /* Allow prettyPhoto to update the url to enable deeplinking. */
  			overlay_gallery: false, /* If set to true, a gallery will overlay the fullscreen image on mouse over */
  			custom_markup: '',
			default_width: 900,
			default_height: 506,
  			social_tools: '' /* html or false to disable */
  	});



/*
=============================================== 08. PRELOADER JS  ===============================================
*/
	(function($) {
		var didDone = false;
		    function done() {
		        if(!didDone) {
		            didDone = true;
					$("#page-loader-pro").addClass('finished-loading');
		        }
		    }
		    var loaded = false;
		    var minDone = false;
		    //The minimum timeout.
		    setTimeout(function(){
		        minDone = true;
		        //If loaded, fire the done callback.
		        if(loaded)  {  done(); } }, 400);
		    //The maximum timeout.
		    setTimeout(function(){  done();   }, 2000);
		    //Bind the load listener.
		    $(window).load(function(){  loaded = true;
		        if(minDone) { done(); }
		    });
	})(jQuery);
	

/*
=============================================== 09. STICKY HEADER JS  ===============================================
*/	

	
	$(window).resize(function() {
	   var width_progression = $(document).width();
	      if (width_progression > 959) {
			  
				/* STICKY HEADER CLASS */
				$(window).on('load scroll resize orientationchange', function () {
				    var scroll = $(window).scrollTop();
				    if (scroll >= 30) {
				        $("#progression-sticky-header").addClass("progression-sticky-scrolled");
				    } else {
				        $("#progression-sticky-header").removeClass("progression-sticky-scrolled");
				    }
				});
				
			} else {
				$(window).on('load scroll resize orientationchange', function () {
				    var scroll = $(window).scrollTop();
				    if (scroll >= 30) {
				        $("#progression-sticky-header").removeClass("progression-sticky-scrolled");
				    } else {
				        $("#progression-sticky-header").removeClass("progression-sticky-scrolled");
				    }
				});
			}
		
	}).resize();
	
	/* DEFAULT STICKY HEADER */
	$('#progression-sticky-header').scrollToFixed({ minWidth: 959 });
	var top_offset = $('header#masthead-pro').height();  // get height of fixed navbar
	


/*
=============================================== 10. ONE PAGE NAVIGATION JS  ===============================================
*/
	var $nav = $('.progression-studios-one-page-nav #site-navigation');
	var $nav2 = $('.progression-studios-one-page-nav #main-nav-mobile');
	$nav.onePageNav({
	    currentClass: 'current-menu-item',
	    scrollSpeed: 400,
		 scrollOffset: top_offset,
	    scrollThreshold: 0.5,
		 filter: ':not(.external)',
	    easing: 'swing',
	    begin: function() {
	        //I get fired when the animation is starting
	    },
	    end: function() {
	        //I get fired when the animation is ending
	    },
	    scrollChange: function($currentListItem) {
	        //I get fired when you enter a section and I pass the list item of the section
	    }
	});
	
	$nav2.on('click', 'a', function(e) {
		var currentPos = $(this).parent().prevAll().length;
		$nav.find('li').eq(currentPos).children('a').trigger('click');
		e.preventDefault();
	});	

    
/*
=============================================== 11. MatchHeight  ===============================================
*/    
    
$(function() {
    $('.match-height-pro, .event-post-container-pro .excerpt-text-pro').matchHeight();    
});    
    
    
	 
});