<?php
include("connectdb.php");

if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];

    $stmt = mysqli_prepare($conn, "INSERT INTO cart (id, name, price, image) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "issi", $product_id, $product_name, $product_price, $product_image);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        header("Location: cart.php");
    } else {
        echo "Error adding product to cart.";
    }

    mysqli_stmt_close($stmt);
}
