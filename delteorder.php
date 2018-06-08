<?php

$con=mysqli_connect("localhost","root","virurohan","vrindhavan_db");
session_start();
if(!$con){
	die('not connected');
}
$oid = $_POST['oid'];
$bid = $_POST['bid'];
$sid = $_POST['sid'];

$sql= "DELETE FROM orders WHERE `oid`=".$oid;
if (!mysqli_query($con,$sql))
	{
 		echo "1";

	}
	else{
		$_SESSION['message']=2;
	}
	$sql= "DELETE FROM orderitems WHERE `oid`=".$oid;
if (!mysqli_query($con,$sql))
	{
 		echo "2";

	}
	else{
		$_SESSION['message']=2;
	}

	$sql= "DELETE FROM billingdetails WHERE `bid`=".$bid;
if (!mysqli_query($con,$sql))
	{
 		echo "3";

	}
	else{
		$_SESSION['message']=2;
	}
		$sql= "DELETE FROM shippingdetails WHERE `sid`=".$sid;
if (!mysqli_query($con,$sql))
	{
 		echo "4";

	}
	else{
		$_SESSION['message']=2;
	}
	
	
mysqli_close($con);
// echo "<meta http-equiv='refresh' content='0;url=admin.php'>";

?>
