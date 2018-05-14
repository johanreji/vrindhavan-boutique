<?php

	session_start();
	$itemcode = $_POST['itemcode'];
	$description = $_POST['description'];
	$name = $_POST['name'];
	$size = $_POST['size'];
	$colors = $_POST['colors'];
	$price = $_POST['price'];
	$category = $_POST['category'];
	$file=array();
	$flag=0;
	$countfiles = count($_FILES['file']['name']);
	$allowed = array("jpg","jpeg","gif","png","JPG","JPEG","GIF","PNG");
	for ($i=0; $i < $countfiles; $i++) { 

	$ext=end(explode(".", $_FILES["file"]["name"][$i]));

	array_push($file,$name.rand(0, 3000)."-".$i.".".$ext);
	 	if(file_exists("upload/".$_FILES["file"]["name"][$i])||(!(in_array($ext, $allowed)))) {
 		$_SESSION["message"]=3;	
 		$flag=1;
 	 }
 }

 	if(!$flag){
 		for ($i=0; $i < $countfiles; $i++) { 
 			move_uploaded_file($_FILES["file"]["tmp_name"][$i], "upload/".$file[$i]);
 		}	
	$filestr=implode(",",$file);
 		
	$con = mysqli_connect("localhost","root","virurohan","vrindhavan_db");
	$sql ="INSERT INTO items (`name`, `price`, `size`,`category`, `colors`, `item_code`, `description`,`file`) VALUES('$name','$price','$size','$category','$colors','$itemcode','$description','$filestr')";
	if (!mysqli_query($con,$sql))
	{	$_SESSION["message"]=4;
 		
	}
	else
	{	$_SESSION["message"]=5;
 		
 	}
	}
	mysqli_close($con);

	echo "<meta http-equiv='refresh' content='0;url=admin.php'>";



?>