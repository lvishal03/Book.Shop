<?php
include '../Admin/conn.php';

$conditions[] = "b_status = 0";
// $conditions = [];
$params = [];
$types = '';

if (isset($_POST['min_price'], $_POST['max_price'])) {
    $min_price = $_POST['min_price'];
    $max_price = $_POST['max_price'];
    $conditions[] = "price BETWEEN ? AND ?";
    $params[] = $min_price;
    $params[] = $max_price;
    $types .= 'ii';
}

if (isset($_POST['categories'])) {
    $categories = $_POST['categories'];
    $category_conditions = array_fill(0, count($categories), 'category = ?');
    $conditions[] = '(' . implode(' OR ', $category_conditions) . ')';
    $params = array_merge($params, $categories);
    $types .= str_repeat('s', count($categories));
}

if (isset($_POST['request'])) {
    if ($_POST['request'] === 'a-z') {
        $order = "ORDER BY book_name ASC";
    } elseif ($_POST['request'] === 'z-a') {
        $order = "ORDER BY book_name DESC";
    } else {
        $order = "ORDER BY id DESC";
    }
} else {
    $order = "ORDER BY id DESC";
}

$query = "SELECT * FROM add_book";
if ($conditions) {
    $query .= ' WHERE ' . implode(' AND ', $conditions);
}
$query .= " $order";

$stmt = $conn->prepare($query);
if ($types) {
    $stmt->bind_param($types, ...$params);
}
$stmt->execute();
$result = $stmt->get_result();


?>
<div class="row">
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
    ?>
            <div class="col-md-4 mt-3">
                <div class="card" style="width: 180px;">
                    <img src="<?php echo '../image/' . $row['image'] ?>" class="card-img-top" alt="..." height="250px">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo  $row['book_name'] ?></h5>
                        <p><?php echo $row['write_name'] ?></p>
                        <?php if($row['quantity_stock'] == 0) {?>.
                            <span><i class="fa fa-star text-warning" aria-hidden="true"></i></span>
                        <span><i class="fa fa-star text-warning" aria-hidden="true"></i></span>
                        <span><i class="fa fa-star text-warning" aria-hidden="true"></i></span>
                        <span><i class="fa fa-star text-warning" aria-hidden="true"></i></span>
                        <span><i class="fa fa-star-half-o text-warning" aria-hidden="true"></i>
                            </i>
                        </span>
                        <br>
                        <p>(<span class="text-danger colr">120</span> Review) <span class="text-danger fo ms-3"><del>$<?php echo $row['price'] ?></del></span></p>
                        <b style="color: red;">Sold Out</b>
                        <?php }else{?>
                            <span><i class="fa fa-star text-warning" aria-hidden="true"></i></span>
                        <span><i class="fa fa-star text-warning" aria-hidden="true"></i></span>
                        <span><i class="fa fa-star text-warning" aria-hidden="true"></i></span>
                        <span><i class="fa fa-star text-warning" aria-hidden="true"></i></span>
                        <span><i class="fa fa-star-half-o text-warning" aria-hidden="true"></i>
                            </i>
                        </span>
                        <br>

                        <p>(<span class="text-danger colr">120</span> Review) <span class="text-danger fo ms-3">$<?php echo $row['price'] ?></span></p>

                        <a class="text-secondary nav-link ibo ms-3 button-33" role="button" href="cart.php?id=<?php echo $row['id']; ?>">Add to Cart</a>    
                        <?php }?>
                    </div>

                </div>
            </div>

    <?php
        }
    } else {
        $output = '<h3>No Books Found</h3>';
    }

    ?>