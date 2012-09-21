<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie lt-ie9" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="no-js lt-ie" lang="en"> <![endif]-->
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
<!--	<script src="/static/js/jquery.foundation.tabs.js"></script>	-->
	
	

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
	   $(window).load(function() {
	       $('#homeslide').orbit({
	       		animation: 'fade',
	       		timer: false,
	       		captions: false,
	       		bullets: true 
	       
	       
	       });
	   });
	</script>
	

	
	
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
	
	
	
	<script type="text/javascript">
		$(document).ready(function() {

			//ipad and iphone fix
			if((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i))) {
			    $(".documentation-nav li").click(function(){
			        //we just need to attach a click event listener to provoke iPhone/iPod/iPad's hover event
			        //strange
			    });
			}
		});
	</script>
	

</head>


  <body id="<?= basename($_SERVER['PHP_SELF'], ".php")?>" class="off-canvas hide-extras">		

	<div class="container">