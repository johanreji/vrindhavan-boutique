<?php 
session_start();
$total=0;
if(!isset($_GET['sort']))
{
	$val=0;

}
else{
	$val=$_GET['sort'];
}

$resultsperpage=12;
$category=$_GET['name'];

$empty=1;


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
	<link rel="icon" href="images/logo.png">
	<link rel="stylesheet" type="text/css" href="header.css">
	<link rel="stylesheet" type="text/css" href="category.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Source+Sans+Pro" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="footer.css">
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
             	$empty=0;
             	$filestr=reset(explode(",", $row['file']));
               ?>


               <a href="item.php?id=<?php echo $row['id'];?>"><div class="card">

			<img class="cardimg" src="<?php echo "upload/".$filestr; ?>">
			<span class="cardlabel"><?php echo $row['name']; ?></span>
			<span class="cardprice">&#8377;<?php echo $row['price']; ?></span>
		</div></a>


     <?php
             }
             if($empty)
             {
             	echo "<img src='images/excla.png' class='infopic'>";
             	echo "<span class='empty'>No items found :(</span>";
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
