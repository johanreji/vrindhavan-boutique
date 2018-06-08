<?php

session_start();
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}


 $con=  mysqli_connect("localhost", "root", "virurohan", "vrindhavan_db");

        if(!$con)
       {
           die('not connected');
       }

      
?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
	<link rel="stylesheet" type="text/css" href="login.css">
  <link rel="icon" href="images/logo.png">
  <link href="https://fonts.googleapis.com/css?family=Roboto|Source+Sans+Pro" rel="stylesheet">

</head>
<body>
<form method="post" action="">
<span>Change Password</span><br>
<label>Old Password</label>
<input type="password" name="oldpassword"></br>
<label>New Password </label>
<input type="password" name="newpassword"></br>
<input class="btn" type="submit" name="submit">
<!-- <input class="btn" type="button" name="reset" value="cancel"> -->
<a href="admin.php" class="btn">Cancel</a>

</form>


<?php
if(isset($_POST["submit"]))
{	
    $oldpassword = mysqli_real_escape_string($con,$_POST['oldpassword']);
    
    $newpassword = mysqli_real_escape_string($con,$_POST['newpassword']);
   $sql="UPDATE `admin_info` SET `password` = '".$newpassword."' WHERE username='".$_SESSION['username']."' and password='".$oldpassword."'";

    $result=mysqli_query($con,$sql);
    
     	$_SESSION["code"]=mysqli_affected_rows($con);
    header("location:admin.php");
      
       
        
    
}
if(isset($_POST["reset"])){
 header("location:admin.php");
}
?>
</body>

<?php
mysqli_close($con);
?>
</html>
