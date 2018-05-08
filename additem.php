<?php
	$itemcode = $_POST['itemcode'];
	$description = $_POST['description'];
	$name = $_POST['name'];
	$size = $_POST['size'];
	$price = $_POST['price'];
	$allowed = array("jpg","jpeg","gif","png");
	$ext=end(explode(".", $_FILES["file"]["name"]));
	$file=$name.rand(0, 3000).".".$ext;
 	if(file_exists("upload/".$_FILES["file"]["name"])||(!(in_array($ext, $allowed)))) {
 		echo "Image file error... Try again";
 	}
 	else{
	move_uploaded_file($_FILES["file"]["tmp_name"], "upload/".$file);
	$con = mysqli_connect("localhost","root","virurohan","vrindhavan_db");
	$sql ="INSERT INTO items (`name`, `price`, `size`, `item_code`, `description`,`file`) VALUES('$name','$price','$size','$itemcode','$description','$file')";
	if (!mysqli_query($con,$sql))
	{
 		echo 'Not Inserted';
	}
	else
	{
 		echo 'Inserted Successfully';
 	}
	}
	mysqli_close($con);

	echo "<meta http-equiv='refresh' content='1;url=admin.php'>";



?>