<?php
include 'conn.php';
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql4 = "SELECT * FROM `sub_category` WHERE cat_id='$id'";
    $result4 = mysqli_query($conn, $sql4);
    if ($result4->num_rows > 0) {
        while ($row1 = $result4->fetch_assoc()) {
?>
            <option value="<?php echo $row1['category_name'] ?>"><?php echo $row1['category_name'] ?></option>
<?php
        }
    }
}
?>