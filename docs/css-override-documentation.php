<?php $subtitle = "CSS Override Documentation";
include($_SERVER['DOCUMENT_ROOT'].'/includes/head.php');		
include($_SERVER['DOCUMENT_ROOT'].'/includes/header.php')?>

		
	<div class="row primary-row">	
  		
  		
  		
  		<section role="main">
  			
  			
  			<div class="row primary-container documentation ">
  				<div class="twelve columns">
  					<div class="row">
  					
  						<div class="three columns">
  							
  								
  							<?php include($_SERVER['DOCUMENT_ROOT'].'/includes/sidebar-docs.php')?>
  							
  							
  						</div>
  						
  						
  						<div class="seven columns offset-by-one end passage">
  						
  							<h2>CSS override / White label documentation</h2>
  							<h3>Loading the widget popup</h3>
  							
  							<p>To load the widget popup, one needs to set the id of the element that’s going to load the popup to the property “CtrlId” in integration code.</p>
  							
  							  							
<code>						
<pre>
&lt;script src="http://widget.boxpay.com/Scripts/Widget/BoxPay.Merchant.js" type="text/javascript"></script>
&lt;script type="text/javascript" language="javascript">
	jQuery(document).ready(function() { 
		BoxPay.Widget(1082, {
			CtrlId: 'paymentBoxLaunchControlId', ServiceId: '1041'
	}); 
});
&lt;/script>
</pre>
 </code> 		
 
 
					 		<h3>Controlling widget look and feel</h3>
					 		<p>To control the look and feel of the widget, it is possible to pass the full url of a custom css file in the property “CssUrl” in integration code.</p>
					 		
					 		<p>Note: once a new url of CSS is provided, new one will override the default CSS files, which means the new CSS files need to have all CSS classes, properties merged from the default CSS files and then be customized with new values. The default CSS files could be downloaded from <a href="https://widget.boxpay.com/content/widget/css/widget.all.css">https://widget.boxpay.com/content/widget/css/widget.all.css</a></p>
					 		
									 		
<code>						
<pre>
&lt;script src="http://widget.boxpay.com/Scripts/Widget/BoxPay.Merchant.js?v=2.013" type="text/javascript"></script> 
&lt;script type="text/javascript" language="javascript">
jQuery(document).ready(function() { 
	BoxPay.Widget(1082, { 
	CtrlId: 'paymentBoxLaunchControlId', 
	ServiceId: '1041',
	CssUrl: 'http://your-domain/custom-widget.css'
	}); 
}); 
&lt;/script>
</pre>
</code>					 		
					 	

							<h3>HTML Structure for Payment Item Selection Page with CSS framework</h3>
							
							
					<img src="/static/images/docs/css-01.gif" alt="HTML Structure for Payment Item Selection Page Diagram" />
									
							
  						
  						
<code>
<pre>
&lt;div id="WidgetPlaceHolder" class="widget-m PopupWindow"> 

  &lt;div id="widget-close-button" class="widget-head-close-m">&lt;/div> 
  
  &lt;div id="WidgetContentPlaceHolder" class="widget-body-m">
    
    &lt;div class="widget-head"> 
      &lt;div class="local-info">
        &lt;div class="language"> 
          &lt;span id="lng-label">English&lt;/span> 
          &lt;img id="lng-trigger">
        &lt;/div>
        &lt;div id="lang-list" class="lang-list"> &lt;/div> 
      &lt;/div>
    &lt;/div>
	
    &lt;div class="widget-body"> 
      &lt;form id="payment-item-form">
        &lt;div class="main-frame"> 
          &lt;div class="instruction-frame pay-selection">
            &lt;p class="main-instruction">Please select a payment item&lt;/p> 
            &lt;div class="payment-item-list-box">
              &lt;ul class="payment-item-list"> 
                &lt;li> Item 01 &lt;/li> 
                &lt;li> Item 02 &lt;/li> 
                &lt;li> Item 03 &lt;/li>
              &lt;/ul> 
            &lt;/div>
          &lt;/div> 

          &lt;p class="payment-item-error">
            &lt;label class="error" for="paymentItemId">Please select a payment item&lt;/label> 
          &lt;/p>
          &lt;input id="payment-item-submit" class="button-dis" type="submit" value="Continue"> 
        &lt;/div>
      &lt;/form>
    &lt;/div>
	
    &lt;div id="main-tc" class="widget-footer"> 
      TERMS AND CONDITIONS	
    &lt;/div>
	
  &lt;/div> 
&lt;/div>

&lt;div id="mask">&lt;/div>
</pre></code>


						  							<h3>HTML Structure for Enter Your Mobile Number Page with CSS framework</h3>
  						
  									<img src="/static/images/docs/css-02.gif" alt="HTML Structure for Enter Your Mobile Number Page with CSS framework Diagram" />
  													
  						
<code>
<pre>
&lt;div id="WidgetPlaceHolder" class="widget-m PopupWindow"> 
  
  &lt;div id="widget-close-button" class="widget-head-close-m">&lt;/div> 
  
  &lt;div id="WidgetContentPlaceHolder" class="widget-body-m">
  
    &lt;div class="widget-head"> 
      &lt;div class="local-info">
        &lt;div class="language">
          &lt;span id="lng-label">English&lt;/span>
          &lt;img id="lng-trigger"">
        &lt;/div>
        &lt;div id="lang-list" class="lang-list"> &lt;/div> 
      &lt;/div>
    &lt;/div>
    
    &lt;div class="widget-body"> 
      &lt;form id="msisdn-form">
        &lt;div class="main-frame">
          &lt;div class="instruction-frame">
          &lt;p id="title" class="main-instruction">Please enter your mobile number&lt;/p> 
          &lt;div class="widget-body-inner-body">
            &lt;input id="msisdn" class="text-box error"> 
            &lt;p class="msisdn-format-place-holder"> 
            &lt;label class="format-suggestion">Mobile Number Format ( 08 12345678 ) &lt;/label> 
            &lt;/p>
            &lt;p class="error-place-holder"> 
            &lt;label id="msisdn-err" class="error">Invalid mobile number&lt;/label> 
            &lt;/p>
          &lt;/div> 
        &lt;/div>
        &lt;input id="msisdn-submit" class="button-dis" type="submit" value="Send">
      &lt;/div>
      &lt;div class="price-frame"> 
      &lt;label class="style3">You will be charged EUR2.50&lt;/label> 
      &lt;/div>
    &lt;/form>
  &lt;/div>
  
  &lt;div id="main-tc" class="widget-footer"> 
    TERMS AND CONDITIONS
  &lt;/div>
  
  &lt;/div> 
&lt;/div>

&lt;div id="mask">&lt;/div>
</pre>
</code>  			


							


							<h3>HTML Structure for Payment processing page with CSS framework</h3>
							
							<img src="/static/images/docs/css-03.gif" alt="HTML Structure for Payment processing page with CSS framework Diagram" />


<code>
<pre>
&lt;div id="WidgetPlaceHolder" class="widget-m PopupWindow"> 

  &lt;div id="widget-close-button" class="widget-head-close-m">&lt;/div> 
    
    &lt;div id="WidgetContentPlaceHolder" class="widget-body-m">
      &lt;div class="widget-head"> 
        &lt;div class="local-info">
          &lt;div class="language"> 
            &lt;span id="lng-label">English&lt;/span> 
            &lt;img id="lng-trigger"">
          &lt;/div>
          &lt;div id="lang-list" class="lang-list"> &lt;/div> 
        &lt;/div>
      &lt;/div> 
      
      &lt;div class="widget-body">
        &lt;div class="main-frame"> 
          &lt;div class="instruction-frame-small">
            &lt;div id="payment-status" class="main-instruction"> 
              To complete your purchase of &lt;b>&lt;i>Item 02&lt;/i>&lt;/b>:
            &lt;/div> 
            &lt;p class="sms-instruction">
              Please send an SMS containing&lt;b>&lt;i>BOX&lt;/i>&lt;/b>to&lt;b>57599&lt;/b> 
            &lt;/p>
          &lt;/div> 
          
          &lt;div class="progress-frame">
            &lt;div class="ctrl-progress"> 
              &lt;ul class="payment-steps">
                &lt;li> 
                  &lt;img id="step1"> 
                  &lt;label class="current" for="step1">We are waiting for you to send the SMS&lt;/label>
                &lt;/li> 
                &lt;li>
                  &lt;img id="step2">
                  &lt;label for="step2">We are completing the payment&lt;/label>
                &lt;/li>
                &lt;li> 
                  &lt;img id="step3"> 
                  &lt;label for="step3">Payment Complete&lt;/label>
                &lt;/li> 
              &lt;/ul>
            &lt;/div> 
          &lt;/div>
        &lt;/div> 
        
        &lt;div class="price-frame">
          &lt;label id="billing-amount">You will be charged EUR2.50&lt;/label>
        &lt;/div>
      &lt;/div> 
      &lt;div id="main-tc" class="widget-footer">
        TERMS AND CONDITIONS 
      &lt;/div>
      &lt;a id="msisdn-change" class="msisdn-change">353861234567 - Change&lt;/a> 
    &lt;/div>
  &lt;/div> 
&lt;div id="mask">&lt;/div>
</pre>
</code>
			
  								<p>You can alter more separate elements as follows,</p>	
  								
  								<ol>
  								<li>To change the logo, you need to change the background image of the class <strong>“widget-head”</strong>.</li>
  								<li>To change the image of the close button which is at the top right corner, you need to change the
  								background image of the class <strong>“widget-head-close-m”</strong>.</li>
  								<li>Button class when enabled will be <strong>“button-en”</strong>.</li>
  								<li>Button class when disabled will be <strong>“button-dis”</strong>.</li>
  								</ol>				  						
  						
  						
  						</div>

  					</div>
  				</div>
  				
  				
 
  				
  				
  				
  			</div>		
  			
  			
  		
  		</section>
  		
  		
  		
	<?php include($_SERVER['DOCUMENT_ROOT'].'/includes/sidebar.php')?>
		
	</div><!-- container -->
			
  
<?php include($_SERVER['DOCUMENT_ROOT'].'/includes/footer.php')?>