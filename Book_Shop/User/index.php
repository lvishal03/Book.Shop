<?php
include '../Admin/conn.php';
include 'header.php';

if (!isset($_SESSION['user_id'])) {
    echo "<script>
   alert('please login')
   window.location='sign_in.php'
  </script>";
}

$sql = "SELECT * FROM add_book WHERE b_status = 0 ORDER BY id DESC LIMIT 8";
$result = mysqli_query($conn, $sql);
$sql1 = "SELECT * FROM add_book WHERE b_status = 0 ORDER BY id DESC LIMIT 6";
$result1 = mysqli_query($conn, $sql1);
?>

<div class="maini" id="maini">
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Book Shop</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="cs.css">
        <link rel="stylesheet" href="all.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://safecart.bytesed.com/assets/css/bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css">
    </head>


    <body>

        <!-- <----------Main--------->
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-12 col-md-10">

                        <!-- Carousel -->
                        <div id="demo" class="carousel slide mt-5" data-bs-ride="carousel">

                            <!-- Indicators/dots -->
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                                <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                                <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                            </div>

                            <!-- The slideshow/carousel -->
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="../image/h1_hero1.jpg.webp" alt="Los Angeles" class="d-block" style="width:100%; height:100%;">
                                    <div class="carousel-caption line">
                                        <h3 class="mb-5 tr lineUp">The History <br> of Phipino</h3>
                                        <p><button class="button button2">Browser Store</button></p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="../image/h1_hero2.jpg.webp" alt="Chicago" class="d-block" style="width:100%">
                                    <div class="carousel-caption line">
                                        <h3 class="mb-5 tr lineUp">The History <br> of Phipino</h3>
                                        <p><button class="button button2">Browser Store</button></p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="../image/h1_hero3.jpg.webp" alt="New York" class="d-block" style="width:100%">
                                    <div class="carousel-caption line">
                                        <h3 class="mb-5 tr lineUp">The History <br> of Phipino</h3>
                                        <p><button class="button button2 mb-5">Browser Store</button></p>
                                    </div>
                                </div>
                            </div>

                            <!-- Left and right controls/icons -->
                            <!-- <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button> -->
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
            <center>
                <h5 class="mt-5 pt-5 p">Best Selling Books Ever</h5>
            </center>








<!-- 
            <div id="myCarousel" class="carousel slide container mt-5" data-bs-ride="carousel" style="padding-bottom: 150px;">
                <div class="carousel-inner w-100">

                    <?php
                    if ($result->num_rows > 0) {
                        while ($data = $result->fetch_assoc()) {
                    ?>
                            <div class="carousel-item active">
                                <div class="col-md-2">
                                    <div class="card" style="width: 200px;">
                                        <img src="<?php echo '../image/' . $data['image'] ?>" class="card-img-top" height="250px" alt="No Image">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $data['book_name'] ?></h5>
                                            <p><?php echo $data['write_name'] ?></p>
                                            <?php if ($data['quantity_stock'] == 0) { ?> -->
                                            
                                                
                                                 <!-- <span><i class="fa fa-star text-warning" aria-hidden="true"></i></span>
                                            <span><i class="fa fa-star text-warning" aria-hidden="true"></i></span>
                                            <span><i class="fa fa-star text-warning" aria-hidden="true"></i></span>
                                            <span><i class="fa fa-star text-warning" aria-hidden="true"></i></span>
                                            <span><i class="fa fa-star-half-o text-warning" aria-hidden="true"></i>
                                                </i>
                                            </span>
                                            <br> -->
                                            <br>

<!-- <p>(<span class="text-danger colr">120</span> Review) <span class="text-danger fo ms-3"><del>$<?php echo $data['price'] ?></del></span></p> -->

<!-- <p style="color: red;">Sold Out</p>
                                                <?php } else { ?>
                                                    <span><i class="fa fa-star text-warning" aria-hidden="true"></i></span>
                                            <span><i class="fa fa-star text-warning" aria-hidden="true"></i></span>
                                            <span><i class="fa fa-star text-warning" aria-hidden="true"></i></span>
                                            <span><i class="fa fa-star text-warning" aria-hidden="true"></i></span>
                                            <span><i class="fa fa-star-half-o text-warning" aria-hidden="true"></i>
                                                </i>
                                            </span>
                                            <br>

                                            <p>(<span class="text-danger colr">120</span> Review) <span class="text-danger fo ms-3">$<?php echo $data['price'] ?></span></p>

                                            <span> -->
                                                <!-- class="button-33" role="button"  -->
                                                <!-- button-62 -->
                                                <!-- <a class="text-secondary nav-link ibo ms-3 button-33" role="button" href="cart.php?id=<?php echo $data['id']; ?>">Add to Cart</a>                                    </span> -->
                                                
                                                
                                                
                                            
                                                    <!-- <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    <?php
                        }
                    }
                    ?> -->
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>


        </div>

        <div class="main1 mt-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-8">
                        <h5 class="pk mt-5 pt-5">Featured This Week <span class="qwe"><button class="button-11" role="button">View All</button></span></h5>
                        <!-- Carousel -->
                        <div id="demo" class="carousel slide mt-5" data-bs-ride="carousel">
                            <!-- Indicators/dots -->
                            <div class="carousel-indicators">
                                <!-- <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button> -->
                            </div>
                            <!-- The slideshow/carousel -->
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="../image/h1_hero2.jpg.webp" alt="Los Angeles" class="d-block" style="width:100%; background-color:red;">
                                    <div class="carousel-caption">
                                        <h3 class="mb-5 tr">The History <br> of Phipino</h3>
                                        <p><button class="button button2">Browser Store</button></p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="../image/h1_hero2.jpg.webp" alt="Chicago" class="d-block" style="width:100%">
                                    <div class="carousel-caption">
                                        <h3 class="mb-5 tr">The History <br> of Phipino</h3>
                                        <p><button class="button button2">Browser Store</button></p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="../image/h1_hero3.jpg.webp" alt="New York" class="d-block" style="width:100%">
                                    <div class="carousel-caption">
                                        <h3 class="mb-5 tr">The History <br> of Phipino</h3>
                                        <p><button class="button button2 mb-5">Browser Store</button></p>
                                    </div>
                                </div>
                            </div>
                            <!-- Left and right controls/icons -->
                            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-3 mt-5">
                        <img src="../image/ad.jpg.webp" class="" alt="ooops">
                    </div>
                </div>

            </div>
            <div class="container mt-5 pt-3">
                <div class="got">
                    <span class="p mt-5 pb-5">Latest Published items</span>
                </div>
                <div class="row mt-5">
                    <?php
                    // if ($result1->num_rows > 0) {
                    //     while ($row = $result1->fetch_assoc()) {
                    ?>
                    <!-- <div class="col-12 col-md-2">
                                <div class="card" style="width: 180px;">
                                    <img src="<?php echo '../image/' . $row['image'] ?>" class="card-img-top" height="250px" alt="No Image">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $row['book_name'] ?></h5>
                                        <p><?php echo $row['write_name'] ?></p>
                                        <span><i class="fa fa-star text-warning" aria-hidden="true"></i></span>
                                        <span><i class="fa fa-star text-warning" aria-hidden="true"></i></span>
                                        <span><i class="fa fa-star text-warning" aria-hidden="true"></i></span>
                                        <span><i class="fa fa-star text-warning" aria-hidden="true"></i></span>
                                        <span><i class="fa fa-star-half-o text-warning" aria-hidden="true"></i>
                                            </i>
                                        </span>
                                        <br>

                                        <p>(<span class="text-danger colr">120</span> Review) <span class="text-danger fo ms-3">$<?php echo $row['price'] ?></span></p>

                                        <span>

                                            <a class="text-secondary nav-link ibo ms-3 button-33" role="button" href="cart.php?id=<?php echo $row['id']; ?>">Add to Cart</a> </span>
                                    </div>
                                </div>
                            </div> -->

                    <?php
                    //     }
                    // }
                    ?>
                    <?php
                    if ($result1->num_rows > 0) {
                        while ($row = $result1->fetch_assoc()) {
                    ?>
                            <div class="col-12 col-md-2">
                                <div class="card" style="width: 180px;">
                                    <img src="<?php echo '../image/' . $row['image'] ?>" class="card-img-top" height="250px" alt="No Image">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $row['book_name'] ?></h5>
                                        <p><?php echo $row['write_name'] ?></p>
                                        <?php if ($row['quantity_stock'] == 0) { ?>
                                            <!-- <p class="text-danger">Sold Out</p> -->
                                            <span><i class="fa fa-star text-warning" aria-hidden="true"></i></span>
                                            <span><i class="fa fa-star text-warning" aria-hidden="true"></i></span>
                                            <span><i class="fa fa-star text-warning" aria-hidden="true"></i></span>
                                            <span><i class="fa fa-star text-warning" aria-hidden="true"></i></span>
                                            <span><i class="fa fa-star-half-o text-warning" aria-hidden="true"></i></span>
                                            <br>
                                            <p>(<span class="text-danger colr">120</span> Review) <span class="text-danger fo ms-3"><del>$<?php echo $row['price'] ?></del></span></p>
                                            <span>
                                            <b style="color: red;">Sold Out</b>
                                            </span>
                                            <?php } else { ?>
                                                <span><i class="fa fa-star text-warning" aria-hidden="true"></i></span>
                                            <span><i class="fa fa-star text-warning" aria-hidden="true"></i></span>
                                            <span><i class="fa fa-star text-warning" aria-hidden="true"></i></span>
                                            <span><i class="fa fa-star text-warning" aria-hidden="true"></i></span>
                                            <span><i class="fa fa-star-half-o text-warning" aria-hidden="true"></i></span>
                                            <br>
                                            <p>(<span class="text-danger colr">120</span> Review) <span class="text-danger fo ms-3">$<?php echo $row['price'] ?></span></p>
                                            <span>
                                                <a class="text-secondary nav-link ibo ms-3 button-33" role="button" href="cart.php?id=<?php echo $row['id']; ?>">Add to Cart</a>
                                            </span>
                                        
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>

            </div>
                        
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="cont">
                            <img src="../image/wants-bg1.jpg.webp" alt="Snow" class="img-fluid" style="width:100%; height: 190px;">
                            <div class="top-left">The History <br> of Phipino</div>
                            <div class="top-right1"><a class="ipn" href="sign_in.php"><button class="button button2 mt-5">view Details</button></a></div>

                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="cont">
                            <img src="../image/wants-bg2.jpg.webp" alt="Snow" class="img-fluid" style="width:100%; height: 190px;">
                            <div class="top-left1">Wilma Mumduya</div>
                            <div class="top-right1"><a class="ipn" href="sign_in.php"><button class="button button2 mt-5">view Details</button></a></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $('.carousel .carousel-item').each(function() {
                var minPerSlide = 6;
                var next = $(this).next();
                if (!next.length) {
                    next = $(this).siblings(':first');
                }
                next.children(':first-child').clone().appendTo($(this));

                for (var i = 0; i < minPerSlide; i++) {
                    next = next.next();
                    if (!next.length) {
                        next = $(this).siblings(':first');
                    }

                    next.children(':first-child').clone().appendTo($(this));
                }
            });
        </script>


    </body>

    </html>
</div>
<?php
include 'footer.php'
?>