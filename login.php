<?php



 $con=  mysqli_connect("localhost", "root", "virurohan", "vrindhavan_db");

        if(!$con)
       {
           die('not connected');
       }

      
?>
<!DOCTYPE html>
<html>
<head>
	<title>Log in</title>
	<link rel="stylesheet" type="text/css" href="login.css">
  <link rel="icon" href="images/logo.png">
  <link href="https://fonts.googleapis.com/css?family=Roboto|Source+Sans+Pro" rel="stylesheet">
</head>
<body>
<form method="post" action="">
<span>Admin Login</span><br>
<label>Username </label>
<input type="text" name="username"></br>
<label>Password </label><input type="password" name="password"></br>
<input class="btn" type="submit" name="submit" value="Log in">
</div>
</form>


<?php
if(isset($_POST['submit']))
{	$count=0;
    $username = mysqli_real_escape_string($con,$_POST['username']);
    
    $user_pass = mysqli_real_escape_string($con,$_POST['password']);
   
    $sql = "SELECT * FROM admin_info WHERE username='".$username."' and password='".$user_pass."'";
    $result=mysqli_query($con,$sql);
    $count = mysqli_num_rows($result);
    if($count==1){
       	session_start();
        $_SESSION['username'] = $username;
        header("location:admin.php");
      
       
        
    }
    else{
        echo "<p class='errormsg'>username/password error</p>";
    }
}

?>
</body>

<?php
mysqli_close($con);
?>
</html>
