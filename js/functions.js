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
		logobannerwrap = $(".logo-banner-wrap");

	if(windowwidth < 720){
		isSmallScreen = true;
	}

	$window.on('scroll resize', view_checker);
	
	function view_checker() {


		if (logobannerwrap.length > 0) {

			homesize();    			
			homescrollheader();

		} // end if .logo-banner-wrap
	

		if ($('img[data-srcset]').length > 0) {

			setTimeout( lloader(), 5000);    

		}

		if ($animation_elements.length > 0) {

			animate_in_view();

		}	

	}

	var homesize = function(){
		var windowHeight = $window.height(),
			parentwidth = logobannerwrap.width(),
			logobanner = $(".logo-banner"),
			logobannerafter = $(".logo-banner:after");
		var lbwidth = windowHeight*1.3;
		hm_height = windowHeight;
		logobannerwrap.outerHeight(hm_height);
		
		if(parentwidth < lbwidth) {
			logobanner.width('100%').css("paddingTop", '59%');
			//logobannerafter.css("paddingTop", logobanner.height());
		} else {
			logobanner.width(lbwidth).css("paddingTop", lbwidth*.59);
			//logobannerafter.css("paddingTop", lbwidth*.59);
		}

		var lbheight = logobannerwrap.height(),
			header = $('.header');
		
		if(header.hasClass("above")){
			header.addClass('above').css("top", lbheight - 60);
		}

	}
	var homescrollheader = function(){
		var lbheight = logobannerwrap.height(),
			header = $('.header');

		if ($window.scrollTop() > lbheight - 60) {
			if(!header.hasClass("below")){
				header.addClass("below").removeClass('above').css("top", "0");
			}
		} else {
			if(header.hasClass("below")){
				header.removeClass("below");
			}
			if(!header.hasClass("above")){
				header.addClass('above').css("top", lbheight - 60);
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
	    var $element = $(this);
	    var element_height = $element.outerHeight();
	    var element_top_position = $element.offset().top;
	    var element_bottom_position = (element_top_position + element_height);

	    //check to see if this current container is within viewport
	    if ((element_bottom_position >= window_top_position) &&
	        (element_top_position <= window_bottom_position)) {
	      $element.addClass('in-view');
	    } else {
	      $element.removeClass('in-view');
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

	

	$(document).ready(function(){

		$('body').addClass('loaded');
		
		$window.trigger('scroll');
		lloader(); 

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


	});



} )( jQuery );