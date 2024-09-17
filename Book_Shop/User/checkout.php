<?php
include '../Admin/conn.php';
include 'header.php';
include 'link.php';

$sql = "SELECT * FROM `cart` WHERE user_id='$user_id'";
$result = mysqli_query($conn, $sql);

$total = 0;

if ($result->num_rows > 0) {
    while ($cart = $result->fetch_assoc()) {
        $book_id = $cart['book_id'];


        $sql2 = "SELECT * FROM `add_book` WHERE id='$book_id'";
        $result2 = mysqli_query($conn, $sql2);

        if ($result2->num_rows > 0) {
            $book = $result2->fetch_assoc();
            $total += $book['price'] * $cart['quantity'];
        }
    }
}

// Retrieve billing details

$sql3 = "SELECT * FROM `billing_details` WHERE user_id='$user_id'";
$result3 = mysqli_query($conn, $sql3);


$sql5 = "SELECT * FROM `add_book` WHERE 1";
$result5 = mysqli_query($conn, $sql5);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CheckOut</title>
    <link href="./admin/image/download.jfif" rel="icon">
</head>

<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body>



    <div class="container cont">
        <img src="../image/h2_hero2.jpg.webp" alt="Snow">
        <div class="centered">CheckOut</div>
    </div>

    <div class="checkout-area-wrapper padding-top-100 padding-bottom-50">
        <div class="container">

            <form action="curd.php" method="POST" id="billing_info">
                <input type="hidden" name="amount" value="<?php echo $total ?>">
                <div class="row g-4">
                    <div class="col-md-7 col-lg-7">

                        <div class="checkout-inner-content">
                            <div class="billing-details-area-wrapper">
                                <div class="flex-start mt-4 user-shipping-address-wrapper d-flex position-relative">
                                </div>
                                <div class="checkout-inner mt-4">
                                    <h4 class="title"> Billing Details </h4>
                                    <div class="checkout-contents">
                                        <div class="checkout-form mt-2">
                                            <div class="input-flex-item">
                                                <div class="single-input mt-4">
                                                    <label class="label-title mb-3"> Full Name </label>
                                                    <input class="form--control" type="text" name="name" value="" placeholder="Type First Name">
                                                </div>
                                            </div>

                                            <div class="input-flex-item">
                                                <div class="single-input mt-4">
                                                    <label class="label-title mb-3">New Address </label>

                                                    <input class="form--control" type="text" name="address" value="" placeholder="Type Address">

                                                </div>

                                            </div>
                                            <div class="input-flex-item">
                                                <div class="single-input mt-4">
                                                    <label class="label-title mb-3"> City/Town </label>
                                                    <select id="city_id" class="form--control select-state modal-cities" type="text" name="city">
                                                        <option value="">Select City</option>
                                                        <option value="Chomu">Chomu</option>
                                                        <option value="Sikar">Sikar</option>
                                                        <option value="Tonk">Tonk</option>
                                                        <option value="Amer">Amer</option>
                                                        <option value="Jagatpura">Jagatpura</option>
                                                        <option value="Jhotwara">Jhotwara</option>
                                                        <option value="Shastri Nagar">Shastri Nagar</option>
                                                        <option value="Sanganer">Sanganer</option>
                                                        <option value="Vaishali Nagar">Vaishali Nagar</option>

                                                    </select>
                                                </div>
                                                <div class="single-input mt-4">
                                                    <label class="label-title mb-3"> Zip Code </label>
                                                    <input class="form--control" type="text" name="zip" value="" id="zipcode" placeholder="Type Zip Code">
                                                </div>
                                            </div>

                                            <div class="input-flex-item">
                                                <div class="single-input mt-4">
                                                    <label class="label-title mb-3"> Mobile Number </label>
                                                    <input class="form--control" type="tel" name="mobile" value="" id="phone" placeholder="Type Mobile Number">
                                                </div>
                                                <div class="single-input mt-4">
                                                    <label class="label-title mb-3"> Email Address </label>
                                                    <input class="form--control" type="text" name="email" value="" id="email" placeholder="Type Email">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5 col-lg-5">
                        <div class="checkout-order-summery bg-item-badge">
                            <div class="order-summery-contents text-center">
                                <h2 class="summery-title"> Order Summery </h2>
                                <!-- <div class="coupon-form mt-4">
                                    <div class="single-input">
                                        <label>
                                            <input class="form--control" name="coupon" type="text" value="" placeholder="Enter your coupon code">
                                        </label>
                                    </div>

                                    <button type="button" data-action="https://safecart.bytesed.com/checkout/coupon" class="apply-coupon"> Apply Coupon </button>
                                </div> -->

                                <div class="single-coupon-list mt-4">
                                    <ul class="coupon-flex-list coupon-border">
                                        <li class="list"> <b> Items Total </b> <b id="checkout_items_total">$<?php echo $total ?></b>
                                        </li>
                                        <li class="list"> <b> Discount Amount </b>
                                            <b id="coupon_amount"> </b>
                                        </li>
                                        <li class="list"> <b> Tax Amount </b>
                                            <b id="checkout_tax_amount">Inclusive Tax</b>
                                        </li>
                                        <li class="list"> <b> Total Delivery Cost </b> <b id="checkout_delivery_cost"></b> </li>
                                        <li class="list"> <b> Payment Amount </b> <b id="total_payment_amount">$<?php echo $total ?></b> </li>
                                        <li class="list"> <b> Total </b> <b id="checkout_total">$<?php echo $total ?></b> </li>
                                        F
                                        <h4 class="text-secondary">Select Payment method</h4>
                                        <span>
                                            <input type="radio" class="mt-4" name="payment_method" value="Cash On Delivery">
                                            <b class="text-dark">Cash On Delivery</b>
                                        </span>
                                        <span>
                                            <input type="radio" name="payment_method" value="Phone Pay">
                                            <b class="text-dark"> Phone Pay</b>
                                        </span>
                                        <span>
                                            <input type="radio" name="payment_method" value="Raze Pay">
                                            <b class="text-dark">Raze Pay</b>
                                        </span>
                                    </ul>

                                </div>



                                <input type="hidden" name="amount" value="<?php echo $total; ?>">

                                <?php
                                $cart_query = "SELECT * FROM `cart` WHERE `user_id` = '$user_id'";
                                $result = mysqli_query($conn, $cart_query);

                                if ($result) {
                                    while ($cart = $result->fetch_assoc()) {
                                        $book_id = $cart['book_id'];
                                        $quantity = $cart['quantity'];

                                        echo "<input type='hidden' name='book_id[]' value='$book_id'>";
                                        echo "<input type='hidden' name='quantity[]' value='$quantity'>";
                                    }
                                } else {
                                    echo "Error: " . mysqli_error($conn);
                                }
                                ?>
                                <a href="cart.php" class="btn btn-success mt-4">Return to Cart</a>
                                <button type="submit" name="checkout" class="btn btn-success mt-4">Confirm Your Order</button>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
        </form>

    </div>
    </div>

</body>

</html>
<?php
include 'footer1.php';
?>