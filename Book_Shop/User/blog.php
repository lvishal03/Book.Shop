<?php
include 'header.php';
include '../Admin/conn.php';

$sql = "SELECT * FROM `blog` WHERE 1";
$result = mysqli_query($conn,$sql);
?>
<div class="maini" id="maini">
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="all.css">
        <title>Blog</title>
    </head>
    <body>
    <div class="container cont">
        <img src="../image/h2_hero2.jpg.webp" alt="Snow">
        <div class="centered">Blog</div>
    </div>



    <div class="container">
        <div class="row mt-5">
            <div class="col-md-8 mt-5">
                <h2>Insights</h2>
            </div>
            <div class="col-md-4 mt-5">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-5">
            <?php
            if($result->num_rows>0){
                while($data = $result->fetch_assoc()){
                    ?>

            <div class="col-md-4 mt-5">
                <div class="card" style="width:400px; height:400px;">
                    <a href="blog_details.php?id=<?php echo $data['id'] ?>">
                    <img class="card-img-top" src="../image/<?php echo $data['b_image']?>" alt="Card image">
                    
                    <div class="card-body bg-light">
                        <h4 class="card-title me-4 hoverr"><?php echo $data['b_name']?></h4>
                        <span class="card-text ms-3"><a class="hove" href="#"><?php echo $data['b_tittle']?></a></span>
                        <p class="mt-4 text-center" ><?php echo $data['created_at']?></p>
                        </a>
                    </div>
                </div>
            </div>
            <?php
                }
            }
            ?>            
        </div>
    </div>
    <ul class="pagination justify-content-center">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item active"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">4</a></li>
    <li class="page-item"><a class="page-link" href="#">5</a></li>
    <li class="page-item"><a class="page-link" href="#">6</a></li>
    <li class="page-item"><a class="page-link" href="#">7</a></li>
    <li class="page-item"><a class="page-link" href="#">8</a></li>
    <li class="page-item"><a class="page-link" href="#">9</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</div>
</body>

</html>
<?php
include 'footer.php';
?>