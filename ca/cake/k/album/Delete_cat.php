<?php
   include("checklogin.php");
    include("connectdb.php");
	
	if(isset($_GET['cid'])){
		 include("connectdb.php");
	$sql = "DELETE FROM category WHERE `category`.`c_id` = '{$_GET['cid']}'";
	mysqli_query($conn, $sql) or die ("ลบไม่ได้");
	
	
	        
			  echo "<script>";
			  echo "window.location='insert2.php';";
			  echo "</script>";
	}
?>


<meta charset="utf-8">
