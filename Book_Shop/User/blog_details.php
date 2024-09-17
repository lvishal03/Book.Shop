<?php
include 'header.php';
include '../admin/conn.php';

if(isset($_GET['id'])){
   $id = $_GET['id'];
   $sql = "SELECT * FROM `blog` WHERE id='$id'";
    $result = mysqli_query($conn,$sql);
   $data = $result->fetch_assoc();
}
?>
<div class="maini" id="maini">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Details</title>
</head>

<body>
<div class="container cont">
  <img src="../image/h2_hero2.jpg.webp" alt="Snow" class="dd">
  <div class="centered">Blog Details</div>
</div>  
<div class="container">
    <div class="row mt-5">
        <div class="col-md-8 mt-5">
        <img class="card-img-top" src="../image/<?php echo $data['b_image']?>" alt="Card image">
        </div>
        <h3 class="mt-5"><?php echo $data['b_tittle']?></h3>
        <p class="mt-5"><?php echo $data['description']?></p>
    </div>
</div>
</body>
</html>

</div>
<?php
include 'footer.php';
?>



