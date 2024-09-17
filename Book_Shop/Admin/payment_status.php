<?php
include 'conn.php';
include 'header.php';
$sql = "SELECT * FROM `order` WHERE 1";
$result = mysqli_query($conn,$sql);

?>

<div class="main" id="main">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Status</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="image/download.jfif" rel="icon">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="cs.css">
</head>
<body>
    
<div class="container mt-3">
  <center><h1>Payment Status</h1></center> 
           
  <table class="table ">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Payment_Method</th>
        <th scope="col">Amount</th>
        <th scope="col">Payment_Status</th>
      </tr>
    </thead>
   <?php
   if($result->num_rows>0){
    while($data=$result->fetch_assoc()){
   ?>
    <tbody>
        <th scope="row"><?php echo $data['id']?></th>
        <td><?php echo $data['payment_method']?></td>
        <td><?php echo $data['amount']?></td>
        <td><?php echo $data['orde_status']?></td>
    </tbody>
   <?php
   }
}
   ?>
  </table>
</div>
</body>
</html>
</div>
<?php
include 'footer.php';
?>