<?php
include 'conn.php';
if (isset($_POST['inse'])) {
    $name = $_POST['name'];
    $imagePath = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "./image/" . $imagePath;

    $sql = "INSERT INTO `category`(`name`, `image`) VALUES ('$name','$imagePath')";

    if ($conn->query($sql) === TRUE && move_uploaded_file($tempname, $folder)) {
        echo 'Category Add Successfully';
    } else {
        echo 'Error' . $sql . "<br>" . $conn->error;
    }
}


if (isset($_GET['fetchdata'])) {
    $sql1 = "SELECT * FROM `category` WHERE 1";
    $result = mysqli_query($conn, $sql1);
    if ($result->num_rows > 0) {
        $a = 0;
        while ($data = $result->fetch_assoc()) {
            $a++;
?>

            <tr>
                <th> <?php echo $a ?></th>

                <td> <?php echo $data['name'] ?></td>
                <td>
                    <img src="../image/<?php echo $data['image'] ?>" width="20%" height="100px" alt="img">
                </td>e
                <td>
                    <a onclick="del(<?php echo $data['id'] ?>)" type="button"><i class="fa fa-trash text-danger ms-3" aria-hidden="true"></i></a>
                    <a onclick='updatedata(`<?php echo json_encode($data) ?>`)' type="button" data-bs-toggle="modal" data-bs-target="#myModal1"><i class="fa fa-pencil text-success ms-5" aria-hidden="true"></i></a>
                </td>
            </tr>
<?php
        }
    }
}



if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql2 = "DELETE FROM `category` WHERE id='$id'";
    $result1 = mysqli_query($conn, $sql2);

    if ($result1) {
        echo 'Deleted Successfully';
    } else {
        echo "error" . $conn->error;
    }
}

if (isset($_POST['editdata'])) {
    $name = $_POST['name'];
    $imagePath1 = $_FILES["image"]["name"];
    $tempname1 = $_FILES["image"]["tmp_name"];
    $folder = "../image/" . $imagePath1;
    $id = $_POST['id'];

    $sql3 = "UPDATE `category` SET `name`='$name',`image`='$imagePath1' WHERE id='$id'";

    if ($conn->query($sql3) === TRUE && move_uploaded_file($tempname1, $folder)) {
        echo 'Update Successfully';
    } else {
        echo 'Error' . $sql3 . "<br>" . $conn->error;
    }
}
?>