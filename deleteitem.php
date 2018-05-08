<?php
$con=mysqli_connect("localhost","root","virurohan","vrindhavan_db");
if(!$con){
	die('not connected');
}
$id = $_POST['id'];
		$sql= "DELETE FROM items WHERE id='$id'";
if (!mysqli_query($con,$sql))
	{
 		echo 'Not Deleted';

	}
	else
	{
 		echo 'Deleted Successfully';
 	}
mysqli_close($con);
echo "<meta http-equiv='refresh' content='1;url=admin.php'>";

?>
