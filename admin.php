<!DOCTYPE html>
<html>
<head>
	<title>admin
	</title>
	<meta http-equiv="Cache-control" content="no-cache">
	
</head>
<body>
<div class="addfield">
	<form action="additem.php" method="POST" enctype="multipart/form-data">
		<label>item code</label>
		<input type="text" name="itemcode" value="NIL"><br><br>
		<label>name</label>
		<input type="text" name="name"><br><br>
		<label>size</label>
		<input type="text" name="size"><br><br>
		<label>Colors</label>
		<input type="text" name="colors"><br><br>
		<label>description</label>
		<input type="text" name="description"><br><br>
		<label>price</label>
		<input type="number" step="0.01" name="price"><br><br>
		<label>file</label>
		<input type="file" name="file[]" multiple="multiple"><br><br>
		<button type="submit">submit</button>
	</form>
</div>
<?php  
		session_start();
		if(isset($_SESSION["message"]))
		{
			if($_SESSION["message"]==1)
			{
				echo "<script> alert(\"Error in deletion\");</script>";
			}
			if($_SESSION["message"]==2)
			{
				//echo "<script> alert(\"Successfull deletion\");</script>";
			}
			if($_SESSION["message"]==3)
			{
				echo "<script> alert(\"Image file error... Try again\");</script>";
			}
			if($_SESSION["message"]==4)
			{
				echo "<script> alert(\"Error in insertion\");</script>";
			}
			if($_SESSION["message"]==5)
			{
				echo "<script> alert(\"Successfull insertion\");</script>";
			}
			unset($_SESSION["message"]);
		}
        $con=  mysqli_connect("localhost", "root", "virurohan", "vrindhavan_db");

        if(!$con)
       {
           die('not connected');
       }
            $items=  mysqli_query($con, "select * from items");

       ?>


<div class="deletefield">
            <td>Items</td>
         <table border="1">
            <th> itemcode</th>
                    <th>Name</th>
                    <th>size</th>
                    <th>Colors</th>
                     <th>price</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Delete</th>

                   

            </tr>

        <?php

             while($row=  mysqli_fetch_array($items))

             {
                 ?>
            <tr>
                <td><?php echo $row['item_code']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['size']; ?></td>
                <td><?php echo $row['colors']; ?></td>
                <td><?php echo $row['price'] ;?></td>
                <td><?php echo $row['description'] ;?></td>
                <td>
               	<?php
               	$filestr=$row['file'];
               	$file=explode(",",$filestr);
               	for ($i=0; $i < sizeof($file); $i++) 
               	{
               	  ?>
               	
                <img height="99" width="99" src="upload/<?php echo $file[$i];?>" >
                <?php
                
            	}

                ?>


                </td>
                

                <td>
                	<form action="deleteitem.php" method="POST">
                		<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                		<button type="submit" onclick="return showconfirm()">Delete</button>
                	</form>
                </td>
            </tr>
        <?php
             }
             mysqli_close($con);
             ?>
             </table>
            </div>
<script type="text/javascript">
	

	function showconfirm(){
		return confirm("are you sure?");
	}
</script>
</body>
</html>
