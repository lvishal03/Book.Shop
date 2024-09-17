<?php
include 'header.php';
include '../Admin/conn.php';
include 'link.php';

$sql = "SELECT * FROM `category`";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="cs.css">
    <link rel="stylesheet" href="all.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.css">
</head>

<body>
    <div class="container cont">
        <img src="../image/book_category.webp" alt="Snow">
        <div class="centered">Book Products</div>
    </div>

    <div class="container mt-4">
        <div class="ghj">
            <select name="fetchval" id="fetchval" class="button-64">
                <option value="">Select Option</option>
                <option value="a-z">a-z</option>
                <option value="z-a">z-a</option>
            </select>
        </div>

        <div class="row">
            <div class="col-md-3 bord">
                <span class="ews">Price</span>
                <div id="slider-range" class="price-filter-range" name="rangeInput"></div>
                <div style="margin:30px auto">
                    <input type="number" min="0" max="9900" id="min_price" class="price-range-field" />
                    <input type="number" min="0" max="10000" id="max_price" class="price-range-field" />
                </div>

                <div class="list-itam">
                    <form action="" method="get">
                        <div>
                            <span class="ews">Filter</span>
                            <!-- <button type="submit" class="btn btn-primary btn-sm float-end">Search</button>  -->
                        </div>
                        <div class="list-item mkl">
                            <?php
                            if ($result->num_rows > 0) {
                                $checked = [];
                                if (isset($_GET['book'])) {
                                    $checked = $_GET['book'];
                                }
                                foreach ($result as $row) {
                            ?>
                                    <p class="qaz">
                                        <label class="ms-2">
                                            <input type="checkbox" class="category" name="book[]" value="<?php echo $row['id']; ?>" <?php if (in_array($row['id'], $checked)) echo 'checked'; ?>>
                                            <?php echo $row['name']; ?>
                                        </label>
                                    </p>
                            <?php
                                }
                            } else {
                                echo 'Category Not Found.....';
                            }
                            ?>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-9">
                <div id="space" name="space">
                    <div class="row">
                        <?php
                        if (isset($_GET['book'])) {
                            $categorychecked = $_GET['book'];
                            foreach ($categorychecked as $rowbook) {
                                $sql1 = "SELECT * FROM `add_book` WHERE category = ?";
                                $stmt = $conn->prepare($sql1);
                                $stmt->bind_param("s", $rowbook);
                                $stmt->execute();
                                $result1 = $stmt->get_result();

                                if ($result1->num_rows > 0) {
                                    foreach ($result1 as $roww) {
                        ?>
                                        <div class="col-md-4 mt-3">
                                            <div class="card" style="width: 180px;">
                                                <img src="<?php echo '../image/' . $roww['image'] ?>" class="card-img-top" alt="..." height="250px">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?php echo $roww['book_name'] ?></h5>
                                                    <p><?php echo $roww['write_name'] ?></p>
                                                    <?php if ($roww['quantity_stock'] == 0) { ?>


                                                        <span><i class="fa fa-star text-warning" aria-hidden="true"></i></span>
                                                        <span><i class="fa fa-star text-warning" aria-hidden="true"></i></span>
                                                        <span><i class="fa fa-star text-warning" aria-hidden="true"></i></span>
                                                        <span><i class="fa fa-star text-warning" aria-hidden="true"></i></span>
                                                        <span><i class="fa fa-star-half-o text-warning" aria-hidden="true"></i>
                                                            </i>
                                                        </span>
                                                        <br>

                                                        <p>(<span class="text-danger colr">120</span> Review) <span class="text-danger fo ms-3"><del>$<?php echo $roww['price'] ?></del></span></p>
                                                        <b style="color: red;">Sold Out</b>
                                                    <?php } else { ?>
                                                        <span><i class="fa fa-star text-warning" aria-hidden="true"></i></span>
                                                        <span><i class="fa fa-star text-warning" aria-hidden="true"></i></span>
                                                        <span><i class="fa fa-star text-warning" aria-hidden="true"></i></span>
                                                        <span><i class="fa fa-star text-warning" aria-hidden="true"></i></span>
                                                        <span><i class="fa fa-star-half-o text-warning" aria-hidden="true"></i>
                                                            </i>
                                                        </span>
                                                        <br>

                                                        <p>(<span class="text-danger colr">120</span> Review) <span class="text-danger fo ms-3">$<?php echo $roww['price'] ?></span></p>

                                                        <a class="text-secondary nav-link ibo ms-3 button-33" role="button" href="cart.php?id=<?php echo $roww['id']; ?>">Add to Cart</a>


                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                }
                            }
                        } else {
                            $sql3 = "SELECT * FROM `add_book` WHERE b_status = 0 ORDER BY id ASC";
                            $result3 = mysqli_query($conn, $sql3);
                            if ($result3->num_rows > 0) {
                                foreach ($result3 as $data) {
                                    ?>
                                    <div class="col-md-4 mt-3">
                                        <div class="card" style="width: 180px;">
                                            <img src="<?php echo '../image/' . $data['image'] ?>" class="card-img-top" alt="..." height="250px">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $data['book_name'] ?></h5>
                                                <p><?php echo $data['write_name'] ?></p>
                                                <?php if ($data['quantity_stock'] == 0) { ?>
                                                    <span><i class="fa fa-star text-warning" aria-hidden="true"></i></span>
                                                    <span><i class="fa fa-star text-warning" aria-hidden="true"></i></span>
                                                    <span><i class="fa fa-star text-warning" aria-hidden="true"></i></span>
                                                    <span><i class="fa fa-star text-warning" aria-hidden="true"></i></span>
                                                    <span><i class="fa fa-star-half-o text-warning" aria-hidden="true"></i>
                                                        </i>
                                                    </span>
                                                    <br>

                                                    <p>(<span class="text-danger colr">120</span> Review) <span class="text-danger fo ms-3"><del>$<?php echo $data['price'] ?></del></span></p>
                                                    <b style="color: red;">Sold Out</b>
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

                                                    <a class="text-secondary nav-link ibo ms-3 button-33" role="button" href="cart.php?id=<?php echo $data['id']; ?>">Add to Cart</a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                        <?php
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $(document).ready(function() {
            $("#fetchval").on('change', function() {
                var value = $(this).val();
                $.ajax({
                    url: 'fetch_data.php',
                    type: 'POST',
                    data: 'request=' + value,
                    beforeSend: function() {
                        $("#space").html("<span>Working...</span>");
                    },
                    success: function(data) {
                        $("#space").html(data);
                    }
                });
            });

            $("#slider-range").slider({
                range: true,
                min: 50,
                max: 1000,
                values: [50, 1000],
                slide: function(event, ui) {
                    $("#min_price").val(ui.values[0]);
                    $("#max_price").val(ui.values[1]);
                },
                change: function(event, ui) {
                    $.ajax({
                        url: 'fetch_data.php',
                        type: 'POST',
                        data: {
                            min_price: ui.values[0],
                            max_price: ui.values[1]
                        },
                        success: function(data) {
                            $("#space").html(data);
                        }
                    });
                }
            });

            $('#min_price, #max_price').on('change', function() {
                var minPrice = $('#min_price').val();
                var maxPrice = $('#max_price').val();
                $("#slider-range").slider("option", "values", [minPrice, maxPrice]);
                $.ajax({
                    url: 'fetch_data.php',
                    type: 'POST',
                    data: {
                        min_price: minPrice,
                        max_price: maxPrice
                    },
                    success: function(data) {
                        $("#space").html(data);
                    }
                });
            });

            $('.category').on('change', function() {
                var categories = [];
                $('.category:checked').each(function() {
                    categories.push($(this).val());
                });
                $.ajax({
                    url: 'fetch_data.php',
                    type: 'POST',
                    data: {
                        categories: categories
                    },
                    success: function(data) {
                        $("#space").html(data);
                    }
                });
            });
        });
    </script>
</body>

</html>
<?php
include 'footer.php'
?>