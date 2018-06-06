<?php 
session_start();


		
	
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $item['name']; ?></title>
	<link rel="stylesheet" type="text/css" href="header.css">
	<link rel="stylesheet" type="text/css" href="orderplaced.css">
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
		
	
	<div class="cartdiv">
	<img class="carticon" src="images/cart.png">
	<div class="cartcount"><p class="cartcnt"><?php echo count($_SESSION['name']) ?></p></div>
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
<?php
	if(isset($_SESSION['orderresult']))
	{
		if ($_SESSION['orderresult']==1) {
			echo "<span class='message'>Your order has been successfully placed</span>";
		}
		else {
			echo "<span class='message'>Your order failed</span>";
		}
	}

?>
		<a href="home.php"><button class="btn">Continue shopping</button></a>
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
				<li><a href="">About us</a></li>  | 
				<li><a href="">Terms</a></li>  | 
				<li><a href="">Policies</a></li>
			</ul>
			
		</div>
		<div class="crdiv">
			<p class="crp">&#169; Vrindhavan.com 2018. All Rights Reserved.</p>
		</div>

	</div>
</footer>
</body>

<script type="text/javascript">
	
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