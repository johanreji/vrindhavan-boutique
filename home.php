<?php 


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
</head>
<body>
<header>
	<div class="headercontent">
		<div class="searchdiv">
		<form method="get">
		<input class="searchbar" type="text" name="search" placeholder="What do you want to find?">
		<button class="searchbtn" type="submit"><img class="searchicon" src="images/search.png"></button>
		</form>
		</div>
		<img class="logo" src="images/logo.jpg">
	
	<div class="cartdiv">
	<img class="carticon" src="images/cart.png">
	<div class="cartcount"><p>5</p></div>
	</div>
	<div class="topnav">
		<ul>
			<li><a href=""> Home</a></li>
			<li><a href=""> Kurthis</a></li>
			<li><a href=""> Tops</a></li>
			<li><a href=""> Leggings</a></li>
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

	<span class="categorycardslabel">Our Products</span>
		<a href=""><div class="f card">
			<img class="cardimg" src="trial.jpg">
			<span class="cardlabel">Kurthi</span>
		</div></a>
		<a href=""><div class="s card">
			<img class="cardimg" src="trial2.jpg">
			<span class="cardlabel">Tops</span>
		</div></a>
		<a href=""><div class="t card">
			<img class="cardimg" src="trail3.jpg">
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
			<p><br>Tel:848859585<br>support@vrindhavan.com<br></p><p><img class="swhatsapp" src="images/whatsapp.png"> +91 858474584</p>
		</div>
		<div class="f3">
			<span class="underline"  >Visit us</span>
			<p><br>Floor no.3 <br>Lulu mall<br>Edapally,Kochi<br>Mon to Sat 9.30am to 6.30pm</p>
		</div>
		<div class="f4">
			<span class="underline">Follow us</span>
			<br><br><a href="#">vrindhavan.com</a>
			<br><br>
			<a href=""><img class="followicon" src="images/facebook.png"></a>
			<a href=""><img class="followicon" src="images/whatsapp.png"></a>

		</div>
		<div class="bottomnav">
			<ul>
				<li><a href="">About us</a>  | </li>
				<li><a href="">Terms</a>  | </li>
				<li><a href="">Policies</a></li>
			</ul>
			
		</div>
		<div class="crdiv">
			<p>&#169; Vrindhavan.com 2018. All Rights Reserved.</p>
		</div>

	</div>
</footer>

</body>

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
</script>

</html>