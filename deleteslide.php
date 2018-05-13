<?php
$imgname=$_POST['imgname'];

 unlink($imgname);

echo "<meta http-equiv='refresh' content='0;url=admin.php'>";



?>