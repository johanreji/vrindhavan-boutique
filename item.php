<?php 
session_start();
$id= $_GET['id'];
$total=0;
header('Cache-Control: no cache'); //no cache

session_cache_limiter('must-revalidate');
 $con=  mysqli_connect("localhost", "root", "virurohan", "vrindhavan_db");

        if(!$con)
       {
           die('not connected');
       }
            $items=  mysqli_query($con, "SELECT * FROM items WHERE id='$id'");

            $item = mysqli_fetch_array($items);

    if(empty($_SESSION['id']))
    {
    	$_SESSION['id']=array();
		$_SESSION['name']=array();
		$_SESSION['color']=array();
		$_SESSION['size']=array();
		$_SESSION['quantity']=array();
		$_SESSION['price']=array();
		$_SESSION['file']=array();
    }



   if($_POST['action']=='add') 
   {	if (isset($_POST['color'])) {
   
   		array_push($_SESSION['file'], reset(explode(',', $item['file'])));
   		array_push($_SESSION['id'],$item['item_code']);
		array_push($_SESSION['name'],$item['name']);
		array_push($_SESSION['color'],$_POST['color']);
		array_push($_SESSION['size'],$_POST['size']);
		array_push($_SESSION['quantity'],$_POST['quantity']);
		array_push($_SESSION['price'],$item['price']);
   		}

   }        
            
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $item['name']; ?></title>
	<link rel="stylesheet" type="text/css" href="header.css">
	<link rel="stylesheet" type="text/css" href="item.css">
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
			
		</div>
		<div class="sharediv">
		<p class="share">Share on </p><a href="whatsapp://send?text=http://192.168.43.169:8080/vrindhavan/item.php?id=<?php echo $id; ?>"><img class=" followicon" src="images/whatsapp.png"></a>
		</div>
		<div class="viewdetails">

		<div class="viewname">
			<span><?php echo $item['name']; ?></span>
		</div>
		<div class="viewitemcode">
			<p>Product code: <?php echo $item['item_code']; ?></p>
		</div>
		
		<hr>
		<form method="POST" action="item.php?id=<?php echo $id; ?>">
		<div class="viewsize">
			<span class="select">Sizes</span><br>
			<?php 
				$sizearr=explode(",",$item['size']);
				foreach ($sizearr as $value)
				{	
				?>
				<input class="radio"  id="<?php echo $value ?>" value="<?php echo $value ?>" type="radio" name="size">
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
				<input class="radio"  id="<?php echo $value ?>" value="<?php echo $value ?>" type="radio" name="color">
				<label class="radiolabel" for="<?php echo $value ?>"><?php echo $value ?></label>
				<?php
				}
			 ?>
		</div>
		<div class="viewquantity">
			<span class="select">Quantity</span><br>
			<input class="quantitybtn" type="button" name="quantitycounter" value="-" onclick="minus()">			
			<input class="quantitycounter" type="number" min="1" value="1" name="quantity">
			<input class="quantitybtn" type="button" name="quantitycounter" value="+" onclick="plus()">
			




		</div>
		

		<hr>

		<div class="viewprice">
			<p class="select">&#8377;<?php echo $item['price']; ?></p>
		</div>
		<input type="hidden" name="action" value="add">
		<button type="submit" class="add">Add to Cart</button>
		</form>
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