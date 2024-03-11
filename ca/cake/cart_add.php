<?php
session_start();

include 'connectdb.php';

if (!empty($_GET['id'])) {
    if (empty($_SESSION['cart'][$_GET['id']])) {
        $_SESSION['cart'][$_GET['id']] = 1;
    } else {
        $_SESSION['cart'][$_GET['id']] += 1;
    }
}

$_SESSION['message'] = 'Cart add success';
echo '<script>window.location.href = "index.php";</script>';
