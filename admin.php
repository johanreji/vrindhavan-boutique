<?php
session_start();
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}



?>


<!DOCTYPE html>
<html>
<head>
	<title>admin
	</title>
	<meta http-equiv="Cache-control" content="no-cache">
	<link rel="stylesheet" type="text/css" href="admin.css">
    <link rel="icon" href="images/logo.png">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Source+Sans+Pro" rel="stylesheet">

</head>
<body>
<header>
	
	<span>Admin</span>
	<div class="nav">
	<ul>
		<a href="changepassword.php"><li class="f">Change password</li></a>
		<a href="home.php"><li class="s">Go to site</li></a>
		<a href="logout.php"><li class="t">Log out</li></a>
	</ul>
</div>
</header>
<div class="content">
<div class="nav">
	<ul>
		<li class="f" onclick="show(1)">Add</li>
		<li class="s" onclick="show(2)">Items</li>
		<li class="t" onclick="show(3)">Orders</li>
	</ul>
</div>
<div class="add">
<div class="addfield">
<span class="title">Add Item</span>
	<form action="additem.php" method="POST" enctype="multipart/form-data">
		<label>Item Code</label>
		<input type="text" name="itemcode" value="NIL"><br><br>
		<label>Name</label>
		<input type="text" name="name"><br><br>
		<label>Size</label>
		<input type="text" placeholder="Comma separated values" name="size">

		<br><br>
		<label>Colors</label>
		<input type="text" placeholder="Comma separated values" name="colors"><br><br>
		<label>Description</label>
		<input type="text" name="description" value="NIL"><br><br>
		<label>Category</label>
		<select name="category">
  		  <option value="none">none</option>
		  <option value="kurthi">kurthi</option>
 		  <option value="tops">tops</option>
  		  <option value="leggings">leggings</option>
  		</select><br>

		<label>Price</label>
		<input type="number" step="0.01" name="price"><br><br>
		<label>Images</label>
		<input type="file" name="file[]" multiple="multiple">
		<p>Select multiple photo</p>
		<br><br>

		<button class="btn" type="submit">submit</button>
	</form>
</div>
<?php  
		  if(isset($_SESSION['code']))
    {
      if($_SESSION["code"]==0)
      {
        echo "<script> alert(\"Error in changing password\");</script>";
      }
      else{
        echo "<script> alert(\"Password changed\");</script>";
      }
      unset($_SESSION["code"]);
    }
		
		if(isset($_SESSION["message"]))
		{
			if($_SESSION["message"]==1)
			{
				echo "<script> alert(\"Error in deletion\");</script>";
			}
			if($_SESSION["message"]==2)
			{
				//echo "<script> alert(\"Successfull deletion\");</script>";
			}
			if($_SESSION["message"]==3)
			{
				echo "<script> alert(\"Image file error... Try again\");</script>";
			}
			if($_SESSION["message"]==4)
			{
				echo "<script> alert(\"Error in insertion\");</script>";
			}
			if($_SESSION["message"]==5)
			{
				echo "<script> alert(\"Successfull insertion\");</script>";
			}
			unset($_SESSION["message"]);
		}
        $con=  mysqli_connect("localhost", "root", "virurohan", "vrindhavan_db");

        if(!$con)
       {
           die('not connected');
       }
            $items=  mysqli_query($con, "select * from items");

       ?>

<div class="addslidefield">
		<span class="title">Add Slideshow Images</span>
		<form action="addslide.php" method="POST" enctype="multipart/form-data">
		<label>Images</label>
			<input type="file" name="slidefile[]" multiple="multiple">
			<p>Select multiple photo</p>
			<br><br>
			<button class="btn" type="submit">Add</button>
		</form>
			<div class="delslidefield">

	<?php
			$slideimages = glob("slideshow/*.*");
			
			
		
			for ($i = 0; $i < count($slideimages); $i++) {
				
 			   ?>
					<div class="slideitem">
			 			<img class="slideimg" src="<?php echo $slideimages[$i]; ?>"> 

			 			<form action="deleteslide.php" method="POST">
                		<input type="hidden" name="imgname" value="<?php echo $slideimages[$i]; ?>">
                		
                		<button class="sbtn" type="submit" onclick="return showconfirm()">Delete</button><br>
                		</form>
                	</div>	
			 		<?php
		}
		?>
		
		

	</div>
	</div>


	<div class="addcardfield">
		<span class="title">Add category cards</span>
		<form action="addcard.php" method="POST" enctype="multipart/form-data">
			<label>Kurthi - </label>
			<input type="file" name="kurthiimg">
			<label>Tops - </label>
			<input type="file" name="topsimg">
			<label>leggings - </label>
			<input type="file" name="leggingsimg">
			<button class="btn" type="submit">Add</button>
		</form>
	</div>
</div>
<div class="items">

            <span class="title">Items</span><p>(Scroll left or right)</p>
         <table  border="1">
         <tr>
            <th> itemcode</th>
                    <th>Name</th>
                    <th>size</th>
                    <th>category</th>
                    <th>Colors</th>
                     <th>price</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Delete</th>

                   

            </tr>

        <?php

             while($row=  mysqli_fetch_array($items))

             {
                 ?>
            <tr>
                <td><?php echo $row['item_code']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['size']; ?></td>
                <td><?php echo $row['category']; ?></td>
                <td><?php echo $row['colors']; ?></td>
                <td><?php echo $row['price'] ;?></td>
                <td><?php echo $row['description'] ;?></td>
                <td class="inline">
               	<?php
               	$filestr=$row['file'];
               	$file=explode(",",$filestr);
               	for ($i=0; $i < sizeof($file); $i++) 
               	{
               	  ?>
               	
                <img class="iimg" src="upload/<?php echo $file[$i];?>" >
                <?php
                
            	}

                ?>


                </td>
                

                <td>
                	<form action="deleteitem.php" method="POST">
                		<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                		<input type="hidden" name="file" value="<?php echo $row['file'] ?>">
                		<button class="dbtn" type="submit" onclick="return showconfirm()">Delete</button>
                	</form>
                </td>
            </tr>
        <?php
             }
            
             ?>
             </table>
            </div>


	<div class="orders">
	<?php
		$orders=  mysqli_query($con, "select `oid`, `bid`, `sid`, `payment`, `note`, `date` from `orders` order by date DESC ");
	?>
			<span class="title">Orders</span><p>(Scroll left or right)</p>

         <table border="1">
         <tr>
            <th> Orderid</th>
                    <th>Billing details</th>
                    <th>shipping details</th>
                    <th>Payment</th>
                    <th>Note</th>
                     <th>Date</th>
                    <th>Order details</th>
                    <th>Total Price</th>
                    <th>Delete</th>

                   

            </tr>

        <?php

             while($orow=  mysqli_fetch_array($orders))

             {
             	$total=0;
             	
                 ?>
            <tr>
                <td><?php echo $orow['oid']; ?></td>
                <td><?php 

                $bdet=  mysqli_query($con, "select * from `billingdetails` WHERE `bid` =".$orow['bid']);
                	while($brow=  mysqli_fetch_array($bdet))
                	{
                		echo  "<br>".$brow['bfn']." ".$brow['bln'];
                		echo  "<br> Email: ".$brow['bemail'];
                		echo "<br>  Telephone: ".$brow['btele'];
                		echo  "<br>  Address: ".$brow['baddress']." ".$brow['baddressrest'];
                		echo  "<br>".$brow['bcity']." ".$brow['bpincode'];
                		 echo  "<br>".$brow['bstate']." ".$brow['bcountry']."<br>";
                		 
                	}

                ?></td>
                <td><?php  

                $sdet=  mysqli_query($con, "select * from `shippingdetails` WHERE `sid` =".$orow['sid']);
                	while($srow=  mysqli_fetch_array($sdet))
                	{
                		echo  "<br>".$srow['sfn']." ".$srow['sln'];
                		echo  "<br> Email: ".$srow['semail'];
                		echo "<br>  Telephone: ".$srow['stele'];
                		echo  "<br>  Address: ".$srow['saddress']." ".$srow['saddressrest'];
                		echo  "<br>".$srow['scity']." ".$srow['spincode'];
                		 echo  "<br>".$srow['sstate']." ".$srow['scountry']."<br>";
                		 
                	}

                ?></td>
                <td><?php echo $orow['payment']; ?></td>
                <td><?php echo $orow['note']; ?></td>
                <td><?php echo date("d F Y h:i:s A",strtotime($orow['date']));?></td>
                <td><?php 

                $orderdet=  mysqli_query($con, "select * from `orderitems` WHERE `oid` =".$orow['oid']);
                	while($drow=  mysqli_fetch_array($orderdet))
                	{
                		echo  "<br>".$drow['iname'];
                		echo  "  --  ".$drow['icode'];
                		echo "  --  Size: ".$drow['isize'];
                		echo  "  --  Color: ".$drow['icolor'];
                		echo  "  --  Quantity: ".$drow['iquantity'];
                		 echo  "  --  Rs.".$drow['iprice']."<br>";
                		 $total=$total+$drow['iprice']*$drow['iquantity'];
                	}

                ?></td>
                             
                <td>
                	<?php 
                		echo "Rs".$total;
                	?>
                </td>
                <td>
                	<form action="deleteorder.php" method="POST">
                		<input type="hidden" name="oid" value="<?php echo $orow['oid'] ?>">
                		<input type="hidden" name="bid" value="<?php echo $orow['bid'] ?>">
                		<input type="hidden" name="sid" value="<?php echo $orow['sid'] ?>">
                		<button class="dbtn" type="submit" onclick="return showconfirm()">Delete</button>
                	</form>
                </td>
            </tr>
        <?php
             }
             mysqli_close($con);
             ?>
             </table>



	</div>
	</div>


</body>

<script type="text/javascript">
	function show(i){
		var x=document.getElementsByClassName("add")[0];
		var y=document.getElementsByClassName("items")[0];
		var z=document.getElementsByClassName("orders")[0];
		if(i==1)
		{
			x.style.display="block";
			y.style.display="none";
			z.style.display="none";
		}
		if(i==2)
		{
			y.style.display="block";
			z.style.display="none";
			x.style.display="none";
			
		}
		if(i==3)
		{
			z.style.display="block";
			y.style.display="none";
			x.style.display="none";
		}
	}

	function showconfirm(){
		return confirm("are you sure?");
	}
</script>



</html>
