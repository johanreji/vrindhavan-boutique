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
	<link rel="stylesheet" type="text/css" href="home.css">
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

<div class="homecontent">

	<div class="slideshow">
		
		<div class="imgholder">
			<span class="slideshowlabel">New Arrivals</span>

			<?php
			$files = glob("slideshow/*.*");
			
			
			?>
			<img class="img show " src="<?php echo $files[0]; ?>">
			<?php
			for ($i = 1; $i < count($files); $i++) {
				
 			   ?>
		
			 <img class="img hide" src="<?php echo $files[$i]; ?>"> 
		<?php
		}
		?>
		</div>
		
	</div>

	<div class="categorycards">
	<?php
			$kurthiimg = glob("images/kurthi.*");
			$topsimg = glob("images/tops.*");
			$leggingsimg = glob("images/leggings.*");
			?>

	<span class="categorycardslabel">Our Products</span>
		<a href="category.php?name=kurthi"><div class="f card">
			<img class="cardimg" src="<?php echo $kurthiimg[0]; ?>">
			<span class="cardlabel">Kurthi</span>
		</div></a>
		<a href="category.php?name=tops"><div class="s card">
			<img class="cardimg" src="<?php echo $topsimg[0]; ?>">
			<span class="cardlabel">Tops</span>
		</div></a>
		<a href="category.php?name=leggings"><div class="t card">
			<img class="cardimg" src="<?php echo $leggingsimg[0]; ?>">
			<span class="cardlabel">Leggings</span>
	</div></a>



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
	var i=0;
	setInterval(slidertol,4000);
	function  slidertol(){
			//var imgp=document.getElementsByClassName("img")[i-1]
			var img=document.getElementsByClassName("img")[i];
			if(i==(document.getElementsByClassName("img").length-1))
			{i=-1;}
			var imgn=document.getElementsByClassName("img")[++i];
			
			 img.classList.toggle("show");
			 img.classList.toggle("hide");
			 imgn.classList.toggle("show");
			 imgn.classList.toggle("hide");

	}

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