<?php
include 'header.php';
include 'conn.php';

$sql = "SELECT * FROM `billing_details` WHERE 1";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
}

// Get Update id and status

if (isset($_GET['id']) && isset($_GET['order_status'])) {
    $id = $_GET['id'];
    $order_status = $_GET['order_status'];

    // Use a prepared statement to prevent SQL injection
    $stmt = $conn->prepare("UPDATE `billing_details` SET `order_status` = $order_status WHERE id = '$id'");
    // $stmt->bind_param($order_status, $id);

    if ($stmt->execute()) {
        echo '<script>
                window.location.href = "order_view.php";
              </script>';
    } else {
        echo 'Error: ' . $conn->error;
    }

    $stmt->close();
}



if (isset($_GET['id'])  && isset($_GET['order_status'])) {
    $id = $_GET['id'];
    $order_status = $_GET['order_status'];

    $sql1 = "UPDATE `billing_details` SET `order_status`='$order_status', WHERE id='$id'";
    $result1 = mysqli_query($conn, $sql1);
    if ($result1) {
        echo '<script>
         window.location = "?";
         </script>';
    } else {
        echo 'Error' . $conn->error;
    }
}

// if(isset($_GET['id'])  && isset($_GET['order_status'])){
//         $id = $_GET['id'];
//         $order_status = $_GET['order_status'];

//         mysqli_query($conn,"UPDATE `billing_details` SET `order_status`='$order_status', WHERE id='$id'");
//         header('location:order_view.php');
//         die();
// }
?>
<div class="main" id="main">
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Order Summary</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="//cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <style>
        h1 {
            font-family: "Playfair Display", serif;
            color: darkolivegreen;
            text-align: center;
        }
    </style>

    <body>
        <h1>ORDER SUMMARY</h1>


        <table class="table table-bordered">


            <thead>
                <tr>
                    <th>Id</th>
                    <th>Billing Date</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>E-mail</th>
                    <th>Zip</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Change Status</th>
                </tr>
            </thead>
            <tbody id="">
                <?php
                while ($row = $result->fetch_assoc()) {


                ?>
                    <tr>
                        <th><?php echo $row['id'] ?></th>
                        <td><?php echo $row['created_at']?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['mobile'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['zip'] ?></td>
                        <td><?php echo $row['address'] ?></td>
                        <td style="text-align:center; font-family: 'Roboto', sans-serif;">
                            <?php
                            if ($row['order_status'] == 1) {
                                echo '<p style="background-color: red; color:white;">Pending</p>';
                            } elseif ($row['order_status'] == 2) {
                                echo '<p style="background-color: blue; color:white;">Transporting</p>';
                            } elseif ($row['order_status'] == 3) {
                                echo '<p style="background-color: green; color:white;">Completed</p>';
                            }

                            ?>
                        </td>

                        <td>
                            <select onchange="status_update(this.value,'<?php echo $row['id'] ?>')">
                                <option value="">Select Status</option>
                                <option value="1">Pending</option>
                                <option value="2">Transporting</option>
                                <option value="3">Completed</option>
                            </select>

                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>

        <script>
            function status_update(value, id) {
                // alert(id);
                let url = 'order_view.php';
                window.location.href = url + "?id=" + id + "&order_status=" + value;
            }
        </script>


        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
        <script>
            let table = new DataTable('.table');
        </script>
    </body>

    </html>

</div>
<?php
include 'footer.php';
?>