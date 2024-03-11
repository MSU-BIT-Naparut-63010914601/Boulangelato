<?php
session_start();
include 'connectdb.php';



if (isset($_SESSION['user_id'])) {
    // ถ้าผู้ใช้เข้าสู่ระบบแล้ว
    if (isset($_POST['add_to_cart'])) {
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];
        $product_quantity = 1;

        $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");

        if (mysqli_num_rows($select_cart) > 0) {
            $message[] = 'product already added to cart';
        } else {
            $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, price, image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
            $message[] = 'product added to cart successfully';
        }
    }
} else {
    // ถ้าผู้ใช้ยังไม่ได้เข้าสู่ระบบ
    $message[] = 'Please login to add products to your cart.';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Boulangelato</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
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

</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar start -->
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
    <!-- Navbar End -->


    <!-- Modal Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center">
                    <div class="input-group w-75 mx-auto d-flex">
                        <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                        <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Search End -->


    <!-- Hero Start -->
    <div class="container-fluid py-5 mb-5 hero-header">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-md-12 col-lg-7">
                    <h4 class="mb-3 text-secondary">Bakery</h4>
                    <h1 class="mb-5 display-3 text-primary">Bakery & coffee</h1>
                    <div class="position-relative mx-auto">
                        <form method="post" action="">
                            <input class="form-control border-2 border-secondary w-75 py-3 px-4 rounded-pill" type="text" name="kw" autofocus>
                            <button type="submit" name="Submit" class="btn btn-primary border-2 border-secondary py-3 px-4 position-absolute rounded-pill text-white h-100" style="top: 0; right: 25%;">Submit Now</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-12 col-lg-5">
                    <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active rounded">
                                <img src="img/hero1.jpg" class="img-fluid w-100 h-100 bg-secondary rounded" alt="First slide">
                                <a href="#" class="btn px-4 py-2 text-white rounded">cake</a>
                            </div>
                            <div class="carousel-item rounded">
                                <img src="img/hero2.jpg" class="img-fluid w-100 h-100 rounded" alt="Second slide">
                                <a href="#" class="btn px-4 py-2 text-white rounded">cookie</a>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <!--  Shop Start-->
    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <div class="tab-class text-center">
                <div class="row g-4">
                    <div class="col-lg-4 text-start">
                        <h1>Bakery Menu</h1>
                    </div>
                    <div class="col-lg-8 text-end">
                        <ul class="nav nav-pills d-inline-flex text-center mb-5">
                            <li class="nav-item">
                                <a class="d-flex m-2 py-2 bg-light rounded-pill active" data-bs-toggle="pill" href="#tab-1">
                                    <span class="text-dark" style="width: 130px;">ทั้งหมด</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="d-flex py-2 m-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-2">
                                    <span class="text-dark" style="width: 130px;"> cake </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-3">
                                    <span class="text-dark" style="width: 130px;">cookie</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-4">
                                    <span class="text-dark" style="width: 130px;">Bread</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-5">
                                    <span class="text-dark" style="width: 130px;">pie</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <?php
                        include("connectdb.php");
                        $kw = @$_POST['kw'];
                        $sql = "SELECT * FROM `products` WHERE `p_name` LIKE '%{$kw}%' OR `p_detail` LIKE '%{$kw}%'";
                        $rs = mysqli_query($conn, $sql);
                        ?>
                        <div class="row g-4">
                            <?php while ($data = mysqli_fetch_array($rs)) { ?>
                                <div class="col-md-6 col-lg-4 col-xl-3">
                                    <div class="card shadow-sm">
                                        <?php
                                        $p = $data['p_id'] . "." . $data['p_ext'];
                                        ?>
                                        <div class="fruite-img">
                                            <a href="detail.php?p_id=<?php echo $data['p_id']; ?>">
                                                <img src="img2/<?= $p; ?>" width="300" height="300">
                                            </a>
                                        </div>
                                        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">All</div>
                                        <div class="p-4 border border-secondary border-top-0 rounded-bottom" style="height: 200px; position: relative;">
                                            <div class="card-body d-flex flex-column justify-content-between">
                                                <h4 class="card-title" style="font-size: 1.2rem; margin-bottom: auto; color: #333;"><?php echo $data['p_name'] ?></h4>
                                                <div style="position: absolute; bottom: 10px; left: 10px;">
                                                    <p class="text-dark fs-5 fw-bold mb-0" style="font-size: 1rem; color: #666;">ราคา <?php echo $data['p_price'] ?> บาท</p>
                                                    <form action="add_to_cart.php" method="post">
                                                        <input type="hidden" name="product_name" value="<?php echo $data['p_name']; ?>">
                                                        <input type="hidden" name="product_price" value="<?php echo $data['p_price']; ?>">
                                                        <input type="hidden" name="product_detail" value="<?php echo $data['p_detail']; ?>">
                                                        <input type="hidden" name="product_image" value="<?php echo $data['p_ext']; ?>">
                                                        <input type="submit" class="btn btn-success" value="add to cart" name="add_to_cart">
                                                    </form>


                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- เค้ก -->
                    <div id="tab-2" class="tab-pane fade show p-0">
                        <?php
                        include("connectdb.php");
                        $kw = @$_POST['kw'];
                        $sql = "SELECT * FROM products WHERE `c_id` = '1'";

                        // $sql = "SELECT p_name, c_id, p_id, p_ext, p_price FROM products WHERE (`p_name` LIKE '%{$kw}%' OR `c_id` = '1')";
                        $rs = mysqli_query($conn, $sql);
                        ?>
                        <div class="row g-4">
                            <?php while ($data = mysqli_fetch_array($rs)) { ?>
                                <div class="col-md-6 col-lg-4 col-xl-3">
                                    <div class="card shadow-sm">
                                        <?php
                                        $p = $data['p_id'] . "." . $data['p_ext'];
                                        ?>
                                        <div class="fruite-img">
                                            <a href="detail.php?p_id=<?php echo $data['p_id']; ?>">
                                                <img src="img2/<?= $p; ?>" width="300" height="300">
                                            </a>
                                        </div>
                                        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">All</div>
                                        <div class="p-4 border border-secondary border-top-0 rounded-bottom" style="height: 200px; position: relative;">
                                            <div class="card-body d-flex flex-column justify-content-between">
                                                <h4 class="card-title" style="font-size: 1.2rem; margin-bottom: auto; color: #333;"><?php echo $data['p_name'] ?></h4>
                                                <div style="position: absolute; bottom: 10px; left: 10px;">
                                                    <p class="text-dark fs-5 fw-bold mb-0" style="font-size: 1rem; color: #666;">ราคา <?php echo $data['p_price'] ?> บาท</p>
                                                    <form action="add_to_cart.php" method="post">
                                                        <input type="hidden" name="product_name" value="<?php echo $data['p_name']; ?>">
                                                        <input type="hidden" name="product_price" value="<?php echo $data['p_price']; ?>">
                                                        <input type="hidden" name="product_detail" value="<?php echo $data['p_detail']; ?>">
                                                        <input type="hidden" name="product_image" value="<?php echo $data['p_ext']; ?>">
                                                        <input type="submit" class="btn btn-success" value="add to cart" name="add_to_cart">
                                                    </form>


                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- end -->


                    <!-- คุกกี้ -->
                    <div id="tab-3" class="tab-pane fade show p-0">
                        <?php
                        include("connectdb.php");
                        $kw = @$_POST['kw'];
                        $sql = "SELECT * FROM products WHERE `c_id` = '2'";
                        $rs = mysqli_query($conn, $sql);
                        ?>
                        <div class="row g-4">
                            <?php while ($data = mysqli_fetch_array($rs)) { ?>
                                <div class="col-md-6 col-lg-4 col-xl-3">
                                    <div class="card shadow-sm">
                                        <?php
                                        $p = $data['p_id'] . "." . $data['p_ext'];
                                        ?>
                                        <div class="fruite-img">
                                            <a href="detail.php?p_id=<?php echo $data['p_id']; ?>">
                                                <img src="img2/<?= $p; ?>" width="300" height="300">
                                            </a>
                                        </div>
                                        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">All</div>
                                        <div class="p-4 border border-secondary border-top-0 rounded-bottom" style="height: 200px; position: relative;">
                                            <div class="card-body d-flex flex-column justify-content-between">
                                                <h4 class="card-title" style="font-size: 1.2rem; margin-bottom: auto; color: #333;"><?php echo $data['p_name'] ?></h4>
                                                <div style="position: absolute; bottom: 10px; left: 10px;">
                                                    <p class="text-dark fs-5 fw-bold mb-0" style="font-size: 1rem; color: #666;">ราคา <?php echo $data['p_price'] ?> บาท</p>
                                                    <form action="add_to_cart.php" method="post">
                                                        <input type="hidden" name="product_name" value="<?php echo $data['p_name']; ?>">
                                                        <input type="hidden" name="product_price" value="<?php echo $data['p_price']; ?>">
                                                        <input type="hidden" name="product_detail" value="<?php echo $data['p_detail']; ?>">
                                                        <input type="hidden" name="product_image" value="<?php echo $data['p_ext']; ?>">
                                                        <input type="submit" class="btn btn-success" value="add to cart" name="add_to_cart">
                                                    </form>


                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- end -->

                    <!-- ขนมปัง -->
                    <div id="tab-4" class="tab-pane fade show p-0">
                        <?php
                        include("connectdb.php");
                        $kw = @$_POST['kw'];
                        $sql = "SELECT * FROM products WHERE `c_id` = '3'";
                        $rs = mysqli_query($conn, $sql);
                        ?>
                        <div class="row g-4">
                            <?php while ($data = mysqli_fetch_array($rs)) { ?>
                                <div class="col-md-6 col-lg-4 col-xl-3">
                                    <div class="card shadow-sm">
                                        <?php
                                        $p = $data['p_id'] . "." . $data['p_ext'];
                                        ?>
                                        <div class="fruite-img">
                                            <a href="detail.php?p_id=<?php echo $data['p_id']; ?>">
                                                <img src="img2/<?= $p; ?>" width="300" height="300">
                                            </a>
                                        </div>
                                        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">All</div>
                                        <div class="p-4 border border-secondary border-top-0 rounded-bottom" style="height: 200px; position: relative;">
                                            <div class="card-body d-flex flex-column justify-content-between">
                                                <h4 class="card-title" style="font-size: 1.2rem; margin-bottom: auto; color: #333;"><?php echo $data['p_name'] ?></h4>
                                                <div style="position: absolute; bottom: 10px; left: 10px;">
                                                    <p class="text-dark fs-5 fw-bold mb-0" style="font-size: 1rem; color: #666;">ราคา <?php echo $data['p_price'] ?> บาท</p>
                                                    <form action="add_to_cart.php" method="post">
                                                        <input type="hidden" name="product_name" value="<?php echo $data['p_name']; ?>">
                                                        <input type="hidden" name="product_price" value="<?php echo $data['p_price']; ?>">
                                                        <input type="hidden" name="product_detail" value="<?php echo $data['p_detail']; ?>">
                                                        <input type="hidden" name="product_image" value="<?php echo $data['p_ext']; ?>">
                                                        <input type="submit" class="btn btn-success" value="add to cart" name="add_to_cart">
                                                    </form>


                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- จบ -->

                    <!-- พาย -->
                    <div id="tab-5" class="tab-pane fade show p-0">
                        <?php
                        include("connectdb.php");
                        $kw = @$_POST['kw'];
                        $sql = "SELECT * FROM products WHERE `c_id` = '4'";
                        $rs = mysqli_query($conn, $sql);
                        ?>
                        <div class="row g-4">
                            <?php while ($data = mysqli_fetch_array($rs)) { ?>
                                <div class="col-md-6 col-lg-4 col-xl-3">
                                    <div class="card shadow-sm">
                                        <?php
                                        $p = $data['p_id'] . "." . $data['p_ext'];
                                        ?>
                                        <div class="fruite-img">
                                            <a href="detail.php?p_id=<?php echo $data['p_id']; ?>">
                                                <img src="img2/<?= $p; ?>" width="300" height="300">
                                            </a>
                                        </div>
                                        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">All</div>
                                        <div class="p-4 border border-secondary border-top-0 rounded-bottom" style="height: 200px; position: relative;">
                                            <div class="card-body d-flex flex-column justify-content-between">
                                                <h4 class="card-title" style="font-size: 1.2rem; margin-bottom: auto; color: #333;"><?php echo $data['p_name'] ?></h4>
                                                <div style="position: absolute; bottom: 10px; left: 10px;">
                                                    <p class="text-dark fs-5 fw-bold mb-0" style="font-size: 1rem; color: #666;">ราคา <?php echo $data['p_price'] ?> บาท</p>
                                                    <form action="add_to_cart.php" method="post">
                                                        <input type="hidden" name="product_name" value="<?php echo $data['p_name']; ?>">
                                                        <input type="hidden" name="product_price" value="<?php echo $data['p_price']; ?>">
                                                        <input type="hidden" name="product_detail" value="<?php echo $data['p_detail']; ?>">
                                                        <input type="hidden" name="product_image" value="<?php echo $data['p_ext']; ?>">
                                                        <input type="submit" class="btn btn-success" value="add to cart" name="add_to_cart">
                                                    </form>


                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                    <!--  -->

                </div>
            </div>
        </div>
    </div>
    </div>


    <!--  Shop End-->


    <!-- Featurs Start -->
    <div class="container-fluid service py-5">
        <div class="container py-5">
            <div class="row g-4 justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <a href="#">
                        <div class="service-item bg-secondary rounded border border-secondary">
                            <img src="img/1.jpg" class="img-fluid rounded-top w-100" alt="">
                            <div class="px-4 rounded-bottom">
                                <div class="service-content bg-primary text-center p-4 rounded">
                                    <h5 class="text-white">cake</h5>
                                    <h3 class="mb-0">20% OFF</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4">
                    <a href="#">
                        <div class="service-item bg-dark rounded border border-dark">
                            <img src="img/cake8.jpg" class="img-fluid rounded-top w-100" alt="">
                            <div class="px-4 rounded-bottom">
                                <div class="service-content bg-light text-center p-4 rounded">
                                    <h5 class="text-primary">fruit cake</h5>
                                    <h3 class="mb-0">Free delivery</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4">
                    <a href="#">
                        <div class="service-item bg-primary rounded border border-primary">
                            <img src="img/Bcake.jpg" class="img-fluid rounded-top w-100" alt="">
                            <div class="px-4 rounded-bottom">
                                <div class="service-content bg-secondary text-center p-4 rounded">
                                    <h5 class="text-white">Birthday Cake</h5>
                                    <h3 class="mb-0">Discount 30$</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Featurs End -->


    <!-- Vesitable Shop Start-->
    <div class="container-fluid vesitable py-5">
        <div class="container py-5">
            <h1 class="mb-0">สินค้าขายดี</h1>
            <div class="owl-carousel vegetable-carousel justify-content-center">
                <div class="border border-primary rounded position-relative vesitable-item">
                    <div class="vesitable-img">
                        <img src="img2/6.jpg" width="100" height="200">
                    </div>
                    <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Best selling</div>
                    <div class="p-4 rounded-bottom">
                        <h4 class="card-title" style="font-size: 1.1rem; margin-bottom: auto; color: #333;">Homemade Nutella Croissants</h4>
                        <div class="d-flex justify-content-between flex-lg-wrap">
                            <p class="text-dark fs-5 fw-bold mb-0">ราคา 79 บาท</p>
                            <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="border border-primary rounded position-relative vesitable-item">
                    <div class="vesitable-img">
                        <img src="img2/11.jpg" width="100" height="200">
                    </div>
                    <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Best selling</div>
                    <div class="p-4 rounded-bottom">
                        <h4 class="card-title" style="font-size: 1.2rem; margin-bottom: auto; color: #333;">Chocolate Chip Cookies</h4>
                        <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p> -->
                        <div class="d-flex justify-content-between flex-lg-wrap">
                            <p class="text-dark fs-5 fw-bold mb-0">ราคา 79 บาท</p>
                            <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="border border-primary rounded position-relative vesitable-item">
                    <div class="vesitable-img">
                        <img src="img2/3.jpg" width="100" height="200">
                    </div>
                    <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Best selling</div>
                    <div class="p-4 rounded-bottom">
                        <h4 class="card-title" style="font-size: 1.2rem; margin-bottom: auto; color: #333;">คุกกี้เรดเวลเวท</h4>
                        <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p> -->
                        <div class="d-flex justify-content-between flex-lg-wrap">
                            <p class="text-dark fs-5 fw-bold mb-0">ราคา 99 บาท</p>
                            <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="border border-primary rounded position-relative vesitable-item">
                    <div class="vesitable-img">
                        <img src="img2/4.jpg" width="10" height="200">
                    </div>
                    <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Best selling</div>
                    <div class="p-4 rounded-bottom">
                        <h4 class="card-title" style="font-size: 1.2rem; margin-bottom: auto; color: #333;">ซอฟต์คุกกี้ดาร์กช็อกโกแลต</h4>
                        <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p> -->
                        <div class="d-flex justify-content-between flex-lg-wrap">
                            <p class="text-dark fs-5 fw-bold mb-0">ราคา 99 บาท</p>
                            <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="border border-primary rounded position-relative vesitable-item">
                    <div class="vesitable-img">
                        <img src="img2/5.jpg" width="100" height="200">
                    </div>
                    <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Best selling</div>
                    <div class="p-4 rounded-bottom">
                        <h4 class="card-title" style="font-size: 1.2rem; margin-bottom: auto; color: #333;">French Toast</h4>
                        <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p> -->
                        <div class="d-flex justify-content-between flex-lg-wrap">
                            <p class="text-dark fs-5 fw-bold mb-0">ราคา 89 บาท</p>
                            <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vesitable Shop End -->

    <!-- สุดท้าย -->
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
    <!-- Footer End -->

    <!-- Copyright Start -->
    <div class="container-fluid copyright bg-dark py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <span class="text-light"><a href="#"><i class="fas fa-copyright text-light me-2"></i>Your Site
                            Name</a>, All right reserved.</span>
                </div>

            </div>
        </div>
    </div>
    <!-- Copyright End -->



    <!-- Back to Top -->
    <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>


</body>

</html>