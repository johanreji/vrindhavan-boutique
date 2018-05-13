
<?php
session_start();
$flag=0;
$countfiles = count($_FILES['slidefile']['name']);
$allowed = array("jpg","jpeg","gif","png","JPG","JPEG","GIF","PNG");
for ($i=0; $i < $countfiles; $i++) { 

	$ext=end(explode(".", $_FILES["slidefile"]["name"][$i]));
	
	 	if(file_exists("slideshow/".$_FILES["slidefile"]["name"][$i])||(!(in_array($ext, $allowed)))) {
 		$_SESSION["message"]=3;	
 		$flag=1;
 	 }
}
if(!$flag)
{
	for ($i=0; $i < $countfiles; $i++) { 
 			move_uploaded_file($_FILES["slidefile"]["tmp_name"][$i], "slideshow/".$_FILES["slidefile"]["name"][$i]);
 		
 		}	
 		$_SESSION["message"]=5;
}
echo "<meta http-equiv='refresh' content='2;url=admin.php'>";
?>

