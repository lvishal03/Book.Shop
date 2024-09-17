<?php
session_start();
include "../Admin/conn.php";
$user_id = $_SESSION['user_id'];

if (isset($_POST['checkout'])) {
    $payment_method = $_POST['payment_method'];
    $totalamount = $_POST['amount'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];

    // Insert into 'order' table
    $sql = "INSERT INTO `order` (`payment_method`, `amount`) VALUES ('$payment_method', '$totalamount')";
    if (mysqli_query($conn, $sql)) {
        $orderid = $conn->insert_id;

        // Insert into 'billing_details' table
        $sql2 = "INSERT INTO `billing_details` (`user_id`, `order_id`, `name`, `address`, `city`, `zip`, `mobile`, `email`) VALUES ('$user_id', '$orderid', '$name', '$address', '$city', '$zip', '$mobile', '$email')";
        if (mysqli_query($conn, $sql2))

        // Insert into 'order_book' table for each item in the cart
        {
            $book_ids = $_POST['book_id'];
            $quantities = $_POST['quantity'];

            foreach ($book_ids as $index => $book_id) {
                $quantity = $quantities[$index];

                $sql3 = "INSERT INTO `order_book` (`order_id`, `user_id`, `book_id`, `quantity`) VALUES ('$orderid', '$user_id', '$book_id', '$quantity')";
                if (!mysqli_query($conn, $sql3)) {
                    echo "Error: " . mysqli_error($conn);
                }
            }

            // Clear the cart for the user
            $sql4 = "DELETE FROM `cart` WHERE `user_id` = '$user_id'";
            if (!mysqli_query($conn, $sql4)) {
                echo "Error: " . mysqli_error($conn);
            }

            // Redirect to a index page
            echo "<script>
            alert('Order Placed Successfully')
            window.location = 'index.php';
            </script>";
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>




