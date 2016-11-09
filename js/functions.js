/**
 * Functionality specific to Team Eight.
 *
 */

( function( $ ) {

	//Cache reference to window and animation items
	var $animation_elements = $('.animatable');
	var $window = $(window);


	var isSmallScreen = false,
		windowwidth = $window.width(),
		logobannerwrap = $(".logo-banner-wrap"),
		$header = $('.header'),
		$voiddownlink = $('.voidlink.icon-down-open');

	if(windowwidth < 720){
		isSmallScreen = true;
	}

	$window.on('scroll resize', view_checker);

	function view_checker() {


		if (logobannerwrap.length > 0) {

			screenstretch();

			homescrollheader();

		} // end if .logo-banner-wrap


		if ($('img[data-srcset]').length > 0) {

			setTimeout( lloader(), 5000);

		}

		if ($animation_elements.length > 0) {

			animate_in_view();

		}

		if($header.hasClass('mobile-open') && !menuscroll){
			mobilemenuhide();
		}

	}

	var screenstretch = function(){

			var lbheight = logobannerwrap.height(),
				hheight = 60;//$header.height();

			if($header.hasClass("above")){
				$header.css("top", lbheight);
			}

	}
	var homescrollheader = function(){
		var lbheight = logobannerwrap.height(),
				hheight = 60;//$header.height();

		if(isSmallScreen){

			if ($window.scrollTop() > lbheight - hheight) {
				if(!$header.hasClass("below")){
					$header.addClass("below").removeClass('above').css("top", "0");
				}
			} else {
				$header.removeClass("below");
			}

		} else {

			if ($window.scrollTop() > lbheight - hheight) {

				if(!$header.hasClass("below")){
					$header.addClass("below").removeClass('above').css("top", "0");
					$voiddownlink.hide();
				}
			} else {
				if($header.hasClass("below")){
					$header.removeClass("below");
				}
				if(!$header.hasClass("above")){
					$header.addClass('above').css("top", lbheight);
					$voiddownlink.show();
				}
			}
		}

		//console.log($( window ).scrollTop() +':scrolltop + lbheight:'+lbheight);
	}




	// Image Lazy Loading
	function animate_in_view() {
	  var window_height = $window.height();
	  var window_top_position = $window.scrollTop();
	  var window_bottom_position = (window_top_position + window_height);

	  $.each($animation_elements, function() {
	    if (!$(this).hasClass('in-view')) {
		    var $element = $(this);
		    var $parent = $element.parent();
		    var element_height = $parent.outerHeight();
		    var element_top_position = $parent.offset().top;
		    var element_bottom_position = element_top_position + element_height;
		    var element_trigger = element_top_position + (element_height/2);

		    //check to see if this current container is within viewport
		    if (element_trigger <= window_bottom_position) {
		      $element.addClass('in-view');
			  //	$( ".hmarker" ).offset({ top: element_trigger, left: 0 });
	    	}
		}
	  });
	}


	// Image Lazy Loading
	 var lloader = function(mode){

		if ($('img[data-srcset]').length > 0) {

			var wbottom = $window.scrollTop(),
				wheight = $window.height();

			$('img[data-srcset]').each( function(){
				if(isSmallScreen && $(this).hasClass('no-mobile')){

					$(this).remove();

				}else{

					var offset = $(this).offset();

					if(offset.top < wbottom + wheight*2){

						imageload($(this));

					} else {
						var imgwidth = $(this).attr('width')
							, imgheight = $(this).attr('height');
						$(this).css({
							   'paddingTop' : (imgheight/imgwidth*100)+"%",
							   'height' : '0'
							})
					}
				}
			});

		}
	}

	var imageload = function(image) {
		var srcset = image.attr('data-srcset'),
			src = image.attr('data-src');
		image.css({
			   'paddingTop' : '0',
			   'height' : 'auto'
			})
			.removeAttr('data-srcset data-src')
			.attr({srcset: srcset, src: src, "data-loaded": "yes"})
		;
	}
	var menuscroll = false;
	var mobilemenutoggle = function(){

		var windowHeight = $window.height(),
			windowTop = $window.scrollTop();

		if (screenstretch.length > 0 && !$header.hasClass('mobile-open') && windowTop < windowHeight) {
			menuscroll = true;
			setTimeout(function(){
				menuscroll = false;
			}, 2000);
			$('body').animate({
		          scrollTop: windowHeight
		        }, 700, function() {
					$header.addClass('mobile-open');
					$('.mobile-menu-toggle span').addClass('icon-cancel').removeClass('icon-menu');
			  });
		} else {
			$header.toggleClass('mobile-open');
			$('.mobile-menu-toggle span').toggleClass('icon-menu icon-cancel');
		}
	}
	var mobilemenuhide = function(){
		$header.removeClass('mobile-open');
		$('.mobile-menu-toggle span').addClass('icon-menu').removeClass('icon-cancel');
	}


	$(document).ready(function(){

		$('body').addClass('loaded');

		//$( "body" ).append( "<div class='hmarker' style='height:1px;width:100%;position:absolute;left:0;top:0;background:red;z-index: 500;'></div>" );

		$window.trigger('scroll');
		lloader();

		var $scrollcover = $('.scroll-cover');

		$scrollcover.click(function() {
			$(this).toggle();
		});

		$(window).scroll(function(){
			
			$scrollcover.each(function() {
				if($(this).parent().is(":hover")) {
				}else{
					$(this).show();		    	
				}			
			});

		});

		// Case Study animation
		$('.cs-link .imgwrap').hover( function() {
			$(this).parent('.cs-link').addClass('active');
		}, function() {
			$(this).parent('.cs-link').removeClass('active');
		});

		$('a.scroll').click(function() {
			if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			  var target = $(this.hash);
			  target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			  if (target.length) {
			    $('html,body').animate({
			      scrollTop: target.offset().top
			    }, 800);
			    return false;
			  }
			}
		});

		$('.team-about .text > h4, .team-about .tcrd img').click(function() {
			var $thisparent = $(this).closest('.team-about');
			$thisparent.toggleClass('open');
		});

		$(".gif-animate").hover(
	      function()
	        {
	          var src = $(this).attr("src");
	          $(this).fadeTo(300,0.3, function() {
	            $(this).attr("src", src.replace(/\.png$/i, ".gif"));
	          }).fadeTo(100,1);
	        },
	        function()
	        {
	          var src = $(this).attr("src");
	          $(this).fadeTo(300,0.3, function() {
	            $(this).attr("src", src.replace(/\.gif$/i, ".png"));
	          }).fadeTo(100,1);
	        });

		// checkbox/textarea anims on about page
		if($('#field_1_2').length > 0){
			$('#field_1_2 > label').click(function() {
				$(this).toggleClass('checked');
			});
		}


		$('a[href*="#"]:not([href="#"])').click(function() {
			if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			  var target = $(this.hash);
			  target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			  if (target.length) {
			    $('html, body').animate({
			      scrollTop: target.offset().top
			    }, 1000);
			    return false;
			  }
			}
		});

		$('.mobile-menu-toggle').click(function() {
			mobilemenutoggle();
		});


	});



} )( jQuery );