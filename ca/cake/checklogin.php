<?php
session_start();


if (!isset($_SESSION['user_id'])) {
	echo 'รหัสไม่ถูกต้อง';
	header("Location: loginM.php");
	exit;
}
