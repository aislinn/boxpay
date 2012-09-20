<?php $subtitle = "Android Billing SDK Documentation";
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
  						
  							<h2>Android billing SDK documentation</h1>
  							<h3>Introduction</h3>
  							
  							<p>The boxPAY in-app payments SDK for Android provides merchants with the functionality required to 
  							initiate and complete a payment through the boxPAY platform. The SDK is connected to your boxPAY 
  							account, so any payment boxes, price points and country settings are automatically available to it. </p>
  							
  							<p>Moreover, integration of the SDK library in your Android application is easy. Broadly speaking, the SDK takes care of the entire payment process, only notifying your app on 
  							success or failed. </p>
  							
  							<p>Note: While the SDK handles the appropriate payment process in each country, it is up to the 
  							merchant to setup the required payment boxes and countries on their boxpay.com account. </p>
  							
  							<h3>Support</h3>
  							<p>For all support queries, contact <a href="mailto:support@boxpay.com">support@boxpay.com</a></p>
  						
  						
  							<h3>1. Setup your Android app for boxpay in-app payments</h3>
  							
  							<p>1.1 Download the boxpay.jar file from your account dashboard on www.boxpay.com</p>
  							
  							<p>1.2 Include the boxpay.jar library in your Android app.Request
  							In Eclipse, Right-Click on your project → Preferences → Android → Libraries → And choose 
  							the jar file.</p>
  							
  							<h3>2. Configure your manifest file (AndroidManifest.xml)</h3>
  							<p>2.1. Add the required permissions to your  AndroidManifest.xml </p>
  							
  							
<code>						
<pre>
&lt;uses-permission android:name="android.permission.INTERNET" />
&lt;uses-permission android:name="android.permission.READ_PHONE_STATE" />      
&lt;uses-permission android:name="android.permission.SEND_SMS" />
&lt;uses-permission android:name="android.permission.VIBRATE" />
</pre>
 </code> 		
 
 
					 		<h3>3. Handle Status Updates</h3>
					 		<p>You have two choices as to how the boxPAY in-app payments library informs your app about 
					 		payment status updates. Please note that you have to instantiate the boxPAY in-app payments 
					 		library differently depending on which method you choose (See step 4)</p>
					 		
					 		<p><strong>Method 1 :</strong>Implement the boxPay_Notify interface and include the required callback functions in 
					 		your activity code (Synchronous).</p>
					 		
					 		<p>This method is synchronous, keeping the payment widget open until a success status is received, or 
					 		allowing the user to carry on waiting if a success status is not received before timeout.</p>
					 		
					 		<p>If the user cancels the transaction, the payment status can be further handled on the server-toserver notification callback you have set up on your account at www.boxpay.com. </p>   
					 
					 		<p>For example:</p>
					 		
<code>						
<pre>
public class gameActivity extends Activity implements boxPay_Notify  {  …
</pre>
</code>					 		
					 		
					 		<p>The callback function must be called boxpay_notify and handle four parameters :</p>
					 		<ul>
					 		
					 		<li>session id</li>
					 		<li>transaction status</li>
					 		<li>status reason text</li>
					 		<li>your custom string</li>
					 		
					 		</ul>
					 	
  						
 <code>
 <pre>
public void boxpay_notify(String sessid, String status, String reasonText, String customString)
 	{     
 	  if(status.equals("FAILED")) { // the transaction failed }
 	  if(status.equals("SUCCESS")) { // the transaction was successful }
 	  if(status.equals("PENDING")) { 
 	  		// transaction still pending
			// payment can now be handled via your callback server.}
	}
 </pre>
 </code> 						
			  				<p><strong>Method 2 :</strong> Handle the boxPAY in-app payments library broadcast intent (Asynchronous).</p>
			  				<ul>
			  				<li>This method allows you to receive payment updates even after payment box is closed.</li>
			  				<li>Once payment is initiated, the user can close the widget after given timeout, and you can 
			  				handle status via Android’s intent broadcast mechanism. </li>
			  				</ul>
			  				
			  				<p>Setup your Broadcast Receiver</p>
			  				<p>Please note that you have to register a listener for the :  <strong>com.boxpay.android.STATUS_UPDATE intent broadcast</strong>.</p>
  						
  						
<code>
<pre>
IntentFilter intentFilter = new IntentFilter("com.boxpay.android.STATUS_UPDATE");
BroadcastReceiver boxPayReceiver = new BroadcastReceiver() {
@Override
public void onReceive(Context context, Intent intent) { 
String status = intent.getStringExtra("STATUS");
String sessid = intent.getStringExtra("SESSID");
String reason = intent.getStringExtra("REASON");
String custom = intent.getStringExtra("CUSTOM");
}
  };
this.registerReceiver(boxPayReceiver, intentFilter);
</pre>
</code>  			


							<h3>4. Instantiate the library in your project</h3>
							<p>If you want a synchronous callback :</p>			
  						
  						
<code>
<pre>
boxPAY box = new boxPAY( Activity activity, 
	String authToken, 
	String paymentBoxId, 
	String languageCode );
</pre></code>


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
								<td>activity</td>
								<td>The Android activity you will be launching in-app payments from.<br/>
								NOTE: This activity has to implement the boxpay_notify function</td>
								<td>e.g. this</td>
								</tr>
								
								<tr>
								<td>authToken</td>
								<td>A token that can be requested by your merchant server if authentication is enabled. Leave blank if not enabled. </td>
								<td>32 character string</td>
								</tr>
								
								<tr>
								<td>paymentBoxId</td>
								<td>The id of the payment box that contains the items you will be selling</td>
								<td>string</td>
								</tr>
								
								<tr>
								<td>languageCode</td>
								<td>The language code you want this box to appear in</td>
								<td>2 character iso language string (e.g. en for english)</td>
								</tr>

							</tbody>
							</table>
  						
  						
  						
  						
  							<p>If you want an asynchronous callback (Android Broadcast Intent)</p>
  						
  						
  						
<code>
<pre>
boxPAY box = new boxPAY(String authToken,
	String paymentBoxId,
	String languageCode,
	Activity activity,
	int Timeout);
</pre>
</code>  			


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
								<td>authToken</td>
								<td>A token that can be requested by your merchant server if authentication is enabled. <br/>Leave blank if not enabled. </td>
								<td>32 character string</td>
								</tr>
								
								<tr>
								<td>paymentBoxId</td>
								<td>The id of the payment box that contains the items you will be selling</td>
								<td>string</td>
								</tr>
								
								<tr>
								<td>languageCode</td>
								<td>The language code you want this box to appear in</td>
								<td>2 character iso language string (e.g. en for english)</td>
								</tr>
								
								<tr>
								<td>activity</td>
								<td>The Android activity you will be launching in-app payments from.</td>
								<td>e.g. (Activity) this <br/>
								i.e. Please cast your instance as an Activity.</td>
								</tr>
								
								
								<tr>
								<td>Timeout</td>
								<td>A timeout value in seconds after a payment attempt starts that the SDK shows the “Payment Pending” view after which the user can close the payment box. 
								<br/>Status updates will still be received via Broadcast Intent listener</td>
								<td>Integer value in seconds</td>
								</tr>
								

							</tbody>
							</table>



							<h3>5. Start Billing</h3>
							
							<p>Call the showWidget function at some stage in your app - for example attached to some event.</p>


<code>
<pre>
box.showWidget(String itemCode, String customString, Bool simulationMode );
</pre>
</code>
			
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
  														<td>itemCode</td>
  														<td>The item code - as set up on your boxpay.com account - you want to accept payment for.</td>
  														<td>string</td>
  														</tr>
  														
  														<tr>
  														<td>customString</td>
  														<td>A reference string / number you can provide to link up payment widgets in your app with their callbacks.</td>
  														<td>string</td>
  														</tr>
  														
  														<tr>
  														<td>simulationMode</td>
  														<td>Launch the payment widget in simulation mode, in which case you can enter your simulation MSISDN on payment, which will then communicate with the emulator in your boxpay.com account.</td>
  														<td>true/false</td>
  														</tr>
  														
  									
  														
  						
  													</tbody>
  													</table>
  						
  						
  						
  													<p>The widget will show and take care of billing after which the library will call back as per step 3.</p>
  						
  						
  						
  						
  						</div>

  					</div>
  				</div>
  				
  				
 
  				
  				
  				
  			</div>		
  			
  			
  		
  		</section>
  		
	<?php include($_SERVER['DOCUMENT_ROOT'].'/includes/sidebar.php')?>	
		
	</div><!-- container -->
			
  
<?php include($_SERVER['DOCUMENT_ROOT'].'/includes/footer.php')?>	