<?php
include 'header.php';
include 'conn.php';

// Fetch Category 
$sql = "SELECT * FROM `category` WHERE 1";
$result = mysqli_query($conn, $sql);

//  Fetch Sub Category 
$sql1 = "SELECT * FROM `sub_category` WHERE 1";
$result1 = mysqli_query($conn, $sql1);
?>
<div class="main" id="main">
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <title>Add Book</title>
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
        <h2>ADD BOOK</h2>
        <div class="card" style="width:100%">
          <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
              <div class="mb-3 mt-3">
                <label for="text">Write Name:</label>
                <input type="text" class="form-control" placeholder="Enter Write Name" name="write_name">
              </div>
              <div class="mb-3">
                <label for="text">Book Name:</label>
                <input type="text" class="form-control" placeholder="Enter Book Name" name="book_name">
              </div>
              <div class="mb-3">
                <label for="name" class="form-label">Category</label>
                <select class="form-control" name="category" id="dr_category">
                  <option value="">Select Category</option>
                  <?php
                  if ($result->num_rows > 0) {
                    while ($data = $result->fetch_assoc()) {
                  ?>
                      <option value="<?php echo $data['id'] ?>"><?php echo $data['name'] ?></option>
                  <?php
                    }
                  }
                  ?>
                </select>
              </div>
              <div class="mb-3">
                <label for="name" class="form-label">Sub Category</label>
                <select class="form-control" name="sub_category" id="show">
                  <option value="">Select Sub Category</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="text">Quantity Stock</label>
                <input type="number" class="form-control" placeholder="Enter Book Quantity Stock" name="quantity_stock">
              </div>
              <div class="mb-3">
                <label for="text">Price:</label>
                <input type="text" class="form-control" placeholder="Enter Book Price" name="price">
              </div>
              <div class="mb-3">
                <label for="text">Book Image:</label>
                <input type="file" class="form-control" name="image">
              </div>
              <div class="d-grid">
                <button type="submit" name="submit" class="btn btn-success">Submit</button>
              </div>

            </form>
          </div>
        </div>
      </div>

    </center>

    <?php
    // Add Book 

    if (isset($_POST['submit'])) {
      $write_name = $_POST['write_name'];
      $book_name = $_POST['book_name'];
      $category = $_POST['category'];
      $sub_category = $_POST['sub_category'];
      $price = $_POST['price'];
      $quantity_stock = $_POST['quantity_stock'];
      $filename = $_FILES["image"]["name"];
      $tempname = $_FILES["image"]["tmp_name"];
      move_uploaded_file($tempname, 'image/' . $filename);

      $sql2 = "INSERT INTO `add_book`(`write_name`, `book_name`, `category`, `sub_category`, `price`, `quantity_stock`, `image`) VALUES ('$write_name','$book_name','$category','$sub_category','$price','$quantity_stock','$filename')";
      // echo ($sql);
      $result2 = mysqli_query($conn, $sql2);

      if ($result2) {
        echo "<script>
     alert('Add Book Successfull');
     window.location = 'all_book.php';
 </script>";
      } else {
        echo "<script>
     alert('No Book Successfull');
     window.location = '?';
 </script>";
      }
    }

    //  End 
    ?>

    <script>
      $(document).ready(function() {
        $('#dr_category').on('change', function() {
          var category = $(this).val();
          // alert(category);
          $.ajax({
            type: 'POST',
            url: 'book_hide.php',
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