<?php
include 'header.php';
include 'conn.php';
$sql = "SELECT * FROM `order` WHERE 1";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
}



if (isset($_GET['id']) && isset($_GET['orde_status'])) {
    $id = $_GET['id'];
    $orde_status = $_GET['orde_status'];

    // Use a prepared statement to prevent SQL injection
    $stmt = $conn->prepare("UPDATE `order` SET `orde_status` = $orde_status WHERE id = '$id'");
    // $stmt->bind_param($order_status, $id);

    if ($stmt->execute()) {
        echo '<script>
                window.location.href = "order_status.php";
              </script>';
    } else {
        echo 'Error: ' . $conn->error;
    }

    $stmt->close();
}
?>
<div class="main" id="main">
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Order Status</title>
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
        <h1>ORDER STATUS</h1>


        <table class="table table-bordered">


            <thead>
                <tr>
                    <th>Order Id</th>
                    <th>Date Ordered</th>
                    <th>Total Price</th>
                    <th>Payment Method</th>
                    <th>Status</th>
                    <th>Change Status</th>

                </tr>
            </thead>
            <tbody>
                
                <?php
                while ($row = $result->fetch_assoc()) {
                ?>

                    <tr>
                        <th><?php echo $row['id'] ?></th>
                        <td style="text-align:center;"><?php echo $row['created_at'] ?></td>
                        <td style="text-align:center;">$<?php echo $row['amount'] ?></td>
                        <td style="text-align:center; font-family: 'Playfair Display', serif;"><?php echo $row['payment_method'] ?></td>
                        <td style="text-align:center; font-family: 'Roboto', sans-serif;">

                            <?php
                            if ($row['orde_status'] == 1) {
                                echo '<p style="background-color: red; color:white;">Pending</p>';
                            } elseif ($row['orde_status'] == 2) {
                                echo '<p style="background-color: blue; color:white;">Canceled</p>';
                            } elseif ($row['orde_status'] == 3) {
                                echo '<p style="background-color: green; color:white;">Completed</p>';
                            }

                            ?>

                        </td>
                        <td>
                            <select onchange="status_update(this.value,'<?php echo $row['id'] ?>')">
                                <option value="">Select Status</option>
                                <option value="1">Pending</option>
                                <option value="2">Canceled</option>
                                <option value="3">Completed</option>
                            </select>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>




        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
        <script>
            let table = new DataTable('.table');

            function status_update(value, id) {
                // alert(id);
                let url = 'order_status.php';
                window.location.href = url + "?id=" + id + "&orde_status=" + value;
            }
        </script>
    </body>

    </html>

</div>
<?php
include 'footer.php';
?>