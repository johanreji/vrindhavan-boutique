<?php
	 $itemcode = $_POST['itemcode'];
// $size = $_POST['size'];
 	$description = $_POST['description'];
	$name = $_POST['name'];
	$size = $_POST['size'];
	$price = $_POST['price'];
	$file = addslashes(file_get_contents($_FILES['file']['tmp_name']));
$con = mysqli_connect("localhost","root","virurohan","vrindhavan_db");
$sql = sprintf("INSERT INTO `items` (`name`, `price`, `size`, `item_code`, `description`, `file`) 
                            VALUES ('%s', '%f' ,'%s','%s','%s', '%b')"
              , mysqli_real_escape_string( $con, $name )
              , mysqli_real_escape_string( $con, $price )
              , mysqli_real_escape_string( $con, $size )
              , mysqli_real_escape_string( $con, $itemcode )
              , mysqli_real_escape_string( $con, $description )
              , mysqli_real_escape_string( $con, $file )
               );
	

if (!mysqli_query($con,$sql))
{
 echo 'Not Inserted';
}

else
{
 echo 'Inserted Successfully';
 
}

// $itemcode = $_POST['itemcode'];
// $size = $_POST['size'];
// 	$description = $_POST['description'];
// if($_SERVER["REQUEST_METHOD"] == "POST"){
	$file = addslashes(file_get_contents($_FILES['file']['tmp_name']));
// $itemcode = $_POST['itemcode'];
// 	$name = $_POST['name'];
// 	$size = $_POST['size'];
// 	$description = $_POST['description'];
// 	$price = $_POST['price'];
// 	$sql="insert into items (itemcode,name,size,description,price) values ($itemcode,$name,$size,$description,$price)";

        

// );
    
	// mysql_connect("localhost", "root","virurohan") or die(mysql_error()); //Connect to server
	// mysql_select_db("vrindhavan_db") or die("Cannot connect to database"); //Connect to database
	// mysql_query("INSERT INTO items (item_code, category, name, size, price, stock, description, file, reviews) VALUES (NULL, '$itemcode', NULL, '$name', '$size', '$price', NULL, '$description',NULL, NULL);"); //Inserts the value to table users
	//echo '<script>alert("Successfully Registered!");</script>'; // Prompts the user
	//Print '<script>window.location.assign("register.php");</script>'; // redirects to register.php
// }
?>