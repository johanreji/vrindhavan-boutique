<!DOCTYPE html>
<html>
<head>
	<title>Vrindhavan</title>
</head>
<body>

<?php
 $con=  mysqli_connect("localhost", "root", "virurohan", "vrindhavan_db");

        if(!$con)
       {
           die('not connected');
       }
            $items=  mysqli_query($con, "select * from items");
 ?>
<div class="grid">
<?php

             while($row=  mysqli_fetch_array($items))

             {
                 ?>	
    <a href="item.php?id=<?php echo $row['id'];?>">            
	<div class="item card">
		<div class="thumbnail"><img height="99" width="99" src="upload/<?php echo $row['file'] ;?>"></div>
		<div class="itemname"><h3><?php echo $row['name'];?></h3></div>
		<div class="itemprice"><h4>Rs. <?php echo $row['price'];?></h4></div>
	</div>
	</a>
	<?php
             }
             mysqli_close($con);
             ?>
</div>
</body>
</html>