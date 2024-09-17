<?php
include 'header.php';
include 'conn.php';




if (isset($_GET['update_id'])) {
    $id = $_GET['update_id'];

    $sql = "SELECT * FROM `add_book` WHERE id='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $currentImage = $row['image'];



    $result = mysqli_query($conn, $sql);
    $data = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
    $write_name = $_POST['write_name'];
    $book_name = $_POST['book_name'];
    $category = $_POST['category'];
    $sub_category = $_POST['sub_category'];
    $price = $_POST['price'];
    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    move_uploaded_file($tempname, 'image/' . $filename);

    $sql1 = "UPDATE `add_book` SET `write_name`='$write_name',`book_name`='$book_name',`category`='$category',`sub_category`='$sub_category',`price`='$price',`image`='$filename' WHERE id='$id'";

    $result1 = mysqli_query($conn, $sql1);

    if ($result1) {
        echo "<script>
     alert('UpDate Successfull');
     window.location = 'all_book.php';
 </script>";
    } else {
        echo "error" . $conn->error;
    }
}


$sql2 = "SELECT * FROM `category` WHERE 1";
$result2 = mysqli_query($conn, $sql2);

?>
<div class="main" id="main">
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Update Book</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <style>

    </style>

    <body>

        <center>

            <div class="container mt-3">
                <h2>UpDate BOOK</h2>
                <div class="card" style="width:100%">
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-3 mt-3">
                                <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                                <label for="text">Write Name:</label>
                                <input type="text" class="form-control" name="write_name" value="<?php echo $data['write_name'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="text">Book Name:</label>
                                <input type="text" class="form-control" name="book_name" value="<?php echo $data['book_name'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Category</label>
                                <select class="form-control" name="category" id="dr_category">
                                    <option value="<?php echo $data['id']?>">Select Category</option>
                                    <?php
                                    if ($result2->num_rows > 0) {
                                        while ($data2 = $result2->fetch_assoc()) {
                                    ?>
                                            <option value="<?php echo $data2['id'] ?>"><?php echo $data2['name'] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Sub Category</label>
                                <select class="form-control" name="sub_category" id="show">
                                    <option value="<?php echo $data['sub_category']?>"><?php echo $data['sub_category']?></option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="text">Price:</label>
                                <input type="text" class="form-control" name="price" value="<?php echo $data['price'] ?>">
                            </div>

                            <div class="mb-3">
                                <label for="text">Book Image:</label>
                                <img class="mt-2" style="margin-right: 940px;"  src="../image/<?php echo $currentImage; ?>" width="5%" height="100px" alt="img">
                                <input type="file" class="form-control" name="image">

                            </div>
                            <button type="submit" name="update" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>

        </center>
        <script>
            $(document).ready(function() {
                $('#dr_category').on('change', function() {
                    var category = $(this).val();
                    // alert(category);
                    $.ajax({
                        type: 'POST',
                        url: 'update_hide.php',
                        data: {
                            id: category
                        },
                        success: function(data) {
                            $('#show').html(data);
                        }
                    });
                });
            });
        </script>
    </body>

    </html>


    <?php
    include 'footer.php';
    ?>