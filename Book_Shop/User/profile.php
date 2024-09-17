<?php
include 'header.php';
include '../Admin/conn.php';
include 'link.php';
$name = $_SESSION['name'];
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM `order_book` WHERE user_id='$user_id'";
$result = mysqli_query($conn, $sql);


$sql2 = "SELECT * FROM `register` WHERE 1";
$result2 = mysqli_query($conn, $sql2);
$data = $result2->fetch_assoc()
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Order</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="image/download.jfif" rel="icon">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="cs.css">
  <link rel="stylesheet" href="all.css">
</head>
<body>

  <div class="container cont">
    <img src="../image/h2_hero2.jpg.webp" alt="Snow">
    <div class="centered">My Order</div>
  </div>

  <div class="container mt-3">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Image</th>
          <th scope="col">Book Name</th>
          <th scope="col">Quantity</th>
          <th scope="col">Price</th>
        </tr>
      </thead>
      <?php
      $a = 0;
      while ($order = $result->fetch_assoc()) {
        $book_id = $order['book_id'];
        $sql2 = "SELECT * FROM `add_book` WHERE id='$book_id'";
        $result2 = mysqli_query($conn, $sql2);

        if ($result2->num_rows > 0) {
          while ($data = $result2->fetch_assoc()) {
            $a++;

      ?>
            <tbody>
              <th scope="row"><?php echo $a ?></th>
              <td><img class="img-fluid" src="<?php echo '../image/' . $data['image'] ?>" style="height: 100px;"></td>
              <td><?php echo $data['book_name'] ?></td>
              <td><?php echo $order['quantity'] ?></td>
              <td>$<?php echo $data['price'] ?></td>
            </tbody>
      <?php
          }
        }
      }
      ?>
    </table>
  </div>

</body>

</html>
<?php
include 'footer.php';
?>