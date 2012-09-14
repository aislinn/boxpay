<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />

	<title><?php if (isset($subtitle)) { echo $subtitle; } ?> | boxPAY</title>
  
	<!-- Included CSS Files -->
	
	

	<!--<base href="http://localhost:8888/" />-->
	
	
	
	
		
	<link rel="stylesheet" href="/static/stylesheets/foundation.css">
	<link rel="stylesheet" href="/static/stylesheets/offcanvas.css">
	<link rel="stylesheet" href="/static/stylesheets/app.css">
	
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
	
	<!-- Typekit -->	
	<script type="text/javascript" src="//use.typekit.net/nsb4bvi.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
	<!-- Modernizr -->
	<script src="/static/js/modernizr.foundation.js"></script>
	<!-- HTML5 -->	
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	
	
	<!-- Included JS Files -->
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script type="text/javascript">
	if (typeof jQuery == 'undefined'){
	    document.write(unescape("%3Cscript src='javascripts/jquery.js' type='text/javascript'%3E%3C/script%3E"));
	}
	</script>

	<!-- Combine and Compress These JS Files -->
	<script src="/static/js/jquery.reveal.js"></script>
	<script src="/static/js/jquery.orbit-1.4.0.js"></script>
	<script src="/static/js/jquery.customforms.js"></script>
	<script src="/static/js/jquery.placeholder.min.js"></script>
	<script src="/static/js/jquery.tooltips.js"></script>
	<!-- End Combine and Compress These JS Files -->
	<script src="/static/js/app.js"></script>
	<script src="/static/js/jquery-ui-1.8.23.custom.min.js"></script>	
	<script src="/static/js/jquery.offcanvas.js"></script>
	<script src="/static/js/jquery.foundation.tabs.js"></script>	
	
	
	<script type="text/javascript" src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=AIzaSyA2BE9yomU4puvJCtL-cA7ai6PHHr-m0o8"></script>
	
	
	<script src="/static/js/gmaps.js"></script>
	<script src="/static/js/mobile-gmaps.js"></script>
	
	<script>
		$(function() {
			$( "#accordion" ).accordion({
				collapsible: true,
				autoHeight: false,
				active: 'none'
			});
		});
		$(document).foundationNavigation();
		$(document).foundationTabs();
		$(document).foundationCustomForms();
	</script>
	
	
	
	<script type="text/javascript">
	$(document).ready(function() {
	   
	    $("#map").gMap( {	
	    	latitude:	53.340120;
	    	longitude: -6.239204,
	    	zoom: 		12 });
	    	
	    	
//	    $('#map').mobileGmap();
		
	});
	</script>
	
	
	
	<script type="text/javascript">
	   $(window).load(function() {
	       $('#homeslide').orbit({
	       		animation: 'fade',
	       		timer: false 
	       
	       
	       });
	   });
	</script>
	

	
	
<!--	

	<!--[if lt IE 8]><link rel="stylesheet" type="text/css" media="screen" href="/static/stylesheets/demo-styles-ie.css" /><![endif]--*>
	<link rel="stylesheet" type="text/css" media="screen" href="/static/stylesheets/sequencejs-theme.modern-slide-in.css" />-->
	
	

	<!--
	<script type="text/javascript" src="/static/js/sequence.jquery-min.js"></script>
	<script type="text/javascript">	
			
			/mobile/i.test(navigator.userAgent) && !location.hash && setTimeout(function () {
			  if (!pageYOffset) window.scrollTo(0, 1);
			}, 1000);
			
			$(document).ready(function(){
				var options = {
					nextButton: true,
					prevButton: true,
					animateStartingFrameIn: true,
					transitionThreshold: 250,
					autoPlayDelay: 6000,
					
					afterLoaded: function(){
						$("#nav").fadeIn(100);
						$("#nav li:nth-child("+(sequence.settings.startingFrameID)+") img").addClass("active");
					},
					beforeNextFrameAnimatesIn: function(){
						$("#nav li:not(:nth-child("+(sequence.nextFrameID)+")) img").removeClass("active");
						$("#nav li:nth-child("+(sequence.nextFrameID)+") img").addClass("active");
					}
				};
	
				var sequence = $("#sequence").sequence(options).data("sequence");
				
				$("#nav li").click(function(){
					if(!sequence.active){
						$(this).children("img").removeClass("active").children("img").addClass("active");
						sequence.nextFrameID = $(this).index()+1;
						sequence.goTo(sequence.nextFrameID);
					}
				});
			});
		</script>	
		-->
	
	<script type="text/javascript">
		$(document).ready(function() {
		  $(".faq-a, .press-a").hide();
		  //toggle the componenet with class msg_body
		  $(".faq-q, .press-q").click(function()
		  {
		    $(this).next(".faq-a, .press-a").slideToggle(500);
		  });
		});
	</script>
	
	

</head>


  <body id="<?= basename($_SERVER['PHP_SELF'], ".php")?>" class="off-canvas hide-extras">		

	<div class="container">