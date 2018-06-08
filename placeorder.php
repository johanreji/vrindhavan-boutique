<?php

	session_start();
	
	
	$_SESSION['orderresult']=1;
 	
 		
	$con = mysqli_connect("localhost","root","virurohan","vrindhavan_db");
	$sql ="INSERT INTO billingdetails ( `bfn`, `bln`, `bemail`, `btele`, `baddress`, `baddressrest`, `bcity`, `bpincode`, `bstate`, `bcountry`) VALUES ( '".$_POST['bfa']."', '".$_POST['bla']."', '".$_POST['bemail']."', '".$_POST['btele']."', '".$_POST['baddress']."', '".$_POST['baddressrest']."', '".$_POST['bcity']."', '".$_POST['bpincode']."', '".$_POST['bstate']."', '".$_POST['bcountry']."')"; 
				
	if (!mysqli_query($con,$sql))
	{	$_SESSION['orderresult']=0;
	}
	else
	{	
$bid = mysqli_insert_id($con);

 		
 	}
	$sql ="INSERT INTO shippingdetails ( `sfn`, `sln`, `semail`, `stele`, `saddress`, `saddressrest`, `scity`, `spincode`, `sstate`, `scountry`) VALUES ( '".$_POST['sfa']."', '".$_POST['sla']."', '".$_POST['semail']."', '".$_POST['stele']."', '".$_POST['saddress']."', '".$_POST['saddressrest']."', '".$_POST['scity']."', '".$_POST['spincode']."', '".$_POST['sstate']."', '".$_POST['scountry']."')";
	
	if (!mysqli_query($con,$sql))
	{	$_SESSION['orderresult']=0;
	}
	else
	{	
$sid = mysqli_insert_id($con);
	
 	
 	}
 	date_default_timezone_set("Asia/Kolkata"); 
 	$sql ="INSERT INTO `orders` ( `oid`,`bid`, `sid`, `payment`, `note`, `date`) VALUES ('".$_POST['orderid']."', '$bid', '$sid', '".$_POST['paymentoptions']."', '".$_POST['note']."', '".date('d-m-y h:i:s:a')."')";
	if (!mysqli_query($con,$sql))
	{	$_SESSION['orderresult']=0;
	}
	else
	{	
	$oid = mysqli_insert_id($con);
		
 		
 	}

 	for ($i=0; $i< count($_SESSION['name']); $i++) {


 		$sql="INSERT INTO `orderitems` ( `oid`, `iname`, `icode`, `isize`, `icolor`, `iquantity`,`iprice`) VALUES ( '".$_POST['orderid']."', '".$_SESSION['name'][$i]."', '".$_SESSION['id'][$i]."', '".$_SESSION['size'][$i]."', '".$_SESSION['color'][$i]."', '".$_SESSION['quantity'][$i]."', '".$_SESSION['price'][$i]."')";

 		if (!mysqli_query($con,$sql))
	{	$_SESSION['orderresult']=0;
	}
	

 	}
 	$_SESSION['oid']=$_POST['orderid'];
 	unset($_SESSION['name']);
 	unset($_SESSION['id']);
 	unset($_SESSION['size']);
 	unset($_SESSION['color']);
 	unset($_SESSION['quantity']);
 	unset($_SESSION['file']);


	mysqli_close($con);

	echo "<meta http-equiv='refresh' content='0;url=orderplaced.php'>";



?>