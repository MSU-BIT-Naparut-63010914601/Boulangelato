<?php

include 'connectdb.php';

include("connectdb.php");

if (isset($_POST['update_update_btn'])) {
   $update_quantity_id = $_POST['update_quantity_id'];
   $update_quantity = $_POST['update_quantity'];

   // Update quantity in the cart table
   $update_stmt = mysqli_prepare($conn, "UPDATE cart SET quantity = ? WHERE id = ?");
   mysqli_stmt_bind_param($update_stmt, "ii", $update_quantity, $update_quantity_id);
   mysqli_stmt_execute($update_stmt);

   if (mysqli_stmt_affected_rows($update_stmt) > 0) {
      header("Location: cart.php");
   } else {
      echo "Error updating quantity in cart.";
   }

   mysqli_stmt_close($update_stmt);
}

if (isset($_GET['remove'])) {
   $remove_id = $_GET['remove'];

   // Remove item from cart
   $remove_stmt = mysqli_prepare($conn, "DELETE FROM cart WHERE id = ?");
   mysqli_stmt_bind_param($remove_stmt, "i", $remove_id);
   mysqli_stmt_execute($remove_stmt);

   if (mysqli_stmt_affected_rows($remove_stmt) > 0) {
      header("Location: cart.php");
   } else {
      echo "Error removing item from cart.";
   }

   mysqli_stmt_close($remove_stmt);
}

// Fetch cart items
$select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
$grand_total = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Boulangelato</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <meta content="" name="keywords">
   <meta content="" name="description">
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet">

   <!-- Icon Font Stylesheet -->
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
   <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

   <!-- Libraries Stylesheet -->
   <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
   <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


   <!-- Customized Bootstrap Stylesheet -->
   <link href="css/bootstrap.min.css" rel="stylesheet">

   <!-- Template Stylesheet -->
   <link href="css/style.css" rel="stylesheet">
   <style>
      .shopping-cart {
         background-color: #f9f9f9;
         padding: 20px;
         border-radius: 10px;
         margin-bottom: 20px;
      }

      .cart-table {
         width: 100%;
         border-collapse: collapse;
         margin-bottom: 20px;
      }

      .cart-table th,
      .cart-table td {
         padding: 10px;
         border-bottom: 1px solid #ddd;
      }

      .cart-table th {
         background-color: #1e8449;
         color: #fff;
         text-align: left;
      }

      .cart-table img {
         max-width: 100px;
         height: auto;
      }

      .table-bottom td {
         text-align: right;
      }

      .checkout-btn {
         text-align: right;
      }

      .btn {
         background-color: #1e8449;
         color: #fff;
         padding: 10px 20px;
         border-radius: 5px;
         text-decoration: none;
      }

      .btn.disabled {
         background-color: #ddd;
         color: #888;
         cursor: not-allowed;
      }
   </style>

</head>

<body>

   <div class="container-fluid fixed-top">
      <div class="container topbar bg-primary d-none d-lg-block">
         <div class="d-flex justify-content-between">
            <div class="top-info ps-2">
               <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#" class="text-white">Mahasarakham</a></small>
               <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-white">Email@Example.com</a></small>
            </div>
            <div class="top-link pe-2">
               <a href="#" class="text-white"><small class="text-white mx-2">Privacy Policy</small>/</a>
               <a href="#" class="text-white"><small class="text-white mx-2">Terms of Use</small>/</a>
               <a href="#" class="text-white"><small class="text-white ms-2">sale
                  </small></a>
            </div>
         </div>
      </div>
      <div class="container px-0">
         <nav class="navbar navbar-light bg-white navbar-expand-xl">
            <a href="index.html" class="navbar-brand">
               <h1 class="text-primary display-6">Boulangelato</h1>
            </a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
               <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
               <div class="navbar-nav mx-auto">
                  <a href="index.php" class="nav-item nav-link active">Home</a>
                  <a href="shop.php" class="nav-item nav-link">สินค้า</a>
                  <div class="nav-item dropdown">
                     <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                     <div class="dropdown-menu m-0 bg-secondary rounded-0">
                        <a href="cart.php" class="dropdown-item">Cart</a>
                        <a href="chackout.php" class="dropdown-item">Chackout</a>
                     </div>
                  </div>
                  <a href="contact.php" class="nav-item nav-link">Contact</a>
               </div>
               <div class="d-flex m-3 me-0">
                  <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search text-primary"></i></button>
                  <a href="cart.php" class="position-relative me-4 my-auto">
                     <i class="fa fa-shopping-bag fa-2x"></i>
                     <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;"></span>
                  </a>
                  <!-- ล็อกอิน -->
                  <a href="signin.php" class="my-auto">
                     <i class="fas fa-user fa-2x"></i>
                     <!-- ล็อกอิน -->
                  </a>
               </div>
            </div>
         </nav>
      </div>
   </div>

   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
   <div class="container">

      <section class="shopping-cart">

         <h1 class="heading">cart</h1>

         <table>

            <thead>
               <th>name</th>
               <th>price</th>
               <th>quantity</th>
               <th>total price</th>
               <th>action</th>
            </thead>

            <tbody>

               <?php

               $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
               $grand_total = 0;
               if (mysqli_num_rows($select_cart) > 0) {
                  while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
               ?>

                     <tr>
                        <td><?php echo $fetch_cart['name']; ?></td>
                        <td>$<?php echo number_format(floatval($fetch_cart['price'])); ?></td>

                        <td>
                           <form action="" method="post">
                              <input type="hidden" name="update_quantity_id" value="<?php echo $fetch_cart['id']; ?>">
                              <input type="number" name="update_quantity" min="1" value="<?php echo $fetch_cart['quantity']; ?>">
                              <input type="submit" value="update" name="update_update_btn">
                           </form>
                        </td>
                        <td>$<?php echo number_format($sub_total = intval($fetch_cart['price']) * intval($fetch_cart['quantity'])); ?></td>
                        <td><a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i> remove</a></td>
                     </tr>
               <?php
                     $grand_total += $sub_total;
                  };
               };
               ?>
               <tr class="table-bottom">
                  <td><a href="index.php" class="option-btn" style="margin-top: 0;">ซื้อของต่อ</a></td>
                  <td colspan="3">รวมสุทธิ</td>
                  <td>$<?php echo number_format($grand_total); ?></td>
                  <td><a href="cart.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> delete all </a></td>
               </tr>

            </tbody>

         </table>

         <div class="checkout-btn">
            <a href="chackout.php" class="btn <?= ($grand_total > 0) ? '' : 'disabled'; ?>">proceed to checkout</a>
         </div>

      </section>

   </div>

   <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
      <div class="container py-5">
         <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;">
            <div class="row g-4">
               <div class="col-lg-3">
                  <a href="#">
                     <h1 class="text-primary mb-0">Boulangelato</h1>
                     <p class="text-secondary mb-0">Fresh products</p>
                  </a>
               </div>
               <div class="col-lg-6">
                  <div class="position-relative mx-auto">
                     <input class="form-control border-0 w-100 py-3 px-4 rounded-pill" type="number" placeholder="Your Email">
                     <button type="submit" class="btn btn-primary border-0 border-secondary py-3 px-4 position-absolute rounded-pill text-white" style="top: 0; right: 0;">Subscribe Now</button>
                  </div>
               </div>
               <div class="col-lg-3">
                  <div class="d-flex justify-content-end pt-3">
                     <a class="btn  btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-twitter"></i></a>
                     <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                     <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-youtube"></i></a>
                     <a class="btn btn-outline-secondary btn-md-square rounded-circle" href=""><i class="fab fa-linkedin-in"></i></a>
                  </div>
               </div>
            </div>
         </div>
         <div class="row g-5">
            <div class="col-lg-3 col-md-6">
               <div class="footer-item">
                  <h4 class="text-light mb-3">Why People Like us!</h4>
                  <p class="mb-4">typesetting, remaining essentially unchanged. It was
                     popularised in the 1960s with the like Aldus PageMaker including of Lorem Ipsum.</p>
                  <a href="" class="btn border-secondary py-2 px-4 rounded-pill text-primary">Read More</a>
               </div>
            </div>
            <div class="col-lg-3 col-md-6">
               <div class="d-flex flex-column text-start footer-item">
                  <h4 class="text-light mb-3">Shop Info</h4>
                  <a class="btn-link" href="">About Us</a>
                  <a class="btn-link" href="">Contact Us</a>
                  <a class="btn-link" href="">Privacy Policy</a>
                  <a class="btn-link" href="">Terms & Condition</a>
                  <a class="btn-link" href="">Return Policy</a>
                  <a class="btn-link" href="">FAQs & Help</a>
               </div>
            </div>
            <div class="col-lg-3 col-md-6">
               <div class="d-flex flex-column text-start footer-item">
                  <h4 class="text-light mb-3">Account</h4>
                  <a class="btn-link" href="">My Account</a>
                  <a class="btn-link" href="">Shop details</a>
                  <a class="btn-link" href="">Shopping Cart</a>
                  <a class="btn-link" href="">Wishlist</a>
                  <a class="btn-link" href="">Order History</a>
                  <a class="btn-link" href="">International Orders</a>
               </div>
            </div>
            <div class="col-lg-3 col-md-6">
               <div class="footer-item">
                  <h4 class="text-light mb-3">Contact</h4>
                  <p>Address: 1429 Netus Rd, NY 48247</p>
                  <p>Email: Example@gmail.com</p>
                  <p>Phone: +0123 4567 8910</p>
                  <p>Payment Accepted</p>
                  <img src="img/payment.png" class="img-fluid" alt="">
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- custom js file link  -->
   <script src="js/script.js"></script>

</body>

</html>