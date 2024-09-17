<?php
// Get Update id and status



if (isset($_GET['id']) && isset($_GET['order_status'])) {
    $id = $_GET['id'];
    $order_status = $_GET['order_status'];

    // Use a prepared statement to prevent SQL injection
    $stmt = $conn->prepare("UPDATE `billing_details` SET `order_status` = $order_status WHERE id = '$id'");
    $stmt->bind_param("ii", $order_status, $id);

    if ($stmt->execute()) {
        echo '<script>
                window.location.href = "order_view.php";
              </script>';
    } else {
        echo 'Error: ' . $conn->error;
    }

    $stmt->close();
}



//  if(isset($_GET['id'])  && isset($_GET['order_status'])){
//      $id = $_GET['id'];
//      $order_status = $_GET['order_status'];

//      $sql1 = "UPDATE `billing_details` SET `order_status`='$order_status', WHERE id='$id'";
//      $result1 = mysqli_query($conn,$sql1);
//      if($result){
//          echo '<script>
//          window.location = order_view.php;
//          </script>';
//      }else{
//          echo 'Error'.$conn->error;
//      }
//  }


// if(isset($_GET['id'])  && isset($_GET['order_status'])){
//     $id = $_GET['id'];
//     $order_status = $_GET['order_status'];

//     mysqli_query($conn,"UPDATE `billing_details` SET `order_status`='$order_status', WHERE id='$id'");
//     header('location:order_view.php');
//     die();
// }
?>