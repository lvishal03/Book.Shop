<?php
include 'conn.php';

// Insert 

if (isset($_POST['insur'])) {
    $cat_id = $_POST['cat_id'];
    $category_name = $_POST['category_name'];
    $imagePath = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "../image/" . $imagePath;

    $sql = "INSERT INTO `sub_category`(`cat_id`,`category_name`,`image`) VALUES ('$cat_id','$category_name','$imagePath')";

    if ($conn->query($sql) === TRUE && move_uploaded_file($tempname, $folder)) {
        echo 'Sub Category Add Successfully';
    } else {
        echo 'Error' . $sql . "<br>" . $conn->error;
    }
}

// Fetch 

if (isset($_GET['fetchdata'])) {
    $sql1 = "SELECT * FROM `sub_category` WHERE 1";
    $result = mysqli_query($conn, $sql1);
    if ($result->num_rows > 0) {
        $a = 0;
        while ($data = $result->fetch_assoc()) {
            $a++;
?>
            <tr>
                <th scope="row"> <?php echo $a ?></th>
                <td> <?php echo $data['category_name'] ?></td>
                <td>
                    <img src="../image/<?php echo $data['image'] ?>" width="30%" height="100px" alt="img">
                </td>
                <td>
                    <a onclick="del(<?php echo $data['id'] ?>)" type="button"><i class="fa fa-trash text-danger ms-3" aria-hidden="true"></i></a>
                    <a onclick='updatedata(`<?php echo json_encode($data) ?>`)' type="button" data-bs-toggle="modal" data-bs-target="#myModal2"><i class="fa fa-pencil text-success ms-4" aria-hidden="true"></i></a>
                </td>
            </tr>

<?php
        }
    }
}

// Delete 

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql2 = "DELETE FROM `sub_category` WHERE id='$id'";

    $result1 = mysqli_query($conn, $sql2);

    if ($result1) {
        echo 'Delete Item';
    } else {
        echo 'Error' . $conn->error;
    }
}

// Update 

if (isset($_POST['up'])) {
    $id = $_POST['id'];
    // $sql4 = "SELECT `image` FROM `sub_category` WHERE id='$id'";
    // $result = $conn->query($sql4);
    // $row = $result->fetch_assoc();
    // $currentImage = $row['image'];

    $cat_id = $_POST['cat_id'];
    $category_name = $_POST['category_name'];
    $imagePath1 = $_FILES["image"]["name"];
    $tempname1 = $_FILES["image"]["tmp_name"];
    $folder = "../image/" . $imagePath1;

    $sql3 = "UPDATE `sub_category` SET `cat_id`='$cat_id',`category_name`='$category_name',`image`='$imagePath1' WHERE id='$id'";

    if ($conn->query($sql3) === TRUE && move_uploaded_file($tempname1, $folder)) {
        echo 'Update Successfully';
    } else {
        echo 'Error' . $sql3 . "<br>" . $conn->error;
    }
}



?>