<?php

$con=mysqli_connect("localhost","root","virurohan","vrindhavan_db");
session_start();
if(!$con){
	die('not connected');
}
$id = $_POST['id'];
$filestr = $_POST['file'];
$file=explode(",",$filestr);



$sql= "DELETE FROM items WHERE id='$id'";
if (!mysqli_query($con,$sql))
	{
 		$_SESSION["message"]= 1;

	}
	else
	{
 		$_SESSION["message"]= 2; 
 		for ($i=0; $i < sizeof($file); $i++) 
	    {
	    	unlink("upload/".$file[$i]);
		// if()
		// {
		// 	echo "deleted "
		// }
		// else{
		// 	echo "not "
		// }

		}
 	}
mysqli_close($con);
echo "<meta http-equiv='refresh' content='0;url=admin.php'>";

?>
