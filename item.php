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
			<h2><?php echo $item['name']; ?></h2>
		</div>
		<div class="viewitemcode">
			<p>Item code :<?php echo $item['item_code']; ?></p>
		</div>
		<div class="viewprice">
			<p>Price : Rs.<?php echo $item['price']; ?></p>
		</div>
		<div class="viewsize">
			<p>Available sizes : <?php echo $item['size']; ?></p>
		</div>
		
		<div class="viewdescription">
			<p>Description :<?php echo $item['description']; ?></p>
		</div>
</div>

</body>
</html>