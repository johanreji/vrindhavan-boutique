<?php

$con=mysqli_connect("localhost","root","virurohan","vrindhavan_db");
session_start();
if(!$con){
	die('not connected');
}
$id = $_POST['id'];
		$sql= "DELETE FROM items WHERE id='$id'";
if (!mysqli_query($con,$sql))
	{
 		$_SESSION["message"]= 1;

	}
	else
	{
 		$_SESSION["message"]= 2; 
 	}
mysqli_close($con);
echo "<meta http-equiv='refresh' content='0;url=admin.php'>";

?>
