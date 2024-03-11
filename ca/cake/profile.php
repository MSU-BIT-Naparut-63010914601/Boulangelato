<?php

// เชื่อมต่อฐานข้อมูลเพื่อดึงข้อมูลผู้ใช้
include("connection.php"); // เปลี่ยนเส้นทางไปยังไฟล์ที่เก็บการเชื่อมต่อกับฐานข้อมูล

// ตรวจสอบฐานข้อมูลและดึงข้อมูลผู้ใช้
$user_id = $_SESSION['user_id'];
$user_query = mysqli_query($connection, "SELECT * FROM users WHERE id = '$user_id'");
$user_data = mysqli_fetch_assoc($user_query);
