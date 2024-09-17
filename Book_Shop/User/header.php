<?php
include '../Admin/conn.php';
include 'link.php';
session_start();

$name = $_SESSION['name'];
$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM `add_book` WHERE 1";
$result = mysqli_query($conn, $sql);

$sql1 = "SELECT * FROM `cart` WHERE user_id='$user_id'";
$result1 = mysqli_query($conn, $sql1);
?>
<!DOCTYPE html>
<html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Book Shop</title>
 </head>
 <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
 <link rel="stylesheet" href="/resources/demos/style.css">
 <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
 <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
 <link href="../image/download.jfif" rel="icon">
 <link rel="stylesheet" href="all.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <body>

        <div class="header">
            <nav class="navbar navbar-expand-lg navbar-light sticky-top">
                <div class="container-fluid">

                   <a class="navbar-brand" href="../Admin/index.php">
                     <img class="ms-5 mb-3" src="../image/logo.png.webp" alt="Logo" style="width: 100%; height: 100%;">
                   </a>


                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                     <span class="navbar-toggler-icon"></span>
                   </button>


                   <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">

                             <form class="d-flex ms-5">
                                 <input class="form-control" type="text" placeholder="Search book by author">
                             </form>
                         </li>
                        </ul>
                        <ul class="navbar-nav auto1">
                           <li class="nav-item">
                             <a class="nav-link ho" href="#">FAQ</a>
                         </li>
                           <!-- <li class="nav-item">
                             <a class="nav-link ho" href="track_order.php">Track Order</a>
                         </li> -->
                           <li class="nav-item mt-1">
                             <a class="nav-link notification" href="cart.php">
                                 <i class="fa fa-shopping-cart" style="font-size: 21px;"></i>
                                 <?php if ($result1->num_rows > 0) {
                                     echo '<span class="badge bg-danger">' . $result1->num_rows . '</span>';
                                 } ?>
                             </a>
                           </li>
                           <li class="nav-item">
                             <a class="nav-link" href="profile.php">
                                 <i class="fa fa-shopping-bag" style="font-size: 18px;"></i> <span class="ho">My Order</span>
                             </a>
                           </li>
                           <?php if (isset($_SESSION['user_id'])) { ?>
                               <li class="nav-item">
                                 <a class="nav-link" href="#">
                                     <!-- <i class="fa fa-user-circle" style="font-size: 18px;"></i>  -->
                                     <i class="fa fa-user-o" aria-hidden="true" style="font-size: 18px;"></i>
                                     <span class="ho"><?php echo $name ?></span>
                                 </a>
                             </li>
                         <?php } else { ?>
                               <li class="nav-item">
                                 <a class="nav-link" href="sign_in.php">Login</a>/<a class="nav-link" href="sign_up.php">Register</a>
                             </li>
                         <?php } ?>
                           <li class="nav-item mt-1">
                             <a class="nav-link" href="log_out.php">
                                 <i class="fa fa-power-off"></i>
                                 <!-- <i class="fa fa-sign-out fs-5" aria-hidden="true"></i> -->
                             </a>
                         </li>
                     </ul>
                 </div>
             </div>
         </nav>
     </div>



        <nav class="navbar navbar-expand-lg navbar-light bg sticky-top main">
            <div class="container-fluid">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    Menu <span class="navbar-toggler-icon"></span>
             </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto auto">
                        <li class="nav-item">
                            <a class="nav-link hover" href="index.php"><b>Home</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hover" href="products.php"><b>Products</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hover" href="about.php"><b>About</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hover" href="#"><b>Pages</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hover" href="blog.php"><b>Blog</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hover" href="contact.php"><b>Contact</b></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

                            
        <div class="maini" id="maini">

        </div>
    </body>

</html>


