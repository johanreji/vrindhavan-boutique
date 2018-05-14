<?php 

$category=$_GET['name'];
 $con=  mysqli_connect("localhost", "root", "virurohan", "vrindhavan_db");

        if(!$con)
       {
           die('not connected');
       }
            $items=  mysqli_query($con, "SELECT * FROM items WHERE category='$category'");

            
            
?>
<!DOCTYPE html>
<html>
<head>
	<title>Vrindhavan</title>
	<link rel="stylesheet" type="text/css" href="header.css">
	<link rel="stylesheet" type="text/css" href="category.css">

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
			<li><a href="home.php"> Home</a></li>
			<li><a href="category.php?name=kurthi"> Kurthis</a></li>
			<li><a href="category.php?name=tops"> Tops</a></li>
			<li><a href="category.php?name=leggings"> Leggings</a></li>
		</ul>
	</div>
	</div>
	
</header>

<div class="catbody">
	<div class="filterfield"></div>
	
	<div class="itemsfield">
	<?php

             while($row=  mysqli_fetch_array($items))

             {
             	$filestr=reset(explode(",", $row['file']));
               ?>


               <a href="item.php?id=<?php echo $row['id'];?>"><div class="card">

			<img class="cardimg" src="<?php echo "upload/".$filestr; ?>">
			<span class="cardlabel"><?php echo $row['name']; ?></span>
			<span class="cardprice">&#8377;<?php echo $row['price']; ?></span>
		</div></a>


     <?php
             }
              ?>

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