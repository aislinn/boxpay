<?php $subtitle = "Merchant API Documentation";
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
  						
  							<h2>Merchant API documentation</h2>
  							<h3>Introduction</h3>
  							
  							<p>The boxPAY Merchant API provides a secure means for merchants to interact with the boxPAY platform to query merchant specific information for one-off and subscription services. This document describes the API calls that can be used for all types of services as well as additional functionalities available for subscription services and steps required to enable subscription services.</p>
  							
  							
  							<h3>Prerequisites for Subscription</h3>
  							
  							<ol>
  							
  							<li>The merchant should liaise with boxPAY (via <a href="mailto:contact@boxpay.com">contact@boxpay.com</a> or through direct channels) to agree on the relevant subscription models, based on:
  							
  								<ul>
  								
  									<li>Price point</li>
  									<li>Billing frequency (in days) - Please note that the first billing cycle is the initial payment made through the payment box – (or via the standard API). Subsequent billing cycles are handled by boxPAY and will be a number of days after the initial billing, as defined by the billing frequency.</li>
  								
  								</ul>
  							
  							</li>
  							
  							<li>The merchant requires approval from boxPAY before a subscription service is enabled. The subscription service is assigned to a specific merchant payment box. This should be set up as normal through the boxpay.com website, noting that only 1 payment item can be used for any given country.</li>
  				
  							</ol>
  						
  						
  							<h3>Additional Integration for Subscription</h3>
  							
  							<p>In addition to the default integration as detailed in the merchant portal at <a href="http://www.boxpay.com">www.boxpay.com</a>, the following additions are applicable to subscription services:</p>
  					
  							
  							<ol>
  							<li>Payment Status Notification – The subscription status is an additional parameter that is passed to the merchant in the client side “RedirectUrl” and the server to server request via the Notification URL (as set in the payment box setup). The parameter name is <em>SubStatus</em>. Possible values are defined in Appendix B (Subscription Status). Note that the status of the subscription in no way affects the status of the payment session itself and conversely the status of the payment does not completely affect the status of the subscription. E.g Even if the payment fails, the customer can still be successfully subscribed to the service. E.g the user may opt in but have insufficient credit to make the initial payment.</li>
  							
  							<li>The Subscription API calls described in this document. This allows the merchant to:
  								<ul>
  								<li>Get a list of subscribers (active and inactive) for a given service (via GetSubscribers call)</li>
  								<li>For any given subscriber, retrieve the subscriber’s spend on a given day</li>
  								<li>Remove a subscriber from the subscription (via Unsubscribe call) – This will cancel a
  								user’s subscription</li>
  								</ul>
  							
  							</li>
  							
  							
  							<li>Subscription Notification – This is to notify the merchant that a periodic transaction for a subscription service has taken place and that the merchant’s user has been charged. This notification should be used to credit the user’s account with the appropriate service. Please see the information sent to the merchant in Subscription Notification.</li>
  							
  							
  							</ol>
  					
  					
  					
  							<h3>API Format and URLs</h3>
  							<p>The API is currently available in SOAP XML via HTTP GET and POST. JSON is also available by using HTTP POST with the request content type set to “application/json”.</p>
  							
  							<p>The WSDL can be found at<br/>
  							<a href="http://api.boxpay.com/merchants/v1_4.asmx?WSDL">http://api.boxpay.com/merchants/v1_4.asmx?WSDL</a></p>
  							
  							<p>Example request and response formats are available at
  							<a href="http://api.boxpay.com/merchants/v1_4.asmx">http://api.boxpay.com/merchants/v1_4.asmx</a></p>
  							
  							
  							<h3>Support</h3>
  							<p>For all support queries, contact <a href="mailto:support@boxpay.com">support@boxpay.com</a></p>
  							
  					
  					
  							<h2>General API calls</h2>
  							<p>The following API calls are applicable to both payment models (subscription/one-off payments).</p>
  							
  							
  							<h3>1. CheckStatus</h3>
  							<p>This method is used to check the status of a payment session. It can be called at regular intervals until such time as:</p>
  							
  							<ul>
  							<li>The payment is successful or </li>
  							<li>The payment fails or </li>
  							<li>The payment is still pending after a considerable period of time (in such cases the merchant will still be notified of an eventual successful payment via the server side request to the Notification URL)</li>
  							</ul>
  							
  							
  							<p>The merchant should allow at least 2 seconds between each CheckStatus request.</p>
  							
  							<p>Full details on the format of the request are detailed here:
  							<a href="http://api.boxpay.com/ Merchants/v1_4.asmx?op=CheckStatus">http://api.boxpay.com/ Merchants/v1_4.asmx?op=CheckStatus</a></p>
  					
  							
  							
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
									<td>SessionId</td>
									<td>The unique identifier for the payment session, as returned in <em>InitiatePayment.</em></td>
									<td>Yes</td>
									</tr>
									
									<tr>
									<td>Signature</td>
									<td>MD5 Hash of the concatenation of your Private Key and the above parameter values in order shown. <em>MD5(PrivateKey+ SessionId)</em></td>
									<td>Yes</td>
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
								<td>A Boolean value (true or false) to indicate whether or not the request was processed successfully. This has no bearing on the status of the payment.</td>
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
								<td>Charged</td>
								<td>A decimal value indicated the amount of local currency that has been successfully charged to the user.</td>
								</tr>
								
								<tr>
								<td>Status</td>
								<td>Indicates the success or otherwise of this call. Possible values are: 
								
								<ul class="no-bullet">
								
								<li><strong>SUCCESS:</strong> the request was processed successfully and the payment has
								been successfully completed. No further action is necessary.</li> 
								<li><strong>PENDING:</strong> the request was processed successfully. Payment has not yet
								been completed (may require user interaction)</li>
								<li><strong>FAILED:</strong> the request and/or payment failed. More details provided in StatusReason</li>
								
								</ul>
								</td>
								</tr>
								
								<tr>
								<td>StatusReason</td>
								<td>Provides extra details on the Status so that appropriate action can be taken. A detailed list of the Reason Codes is provided in Appendix A.</td>
								</tr>
								
								<tr>
								<td>UserMessageHTML</td>
								<td>An instructional message that should be displayed to the user to direct the user on how to proceed. This can include HTML markup.</td>
								</tr>
								
								<tr>
								<td>MSISDN</td>
								<td>The user’s mobile number, in international format. E.g a number in the UK will be of the form <em>447123456789</em>.</td>
								</tr>
								
								<tr>
								<td>NetworkId</td>
								<td>An integer value indicating the user’s network operator(carrier). A list of NetworkIds and associated networks will be provided on request. The value 0 means as yet unidentified.</td>
								</tr>
								
								<tr>
								<td>SubscriptionStatus</td>
								<td>Applicable to Subscription Services only (see Appendix B)</td>
								</tr>
								
								<tr>
								<td>ReturnUrl</td>
								<td>This is the ReturnUrl value passed to boxPAY by the merchant.</td>
								</tr>
								
								
								
								</tbody>
								
								</table>

  					
  							<h3>2. GetPayouts</h3>
  					
  							<p>This method is used to retrieve the payout to a merchant for all price points in a country.</p> 
  							<p>Full details on the format of the request are detailed here:
  							<a href="http://api.boxpay.com/merchants/v1_4.asmx?op=GetPayouts">http://api.boxpay.com/merchants/v1_4.asmx?op=GetPayouts</a></p>
  							
  					
  											
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
									<td>CountryCode</td>
									<td>The two-letter ISO country code of the required country</td>
									<td>Yes</td>
									</tr>
									
									<tr>
									<td>NetworkId</td>
									<td>An integer value indicating the network operator (carrier). A list of NetworkIds and associated networks will be provided on request. The value 0 can be used to return payouts for all networks</td>
									<td>Yes</td>
									</tr>
									
									<tr>
									<td>MerchantId</td>
									<td>Your own merchantId. This is shown in the “Payment Boxes” page in the boxPAY portal. (beside the account email address).</td>
									<td>Yes</td>
									</tr>
									
									<tr>
									<td>Signature</td>
									<td>MD5 Hash of the concatenation of your Private Key and the above parameter values in order shown. <em>MD5(PrivateKey+ CountryCode+NetworkId+MerchantId)</em></td>
									<td>Yes</td>
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
								<td>CountryCode</td>
								<td>Two letter ISO country code</td>
								</tr>
								
								
								<tr>
								<td>CurrencyCode</td>
								<td>The ISO 4217 currency code indicating the local currency</td>
								</tr>
								
								
								<tr>
								<td>MerchantId</td>
								<td>Your merchant Id</td>
								</tr>
								
								
								<tr>
								<td>NetworkId</td>
								<td>The network Id of the payout amount</td>
								</tr>
								
								<tr>
								<td>Price</td>
								<td>The end user charge in local currency</td>
								</tr>
								
								<tr>
								<td>Payout</td>
								<td>The payout in local currency</td>
								</tr>
			
								</tbody>
								
								</table>

  					
  					
  					
  					
  					<h2>Subscription API calls</h2>
  					
  					
  					<h3>1. GetSubscribers</h3>
  					
  					<p>This method is used to retrieve the list of subscribers for a given service/payment box. A subscriber is any user that was subscribed to the service at any point.</p>
  					
  					<ul>
  					<li>Active - still subscribed to the service </li>
  					
  					<li>Inactive - not currently subscribed to the service. User may have stopped (unsubscribed) or been removed by merchant/customer service.</li>
  					
  					</ul>
  					
  					<p>Full details on the format of the request are detailed here:
  					<a href="http://api.boxpay.com/merchants/v1_4.asmx?op=GetSubscribers">http://api.boxpay.com/merchants/v1_4.asmx?op=GetSubscribers</a></p>
  					
  	
  					
   											
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
							<td>CountryCode</td>
							<td>The two-letter ISO country code to denote the country of the payment box/service.</td>
							<td>Yes</td>
							</tr>
							
							<tr>
							<td>ServiceId</td>
							<td>The ID of the payment box to query subscription transactions for</td>
							<td>Yes</td>
							</tr>
							
							<tr>
							<td>SubscriptionStatus</td>
							<td>This is a filter of the results to return only those active subscriptions or only the inactive instances, or both. -1 = Both Active and Inactive, 1 = Active, 0 = Inactive.</td>
							<td>Yes</td>
							</tr>
							
							<tr>
							<td>Signature</td>
							<td>MD5 Hash of the concatenation of your Private Key and the above parameter values in order shown. <em>MD5(PrivateKey+ CountryCode+ServiceId+SubscriptionStatus)</em></td>
							<td>Yes</td>
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
  								<td>Active</td>
  								<td>(Boolean) True if subscriber is still subscribed to the service, false otherwise.</td>
  								</tr>
  								
  								<tr>
  								<td>LastPaymentCycleDateGMT</td>
  								<td>(DateTime) The date and time of the most recent billing attempt to charge the user.</td>
  								</tr>
  								
  								<tr>
  								<td>UnsubscribedDate</td>
  								<td>The date the customer unsubscribed from this subscription. A default value of “1900-01-01” is given if the subscription is still active.</td>
  								</tr>
  								
  								<tr>
  								<td>NetworkId</td>
  								<td>An integer value indicating the user’s network operator(carrier). A list of NetworkIds and associated networks will be provided on request. The value 0 means as yet unidentified.</td>
  								</tr>
  								
  								
  								<tr>
  								<td>MSISDN</td>
  								<td>The user’s mobile number</td>
  								</tr>
  								
  								
  								<tr>
  								<td>PaymentSessionId</td>
  								<td>The initial payment session relating to this subscriber</td>
  								</tr>
  								
  								
  								</tbody>
  								
  								</table>
  								
  								
  													
  					
  					<h3>2. GetSubscriberSummary</h3>
  					
  					<p>This method is used to retrieve payment information for a subscriber on a given day. The returned result contains details on any payment made, after the initial payment, i.e. the initial payment is not included in the result of this API call.</p>
  					
  					<p>Note: <em>CheckStatus</em> should be used to query the payment information etc for the user’s initial payment</p>
  					
  					<p>Full details on the format of the request are detailed here:
  					<a href="http://api.boxpay.com/merchants/v1_4.asmx?op=GetSubscriberSummary">http://api.boxpay.com/merchants/v1_4.asmx?op=GetSubscriberSummary</a></p>
  					
  					
  
  
     											
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
  							<td>PaymentSessionId</td>
  							<td>The ID of the payment session that entered the customer into the subscription.</td>
  							<td>Yes</td>
  							</tr>
  							
  							<tr>
  							<td>Day</td>
  							<td>A datetime representing any day during which the user may have been charged by the subscription. This will be of the format YYYY- MM-DD, e.g ‘2012-01-31’</td>
  							<td>Yes</td>
  							</tr>
  
  							<tr>
  							<td>Signature</td>
  							<td>MD5 Hash of the concatenation of your Private Key and the above parameter values in order shown. <em>MD5(PrivateKey+ PaymentSessionId+Day)</em></td>
  							<td>Yes</td>
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
    								<td>PaymentCycle</td>
    								<td>An integer value indicating the subscriber’s current payment cycle.</td>
    								</tr>
    								
    								
    								<tr>
    								<td>LocalCurrency</td>
    								<td>The ISO 4217 currency code of the payment currency.</td>
    								</tr>
    								
    								
    								<tr>
    								<td>HomeCurrency</td>
    								<td>The ISO 4217 currency code of the merchant’s home currency as specified in profile settings in merchant portal.</td>
    								</tr>
    								
    								
    								
    								<tr>
    								<td>ExchangeRate</td>
    								<td>The exchange rate from LocalCurrency to HomeCurrency as of the date of LastPaymentCycleDateGMT.</td>
    								</tr>
    								
    								
    								<tr>
    								<td>LCSpend</td>
    								<td>The end user charge in local currency</td>
    								</tr>
    								
    								
    								<tr>
    								<td>HCSpend</td>
    								<td>The equivalent of LCSpend in the merchant’s home currency based on exchange rate on that day</td>
    								</tr>
    								
    								<tr>
    								<td>LCPayout</td>
    								<td>The merchant payout amount in local currency.</td>
    								</tr>
    								
    								
    								<tr>
    								<td>HCPayout</td>
    								<td>The equivalent of LCPayout in the merchant’s home currency based on exchange rate on that day</td>
    								</tr>
    								
    								
    								<tr>
    								<td>Active</td>
    								<td>(Boolean) True if subscriber is still subscribed to the service, false otherwise.</td>
    								</tr>
    								
    								
    								<tr>
    								<td>LastPaymentCycleDateGMT</td>
    								<td>The date of the last recurring payment.</td>
    								</tr>
    								
    								
    								<tr>
    								<td>SubscriptionDate</td>
    								<td>The date the user subscribed. (i.e. the Initial Payment Session date)</td>
    								</tr>
    								
    								<tr>
    								<td>UnsubscribedDate</td>
    								<td>The date the customer unsubscribed from this subscription. A default value of “1900-01-01” is given if the subscription is still active.</td>
    								</tr>
    								
    								
    								<tr>
    								<td>NetworkId</td>
    								<td>An integer value indicating the subscriber’s network.</td>
    								</tr>
    								
    								
    								<tr>
    								<td>MSISDN</td>
    								<td>The user’s mobile number</td>
    								</tr>
    								
    								<tr>
    								<td>PaymentSessionId</td>
    								<td>The initial payment session relating to this subscriber</td>
    								</tr>
    								
    								
    								
    								
    								
    								</tbody>
    								
    								</table>
  					
  					
  					
  						<h3>3. Unsubscribe</h3>
  						
  						<p>This method is used to cancel a user’s subscription. All pending charges will be cancelled and a confirmation message will be sent to the user (if applicable).</p>
  						
  						<p>Full details on the format of the request are detailed here:
  						<a href="http://api.boxpay.com/Merchants/v1_4.asmx?op=Unsubscribe">http://api.boxpay.com/Merchants/v1_4.asmx?op=Unsubscribe</a></p>
  					
  					
  					
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
							<td>InitialPaymentSessionId</td>
							<td>The unique identifier for the payment session</td>
							<td>Yes</td>
							</tr>
		
							<tr>
							<td>Signature</td>
							<td>MD5 Hash of the concatenation of your Private Key and the above parameter values in order shown. <em>MD5(PrivateKey+ InitialPaymentSessionId)</em></td>
							<td>Yes</td>
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
  								
   								</tbody>
  								
  						</table>					
  					
  					
  					
  					<h3>Subscription Notification</h3>
  					
  					<p>The subscription notification is a HTTP GET request sent to the “Notification Url” property in payment box setup. This is the same URL used for receiving notifications from boxPAY that the merchant defines in the payment box setup. However, the parameters included in this request differ from the standard notification, as detailed below. The querystring parameters in this request are all prefixed with “Sub”; they are summarised in the following table.</p>
  					
  					
  					<p><strong>NB</strong> – Each notification is a summary of the currently successfully charged amount for a subscriber for a given day.</p>
  					
  					<p>In some cases boxPAY will send multiple notifications for the same subscriber for the same day – each notification is a snapshot of the current total charged to the subscriber for that day, so the merchant must ensure not to count each notification (for the same SubPSID and SubPaymentCycleDate) as a distinct charge, but instead update the current tally for that subscriber for that day (i.e for that SubPSID and SubPaymentCycleDate). This idempotence means that a notification could be resent without causing duplications in crediting the end-user.</p>
  					
  							  						
  							  						
    				<table>
  
  							<thead>
  								<tr>
  								<th>Parameter</th>
  								<th>Description</th>
  								
  								</tr>
  							</thead>
  							
  							
  							<tbody>
  								<tr>
  								<td>SubPSID</td>
  								<td>The payment session ID of the initial payment transaction that entered the customer into a subscription. Merchants are to use this to identify the type of service to offer to the end user.</td>
  								</tr>
  								
  								<tr>
  								<td>SubPaymentCycleDate</td>
  								<td>The date of this periodic transaction.</td>
  								</tr>
  								
  								<tr>
  								<td>SubActive</td>
  								<td>To indicate the status of the subscription. 1 = Active, 0 = Inactive.</td>
  								</tr>
  								
  								
  								
  								<tr>
  								<td>SubPaymentCycle</td>
  								<td>An integer value indicating the subscriber’s payment cycle of this subscription. Payment cycle 1 means this notification is for the 1st periodic transaction.</td>
  								</tr>
  								
  								<tr>
  								<td>SubLocalCurrency</td>
  								<td>The ISO 4217 currency code of the payment currency.</td>
  								</tr>
  								
  								<tr>
  								<td>SubHomeCurrency</td>
  								<td>The ISO 4217 currency code of the merchant’s home currency as specified in profile settings in merchant portal.</td>
  								</tr>
  								
  								
  								
  								<tr>
  								<td>SubExchangeRate</td>
  								<td>The exchange rate used to convert SubLocalCurrency to SubHomeCurrency as of SubPaymentCycleDate.</td>
  								</tr>
  							
  								
  								<tr>
  								<td>SubLCSpend</td>
  								<td>The current end user charge tally in local currency for this day (given by SubPaymentCycleDate)for this subscriber</td>
  								</tr>
  								
  								<tr>
  								<td>SubHCSpend</td>
  								<td>The equivalent of SubLCSpend in the merchant’s home currency based on exchange rate on that day</td>
  								</tr>
  								
  								
  								
  								<tr>
  								<td>SubLCPayout</td>
  								<td>The merchant payout amount in local currency</td>
  								</tr>
  								
  								<tr>
  								<td>SubHCPayout</td>
  								<td>The equivalent of SubLCPayout in the merchant’s home currency based on exchange rate on that day</td>
  								</tr>
  
   								</tbody>
  								
  						</table>							
  						
  						
  						
  						
  						
  				<h3>Appendix A – Reason Codes</h3>		
  						
  				<ul class="no-bullet">
  				
  				<li><strong>None</strong> – No extra information </li>
  				<li><strong>AwaitingUserAction</strong> – The payment can proceed once the user has completed the appropriate step (determined by the PaymentCaptureMethod). E.g the user must send a message to a shortcode.</li>
  				<li><strong>PaymentItemNotFound</strong> – A payment item was not found for the service, country and item code defined. </li>
  				<li><strong>InvalidMSISDN</strong> – The MSISDN passed is not in the valid international format required.</li> 
  				<li><strong>CountryCodeNotRecognised </strong>- The country code was not recognised as a valid ISO 3166-1 alpha-2 code country code. </li>
  				<li><strong>PricepointNotFoundForPaymentItem</strong> – No active price point was found for the settings provided. Action: Check payment box settings and ensure appropriate values are passed. </li>
  				<li><strong>PaymentItemDescriptionNotFound</strong> – The description for the payment item was not found. </li>
  				<li><strong>ItemCodeNotValid</strong> – The item code was not provided PricepointNotFound – No active price point was found.</li> 
  				<li><strong>LanguageCodeNotRecognised</strong> – The language code provided was not recognised as a valid 2- character ISO 639-1 code </li>
  				<li><strong>MerchantNotFound</strong> – A valid merchant was not found. Action: Check that the correct ServiceId is being passed. </li>
  				<li><strong>InvalidSignature</strong> – The signature does not match. Action: Check that the signature is being generated with the appropriate arguments in the correct order. </li>
  				<li><strong>PaymentSuccessful</strong> – The payment is successful. No further action is required. </li>
  				<li><strong>InvalidSessionId</strong> – The SessionId value provided is not a valid SessionId. </li>
  				<li><strong>SessionNotFound</strong> – The session relating to the SessionId could not be found. </li>
  				<li><strong>PaymentFailed</strong> – The payment failed. </li>
  				<li><strong>AwaitingSMSFromUser</strong> - The payment can proceed once the user has sent a message to the appropriate shortcode. </li>
  				<li><strong>AwaitingPINValidation</strong> - The payment can proceed once the user submits a PIN for validation. </li>
  				<li><strong>ValidatePINCallNotAllowedForThisPaymentCaptureMethod</strong> – This method should not be called for this PaymentCaptureMethod </li>
  				<li><strong>CorrectPinCompletingBilling</strong> – The PIN entered is correct. Billing will now be completed by boxPAY. 
  				<li><strong>InvalidPIN </strong>– The PIN entered is incorrect. </li>
  				<li><strong>ServiceNotFound</strong> – No information was found relating to the ServiceId provided. </li>
  				<li><strong>NotSubscribed</strong> – The user in question is not currently part of the subscription </li>
  				<li><strong>SuccessfullyUnsubscribed</strong> – The user has been successfully removed from the subscription </li>
  				<li><strong>AwaitingMSISDNEntry</strong> – The payment can proceed once the user enters the mobile number </li>
  				<li><strong>OtherError</strong> – An unexpected error has occured</li>
  				<li><strong>SubscriberNotFound</strong> – Details on the subscriber could not be found.</li>
  			
  				
  				</ul>		
  						
  				
  				
  				<h3>Appendix B – Subscription Status</h3>
  				<p>The following enumeration is used to indicate the status of a payment in relation to a user’s subscription, i.e whether the payment session successfully subscribed the user or otherwise.	</p>
  						
  				<ul class="no-bullet definition">
  				
  				<li><strong>SUCCESS</strong> – The user was successfully subscribed </li>
  				<li><strong>ALREADYSUBSCRIBED</strong> - The user is already subscribed to the service. </li>
  				<li><strong>FAILED</strong> – An unexpected error occurred and the user was not subscribed to the service </li>
  				<li><strong>NOTAPPLICABLE</strong> – Given for one-off (non-subscription) payments or for payment sessions that were not completed i.e. user did not complete payment</li>
  				
  				
  				
  				
  				
  				</ul>		
  						
  						
  						
  						
  						
  						
  						
  						</div>

  					</div>
  				</div>
  			</div>		
  			
  			
  		
  		</section>
  		
  		
  		
  		
	<?php include($_SERVER['DOCUMENT_ROOT'].'/includes/sidebar.php')?>	
		
	</div><!-- container -->
			
  
<?php include($_SERVER['DOCUMENT_ROOT'].'/includes/footer.php')?>	
