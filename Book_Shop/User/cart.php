<?php
include '../Admin/conn.php';
session_start();

$user_id = $_SESSION['user_id'];
//  echo ($user_id);
if (isset($_GET['id'])) {
    $book_id = $_GET['id'];
    $quantity = 1;

    // Fetch book price from `add_book` table
    $book_query = "SELECT `price` FROM `add_book` WHERE id='$book_id'";
    $book_result = mysqli_query($conn, $book_query);
    $book = mysqli_fetch_assoc($book_result);
    $price = $book['price'];


    // Insert into `cart` with price
    $book_sql = "INSERT INTO `cart` (`user_id`,`book_id`,`price`,`quantity`) VALUES ('$user_id','$book_id','$price','$quantity')";
    $cart_result = mysqli_query($conn, $book_sql);
    if ($cart_result == true) {
        echo "<script>
    alert('success');
    window.location = 'index.php';
</script>";
    } else {
        echo "error" ;
    }
}
$total = 0;
$total_quantity = 0;
/*if (isset($_GET['minus'])) {
    $minus = $_GET['minus'];
    $quantity = $_GET['qty'] - 1;

    // If quantity is 1 or less, remove the item from the cart
    if ($quantity < 1) {
        $qtyid = $_GET['minus'];
        $min_sql = "DELETE FROM `cart` WHERE id='$qtyid'";
        $min_result = mysqli_query($conn, $min_sql);
        echo "<script>
        alert('Item removed');
        window.location = '?';
        </script>";
    } else {
        // Update the quantity in the cart
        $minus_sql = "UPDATE `cart` SET `quantity`='$quantity' WHERE id='$minus'";
        $minus_result = mysqli_query($conn, $minus_sql);
        header('Location: ?');
    }
} elseif (isset($_GET['plus'])) {
    $plus = $_GET['plus'];
    $quantity = $_GET['qty'] + 1;

    // Get the current stock of the product
    $stock_sql = "SELECT quantity_stock FROM add_book WHERE id=(SELECT id FROM cart WHERE id='$plus')";
    $stock_result = mysqli_query($conn, $stock_sql);
    $stock_row = mysqli_fetch_assoc($stock_result);
    $current_stock = $stock_row['quantity_stock'];

    // Check if stock is available
    if ($quantity <= $current_stock) {
        // Increase the quantity in the cart
        $plus_sql = "UPDATE `cart` SET `quantity`='$quantity' WHERE id='$plus'";
        $plus_result = mysqli_query($conn, $plus_sql);
        header('Location: ?');
    } else {
        // Not enough stock, cannot increase quantity
        echo "<script>
        alert('Not enough stock available');
        window.location = '?';
        </script>";
    }
}
*/



/*if (isset($_GET['minus'])) {
    $minus = $_GET['minus'];
    $quantity = $_GET['qty'] - 1;

    if ($quantity < 1) {
        // If quantity is less than 1, remove the item from the cart
        $delete_sql = "DELETE FROM `cart` WHERE id='$minus'";
        if (mysqli_query($conn, $delete_sql)) {
            echo "<script>
                    alert('Item removed');
                    window.location = '?';
                  </script>";
        } else {
            echo "Error removing item: " . mysqli_error($conn);
        }
    } else {
        // Update the cart with the reduced quantity
        $update_sql = "UPDATE `cart` SET `quantity`='$quantity' WHERE id='$minus'";
        // if (mysqli_query($conn, $update_sql)) {
        //     header('Location: ?');
        // } else {
        //     echo "Error updating quantity: " . mysqli_error($conn);
        // }





        if(mysqli_query($conn,$update_sql)){
            header('Location:?');
        }else{}
    }
}

// Handle the plus operation
if (isset($_GET['plus'])) {
    $plus = $_GET['plus'];
    $quantity = $_GET['qty'] + 1;

    // Get the stock quantity from the add_book table
    $stock_sql = "SELECT quantity_stock FROM `add_book` WHERE id = '$plus'";
    $stock_result = mysqli_query($conn, $stock_sql);
    // var_dump($stock_result);
    if ($stock_result) {
        if (mysqli_num_rows($stock_result) > 0) {
            $stock_row = mysqli_fetch_assoc($stock_result);
            $quantity_stock = $stock_row['quantity_stock'];

            if ($quantity <= $quantity_stock) {
                // If the new quantity does not exceed stock, update the cart
                $update_sql = "UPDATE `cart` SET `quantity`='$quantity' WHERE id='$plus'";
                if (mysqli_query($conn, $update_sql)) {
                    header('Location: ?');
                } else {
                    echo "Error updating quantity: " . mysqli_error($conn);
                }
            } else {
                // If quantity exceeds stock, show an alert
                echo "<script>
                        alert('Cannot add more than available stock');
                        window.location = '?';
                      </script>";
            }
        } else {
            // If no rows are returned, it means the book ID might be wrong
            echo "No stock information found for this item.";
        }
    } else {
        // If the query fails, show the error
        echo "Error fetching stock information: " . mysqli_error($conn);
    }
}*/

 if (isset($_GET['minus'])) {
    $minus = $_GET['minus'];
    // $user_id = $_SESSION['user']['id'];
    $quntity = $_GET['qty'] - 1;
    $minus_sql = "UPDATE `cart` SET `user_id`='$user_id',`quantity`='$quntity' WHERE id='$minus'";
    $minus_result = mysqli_query($conn, $minus_sql);

    if (isset($_GET['qty']) && $_GET['qty'] <= 1) {
        $qtyid = $_GET['minus'];
        $min_sql = "DELETE FROM `cart` WHERE id='$qtyid'";
        $min_result = mysqli_query($conn, $min_sql);
        echo "<script>
        window.location = '?'
        alert('Item remove')
        </script>";
    } else {
        $qtyid = $_GET['minus'];
        $sql3 = "UPDATE `cart` SET `user_id`='$user_id' WHERE id='$qtyid'";
        header('?');
    }
} elseif (isset($_GET['plus'])) {
    $plus = $_GET['plus'];
    $quantity = $_GET['qty'] + 1;
    $plus_sql = "UPDATE `cart` SET `user_id`='$user_id',`quantity`='$quantity' WHERE id='$plus'";
    $plus_result = mysqli_query($conn, $plus_sql);
    header('?');
} 

$sql = "SELECT * FROM `cart` WHERE user_id='$user_id'";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../image/download.jfif" rel="icon">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="cart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="card">
        <div class="row">
            <div class="col-md-8 cart">
                <div class="title">
                    <div class="row">
                        <div class="col">
                            <h4><b>Cart</b></h4>
                        </div>
                    </div>
                </div>
                <!-- <span>Image</span>
                <span class="ms-5 ps-3">Book Name</span>
                <span class="ms-4 ps-5">quantity</span>
                <span class="ms-5 ps-5">Price</span> -->
                <?php
                while ($cart = $result->fetch_assoc()) {
                    $book_id = $cart['book_id'];
                    $sql2 = "SELECT * FROM `add_book` WHERE id='$book_id'";
                    $result2 = mysqli_query($conn, $sql2);
                    if ($result2->num_rows > 0) {
                        while ($book = $result2->fetch_assoc()) {
                            $total += $book['price'] * $cart['quantity'];
                            $total_quantity += $cart['quantity'];
                ?>

                            <form action="" method="post">
                                <div class="row border-top border-bottom">
                                    <div class="row main align-items-center">
                                        <div class="col-2"><img class="img-fluid" src="<?php echo '../image/' . $book['image'] ?>"></div>
                                        <div class="col">
                                            <div class="row text-muted"><?php echo $book['write_name'] ?></div>
                                            <div class="row"><?php echo $book['book_name'] ?></div>
                                        </div>
                                        <div class="col">
                                            <!-- <a href="?minus=<?php echo $cart['id'] ?>&qty=<?php echo $cart['quantity'] ?>" min="1">-</a><a href="#" class="border"><?php echo $cart['quantity'] ?></a><a href="?plus=<?php echo $cart['id'] ?>&qty=<?php echo $cart['quantity'] ?>">+</a> -->
                                            <a href="?minus=<?php echo $cart['id'] ?>&qty=<?php echo $cart['quantity'] ?>" min="1">-</a>
                                                <a href="#" class="border"><?php echo $cart['quantity'] ?></a>
                                            <a href="?plus=<?php echo $cart['id'] ?>&qty=<?php echo $cart['quantity'] ?>">+</a>
                                        </div>
                                        <div class="col"><?php echo $book['price'] ?>$</div>
                                    </div>
                                </div>
                            </form>
                <?php
                        }
                    }
                }
                ?>
                <div class="back-to-shop"><a href="index.php">&leftarrow;</a><span class="text-muted">Back to shop</span></div>
            </div>
            <div class="col-md-4 summary">
                <div>
                    <h5><b>Summary</b></h5>
                </div>
                <hr>
                <div class="row">
                    <div class="col" style="padding-left:0;">Total Itam</div>
                    <div class="col text-right"><?php echo $total_quantity ?></div>
                </div>
                <div class="row">
                    <div class="col" style="padding-left:0;">Total Price</div>
                    <div class="col text-right"><?php echo $total ?>$</div>
                </div>
                <form>
                    <!-- <p>SHIPPING</p>
                    <select>
                        <option class="text-muted">Standard-Delivery- &dollar;;5.00</option>
                        <option class="text-muted">Standard-Delivery- &dollar;;10.00</option>
                    </select> -->
                    <p>GIVE CODE</p>
                    <input id="code" placeholder="Enter your code">
                </form>
                <!-- <div class="row">

                    <div class="col">Delivery Cost</div>
                    <div class="col text-right">0.50$</div>
                </div> -->
                <!-- <div class="row">

                    <div class="col">Payment Amount</div>
                    <div class="col text-right">100$</div>
                </div> -->
                <!-- <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                    <div class="col">TOTAL PRICE</div>
                    <div class="col text-right">100$</div>
                </div> -->
                <?php
                if (isset($_SESSION['user_id'])) {
                ?>

                    <a href="checkout.php" class="btn">Checkout</a>
                <?php
                } else {
                    echo 'No Data';
                ?>
                <?php } ?>
            </div>
        </div>
    </div>
</body>

</html>