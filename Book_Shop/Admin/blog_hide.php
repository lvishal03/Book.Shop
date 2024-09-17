<?php
include 'conn.php';
if (isset($_POST['inse'])) {
    $name = $_POST['name'];
    $tittle = $_POST['tittle'];
    $description = $_POST['description'];
    $imagePath = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "./image/" . $imagePath;

    $sql = "INSERT INTO `blog`(`b_name`,`b_tittle`,`description`, `b_image`) VALUES ('$name','$tittle','$description','$imagePath')";

    if ($conn->query($sql) === TRUE && move_uploaded_file($tempname, $folder)) {
        echo 'Blog Add Successfully';
    } else {
        echo 'Error' . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['fetchdata'])) {

    $sql1 = "SELECT * FROM `blog` WHERE 1";
    $result = mysqli_query($conn, $sql1);

    if ($result->num_rows > 0) {
        $i = 0;
        while ($row = $result->fetch_assoc()) {
            $i++;
?>
            <tr>
                <th><?php echo $i ?></th>
                <td><?php echo $row['b_name'] ?></td>
                <td><?php echo $row['b_tittle'] ?></td>
                <td><?php echo $row['description'] ?></td>
                <td>
                    <img src="../image/<?php echo $row['b_image'] ?>" width="250px" height="100px" alt="img">
                </td>
                <td>
                    <a onclick="del(<?php echo $row['id'] ?>)" type="button"><i class="fa fa-trash text-danger ms-3" aria-hidden="true"></i></a>
                    <a onclick='updatedata(`<?php echo json_encode($row) ?>`)' type="button" data-bs-toggle="modal" data-bs-target="#myModal1"><i class="fa fa-pencil text-success ms-3" aria-hidden="true"></i></a>

                </td>
            </tr>
<?php
        }
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql2 = "DELETE FROM `blog` WHERE id='$id'";

    $result = mysqli_query($conn, $sql2);

    if ($result) {
        echo 'Delete Success';
    } else {
        echo 'error';
    }
}

if (isset($_POST['updata'])) {
    $name = $_POST['name'];
    $tittle = $_POST['tittle'];
    $description = $_POST['description'];
    $imagePath = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "./image/" . $imagePath;
    $id = $_POST['id'];

    $sql3 = "UPDATE `blog` SET `b_name`='$name',`b_tittle`='$tittle',`description`='$description',`b_image`='$imagePath' WHERE id='$id'";

    $result =  mysqli_query($conn, $sql3);

    if ($result) {
        echo 'Update Blog Successfull';
    } else {
        echo 'error' . $conn->error;
    }
}
?>