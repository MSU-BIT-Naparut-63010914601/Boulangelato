<?php
include("checklogin.php");
include("connectdb.php");

if (isset($_GET['pid'])) {
	include("connectdb.php");
	$sql = "DELETE FROM product WHERE `products`.`p_id` = '{$_GET['pid']}'";
	mysqli_query($conn, $sql) or die("ลบไม่ได้");


	unlink("img/" . $_GET['pid'] . "." . $_GET['ext']);
	echo "<script>";
	echo "window.location='index2.php';";
	echo "</script>";
}
?>


<meta charset="utf-8">