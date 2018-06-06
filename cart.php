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


          if($_POST['action']=="delete"){
          	$c=count($_SESSION['name']);
          	unset($_SESSION['file'][$_POST['itemnumber']]);
		unset($_SESSION['id'][$_POST['itemnumber']]);
		unset($_SESSION['name'][$_POST['itemnumber']]);
		unset($_SESSION['color'][$_POST['itemnumber']]);
		unset($_SESSION['size'][$_POST['itemnumber']]);
		unset($_SESSION['quantity'][$_POST['itemnumber']]);
		unset($_SESSION['price'][$_POST['itemnumber']]);


          	
for ($j=$_POST['itemnumber']; $j <$c ; $j++) { 
				$_SESSION['file'][$j]=$_SESSION['file'][$j+1];
		$_SESSION['id'][$j]=$_SESSION['id'][$j+1];
		$_SESSION['name'][$j]=$_SESSION['name'][$j+1];
		$_SESSION['color'][$j]=$_SESSION['color'][$j+1];
		$_SESSION['size'][$j]=$_SESSION['size'][$j+1];
		$_SESSION['quantity'][$j]=$_SESSION['quantity'][$j+1];
		$_SESSION['price'][$j]=$_SESSION['price'][$j+1];
			}

			$_SESSION['name'] = array_filter($_SESSION['name']);
			$_SESSION['file'] = array_filter($_SESSION['file']);
			$_SESSION['id'] = array_filter($_SESSION['id']);
			$_SESSION['color'] = array_filter($_SESSION['color']);
			$_SESSION['size'] = array_filter($_SESSION['size']);
			$_SESSION['quantity'] = array_filter($_SESSION['quantity']);
			$_SESSION['price'] = array_filter($_SESSION['price']);


          }
   	if ($_POST['action']=="update") {
   		
   		
		$_SESSION['quantity'][$_POST['itemnumber']]=$_POST['quantity'];
		
   		}

            
            
?>
<!DOCTYPE html>
<html>
<head>
	<title>Vrindhavan</title>
	<link rel="stylesheet" type="text/css" href="header.css">
	<link rel="stylesheet" type="text/css" href="cart.css">
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

<div class="cartcontent">
	<ul class="cartitems">
		
			<?php 
				if(count($_SESSION['name'])==0)
				{
					?>

					<li>
						<span class="cempty">Cart is empty</span>
					</li>
					<?php
				}
				
				 for ($i=0; $i< count($_SESSION['name']); $i++) {
				 	$total=$total+(($_SESSION['price'][$i])*($_SESSION['quantity'][$i]));
				
			?>
			<li>
				
				<span class="cname"><?php echo $_SESSION['name'][$i]; ?></span>
				<form method="POST" action="cart.php">
				<input type="hidden" name="action" value="delete">
				<input type="hidden" name="itemnumber" value="<?php echo $i; ?>">
				
				<button class="delbtn" type="submit"><img src="images/del.png" class="delimg"></button>
				</form>
				<span class="cid"><?php echo $_SESSION['id'][$i]; ?></span>
				<span class="ccolor">Color: <?php echo $_SESSION['color'][$i]; ?></span>
				<span class="csize">Size: <?php echo $_SESSION['size'][$i]; ?></span>
					
					<div class="viewquantity">
					<form method="POST" action="cart.php">
				<span class="cquantity">Quantity: </span>
			<input type="hidden" name="action" value="update">
			<input class="quantitybtn" type="submit" name="quantitycounter" value="-" onclick="minus(<?php echo $i; ?>)">	
			<input type="hidden" name="itemnumber" value="<?php echo $i; ?>">
			<input class="quantitycounter" type="number" min="1" value="<?php echo $_SESSION['quantity'][$i]; ?>" name="quantity">
			<input class="quantitybtn" type="submit" name="quantitycounter" value="+" onclick="plus(<?php echo $i; ?>)">
			</form>




		</div>
				<span class="cprice">&#8377;<?php echo $_SESSION['price'][$i]; ?></span>
				<img class="cimg" src="upload/<?php echo $_SESSION['file'][$i]; ?>">
				
			</li>
			<?php
				}
			?>
			
		</ul>
		<div class="cfooter">
				<a href="checkout.php">	<button class="cbtn">Check out</button></a>
				<span class="cftotal">Total: &#8377;<?php echo $total; ?></span>

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
		

		x.classList.toggle("open");
		if(y.classList.contains("open"))
		{
			y.classList.toggle("open");
		}
		
	}
	function opensearch(){
		var y=document.getElementsByClassName("searchdiv")[0];
		var x=document.getElementsByClassName("topnavul")[0];
		
		y.classList.toggle("open");
		if(x.classList.contains("open"))
		{
			x.classList.toggle("open");
		}
		
	}

function plus(i){
		var counter=document.getElementsByClassName("quantitycounter")[i];
		counter.value++;
	}
	function minus(i){
		var counter=document.getElementsByClassName("quantitycounter")[i];
		if(counter.value>1)
		{
			counter.value--;
		}
	}

</script>

</html>