<?php
session_start();
include("connectdb.php");

?>
<!DOCTYPE html>
<html lang="en">

<!--  -->

<!--  -->

<head>
    <meta charset="UTF-8">
    <title>project</title>


</head>

<body>
    <!-- partial:index.partial.html -->
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <style>
            body {
                background-image: url('https://i.pinimg.com/564x/eb/2d/a6/eb2da610b63de674da35c108aba6a3f6.jpg');
                background-repeat: repeat;
                width: auto;
                height: auto;
                border: 1px solid black;
                margin: 0 auto;




            }
        </style>
        <!-- Design by foolishdeveloper.com -->
        <title>project</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
        <!--Stylesheet-->
        <style media="screen">
            *,
            *:before,
            *:after {
                padding: 0;
                margin: 0;
                box-sizing: border-box;
            }

            body {
                background-color: #080710;
            }

            .background {
                width: 430px;
                height: 520px;
                position: absolute;
                transform: translate(-50%, -50%);
                left: 50%;
                top: 50%;
            }



            form {
                height: 520px;
                width: 400px;
                background-color: rgba(255, 255, 255, 0.13);
                position: absolute;
                transform: translate(-50%, -50%);
                top: 50%;
                left: 50%;
                border-radius: 10px;
                backdrop-filter: blur(10px);
                border: 2px solid rgba(231, 223, 223, 0.1);
                box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
                padding: 50px 35px;
            }

            form * {
                font-family: 'Poppins', sans-serif;
                color: #151515;
                letter-spacing: 0.5px;
                outline: none;
                border: none;
            }

            form h3 {
                font-size: 32px;
                font-weight: 500;
                line-height: 42px;
                text-align: center;
            }

            label {
                display: block;
                margin-top: 30px;
                font-size: 16px;
                font-weight: 500;
            }

            input {
                display: block;
                height: 50px;
                width: 100%;
                background-color: rgba(16, 15, 15, 0.07);
                border-radius: 3px;
                padding: 0 10px;
                margin-top: 8px;
                font-size: 14px;
                font-weight: 300;
            }

            ::placeholder {
                color: #171616;
            }

            button {
                margin-top: 50px;
                width: 100%;
                background-color: #ffffff;
                color: #080710;
                padding: 15px 0;
                font-size: 18px;
                font-weight: 600;
                border-radius: 5px;
                cursor: pointer;
            }

            .social {
                margin-top: 30px;
                display: flex;
            }

            .social div {
                background: red;
                width: 150px;
                border-radius: 3px;
                padding: 5px 10px 10px 5px;
                background-color: rgba(255, 255, 255, 0.27);
                color: #101111;
                text-align: center;
            }

            .social div:hover {
                background-color: rgba(255, 255, 255, 0.47);
            }

            .social .fb {
                margin-left: 25px;
            }

            .social i {
                margin-right: 4px;
            }
        </style>
    </head>

    <body>
        <div class="background">
            <div class="shape"></div>
            <div class="shape"></div>
        </div>






        <!doctype html>
        <html>

        <head>
            <meta charset="utf-8">
            <title>Untitled Document</title>
        </head>

        <body>
            <?php

            include("connectdb.php");
            if (isset($_POST['submit'])) {
                $username = mysqli_real_escape_string($conn, $_POST['username']);
                $password = mysqli_real_escape_string($conn, $_POST['password']);

                $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password' ") or die("Select Error");
                $row = mysqli_fetch_assoc($result);

                if (is_array($row) && !empty($row)) {
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['age'] = $row['age'];
                    $_SESSION['id'] = $row['id'];
                    if ($row['user_level'] == 1) {
            ?>
                        <script>
                            window.location.href = 'index.php';
                        </script>
                    <?php
                    } elseif ($row['user_level'] == 2) {
                    ?>
                        <script>
                            window.location.href = '../../ca/cake/k/album/index2.php';
                        </script>
                    <?php
                    } else {
                    ?>
                        <script>
                            window.location.href = 'dashboard.php';
                        </script>
                <?php
                    }
                } else {
                    echo "<div class='message'>
                    <p>Username or Password ผิด</p>
                    </div> <br>";
                }
            } else {



                ?>
                <form method="post" action="">
                    <h3>Login Here</h3>

                    <label>Username</label>
                    <input type="text" name="username" id="username" autofocus required>


                    <label>Password</label>
                    <input type="password" name="password" id="password"><br>

                    <input type="submit" name="submit" value="LOGIN">
                    <div class="social">

                        <div class="go"><i class="fa-thin fa-user"></i><a href="appM.php">สมัครสมาชิก</a>
                        </div>
                        <div class="fb"><i class="fa-thin fa-question"></i>ลืมรหัสผ่าน</div>
                    </div>


                </form>

            <?php } ?>




        </body>

    </body>

    </html>