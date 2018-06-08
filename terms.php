<?php 

session_start();
$total=0;
 $con=  mysqli_connect("localhost", "root", "virurohan", "vrindhavan_db");

        if(!$con)
       {
           die('not connected');
       }
            $items=  mysqli_query($con, "SELECT * FROM items WHERE id='$id'");

            $item = mysqli_fetch_array($items);
            
?>
<!DOCTYPE html>
<html>
<head>
	<title>Vrindhavan</title>
	<link rel="stylesheet" type="text/css" href="header.css">
	<link rel="stylesheet" type="text/css" href="terms.css">
	<link rel="stylesheet" type="text/css" href="footer.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto|Source+Sans+Pro" rel="stylesheet">
</head>
<body>
<header>
	<div class="headercontent">
	<div class="burger" onclick="openmenu()"></div>
	
	<img class="logo" src="images/logo.png">
	<div class="sbtn" onclick="opensearch()">	
	</div>	
		<div class="searchdiv">
		<form  method="get" action="search.php">
		<input class="searchbar" type="text" name="search" placeholder="What do you want to find?">
		<button class="searchbtn" type="submit"><img class="searchicon" src="images/search.png"></button>
		</form>
		</div>
		
	
	<div class="cartdiv" onclick="opencartmenu()">
	<img class="carticon" src="images/cart.png">
	<div class="cartcount"><p class="cartcnt"><?php echo count($_SESSION['name']) ?></p></div>
	</div>
	<div class="cartmenu">
		<ul class="cartmenuul">
			<?php 
				if(count($_SESSION['name'])==0)
				{
					?>

					<li>
						<span class="cmempty">Cart is empty</span>
					</li>
					<?php
				}
				 for ($i=0; $i< count($_SESSION['name']); $i++) {
				 	$total=$total+(($_SESSION['price'][$i])*($_SESSION['quantity'][$i]));
				
			?>
			<li>
				
				<span class="cmname"><?php echo $_SESSION['name'][$i]; ?></span>
				<span class="cmid"><?php echo $_SESSION['id'][$i]; ?></span>
				<span class="cmcolor">Color: <?php echo $_SESSION['color'][$i]; ?></span>
				<span class="cmsize">Size: <?php echo $_SESSION['size'][$i]; ?></span>
				<span class="cmquantity">Quantity: <?php echo $_SESSION['quantity'][$i]; ?></span>
				<span class="cmprice">&#8377;<?php echo $_SESSION['price'][$i]; ?></span>
				<img class="cmimg" src="upload/<?php echo $_SESSION['file'][$i]; ?>">
				
			</li>
			<?php
				}
			?>
			
		</ul>
		<div class="cmfooter">
				<a href="cart.php">	<button class="cmbtn">Go to Cart</button></a>
				<span class="cmftotal">Total: &#8377;<?php echo $total; ?></span>

			</div>
	</div>

	<div class="topnav">
		<ul class="topnavul">
			<a href="home.php"><li>  Home</li></a>
			<a href="category.php?name=kurthi"><li> Kurthis</li></a>
			<a href="category.php?name=tops"><li> Tops</li></a>
			<a href="category.php?name=leggings"><li> Leggings</li></a>
		</ul>
	</div>
	</div>
	
</header>
<div class="content">
	<div id="aboutus">
		<h4 class="hdr">About Us</h4>
		<p class="para">Vrindhavan is one of the leading boutiques in the city of Kochi. We have gained a high reputation for our quality and timely delivery of the products among our clients since 2016. <br>Vrindhavan is a boutique destination for women wear including Kurthas, Tops and Leggings. We are specialized in creating and grooming handcrafted kurthas with vibrant designs to bring out the best looks in you. <br>We enjoy dressing you up and you enjoy dressing up in our shop at Lulu mall, room 15, kochi. We are also happy to deliver our products to all parts of kerala.  </p>
	</div>
	<div id="terms">
		<h4 class="hdr">Terms and conditions</h4>
		<p class="para">1. Use of the Website<br><br>
By accessing the website, you warrant and represent to Vrindhavan Pvt Ltd, the website owner that you are legally entitled to access the website and to use the information made available via the website.<br><br>
2. Trademarks<br><br>
The trademarks, names, logos and service marks (collectively "trademarks") displayed on this website are registered and unregistered trademarks of Vrindhavan Pvt Ltd, the website owner. Nothing contained on this website should be construed as granting any license or right to use any trademark without the prior written permission of Vrindhavan Pvt Ltd, the website owner.<br><br>
3. External links<br><br>
External links may be provided for your convenience, but they are beyond the control of Vrindhavan Pvt Ltd, the website owner and no representation is made as to their content. Use or reliance on any external links and the content thereon provided is at your own risk.<br><br>
4. Warranties<br><br>
Vrindhavan Pvt Ltd makes no warranties, representations, statements or guarantees (whether express, implied in law or residual) regarding the website.<br><br>
5. Disclaimer of liability<br><br>
Vrindhavan Pvt Ltd shall not be responsible for and disclaims all liability for any loss, liability, damage (whether direct, indirect or consequential), personal injury or expense of any nature whatsoever which may be suffered by you or any third party (including your company), as a result of or which may be attributable, directly or indirectly, to your access and use of the website, any information contained on the website, your or your company's personal information or material and information transmitted over our system. In particular, neither Vrindhavan Pvt Ltd nor any third party or data or content provider shall be liable in any way to you or to any other person, firm or corporation whatsoever for any loss, liability, damage (whether direct or consequential), personal injury or expense of any nature whatsoever arising from any delays, inaccuracies, errors in, or omission of any share price information or the transmission thereof, or for any actions taken in reliance thereon or occasioned thereby or by reason of non-performance or interruption, or termination thereof.<br>

We as a merchant shall be under no liability whatsoever in respect of any loss or damage arising directly or indirectly out of the decline of authorization for any transaction, on Account of the Cardholder having exceeded the preset limit mutually agreed by us with our acquiring bank from time to time.<br><br>
6. Conflict of terms<br><br>
If there is a conflict or contradiction between the provisions of these website terms and conditions and any other relevant terms and conditions, policies or notices, the other relevant terms and conditions, policies or notices which relate specifically to a particular section or module of the website shall prevail in respect of your use of the relevant section or module of the website.<br><br>
7. Severability<br><br>
Any provision of any relevant terms and conditions, policies and notices, which is or becomes unenforceable in any jurisdiction, whether due to being void, invalidity, illegality, unlawfulness or for any reason, shall, in such jurisdiction only and only to the extent that it is so unenforceable, be treated as void and the remaining provisions of any relevant terms and conditions, policies and notices shall remain in full force and effect.<br><br>
8. Applicable laws (choice of venue and forum)<br><br>
Use of this website shall in all respects be governed by the laws of Kochi, India, regardless of the laws that might be applicable under principles of conflicts of law. The parties agree that the courts located in India country, Kochi, shall have exclusive jurisdiction over all controversies arising under this agreement and agree that venue is proper in those courts. 
<br><br>

9. Other Terms<br><br>
You must be eighteen years or older to use this site. If you are under eighteen, you may only use this site with the agreement of, and under the supervision of, a parent or guardian.<br>
By placing the order, the purchaser understands and agrees to all the terms and conditions of the offer.<br>
Orders will be executed only after realisation of the payments.<br>
Cash on delivery charges, as indicated, may apply over and above the offer price.<br>
We will take between 2-15 days for delivery of order/gift, subject to stock availability.<br>
It will not be possible to cancel once the order is placed.<br>
All orders are subject to acceptance by us and product availability.<br>
Sizes once confirmed will not be changed.<br>

vrindhavan.com will not be liable for any credit card fraud. The liability of any Fraudulent Use of the card shall always be on the owner of the card unless proved otherwise.<br>
You represent and warrant that all details you provide to vrindhavan.com for the purpose of ordering or purchasing goods are true, accurate, current and complete in all respects; and that the credit or debit card you are using is your own and that there are sufficient funds in your account to cover payment of the product(s) ordered.<br>
vrindhavan.com reserves the right to terminate your membership from vrindhavan.com and to refrain from fulfilling any further orders and to suspend or terminate your access to the site immediately and without notice to you if: you fail to make payment to us when due; or you breach any of these Conditions; or when requested by us to do so, you fail to provide within a reasonable time, enough information to enable us to check the accuracy and validity of any information supplied by you, or your identity; or we suspect you have engaged, or are about to engage, or are connected to or otherwise have way of being involved in fraudulent or illegal activity on vrindhavan.com and its customers.<br>
You agree that if you breach these Conditions, or any liabilities are incurred arising out of your use of this website, you will be responsible for the costs and expenses that we or our officers, directors, employees, agents and suppliers incur as a result of the breach, including reasonable legal fees (if applicable). You will remain liable if someone else uses your shopping account and/or personal information unless you can prove that such use was fraudulent.<br>
Merchandise available for sale changes on a frequent basis; we reserve the right to make changes in our merchandise without notice. Availability information for products is listed on each individual product description. Some of our products may be available only in limited quantities, so we cannot guarantee that a product displayed on a previous visit to our website may still be available when you visit again. An item may be out of stock temporarily or permanently, or discontinued from our product line. When an item is no longer available, we take reasonable steps to remove it from the website as soon as we can. Please be informed that if we do not have stock to deliver the goods you have ordered, we will issue the charged amount back as credit to your wallet which you can use to order other available products. It may take 14-21 working days for the amount to be credited to your wallet. You will be duly informed of the same once done.The wallet amount will automatically expire 6 months from the credit date.<br>
The prices displayed on this website are quoted in Indian Rupee and are valid only in the Territory of Indian Republic. Prices are subject to change at any time and subject to applicable taxes.<br>
No relationship shall exist between you and vrindhavan.com until we accept your order by shipping the product to you.<br>
By placing an order on vrindhavan.com , you allow us to call you or sms you regarding your order on your given mobile number even if it is registered under DNC list. A confirmation call may be placed to you at the number given in your order details and the our representative shall inform you of the details of the product/(s) ordered, price, payment method and delivery cost, and delivery time and any other relevant information and shall answer your queries pertaining to the order and only after your confirmation shall we dispatch the product.<br>
Discount vouchers can never be redeemed for cash and you should follow separate terms and conditions applicable to each discount voucher. Any complaint without exhausting the requisite procedure for availing the facilities against a voucher, as provided for in the voucher terms, shall not be entertained.<br>
You agree that we may use and/or disclose information about you, such as demographics or your use of this site, in any way without revealing your personal information or identity. By taking part in promotions, contests offered on the site, or by requesting promotional information or product updates, you agree that we may use your information for marketing and promotional purposes.<br>
We have taken great care to provide accurate product images for each product for sale on the site. However, the colours we use, as well as the display and colour capabilities of your particular computer monitor will affect the colours you actually see. We are not responsible for the said limitations and cannot guarantee that the colour, texture or detail of merchandise that you see on your monitor display will be accurate.<br>
You agree not to reproduce, duplicate, copy, sell, resell or exploit for any commercial purposes, any portion of the product, use of the product, or access to the product/service.<br>
We shall have no liability to you for any delay in the delivery of products ordered or any other matters to the extent that the delay is due to any event outside our reasonable control, including but not limited to acts of God, war, flood, fire, labour disputes, strikes, lock-outs, riots, civil commotion, malicious damage, explosion, governmental actions and any other similar events<br>
We are not responsible for material displayed on third party websites or any other written material. The only prices that apply for vrindhavan.com products are those stated on the vrindhavan.com material. We cannot vouch for the reliability of prices stated on shopping directories or through any other third party<br>
In case of orders where offers are applied the terms associated with individual offers will take precedence. The terms and conditions for such offers shall be separately available on the Site.
These Conditions shall be governed by and construed in accordance with the laws of Republic of India and by using this website you irrevocably submit to the exclusive jurisdiction of the courts of Kochi</p>
	</div>
<div id="policies">
		<h4 class="hdr">Policies</h4>
		<p class="para">1. Vrindhavan Pvt. Ltd. is committed to protecting the privacy of Internet users.
This statement details the privacy practices for Vrindhavan Pvt. Ltd, located at www.vrindhavan.com.<br>

Questions regarding this statement should be directed to www.vrindhavan.com or by contacting Vrindhavan Pvt. Ltd.<br><br>
2. Information Collection<br><br>
We collect information from you in several places on this site to provide an efficient, meaningful, and customized experience. For example, we can use your personal information to:<br>
Help make this site easier for you to use by not having to enter information more than once.<br>
Help you find information, products, and services quickly.<br>
Help us create content on this site that is most relevant to you.<br>
Send you alerts on new products and services on offer.<br><br>
3. Registration and Ordering -<br><br>
Before using certain sections of this site or ordering products, you may be required to complete an online registration form. During registration, you will be prompted to provide to us with certain personal information, including but not limited to your name, size, shipping and billing address(es), phone number and email address.<br><br>
4. My Profile Section and Contests and Promotions<br><br>
We may also ask you to fill in some additional personal information like your anniversary or birth dates, or personal likes and dislikes to be able to service you better. We may also run contests and promotions from time to time to gather this information from our customers. Supplying such information is entirely voluntary.<br><br>
5. Email Addresses<br><br>
Several locations on the site permit you to enter your email address for purposes including, but not limited to : registering for promotions; requesting us to notify you on particular offers or products, or signing up for our e-mail newsletter and special offers, including contests, which we may run from time to time. Your participation in contests is completely voluntary, so you can choose if you would like to participate and disclose information to us. We use this information to notify contest winners and to award prizes. We may post on our site and social media profiles (facebook, twitter and others) the names and cities of contest winners.<br><br>
6. Cookies and Other Technology<br><br>
To help make our website more responsive to the needs of our visitors, we invoke a standard feature of browser software, called a "cookie", to assign each visitor a unique, random number (a sort of user ID) that resides on your computer. The cookie does not personally identify the visitor as an individual; rather, cookies merely identify the computer that a visitor uses to access our sites. Unless you voluntarily identify yourself (through registration, for example), we will have no way of knowing who you are, even if we assign a cookie to your computer.<br>
Cookies are small pieces of information that are stored as text files by your Internet browser on your computer's hard drive. Most Internet browsers are initially set to accept cookies. You can set your browser to refuse cookies from web sites or to remove cookies from your hard drive, but if you do, you will not be able to access or use portions of this site. We use cookies to enable you to select products and to purchase those products. If you do this, we keep a record of your browsing activity and purchase.<br>
Web beacons assist in delivering cookies and help us determine whether a web page on the site has been viewed and, if so, how many times. For example, any electronic image on this site, such as an ad banner, can function as a web beacon.<br>
We may use third-party advertising companies to help us tailor site content to users or to serve ads on our behalf. These companies may employ cookies and web beacons to measure advertising effectiveness (such as which web pages are visited or what products are purchased and in what quantities). Our Privacy Policy does not cover any use of information that a third-party advertising company may collect from you. It also does not cover any information that you may choose to provide to them or to an advertiser whose goods or services are advertised through the site.<br>
If you do not want the benefit of cookies, there is a simple process to manually delete your cookies. Please consult your web browser's Help documentation for more information on this process.<br><br>
7. Log Files<br><br>
As is true of most web sites, the site automatically recognizes the Internet URL from which you access it. We may also log your Internet protocol ("IP") address, Internet service provider, and date/time stamp for system administration, order verification, internal marketing, and system troubleshooting purposes. (An IP address may indicate the location of your computer on the Internet.)<br><br>
8. Information Use and Disclosure<br><br>
9. Internal Use<br><br>
We may internally use your personal information to improve our site's content and layout, to improve our outreach and for our own marketing efforts (including marketing our services and products to you), and to determine general marketplace information about visitors to this site.<br><br>
10. Communication with You<br><br>
This process permits Vrindhavan to make calls, send sms or/and mailers to its customers anytime of the day to keep them updated with our latest collections, exciting deals and partner offers. We respect your privacy and we abide by our policy to ensure that your details are safe with us. We use your personal information to process and fulfill your orders, to communicate with you regarding your orders and deliveries and to provide you with other client services such as confirmation of orders placed on cash-on-delivery mode. We will use your personal information to communicate with you about our site. Also, we may send you a confirmation email when you register with us. We may send you service-related announcements. Also, you may submit your email address for reasons such as to register for promotions; request we notify you regarding particular offers or products, or sign up for our email newsletter and special offers. If you submit your email address, we use it to deliver this information to you. We always permit you to unsubscribe or opt out of future emails. The ‘Unsubscribe’ link is given in all our promotion emails. However you cannot opt out of receiving emails related to your orders or your membership.<br><br>
11. External Use<br><br>
We aim to provide you with excellent service and to offer you a great selections on our site. We do not sell, rent, trade, license or otherwise disclose your specific personal information or financial information to anyone, except that:<br>
As do most Internet retailers, we use other service providers (such as courier services) to perform specific functions on our behalf. When we disclose information to these service providers, we disclose information to help them to perform their service. <br>In the example of courier services, we provide them some personally identifiable information such as your name, shipping address, email, and phone number.<br>
We may be required to disclose your personal information in response to requests from law-enforcement officials conducting investigations; subpoenas; a court order; or if we are otherwise required to disclose such information by law. We also will release personal information where disclosure is necessary to protect our legal rights, enforce our Terms of Use or other agreements, or to protect ourselves or others. For example, we may share information to reduce the risk of fraud or if someone uses or attempts to use our site for illegal reasons or to commit fraud.<br>
We may share personal information and non-personal information with entities controlling, controlled by, or under common control with us. In the event that Vrindhavan Pvt Ltd is merged, sold, or in the event of a transfer of some or all of our assets, we may disclose such information in connection with such transactions, subject to the Privacy Policy then in effect.<br>
We may share aggregate, non-personal information (such as the number of daily visitors to a particular web page, or the size of an order placed on a certain date) with third parties such as advertising partners. This information does not directly personally identify you or any user.<br><br>
12. Data Security<br><br>
All information gathered by Vrindhavan Pvt. Ltd. is stored securely within a controlled database. The database is stored on servers secured behind a firewall; access to the servers is password-protected and is strictly limited. However, as effective as our security measures are, no security system is impenetrable. We cannot guarantee the security of our database, nor can we guarantee that information you supply will not be intercepted while being transmitted to us over the Internet. And, of course, any information you include in a posting to the discussion areas or on your social media profiles is available to anyone with Internet access. Any information that you share with your friends and others under our ‘share with your friend’ feature or ‘Share your private showcase’ is at your risk. You must responsibly choose whom to share the information with.<br>

We use third-party service providers to serve ads on our behalf across the Internet and sometimes on this site. They may collect anonymous information about your visits to our website, and your interaction with our products and services. They may also use information about your visits to this and other websites to target advertisements for goods and services. This anonymous information is collected through the use of a pixel tag, which is industry standard technology used by most major websites. No personally identifiable information is collected or used in this process. They do not know the name, phone number, address, email address, or any personally identifying information about the user<br>

A note to end on: The Web is an evolving medium. If we need to change our privacy policy at some point in the future, we'll post the changes before they take effect. Of course, our use of any information we gather will always be consistent with the policy under which the information was collected, regardless of what the new policy may be. The above given privacy statement is effective as of 6-6-2018.</p>
	</div>


</div>
<footer>
	<div class="footercontent">
		<div class="f1">
			<img class="shipping" src="images/shipping.png">
			<h3>Shipping within<br> Kerala</h3>
			
		</div>

		<div class="f2">

			<span class="underline">Contact us</span>
			<p>Tel:848859585<br>support@vrindhavan.com<br></p><p><img class="swhatsapp" src="images/whatsapp.png"> +91 858474584</p>
		</div>
		<div class="f3">
			<span class="underline"  >Visit us</span>
			<p>Lulu mall<br>Edapally,Kochi<br>Mon to Sat 9.30am to 6.30pm</p>
		</div>
		<div class="f4">
			<span class="underline">Follow us</span>

			<a href="#">vrindhavan.com</a>
			<br>
			<a href="https://www.facebook.com/bindhu.surya.1"><img class="followicon" src="images/facebook.png"></a>
			<a href="whatsapp://send?text=Hi!&phone=+918547814212"><img class="followicon" src="images/whatsapp.png"></a>

		</div>
		<div class="bottomnav">
			<ul>
				<li><a href="terms.php#aboutus">About us</a></li>  | 
				<li><a href="terms.php#terms">Terms</a></li>  | 
				<li><a href="terms.php#policies">Policies</a></li>
			</ul>
			
		</div>
		<div class="crdiv">
			<p class="crp">&#169; Vrindhavan.com 2018. All Rights Reserved.</p>
		</div>

	</div>
</footer>

</body>
<?php
mysqli_close($con);
?>
<script type="text/javascript">
	

function opencartmenu(){
	var x=document.getElementsByClassName("cartmenuul")[0];
		var y=document.getElementsByClassName("searchdiv")[0];
		var z=document.getElementsByClassName("topnavul")[0];
		x.classList.toggle("open");
		if(y.classList.contains("open"))
		{
			y.classList.toggle("open");
		}
		if(z.classList.contains("open"))
		{
			z.classList.toggle("open");
		}

}
function openmenu(){
		var x=document.getElementsByClassName("topnavul")[0];
		var y=document.getElementsByClassName("searchdiv")[0];
		var z=document.getElementsByClassName("cartmenuul")[0];

		x.classList.toggle("open");
		if(y.classList.contains("open"))
		{
			y.classList.toggle("open");
		}
		if(z.classList.contains("open"))
		{
			z.classList.toggle("open");
		}
	}
	function opensearch(){
		var y=document.getElementsByClassName("searchdiv")[0];
		var x=document.getElementsByClassName("topnavul")[0];
		var z=document.getElementsByClassName("cartmenuul")[0];
		y.classList.toggle("open");
		if(x.classList.contains("open"))
		{
			x.classList.toggle("open");
		}
		if(z.classList.contains("open"))
		{
			z.classList.toggle("open");
		}
	}

</script>

</html>