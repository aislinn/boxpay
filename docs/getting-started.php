<?php $subtitle = "Getting Started";
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
  						
  							<div class="row">
  							
								<div class="twelve columns">
							
								<h2>Getting Started</h2>
								<h3>Accept mobile payments on your website in 4 easy steps</h3>
								
								<h4>We have made it very easy for developers to get started and provide full integration code and examples.</h4>
							  	<p>Inside the merchant portal, after creating your account, there are four steps. </p>
							  		
							  	</div>
  						  	
  						 	 </div>
  						  		
  						  		
  						  	<div class="row">	
  						  		<div class="divider"></div>	
  						  	</div>	
  						  		
  						  	<h4>1) Create a New Payment Box</h4>	
  						  	
  						  	<p>Create a payment box for each country in which you wish to receive payments. A new payment box can be set up <a href="https://www.boxpay.com/PaymentBox/EditWidgetProperties">here</a>.</p>	
  						  	
  						  	
  						  	<h4>2) Integrate into Your Website</h4>
  						  	
  						  	<p>Integration is simple! Start by going to the <a href="http://www.boxpay.com/PaymentBox/Preview">Integration Page</a>. You can preview your payment box from here before writing a single line of code.</p>
  						  				
  						  	<h6>SIMULATION mode VS LIVE mode</h6>			
  						  		
  						  	<p>You should use SIMULATION mode to simulate a payment without charging a real handset. Use SIMULATION mode for the majority of your testing. In LIVE mode, a real handset is required to complete the payment and the transaction amount will be charged. When you are ready to launch your payment box on your site, ensure that you are using LIVE mode.</p>	
  						  	
  						  	<h6>Which presentation mode - Popup or Inline?</h6>
  						  	
  						  	<p>In "Popup" mode, the payment box is shown in a lightbox when a HTML element is clicked. Popup mode is the default and is controlled via a button click.</p>
  						  	
  						  	<p>Alternatively, in "Inline" mode, the payment box is rendered in an HTML container element, such as a DIV, when the webpage is loaded.</p>
  						  	
  						  	<h6>Total control over presentation</h6>
  						  	
  						  	<p>You may wish to present boxPAY's widget in your website's theme. You can override the CSS stylesheet used to render the widget by specifying a stylesheet of your own.</p>
  						  	
  						  	<p>Please note that this is not available by default. Please contact us for authorization and further documentation on overriding the CSS.</p>
  						  	
  						  	
  						  	<h6>Step 1 - Add Javascript code</h6>
  						  	
  						  	<p>The below javascript code is dynamically generated once you have completed Step 1. All you have to do is paste it into your website where you would like the payment box to be displayed. </p>
  						  	
  						  	
 <code>
 <pre>
&lt;script src="http://widget.boxpay.com/Scripts/Widget/BoxPay.Merchant.js?v=2.013" type="text/javascript">&lt;/script>script type="text/javascript" language="javascript">
     jQuery(document).ready(function() {
       BoxPay.Widget(1305, {
         ServiceId: '{payment box Id}',
         CountryCode: 'ISO_COUNTRY_CODE',
         LanguageCode: 'ISO_693-1_LANGUAGE_CODE',
         // ItemCode: 'ITEM_CODE',
         Mode: 'LIVE',
         ReturnUrl: 'http://www.your-website.com/customer-return.php',
         ShowCloseButton: false,
         WidgetLoadedCallbackUrl: 'http://www.your-website.com/notify.php',
         OnWidgetLoadAttempt: function() { /*alert('function called prior to lanuching payment box');*/ },
         CustomString: 'YOUR_CUSTOM_STRING'
         // CssUrl: 'http://your-domain/custom-widget.css', // default to use boxPay's CSS
     });
 });
&lt;/script></pre>
 </code> 						  	
  						  	
  						  	<h6>Step 2 - Add "Pay with your mobile" button (for 'Popup' mode only)</h6>
  						  	
  						  	<p>You then paste this code if you selected to launch the payment box in a popup type light box instead of within an iFrame.</p>
  						  	
  						  	
 <code>
 <pre>
&lt;img id="paymentBoxLaunchControlId" alt="Pay with mobile" 
src="http://www.boxpay.com/pay_with_your_mobile.png" /></pre></code> 						  	
  						  	
  						  	  						  	
  						  	
  						  	
  						  	
  						  	<h4>3) Setup the Notification URL</h4>
  						  	
  						  	<p>When a boxPAY transaction is complete, the widget passes encrypted transaction details to the merchant using Return URL, if a Return URL is provided in the javascript launch code.</p>
  						  	
  						  	<p>boxPAY also notifies the merchant of such with a server-side HTTP request via Notification URL (as provided in the payment box setup). The transaction data needs to be decrypted using your private key (See <a href="https://www.boxpay.com/Error?aspxerrorpath=/PaymentBox/NotificationService/#NotificationPrivateKey">Notification > Private Key - Decryption</a> for this and the sample code in <a href="https://www.boxpay.com/Error?aspxerrorpath=/PaymentBox/NotificationService#NotificationCodeSamples">Notification > Examples</a>).</p>
  						  	
  						  	
  						  	<p>boxPAY will notify you of the status of a payment session in two ways:</p>
  						  	
  						  	<ul>
  						  	<li>1. Server to server request. This is a HTTP GET request to the "Notification URL" that you define when you set up the payment box in a country. It will include the <a href="https://www.boxpay.com/Error?aspxerrorpath=/PaymentBox/NotificationService#NotificationParameters">Notification parameters</a> below in both plain text and encrypted text. It is recommended that you use the encrypted text to ensure that the request is originating from boxPAY.</li>
  						  	
  						  	<li>2.	In the "ReturnURL" as defined by you in your <a href="http://www.boxpay.com/PaymentBox/Preview">code snippet</a>. Because this is a client side call, passing the parameters in plain text would be a serious security flaw (users could pass bogus statuses in this way), so the information is encrypted using the AES algorithm using your <a href="https://www.boxpay.com/Error?aspxerrorpath=/PaymentBox/NotificationService#NotificationPrivateKey">Private Key</a>.</li>
  						  	
  						  	</ul>
  						  	
  						  	
  						  	
  						  	
  						  	<h4>Important Recommendation</h4>
  						  	
  						  	<p>Because of the nature of mobile billing and most notably Premium SMS, a payment may not be finalized (i.e confirmed as successful or failed) until some time after the payment box has been closed/abandoned. For example, the user may not receive an SMS in a timely fashion because the user's handset is powered off or out of coverage or because of a network delay. As such, the ReturnURL (the URL to which the user is redirected on completion/exit of the payment box) should not be used as the sole communicator to the merchant of the status of a payment. The server to server request to the Notification URL should always be used to ensure appropriate handling of the payment status.</p>
  						  	
  						  	<p>The payment status info is given in the ReturnURL as a convenient way to communicate the success or failure of a payment to the merchant synchronously, so that such the user's purchase can be immediately handled in the same request.</p>
  						  	
  						  	<p>boxPAY will credit your account for a successful payment regardless of when the payment is completed. A raw log of all payment sessions is available to the merchant for download through the reports section, so this can be used to do any auditing or retrospective customer crediting in cases where, for any reason, the successful payment was not processed on the Notification URL request. boxPAY recommends that merchants always handle the request to the Notification URL, to ensure the customer's purchase is always fulfilled.</p>
  						  	
  						  	
  						  	<h4>QueryString parameters</h4>
  						  	
  						  	<p>These are sent in requests to both the ReturnUrl and Notification URL.</p>
  						  	
  						  	
  						  	<table>
  						  	
  								<thead>
  									<tr>
  									<th>Parameter</th>
  									<th>Description</th>
  									
  									</tr>
  								</thead>
  								
  								
  								<tbody>
  									<tr>
  									<td>bpi</td>
  									<td>Initialization Vector. This is base64-encoded</td>
  									</tr>
  									
  									<tr>
  									<td>bpe</td>
  									<td>Encrypted notification details. The notification detail (e.g PSID =abcdefghijklmnop&amp;MSIDN=12345678&amp;Status=Success..etc) is encrypted using AES (more details below) and then base64-encoded.</td>
  									</tr>
  									
  									
  									<tr>
  									<td>bps</td>
  									<td>This is the hash signature (in hexadecimal) which should be used to verify that the information has not been tampered with. The hash is generated using the private key from the string: <strong>iv.bpe</strong> (i.e the base64-decoded initialization vector, a period (.) and finally the base64-encoded notification string)</td>
  									</tr>
  									
  									
  								</tbody>
  							
  							</table>	
  							
  							
  							<h4>Notification parameters</h4>	
  							
  							<p>The format of the notification string will be PSID=abcdefghijklmnop&amp;MSIDN=12345678&amp;Status=Success..etc. This info is sent in plain text in the querystring of Notification URL (server to server) and as an encrypted string (as described in the section above).</p>
  						  	
  						  	
  						  	<table>
  						  		
  						  		<thead>
  						  			<tr>
  						  			<th>Parameter</th>
  						  			<th>Description</th>
  						  			
  						  			</tr>
  						  		</thead>
  						  		
  						  		
  						  		<tbody>
  						  			<tr>
  						  			<td>PSID</td>
  						  			<td>Payment Session ID - A 36-character string that uniquely identifies a payment session</td>
  						  			</tr>
  						  			
  						  			<tr>
  						  			<td>MSISDN</td>
  						  			<td>The customer's mobile number in international format (i.e includes country code: e.g. <em>12541234321</em></td>
  						  			</tr>
  						  			
  						  			
  						  			<tr>
  						  			<td>bps</td>
  						  			<td>This is the hash signature (in hexadecimal) which should be used to verify that the information has not been tampered with. The hash is generated using the private key from the string: <strong>iv.bpe</strong> (i.e the base64-decoded initialization vector, a period (.) and finally the base64-encoded notification string)</td>
  						  			</tr>
  						  			
  						  			
  						  			<tr>
  						  			<td>CustomString</td>
  						  			<td>As defined in the Integration section</td>
  						  			</tr>
  						  			
  						  			<tr>
  						  			<td>Status</td>
  						  			<td>The status of the payment session. Possible values are:
	  						  			<ul class="no-bullet">
		  						  			<li><strong>Success</strong> - The payment was completely successful and the user was charged the full amount.</li>
		  						  			<li><strong>Failed</strong> - The payment session failed or partially failed. If a partial payment was charged to the end user then this will be indicated by the LocalCharged field.</li>
		  						  			<li><strong>Pending</strong> - The status of the payment session is not final, we are still waiting for confirmation of payment.</li>
		  						  			
	  						  			</ul>
  						  			
  						  			</td>
  						  			</tr>
  						  			
  						  			<tr>
  						  			<td>LocalCurrency</td>
  						  			<td>Currency Code (e.g USD) of the local currency in which the user is charged.</td>
  						  			</tr>
  						  			
  						  			<tr>
  						  			<td>LocalCharge</td>
  						  			<td>The total attempted charge to the end user in local currency.</td>
  						  			</tr>
  						  			
  						  			
  						  			<tr>
  						  			<td>LocalCharged</td>
  						  			<td>The amount successfully charged to the end user in local currency.</td>
  						  			</tr>
  						  			
  						  			<tr>
  						  			<td>LocalPayout</td>
  						  			<td>The expected payout amount to you, in local currency.</td>
  						  			</tr>
  						  			
  						  			<tr>
  						  			<td>YourHomeCurrency</td>
  						  			<td>Currency Code (e.g. USD) of your selected home currency.</td>
  						  			</tr>
  						  			
  						  			<tr>
  						  			<td>HCCharge</td>
  						  			<td>Home Currency Charge - An indicative value of the <em>LocalCharge</em> amount in your home currency, based on current exchange rate.</td>
  						  			</tr>
  						  			
  						  			<tr>
  						  			<td>HCCharged</td>
  						  			<td>Home Currency Charged - An indicative value of the <em>LocalCharged amount</em> in your home currency, based on current exchange rate.</td>
  						  			</tr>
  						  			
  						  			<tr>
  						  			<td>HCPayout</td>
  						  			<td>Home Currency Payout - An indicative value of the <em>LocalPayout</em> amount in your home currency, based on current exchange rate.</td>
  						  			</tr>
  						  			
  						  			<tr>
  						  			<td>Mode</td>
  						  			<td>"TEST" or "LIVE"</td>
  						  			</tr>
  						  			
  						  			
  						  			
  						  			
  						  		</tbody>
  						  	
  						  	</table>	
		  	

<dl class="tabs pill">
  <dd><a href="#code1">C#</a></dd>
  <dd><a href="#code2">PHP</a></dd>
  <dd><a href="#code3">Java</a></dd>
  <dd><a href="#code4">Python</a></dd>
  <dd><a href="#code5">Perl</a></dd>
  <dd><a href="#code6">Ruby</a></dd>
  <dd><a href="#code7">Coldfusion</a></dd>
</dl>

<ul class="tabs-content">
<li class="active" id="code1Tab">
  
<code>
<pre>
using System.Security.Cryptography;
using System.Text;

public static string Decrypt(string data, string key, string iv)
{
    RijndaelManaged riManaged = new RijndaelManaged();
    riManaged.BlockSize = 256;
    riManaged.Key = Encoding.UTF8.GetBytes(key);
    riManaged.Mode = CipherMode.CBC;
    riManaged.Padding = PaddingMode.Zeros;

    if (iv != null && iv.Length > 0)
    {
        riManaged.IV = System.Text.Encoding.UTF8.GetBytes(iv);
    }

    ICryptoTransform iEnc = riManaged.CreateDecryptor();

    byte[] Buffer = Convert.FromBase64String(data);
    return UTF8Encoding.UTF8.GetString(iEnc.TransformFinalBlock(Buffer, 0, Buffer.Length));
}

public void Notification()
{
    string privateKey = "{YOUR PRIVATE KEY}";
    string iv = System.Text.Encoding.UTF8.GetString(Convert.FromBase64String(Request["bpi"]));
    string enc = Request["bpe"];
    string sig = Request["bps"];
          
    HMACSHA256 hMac = new HMACSHA256(Encoding.UTF8.GetBytes(privateKey));
    hMac.ComputeHash(Encoding.UTF8.GetBytes(iv + "." + enc));
    string newSig = "";
    foreach (byte s in hMac.Hash)
    {
        newSig += s.ToString("x2");
    }

    string decrypted = "";
    if (sig == newSig)
    {
        decrypted = Decrypt(enc, privateKey, iv).Trim('\0');
        //decrypted should then be parsed to retrieve each notification parameter
    }
}</pre>
</code>
  
</li>
 
<li id="code2Tab">

<code>
<pre>
The snippet below requires the installation of Mcrypt PHP extension.

function Notification($privateKey)
{
    $iv = base64_decode($_REQUEST["bpi"]);
    $enc = $_REQUEST["bpe"];
    $sig = $_REQUEST["bps"];
    $sig2 = hash_hmac("sha256", utf8_encode($iv . '.' . $enc), utf8_encode($privateKey));

    if ($sig == strtolower($sig2)) {
        return str_replace(chr(0), '', 
            mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $privateKey, 
                base64_decode($enc), MCRYPT_MODE_CBC, $iv));

        // The return value should then be parsed to retrieve each notification parameter
    }
    else {
        return null;
    }
}
</pre>
</code>

</li>



<li id="code3Tab">
<code>
<pre>
The snippet below requires the installation of Java Cryptography Extension (JCE) Unlimited Strength Jurisdiction Policy Files downloadable from http://www.oracle.com/technetwork/java/javase/downloads/index.html.

import javax.crypto.Mac;
import javax.crypto.Cipher;
import javax.crypto.spec.SecretKeySpec;
import javax.crypto.spec.IvParameterSpec;
import org.apache.commons.codec.binary.Hex;
import org.apache.commons.codec.binary.Base64;

public static String Notification(String privateKey, String bps, String bpe, String bpi) throws Exception {
	try
	{
		byte[] iv_decoded = Base64.decodeBase64(bpi);
		String hash = new String(iv_decoded) + "." + bpe;
		byte[] encrypted = Base64.decodeBase64(bpe);
		
		Mac mac = Mac.getInstance("HmacSHA256");
		SecretKeySpec secret = new SecretKeySpec(privateKey.getBytes(), "HmacSHA256");
		mac.init(secret);
		byte[] digest = mac.doFinal(hash.getBytes());
		
		String sig = Hex.encodeHexString(digest);
		
		if(sig.equals(bps)){
			SecretKeySpec keyspec = new SecretKeySpec(privateKey.getBytes(), "AES");
			IvParameterSpec ivspec = new IvParameterSpec(iv_decoded);

			Cipher cipher = Cipher.getInstance("AES/CBC/NoPadding");
			cipher.init(Cipher.DECRYPT_MODE, keyspec, ivspec);
			byte[] result = cipher.doFinal(encrypted);

			return new String(result);

		}else{
			return null;
		}
	}
	catch (Exception e)
	{
		e.printStackTrace();
		return null;
	}
}
</pre></code></li>


<li id="code4Tab">

<code>
<pre>
The snippet below requires the installation of PyCrypto Python extension.

import cgi
import base64
import hmac,hashlib

from Crypto.Cipher import AES

def decryption(privateKey):
  uri = cgi.FieldStorage()
  iv = uri['bpi'].value
  encrypted_data = uri['bpe'].value
  iv_decoded = base64.b64decode(iv)
  sig = uri['bps'].value
  sig2 = hmac.new(privateKey, iv_decoded + "." + encrypted_data, hashlib.sha256).hexdigest()
  if sig == sig2:
    crypt_object = AES.new(privateKey, AES.MODE_CBC, iv_decoded)
    decoded = base64.b64decode(encrypted_data)
    return crypt_object.decrypt(decoded)
  else:
    return None
    
#The return value should then be parsed to retrieve each notification parameter end
</pre></code>


</li>

<li id="code5Tab">
<code>
<pre>
The snippet below requires the installation of Crypt-Rijndeal PERL package.

use MIME::Base64;
use Digest::SHA qw(hmac_sha256_hex);
use Crypt::Rijndael;

sub Notification($){
  my($privateKey) = @_;
  if (length ($ENV{QUERY_STRING}) > 0){
    $query = $ENV{QUERY_STRING};
    @pairs = split(/&/, $query);
    foreach $pair (@pairs){
      ($name, $value) = split(/=/, $pair);
      $value =~ s/%([a-fA-F0-9][a-fA-F0-9])/pack("C", hex($1))/eg;
      $in{$name} = $value; 
    }
  }
	
  $iv = $in{'bpi'};
  $encrypted_data = $in{'bpe'}; 
  $iv_decoded = decode_base64($iv);

  $sig = $in{'bps'};
  $sig2 = hmac_sha256_hex($iv_decoded.".".$encrypted_data, $privateKey );
	
  if($sig eq $sig2){
    $cipher = Crypt::Rijndael->new( $privateKey, Crypt::Rijndael::MODE_CBC());
    $cipher->set_iv($iv_decoded);
      return $decrypted_data = $cipher->decrypt(decode_base64($encrypted_data));
  }else{
    return NULL;
  }
}
</pre></code>



</li>

<li id="code6Tab">

<code>
<pre>
def Notification(privateKey)
  iv = params['bpi']
  iv_decoded = Base64.decode64(iv)
		
  encrypted_data = params['bpe']
  sig = params['bps']
  sig2 = OpenSSL::HMAC.hexdigest("sha256", privateKey, iv_decoded + "." + encrypted_data)
		
  if sig == sig2
    aes = OpenSSL::Cipher::Cipher.new("AES-256-CBC")
    aes.decrypt
    aes.padding = 0
    aes.key = privateKey
    aes.iv = iv_decoded if iv_decoded != nil
    return aes.update(Base64.decode64(encrypted_data)) + aes.final
  else
    return nil
  end
  #The return value should then be parsed to retrieve each notification parameter
  end
</pre></code>


</li>


<li id="code7Tab">

<code>
<pre>
The snippet below requires the installation of Java Cryptography Extension (JCE) Unlimited Strength Jurisdiction Policy Files downloadable from http://www.oracle.com/technetwork/java/javase/downloads/index.html.

&lt;!--- Decryption Function --->

    &lt;cffunction name="decryption" returntype="string" access="private" output="false" >
    &lt;cfargument name = "privateKey" type = "string" required = "true" />
	&lt;cfset encrypted_data = url['bpe'] />
	&lt;cfset key = ToBase64(privateKey) />
	&lt;cfset algorithm = "AES/CBC/nopadding" />
	&lt;cfset encoding = "base64" />
	&lt;cfset iv = ToString( ToBinary( url['bpi'] ) ) />
	&lt;cfset sig = url['bps'] />
	&lt;cfset sig2 = LCase(HMAC_SHA256( ToString( ToBinary(url['bpi'])) & "." & encrypted_data, privateKey)) />

	&lt;cfif sig eq sig2>
		&lt;cfreturn decrypt(encrypted_data, key, algorithm, encoding, iv) />
	&lt;cfelse>
		&lt;cfreturn JavaCast( "null", 0 ) />
	&lt;/cfif>
	&lt;!--- The return value should then be parsed to retrieve each notification parameter --->
&lt;/cffunction>

&lt;!--- HMAC_SHA256 Function --->

&lt;cffunction name="HMAC_SHA256" returntype="string" access="private" output="false">
     
      &lt;cfargument name="Data" type="string" required="true" />
      &lt;cfargument name="Key" type="string" required="true" />
      &lt;cfargument name="Bits" type="numeric" required="false" default="256" />
     
      &lt;cfset var i = 0 />
      &lt;cfset var HexData = "" />
      &lt;cfset var HexKey = "" />
      &lt;cfset var KeyLen = 0 />
      &lt;cfset var KeyI = "" />
      &lt;cfset var KeyO = "" />
     
      &lt;cfset HexData = BinaryEncode(CharsetDecode(Arguments.data, "iso-8859-1"), "hex") />
      &lt;cfset HexKey = BinaryEncode(CharsetDecode(Arguments.key, "iso-8859-1"), "hex") />
      &lt;cfset KeyLen = Len(HexKey)/2 />
     
      &lt;cfif KeyLen gt 64>
         &lt;cfset HexKey = Hash(CharsetEncode(BinaryDecode(HexKey, "hex"), "iso-8859-1"), "SHA-256", "iso-8859-1") />
         &lt;cfset KeyLen = Len(HexKey)/2 />
      &lt;/cfif>
     
      &lt;cfloop index="i" from="1" to="#KeyLen#">
         &lt;cfset KeyI = KeyI & Right("0"&FormatBaseN(BitXor(InputBaseN(Mid(HexKey,2*i-1,2),16),InputBaseN("36",16)),16),2) />
         &lt;cfset KeyO = KeyO & Right("0"&FormatBaseN(BitXor(InputBaseN(Mid(HexKey,2*i-1,2),16),InputBaseN("5c",16)),16),2) />
      &lt;/cfloop>
     
      &lt;cfset KeyI = KeyI & RepeatString("36",64-KeyLen) />
      &lt;cfset KeyO = KeyO & RepeatString("5c",64-KeyLen) />
     
     &lt;cfset HexKey = Hash(CharsetEncode(BinaryDecode(KeyI&HexData, "hex"), "iso-8859-1"), "SHA-256", "iso-8859-1") />
      &lt;cfset HexKey = Hash(CharsetEncode(BinaryDecode(KeyO&HexKey, "hex"), "iso-8859-1"), "SHA-256", "iso-8859-1") />
     
      &lt;cfreturn Left(HexKey,arguments.Bits/4) />

&lt;/cffunction>
</pre>
</code>
</li>





</ul>
  						  	
  						  	
  						  	
  						  	
  						  	
  						  	
  						  	
  						  	
  						  	
  						  	
  						  	  						  	
  						  	<h4>4) Test</h4>
  						  	
  						  	<h6>How can I launch the widget and see what it looks like?</h6>
  						  	<p>You may launch the widget in <a href="http://www.boxpay.com/PaymentBox/Preview">Step 2</a> from within the merchant portal by clicking on the "Launch Payment Box" button. This is useful if you want to see how it looks immediately after setting up a payment box. To test how the widget integrates with your website, you should paste the code snippet and "Pay with your mobile" button HTML code from <a href="http://www.boxpay.com/PaymentBox/Preview">Step 2</a> into your webpage.</p>
  						  	
  						  	<h6>Can I test the widget with a real physical mobile handset?</h6>
  						  	<p>Yes, you need to ensure that the MODE parameter is set to "LIVE" in the code snippet in <a href="http://www.boxpay.com/PaymentBox/Preview">Step 2</a>. This will cause the widget to route messages to real-life mobile networks. You will actually be billed for the completed transaction, just like how your customers will be billed.</p>
  						  	
  						  	<h6>Can I test the widget without using a real physical mobile handset?</h6>
  						  	<p>Yes, you need to ensure that the MODE parameter is set to "SIMULATION" in the code snippet in <a href="http://www.boxpay.com/PaymentBox/Preview">Step 2</a>. You will also need to use the Handset Simulator for texting messages to boxPAY's virtual mobile network.</p>
  						  	
  						  	
  						  	
  						  	
  						  	<h4>What about Payment Notification?</h4>
  						  	<p>By following <a href="https://www.boxpay.com/Error?aspxerrorpath=/PaymentBox/NotificationService">Step 3</a>, you should receive payment notifications as described, regardless of how you test.</p>
  						
  						</div>

  					</div>
  				</div>
  				
  				
 
  				
  				
  				
  			</div>		
  			
  			
  		
  		</section>
  		
	<?php include($_SERVER['DOCUMENT_ROOT'].'/includes/sidebar.php')?>	
		
	</div><!-- container -->
			
  
<?php include($_SERVER['DOCUMENT_ROOT'].'/includes/footer.php')?>	