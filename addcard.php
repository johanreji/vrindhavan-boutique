	<?php

session_start();
$flag=0;

$allowed = array("jpg","jpeg","gif","png","JPG","JPEG","GIF","PNG"," ");

	$ext1=end(explode(".", $_FILES["kurthiimg"]["name"]));
	$ext2=end(explode(".", $_FILES["topsimg"]["name"]));
	$ext3=end(explode(".", $_FILES["leggingsimg"]["name"]));
	 	
	if(!empty($_FILES['kurthiimg']['name']))
 	 {	unlink(glob("images/kurthi.*")[0]);
	 	if((!(in_array($ext1, $allowed)))) {
 		$_SESSION["message"]=3;	
 		$flag=1;
 	 }
 	}
 	 if(!empty($_FILES['topsimg']['name']))
 	 {	unlink(glob("images/tops.*")[0]);
 	 if((!(in_array($ext2, $allowed)))) {
 		$_SESSION["message"]=3;	
 		$flag=1;	
 	 }
 	}
 	if(!empty($_FILES['leggingsimg']['name']))
 	 {
 	 	unlink(glob("images/leggings.*")[0]);
 	 if((!(in_array($ext3, $allowed)))) {
 		$_SESSION["message"]=3;	
 		$flag=1;
 	 }
 	}
if(!$flag)
{
	 
 			move_uploaded_file($_FILES["kurthiimg"]["tmp_name"], "images/"."kurthi.".$ext1);
 			move_uploaded_file($_FILES["topsimg"]["tmp_name"], "images/"."tops.".$ext2);
 			move_uploaded_file($_FILES["leggingsimg"]["tmp_name"], "images/"."leggings.".$ext3);
 		
 		
 		$_SESSION["message"]=5;
}
echo "<meta http-equiv='refresh' content='2;url=admin.php'>";

?>