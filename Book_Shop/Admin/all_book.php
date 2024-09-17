<?php
include 'header.php';
include 'conn.php';


$sql = "SELECT * FROM `add_book` WHERE 1";
$result = mysqli_query($conn, $sql);


// <!-- Update Status -->
if (isset($_GET['action']) && isset($_GET['id']) && !empty($_GET['id'])) {
    if ($_GET['action'] == 'active') {
        $query = "UPDATE `add_book` SET `b_status`='1' WHERE id = " . $_GET['id'];
    } elseif ($_GET['action'] == 'deactive') {
        $query = "UPDATE `add_book` SET `b_status`='0' WHERE id = " . $_GET['id'];
    }

    if ($conn->query($query) === TRUE) {
        echo '<script>
        window.location = "?"
        </script>';
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// add_stock

// if (isset($_POST['submit_stock'])) {
    // Get the product ID and stock quantity from the form
   /* $BookId = $_POST['stock_id'];
    $s_quantity = $_POST['quantity_stock']; */

    // Validate inputs
   /* if (!empty($BookId) && !empty($s_quantity)) {

        $sql1 = "UPDATE `add_book` SET `quantity_stock`='$s_quantity' WHERE id = '$BookId'";

        $result1 = $conn->query($sql1);
        if ($result1) {
            echo "<script>
        alert('Stock Add Successfull')
        window.location = '?'
        </script>";
        } else {
            echo 'Error' . $conn->error;
        }
    }
} */
// End stock


?>

<div class="main" id="main">
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>ALL BOOK</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="//cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- <link rel="stylesheet" href="../User/cart.css"> -->
    </head>
    <style>
        /* .col {
    flex: 1 0 0%;
}
.border {
    border: var(--bs-border-width) var(--bs-border-style) var(--bs-border-color) !important;
} */
    </style>

    <body>
 
        <!-- Add Stock  -->
        <!-- Button to Open the Modal -->
        <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
            Open modal
        </button> -->

        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add Stock</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="" method="post">
                            <input type="hidden" name="stock_id" id="stock_id">
                            <div class="mb-3">
                                <label for="quantity_stock" class="form-label">Stock Quantity</label>
                                <input type="number" name="quantity_stock" class="form-control" value="" required>
                            </div>
                            <button type="submit" name="submit_stock" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                    <!-- Modal footer -->
                    <!-- <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div> -->

                </div>
            </div>
        </div>


        <a href="add_book.php" type="button" style="float: right; font-size: 20px;" class="btn btn-primary mb-5">Add New Book</a>
        <div class="container mt-3">
            <h2>All Books</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>S.No.</th>
                        <th>Write Name</th>
                        <th>Book Name</th>
                        <th>Sub Category</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Quantity Stock</th>
                        <th>Action</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        $a = 0;
                        while ($data = $result->fetch_assoc()) {
                            $a++;
                    ?>
                            <tr>
                                <td><?php echo $a ?></td>
                                <td><?php echo $data['write_name'] ?></td>
                                <td><?php echo $data['book_name'] ?></td>
                                <td><?php echo $data['sub_category'] ?></td>
                                <td>$<?php echo $data['price'] ?></td>
                                <td><img src="<?php echo '../image/' . $data['image'] ?>" alt="No image available" style="width: 100%;" height="80px"></td>

                                <!-- quantity stock  -->
                                <td> <?php echo $data['quantity_stock'] ?></td>
                               
                               
                               
                               
                               
                               
                                <!-- Error -->
                                <!-- <td> -->
                                <!-- Update Status -->
                                <!-- <center>
                                        <div class="form-check form-switch">
                                        <input class="form-check-input" <?php if ($data['b_status'] == '0') {
                                                                            echo "checked";
                                                                        } ?> onclick="SwitchCheck(<?php echo $data['id'] ?>)" type="checkbox" role="switch" id="SwitchCheck">
                                        </div>
                                    </center> -->
                                <!-- </td> -->
                                <!-- End Status  -->
                                <!-- <td>
                                    <div class="col">
                                            <a href="#">-</a><a href="#" class="border">1</a><a href="">+</a>
                                        </div></td>-->

                                <!-- And Error -->

                                

                                <!-- Button  -->

                                <td>
                                    <a href="all_book.php?id=<?php echo $data['id'] ?>" type="button"><i class="fa fa-trash-o text-danger" aria-hidden="true"></i></a>
                                    <a class="ms-3" href="update.php?update_id=<?php echo $data['id'] ?>" type="button"><i class="fa fa-pencil text-success" aria-hidden="true"></i></a>
                                    
                                    <!-- book stock add quantity button  -->
                                    <!-- <a class="ms-3" href="#" onclick="stock(php me id)" data-bs-toggle="modal" data-bs-target="#myModal">
                                        <button type="button" class="btn btn-primary">Add Stock</button>
                                    </a> -->
                                    <!-- End book stock add quantity button  -->
                                </td>
                                <!-- End Button  -->



                                <!-- Update Status -->

                                <?php if ($data['b_status'] == '1') { ?>
                                    <td>
                                        <a href="?action=deactive&id=<?php echo $data['id']; ?>"
                                            class="ms-4 fs-4 text-danger"
                                            title="Click to Deactivate"
                                            data-toggle="tooltip">
                                            <i class="fa fa-arrow-circle-o-down" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                <?php } else { ?>
                                    <td>
                                        <a href="?action=active&id=<?php echo $data['id']; ?>"
                                            class="ms-4 fs-4 text-success"
                                            title="Click to Activate"
                                            data-toggle="tooltip">
                                            <i class="fa fa-arrow-circle-o-up" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                <?php } ?>

                                <!-- End Status  -->
                            </tr>
                    <?php
                        }
                    }
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $sql1 = "DELETE FROM `add_book` WHERE id='$id'";

                        $result1 = mysqli_query($conn, $sql1);

                        if ($result1) {
                                echo  "<script>
                                     alert('Delete Successfull')
                                       window.location = '?'
                                   </script>";
                        } else {
                            echo "error" . $conn->error;
                        }
                    }

                    ?>
                </tbody>
            </table>
        </div>


        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
        <script>
            let table = new DataTable('.table');


            // Update Status script 


            // function SwitchCheck(id) {
            //     $.ajax({
            //         url: 'active.php',
            //         type: 'post',
            //         data: {
            //             catid: id
            //         },
            //         success: function(result) {
            //             if (result == '0') {
            //                 alert('Status On Successful');
            //             } else if (result == '1') {
            //                 alert('Status Off Successful');
            //             } else {
            //                 alert('An error occurred.');
            //             }
            //         }
            //     });
            // }

            // End status script 



            //    Given Stock id 3 line
            // function stock(BookId) {
                // Set the product ID into the hidden input field
                // document.getElementById('stock_id').value = BookId;
            // }
        </script>
    </body>

    </html>


</div>
<?php
include 'footer.php';
?>