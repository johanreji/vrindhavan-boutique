<!DOCTYPE html>
<html>
<head>
	<title>admin
	</title>
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
		<label>description</label>
		<input type="text" name="description"><br><br>
		<label>price</label>
		<input type="number" step="0.01" name="price"><br><br>
		<label>file</label>
		<input type="file" name="file"><br><br>
		<button type="submit">submit</button>
	</form>
</div>



<!-- 
 <div class="deletefield">
		<table>
            <tr>
                <td>item code</td>
                <td>name</td>
                <td>size</td>
            </tr>
            <?php
               while ($row = mysql_fetch_array($query)) {
                   echo "<tr>";
                   echo "<td>".$row[item-code]."</td>";
                   echo "<td>".$row[name]."</td>";
                   echo "<td>".$row[size]."</td>";
                   echo "</tr>";
               }

            ?>
        </table>
</div>  -->

</body>
</html>

