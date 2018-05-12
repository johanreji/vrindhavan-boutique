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
</head>
<body>
<header>
	<div class="headercontent">
	
		<img class="homeicon" src="images/home.png">
	
	
		<img class="logo" src="images/logo.jpg">
	
	<div class="cartdiv">
	<img class="carticon" src="images/cart.png">
	<p class="cartitemsnumber">0 items</p>
	</div>
	</div>
</header>





<div class="viewcontainer">
		<div class="viewimages">
			
			<img class="viewimage" src="upload/<?php echo $item['file'] ;?>">
		</div>
		
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
</script>
</html>