<?php 

$id= $_GET['id'];
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
	<title><?php echo $item['name']; ?></title>
	<link rel="stylesheet" type="text/css" href="header.css">
	<link rel="stylesheet" type="text/css" href="item.css">
	<link rel="stylesheet" type="text/css" href="footer.css">
	<link href="https://fonts.googleapis.com/css?family=Londrina+Solid" rel="stylesheet">
</head>
<body>
<header>
	<div class="headercontent">
	<img class="logo" src="images/logo.png">
		
		<div class="searchdiv">
		<form method="get" action="search.php">
		<input class="searchbar" type="text" name="search" placeholder="What do you want to find?">
		<button class="searchbtn" type="submit"><img class="searchicon" src="images/search.png"></button>
		</form>
		</div>
	
	
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





<div class="viewcontainer">

		<div class="viewimagelist">

		<?php
		$file=explode(',', $item['file']);
		for ($i=0; $i < sizeof($file); $i++) { 
			

		?>

		<img class="imagelistitem" onclick="showimage(this)" src="upload/<?php echo $file[$i]; ?>">
		<?php
    	}
		?>	

		</div>
		<div class="viewimages">
			
			<img class="viewimage" src="upload/<?php echo $file[0] ;?>">
			<div class="sharediv">
		<p class="share">Share this product on  </p><a href=""><img class=" followicon" src="images/whatsapp.png"></a><a href=""><img class="followicon" src="images/facebook.png"></a>
		</div>
		</div>
		<div class="viewdetails">
		<div class="viewname">
			<span><?php echo $item['name']; ?></span>
		</div>
		<div class="viewitemcode">
			<p>Product code: <?php echo $item['item_code']; ?></p>
		</div>
		
		<hr>

		<div class="viewsize">
			<span class="select">Sizes</span><br>
			<?php 
				$sizearr=explode(",",$item['size']);
				foreach ($sizearr as $value)
				{	
				?>
				<input class="radio"  id="<?php echo $value ?>" type="radio" name="sizeradio">
				<label class="radiolabel" for="<?php echo $value ?>"><?php echo $value ?></label>
				<?php
				}
			 ?>
		</div>
		<div class="viewcolor">
			<span class="select">Colors</span><br>

			<?php 
				$colorarr=explode(",",$item['colors']);
				foreach ($colorarr as $value)
				{	
				?>
				<input class="radio"  id="<?php echo $value ?>" type="radio" name="colorradio">
				<label class="radiolabel" for="<?php echo $value ?>"><?php echo $value ?></label>
				<?php
				}
			 ?>
		</div>
		<div class="viewquantity">
			<span class="select">Quantity</span><br>
			<input class="quantitybtn" type="button" name="quantitycounter" value="-" onclick="minus()">			
			<input class="quantitycounter" type="number" min="1" value="1" name="quantitycounter">
			<input class="quantitybtn" type="button" name="quantitycounter" value="+" onclick="plus()">
			




		</div>

		<hr>

		<div class="viewprice">
			<p class="select">&#8377;<?php echo $item['price']; ?></p>
		</div>
		<button class="add">Add to Cart</button>
		
		<hr>

		<div class="viewdescription">
			<span class="select">Description</span>
			<p><?php echo $item['description']; ?></p>
		</div>
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
	function plus(){
		var counter=document.getElementsByClassName("quantitycounter")[0];
		counter.value++;
	}
	function minus(){
		var counter=document.getElementsByClassName("quantitycounter")[0];
		if(counter.value>1)
		{
			counter.value--;
		}
	}


	function showimage(img){
		var viewimg=document.getElementsByClassName("viewimage")[0];
		viewimg.src=img.src;
	}
</script>
</html>