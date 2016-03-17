/**
 * Functionality specific to Team Eight.
 *
 */

( function( $ ) {

var logobannerwrap = $(".logo-banner-wrap");

var homesize = function(){
	var windowHeight = $(window).height(),
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

	if ($( window ).scrollTop() > lbheight - 60) {
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

if (logobannerwrap.length > 0) {



	$(window).resize(function() {
		homesize();    
	});
	$(window).trigger('resize');


	$( window ).scroll(function(e) {
		homescrollheader();
	});
	
	homescrollheader();


} // end if .logo-banner-wrap


	$(document).ready(function(){

		$('body').addClass('loaded');
	
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

	});



} )( jQuery );