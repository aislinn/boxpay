<?php include($_SERVER['DOCUMENT_ROOT'].'/includes/head.php')?>		
<?php include($_SERVER['DOCUMENT_ROOT'].'/includes/header.php')?>		
	
		
	<div class="row primary-row">	
  		
  		
  		
  		<section role="main">
  			
  			
  			<div class="row primary-container documentation ">
  				<div class="twelve columns">
  					<div class="row">
  					
  						<div class="three columns">
  							
  							
  							
  							<ul class="no-bullet documentation-nav nav-bar vertical">
	  							<li class="has-flyout">
	  								<a href="#">Getting Started</a>
	  								<ul class="flyout">
		  								<li><a href="#">How it works</a></li>
		  								<li><a href="#">Sign up</a></li>
		  								<li><a href="#">Your account</a></li>
	  								</ul>
	  							</li>
	  							
	  							
	  							
	  								  							
	  								<li class="has-flyout">
	  									<a href="#">Self Serve Widget</a>
	  									<ul class="flyout">
	  										<li><a href="#">Create a New Payment Box</a></li>
	  										<li><a href="#">Integrate Into Your Website</a></li>
	  										<li><a href="#">Payment Notification</a></li>
	  										<li><a href="#">Testing</a></li>
	  										<li><a href="#">Desktop Demo</a></li>
	  										<li><a href="#">Mobile Optimized Demo</a></li>
	  									
	  									</ul>
	  								</li>
	  								

	  								<li class="has-flyout">
	  									<a href="#">Android Billing SDK</a>
	  									<ul class="flyout">
	  										<li><a href="#">Documentation</a></li>
	  										<li><a href="#">Download</a></li>
	  										<li><a href="#">Demo</a></li>
	  									</ul>
	  								</li>
	  								
	  								<li class="has-flyout">
	  									<a href="#">Smart TV Billing</a>
	  									<ul class="flyout">
	  										<li><a href="#">Smart TV Documentation</a></li>
	  										<li><a href="#">Demo</a></li>
	  									</ul>
	  								</li>
	  								
	  								
	  								<li class="has-flyout">
	  									<a href="#">White Label and API</a>
	  									<ul class="flyout">
	  										<li><a href="#">CSS Override / White label Documentation</a></li>
	  										<li><a href="#">Merchant API Documentation</a></li>
	  										<li class="active"><a href="#">Core API Documentation</a></li>
	  										<li><a href="#">Getting Access</a></li>
	  									</ul>
	  								</li>
	  								
	  								<li class="has-flyout">
	  									<a href="#">Application Forms</a>
	  									<ul class="flyout">
	  										<li><a href="#">USA Direct Carrier Billing</a></li>
	  										<li><a href="#">General Service Approval</a></li>
	  										<li><a href="#">Subscription</a></li>
	  									</ul>
	  								</li>
	  								
	  								<li class="has-flyout">
	  									<a href="#">General</a>
	  									<ul class="flyout">
	  										<li><a href="#">Merchant FAQ</a></li>
	  										<li><a href="#">Security</a></li>
	  										<li><a href="#">Pricing</a></li>
	  									</ul>
	  								</li>
	  								
	  								
	  								<li class="has-flyout">
	  									<a href="#">Integration Support</a>
	  									<ul class="flyout">
	  										<li><a href="#">Integration Support</a></li>
	  									</ul>
	  								</li>
	  								
	  								<li class="has-flyout">
	  									<a href="#">Sales Support</a>
	  									<ul class="flyout">
	  										<li><a href="#">Sales Support</a></li>
	  									</ul>
	  								</li>
	  							
	  							
	  							

  							</ul>
  							
  							
  						</div>
  						
  						
  						<div class="seven columns offset-by-one end passage">
  						
  							<h1>Core API documentation</h1>
  							<h3>Introduction</h3>
  							
  							<p>boxPAY provides ready-made payment solutions for a variety of platforms: </p>
  							
  							<ul>
  							<li>Desktop Payment box (desktop web browsers)</li>
  							<li>Smartphone Widget (used in Smartphone browsers on iPhone, Android, Blackberry, Windows Phone)</li>
  							<li>Android SDK for Android App Billing</li>
  							<li>Feature Phone Widget – (used in browsers of feature phones)</li>
  							</ul>
  							
  							<p>The boxPAY Core API is an additional option to approved merchants who wish to further tailor the user experience and provide a more seamless transition between the merchant’s website, mobile website or app and the customer payment process.</p>
  							
  							
  							<h3>Consumers of the boxPAY Core API</h3>
  							<p>The Core API can be consumed by server and client devices alike. By default, there are no IP restrictions. This gives the merchant the option to either develop a purely client side solution, or one that involves both client and server side.</p>
  						
  						
  							<h3>Security</h3>
  							
  							<p>By default, the API can be called by any client device. Fulfilment of service depends on reliable communication of the status of the payment between boxPAY and merchant. This communication consists of:</p>
  							
  							<ul>
  							<li>Server to Server push notification between boxPAY and the merchant. This is the NotificationURL that is defined by the merchant when setting up the payment box on the boxPAY portal (www.boxpay.com). boxPAY call this URL every time there is a change in the status of a payment.</li>
  							<li><em>CheckStatus</em> API call. This can be called by client device or merchant server to provide details on the status of a payment. boxPAY recommend that fulfilment of the service to the customer be handled by the merchant system, not by the client side solution (e.g client app). boxPAY provides a more secure <em>CheckStatus</em> API call in the <strong>Merchant API</strong> which is discussed later in this document.</li>
  							</ul>  							
  							

					 		<p>Merchants have the option to turn off client side access to the Core API completely (if the merchant is developing a server side solution and is thus acting as a proxy between the client and boxPAY) or to only allow access to clients that present a valid “Access Token”. The “Access Token” is generated by boxPAY via a secure call from the Merchant server. More details on this are available on request.</p>
					 		
					 		<h3>Merchant API</h3>
					 
					 		<p>boxPAY also provides a Merchant API that provides extra security and is accessible only by the merchant. Fulfilment of service to the customer should rely on the CheckStatus API call of the Merchant API or the boxPAY to Merchant notification (server-to-server) via the “NotificationURL”. This is described further on the boxPAY portal at www.boxpay.com</p>
					 		
					 		<p>Documentation on the Merchant API will be provided separately.</p>
					 		
			 		
					 		<h3>Compliance and Approval</h3>
					 		
					 		<p>The boxPAY Core API allows merchants to customize the user payment process. This process involves strict regulations and as such the merchant must adhere to the guidelines set out by boxPAY and present all required information to the user. Failure to do so will result in immediate termination of service. Merchants must apply to boxPAY for approval of all services that use the Core API before going to market.</p>
					 	
  						
							<h3>Summary of the Core API’s functionality</h3>
							
							<p>The boxPAY Core API can be divided into 2 distinct types of calls:</p>
							
							<ul>
							<li>Payment API calls – these are calls related to creating and processing payment sessions</li>
							<li>Helper functions – additional functions to retrieve infrequently changing data, e.g. list of
							network operators, prices available in a country etc.</li>
							</ul>
							
							<h3>Processing customer mobile numbers</h3>
		
							<p>While the API handles the appropriate payment process in each country, the merchant will need to process the user’s mobile number. For a successful payment to be made through the API, the merchant will often need to pass the MSISDN (user’s mobile phone number) when initiating the payment process. This MSISDN must be a valid number in international format, so the merchant must perform the necessary validation and processing to provide it as such. boxPAY provides support and code snippets to assist in this regard. These are included in this document in Appendix F.</p>
							
							
							<h3>URLs</h3>
							<p><a href="http://api.boxpay.com/v1_5.asmx">http://api.boxpay.com/v1_5.asmx</a><br />
							The API is currently available in SOAP XML. The WSDL can be found at <a href="http://api.boxpay.com/v1_5.asmx?WSDL">http://api.boxpay.com/v1_5.asmx?WSDL</a></p>
							
							
							<h3>Support</h3>
							<p>For all support queries, contact <a href="mailto:support@boxpay.com">support@boxpay.com</a></p>

	
	
  							<h3>Payment API Calls Summary</h3>
  							<ul class="no-bullet">
  							<li><strong>InitiatePayment</strong> – Initiates a payment session on the boxPAY platform Set</li>
  							<li><strong>MSISDN</strong> – Assigns the user’s mobile number to the payment session </li>
  							<li><strong>GetPaymentInfo</strong> – Gets static information relating to a payment item for as specific country</li>
  							<li><strong>CheckStatus</strong> – Provides status information on a payment session </li>
  							<li><strong>ValidatePIN</strong> – Validates a PIN sent to the user and completes payment for valid pin </li>
  							<li><strong>SendSimulatedMessage</strong> – Used in Simulation mode ONLY to simulate a message sent from the user’s handset to boxPAY </li>
  							<li><strong>GetSimulatedMessages</strong> – Used in Simulation mode ONLY to retrieve simulated messages sent from boxPAY to the user’s handset </li>
  							<li><strong>ProcessPaymentSessionFromLink</strong> - This API call is currently not to be used by Merchants </li>
  							<li><strong>GetReturnUrl</strong> – Retrieves the URL to which the user should be redirected. This is defined by the merchant on payment session initialization. The merchant will not be required to use this API call </li>
  							<li><strong>IPAddressToCountryCode</strong> – Performs an IP lookup to return the country to which the IP address belongs </li>
  							
  							</ul>
  							
  							<h3>Helper Functions Summary</h3>
  							
  							<ul class="no-bullet">
  							
  							<li><strong>GetNetworks</strong> – Gets a list of networks for a specified country </li>
  							<li><strong>GetAllNetworks</strong> – Gets a complete list of networks for all countries </li>
  							<li><strong>GetCountries</strong> – Retrieves a list of countries supported by boxPAY </li>
  							<li><strong>GetCountry</strong> – Retrieves details for a specific country supported by boxPAY </li>
  							<li><strong>GetNetworkMapping</strong> – Retrieves information to map MMC MNC values to boxPAY network id, which is used in other API calls </li>
  							<li><strong>GetPrices</strong> – Retrieves the available price points for a specified country</li>
  							
  							</ul>
  						

  							<h3>1. InitiatePayment</h3>
  						
  							<p>This method is used to initiate a payment for a specific item. The payment item must be set up in the Payment Box admin on the boxpay.com website prior to using this method.</p>
  							
  							<p>Full details on the format of the request are detailed here: <a href="http://api.boxpay.com/v1_5.asmx?op=InitiatePayment">http://api.boxpay.com/v1_5.asmx?op=InitiatePayment</a></p>
  						
  							<h4>Request</h4>
  						
  						
  							<table>

							<thead>
								<tr>
								<th>Parameter</th>
								<th>Description</th>
								<th>Required</th>
								</tr>
							</thead>
							
							
							<tbody>
								<tr>
								<td>ServiceId</td>
								<td>boxPAY service Id. This is the ID for your Payment Box.</td>
								<td>Yes</td>
								</tr>
								
								<tr>
								<td>CountryCode</td>
								<td>The ISO 3166-1 alpha-2 code (i.e. 2 letter code) for a country.</td>
								<td>Yes</td>
								</tr>
								
								<tr>
								<td>SimulationMode</td>
								<td>A Boolean value (true/false) to indicate whether the payment is real (SimulationMode =False), i.e. the user will be charged OR virtual (SimulationMode =True). When SimulationMode =False, you will need to use an actual handset to complete the payment. When SimulationMode =True, you will need to use the Test Console (at <a href="http://www.boxpay.com/MerchantTool">http://www.boxpay.com/MerchantTool</a>) OR the <em>SendSimilatedMessage</em> and <em>GetSimulatedMessages</em> calls to simulate the payment.</td>
								<td>Yes</td>
								</tr>
								
								<tr>
								<td>MSISDN</td>
								<td>The user’s mobile number, in international format. E.g 447123456789 (in the U.K.). It can also be omitted in this call and, if MSISDNRequired =true in the response should be later set (after taking number from user) via the <em>SetMSISDN</em> API call. See Appendix F for help in getting the international MSISDN.</td>
								<td>No</td>
								</tr>
								
								
								<tr>
								<td>ItemCode</td>
								<td>Your custom code for the payment item (this is unique to your service in any given country)</td>
								<td>Yes</td>
								</tr>
								
								<tr>
								<td>LanguageCode</td>
								<td>2-character ISO 639-1 code that specifies the language to be used. This must either be the default or another language that has been configured in the payment box admin. If not specified, then the default language of the country code will be used. E.g. “en”</td>
								<td>No</td>
								</tr>
								
								<tr>
								<td>CustomString</td>
								<td>Any custom string. This value will be included in the GET request to the service's NotificationURL (server side)</td>
								<td>No</td>
								</tr>
								
								<tr>
								<td>NetworkId</td>
								<td>An integer value indicating the user’s network operator(carrier). A list of NetworkIds and associated networks is available in the <em>GetNetworks</em> and <em>GetAllNetworks</em> call. A value of 0 should be passed if network is not known.</td>
								<td>Yes</td>
								</tr>
								
								<tr>
								<td>ClientPlatform</td>
								<td>String value - Please refer to Appendix D – Client Platforms</td>
								<td>Yes</td>
								</tr>
								
								
								<tr>
								<td>ReturnUrl</td>
								<td>The URL to which the user should be returned on completing/exiting payment process. This is only used for third party implementations.</td>
								<td>No</td>
								</tr>
								
								
								<tr>
								<td>ReturnAllResources</td>
								<td>A Boolean (true/false) value to indicate if all resources should be returned. Resources provide the text that should be displayed to user throughout the payment process</td>
								<td>Yes</td>
								</tr>
								
								<tr>
								<td>Server</td>
								<td>A Boolean (true/false) value to indicate if the requesting is originating from a merchant server (Server=true) or a client device (Server=false)</td>
								<td>Yes</td>
								</tr>
								
								<tr>
								<td>Reference</td>
								<td>SNot currently used. Supply any string value.</td>
								<td>No</td>
								</tr>
								
								<tr>
								<td>AccessToken</td>
								<td>If additional security is enabled then a valid token should be passed. By default, a blank string should be passed.</td>
								<td>No</td>
								</tr>
								


							</tbody>
							</table>
  							  		
  							  		
  							  		
  							  		
  							  <h4>Response</h4>
  							    						
    						
    					<table>
  
  							<thead>
  								<tr>
  								<th>Parameter</th>
  								<th>Description</th>
  					
  								</tr>
  							</thead>
  							
  							
  							<tbody>
  								<tr>
  								<td>RequestProcessed</td>
  								<td>A Boolean value (true or false) to indicate whether or not the request was processed successfully.</td>
  								</tr>	
  								
  								<tr>
  								<td>ReasonCode</td>
  								<td>An enumeration to give extra details on the reason for the result given by RequestProcessed</td>
  								</tr>	
  								
  								<tr>
  								<td>AdditionalInfo</td>
  								<td>Additional textual info for debugging purposes</td>
  								</tr>	
  								
  								<tr>
  								<td>PaymentItemInfo</td>
  								<td>Refer to PaymentItemInfo in Appendix E for more details</td>
  								</tr>	
  								
  								<!-- hjh jj hkjhk jhjk -->
  								
  								<tr>
  								<td>RequestProcessed</td>
  								<td>A Boolean value (true or false) to indicate whether or not the request was processed successfully.</td>
  								</tr>	
  								
  								<tr>
  								<td>RequestProcessed</td>
  								<td>A Boolean value (true or false) to indicate whether or not the request was processed successfully.</td>
  								</tr>	
  								
  								<tr>
  								<td>RequestProcessed</td>
  								<td>A Boolean value (true or false) to indicate whether or not the request was processed successfully.</td>
  								</tr>	
  								
  								<tr>
  								<td>RequestProcessed</td>
  								<td>A Boolean value (true or false) to indicate whether or not the request was processed successfully.</td>
  								</tr>	
  								
  								<tr>
  								<td>RequestProcessed</td>
  								<td>A Boolean value (true or false) to indicate whether or not the request was processed successfully.</td>
  								</tr>	
  								
  								<tr>
  								<td>RequestProcessed</td>
  								<td>A Boolean value (true or false) to indicate whether or not the request was processed successfully.</td>
  								</tr>		
  		
  							</tbody>
  		
  						</table>	  		
  							  		
  							  		
  							  		
  							  		
  							  						
  						
  						
  						
  						</div>

  					</div>
  				</div>
  				
  				
 
  				
  				
  				
  			</div>		
  			
  			
  		
  		</section>
  		
  		
  		
  		
	<?php include($_SERVER['DOCUMENT_ROOT'].'/includes/sidebar.php')?>	
		
	</div><!-- container -->
			
  
<?php include($_SERVER['DOCUMENT_ROOT'].'/includes/footer.php')?>	