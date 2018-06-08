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
	<link rel="stylesheet" type="text/css" href="checkout.css">
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
<form name="orderform" id="orderform" action="placeorder.php" method="POST">
<div class="ba">
		<span class="baheader">
			Billing Address
		</span>
		<input type="text" class="bfa" name="bfa" placeholder="First Name" required="required">
		<input type="text" class="bla" name="bla" placeholder="Last Name" required="required">
		<input type="email" class="bemail" name="bemail" placeholder="Email" required="required">
		<input type="Tel" class="btele" name="btele" placeholder="Phone number" required="required">
		<input type="text" class="baddress" name="baddress" placeholder="Address" required="required">
		<input type="text" class="baddressrest" name="baddressrest">
		<input type="text" class="bcity" name="bcity" placeholder="City" required="required">
		<input type="number" class="bpincode" name="bpincode" placeholder="pincode" required="required">
		<input type="text" class="bstate" name="bstate"  value="Kerala" readonly="readonly" >
		<input type="text" class="bcountry" name="bcountry" value="India" readonly="readonly">
		
		<span class="checkboxlabel"><input type="checkbox" class="checkbox" name="addresscheckbox" onclick="display()">Ship to different address</span>


</div>

<div class="sa">
		<span class="baheader">
			Shipping Address
		</span>
		<input type="text" class="bfa" name="sfa" placeholder="First Name" required="required">
		<input type="text" class="bla" name="sla" placeholder="Last Name" required="required">
		<input type="email" class="bemail" name="semail" placeholder="Email" required="required">
		<input type="Tel" class="btele" name="stele" placeholder="Phone number" required="required">
		<input type="text" class="baddress" name="saddress" placeholder="Address" required="required">
		<input type="text" class="baddressrest" name="saddressrest">
		<input type="text" class="bcity" name="scity" placeholder="City" required="required">
		<input type="number" class="bpincode" name="spincode" placeholder="pincode" required="required">
		<input type="text" class="bstate" name="sstate"  value="Kerala" readonly="readonly">
		<input type="text" class="bcountry" name="scountry" value="India" readonly="readonly">
		
		


</div>

<div class="orderreview">
	<span class="baheader">
			Order review
		</span>

		<span class="oid">Order ID : <?php $orderid=rand(0, time()); echo $orderid; ?> </span>
		<input type="hidden" name="orderid" value="<?php  echo $orderid; ?>">
		<ul class="orul">
			<?php 
				$total=0;
				 for ($i=0; $i< count($_SESSION['name']); $i++) {
				 	$total=$total+(($_SESSION['price'][$i])*($_SESSION['quantity'][$i]));
				
			?>
			<li>
				
				<span class="orname"><?php echo $_SESSION['name'][$i]; ?></span>
				<span class="orid"><?php echo $_SESSION['id'][$i]; ?></span>
				<span class="orcolor">Color: <?php echo $_SESSION['color'][$i]; ?></span>
				<span class="orsize">Size: <?php echo $_SESSION['size'][$i]; ?></span>
				<span class="orquantity">Quantity: <?php echo $_SESSION['quantity'][$i]; ?></span>
				<span class="orprice">&#8377;<?php echo $_SESSION['price'][$i]; ?></span>
				<img class="orimg" src="upload/<?php echo $_SESSION['file'][$i]; ?>">
				
			</li>
			<?php
				}
			?>
					</ul>
		
<div class="orfooter">
				
				<span class="orftotal">Total: &#8377;<?php echo $total; ?></span>

			</div>

</div>
<div class="paymentoptions">
	<span class="baheader">
			Payment options
		</span>

		<span class="radiolabel"><input type="radio" onclick="payment()" name="paymentoptions" value="bank" class="paymentradio" checked="true"> Bank Transfer</span><br>
		<span class="bankdetail">
			Make payment with the Order ID<br>
			Ac. Holder: Vrindhavan<br>
			Ac. No. 456255245631684<br>
			IFSC: 453479<br>
			Branch: SBI, Kaloor<br><br>
			or<br>
			<br>
			Whatsapp or call +91-8547854785
		</span>
<br>
		<span class="radiolabel"><input type="radio" onclick="payment()" name="paymentoptions" value="paytm" class="paymentradio"> Paytm Transfer</span>
		<br>
		<span class="paytmdetail">
			Paytm not available now
		</span>
</div>
<div class="notediv">
<span class="baheader">
			Note
		</span>
	
	<textarea form="orderform" id="note" name="note" placeholder="Provide any message here"  ></textarea>
</div>
<input type="submit" name="placeorder" value="Place Order" class="pobtn" onclick="shipping()">
</form>
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

	function display()
	{
		var x=document.getElementsByClassName("checkbox")[0];
		var y=document.getElementsByClassName("sa")[0];
		if(x.checked==true)
		{
			y.style.display="block";
		}
		else
		{
			y.style.display="none";

		}
	}

function shipping(){
	var z=document.getElementsByClassName("checkbox")[0];
	var x=document.getElementsByClassName("ba")[0];
	var y=document.getElementsByClassName("sa")[0];
	if(z.checked==false){
	for (var i = 0; i <10; i++) {
		y.getElementsByTagName("input")[i].value=x.getElementsByTagName("input")[i].value;
	}

}
}

	function payment(){
		x=document.getElementsByClassName("paymentradio")[0];
		y=document.getElementsByClassName("bankdetail")[0];
		z=document.getElementsByClassName("paytmdetail")[0];
		if(x.checked==true)
		{
			y.style.display="block";
			z.style.display="none";
		}
		else
		{
			z.style.display="block";
			y.style.display="none";
		}
	}

</script>

</html>