<?php 
if(!isset($_GET['sort']))
{
	$val=0;

}
else{
	$val=$_GET['sort'];
}

$resultsperpage=12;
$category=$_GET['name'];


 $con=  mysqli_connect("localhost", "root", "virurohan", "vrindhavan_db");

        if(!$con)
       {
           die('not connected');
       }
            $items=  mysqli_query($con, "SELECT * FROM items WHERE category='$category'");
       $nofresults=mysqli_num_rows($items);
            $nofpages=ceil($nofresults/$resultsperpage);
             if(!isset($_GET['page']))
			{
				$p=1;
			}
			else{
				$p=$_GET['page'];
			}

            
            
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
	<div class="filterfield">


	<div class="sortfield">
			<!-- <form method="POST" action="category.php?name=<?php// echo $category; ?>&page=<?php// echo $p; ?>"> -->
			<!-- onchange="changed(this)" -->
			<span class="sortlabel">Sort by </span>
			<select class="sort" name="sort" onchange="location = this.value;">

				<option  value="category.php?name=<?php echo $category; ?>&sort=0&page=1">Newest</option>

				<option  value="category.php?name=<?php echo $category; ?>&sort=1&page=1">Price low to high</option>
				<option  value="category.php?name=<?php echo $category; ?>&sort=2&page=1">Price high to low</option>
				<option value="category.php?name=<?php echo $category; ?>&sort=3&page=1">Name A - Z</option>
				<option  value="category.php?name=<?php echo $category; ?>&sort=4&page=1">Name Z - A</option>
			</select>
			
		<!-- 	</form> -->
			
	</div>

		
	<div class="pagination">
		<ul>	
		<a href="category.php?name=<?php echo $category; ?>&sort=<?php echo $val; ?>&page=<?php if($p>1){echo $p-1;}else{echo $p;} ?>"><li class="unactive listitem">prev</li></a>
		<?php
		for ($page=1; $page <= $nofpages ; $page++) {
		?>
			<a href="category.php?name=<?php echo $category; ?>&sort=<?php echo $val; ?>&page=<?php echo $page; ?>"><li class="unactive listitem"><?php echo $page; ?></li></a>
			<?php
			 }
			 ?>
			<a href="category.php?name=<?php echo $category; ?>&sort=<?php echo $val; ?>&page=<?php if($p<$nofpages){echo $p+1;}else{echo $p;} ?>"><li class="unactive listitem">next</li></a> 
		</ul>

	</div>

	</div>
	
	<div class="itemsfield">
	
	<?php

			// if(!isset($_POST['sort']))
			// {
			// $val=0;
			// }
			// else{
			// $val=$_POST['sort'];
			// }
		

			$offset=($p-1)*$resultsperpage;
			//$sql="SELECT * FROM items WHERE category='".$category."' LIMIT ".$offset.",".$resultsperpage;
			if ($val==0) {
				
				$sql="SELECT * FROM items WHERE category='".$category."' ORDER BY id DESC  LIMIT ".$offset.",".$resultsperpage;
				

			}
			elseif ($val==1) {
				// echo $val;
				$sql="SELECT * FROM items WHERE category='".$category."' ORDER BY price LIMIT ".$offset.",".$resultsperpage;

			}
			elseif ($val==2) {
				//echo $val;
				$sql="SELECT * FROM items WHERE category='".$category."' ORDER BY price DESC  LIMIT ".$offset.",".$resultsperpage;
			}
			
			elseif ($val==3) {
				//echo $val;
				$sql="SELECT * FROM items WHERE category='".$category."' ORDER BY name  LIMIT ".$offset.",".$resultsperpage;
			}
			elseif ($val==4) {
				//echo $val;
				$sql="SELECT * FROM items WHERE category='".$category."' ORDER BY name DESC  LIMIT ".$offset.",".$resultsperpage;
			}
			
			
			$items=  mysqli_query($con, $sql);
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
	<div class="filterfield">
		<div class="pagination">
		<ul>	
		<a href="category.php?name=<?php echo $category; ?>&sort=<?php echo $val; ?>&page=<?php if($p>1){echo $p-1;}else{echo $p;} ?>"><li class="unactive btmlistitem">prev</li></a>
		<?php
		for ($page=1; $page <= $nofpages ; $page++) {
		?>
			<a href="category.php?name=<?php echo $category; ?>&sort=<?php echo $val; ?>&page=<?php echo $page; ?>"><li class="unactive btmlistitem"><?php echo $page; ?></li></a>
			<?php
			 }
			 ?>
			<a href="category.php?name=<?php echo $category; ?>&sort=<?php echo $val; ?>&page=<?php if($p<$nofpages){echo $p+1;}else{echo $p;} ?>"><li class="unactive btmlistitem">next</li></a> 
		</ul>

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
for (var i = 0; i <5; i++) {
if(<?php echo $val; ?>==i)
{
document.getElementsByTagName("option")[i].setAttribute("selected","selected");	
}
}

var listitup=document.getElementsByClassName("listitem")[<?php echo $p; ?>];
var listitdwn=document.getElementsByClassName("btmlistitem")[<?php echo $p; ?>];
listitup.classList.remove("unactive");
listitup.classList.add("active");
listitdwn.classList.remove("unactive");
listitdwn.classList.add("active");

</script>
</html>
