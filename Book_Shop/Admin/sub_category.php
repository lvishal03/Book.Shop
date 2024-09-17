<?php
include 'header.php';
include 'conn.php';


$sql = "SELECT * FROM `category` WHERE 1";
$result = mysqli_query($conn, $sql);
?>

<div class="main " id="main">
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Sub Category</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="//cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>

    <body>


        <!-- Button to Open the Modal -->
        <button type="button" class="btn btn-primary mb-5" style="float: right; font-size: 20px;" data-bs-toggle="modal" data-bs-target="#myModal">
            Add Sub Category
        </button>

        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add Sub Category</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="" id="insertpost" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="name" class="form-label">Category</label>

                                <select class="form-control" name="cat_id">
                                    <option value="">Select Category</option>
                                    <?php
                                    if ($result->num_rows > 0) {
                                        while ($data = $result->fetch_assoc()) {
                                    ?>
                                            <option value="<?php echo $data['id'] ?>"><?php echo $data['name'] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Sub Category Name</label>
                                <input type="text" class="form-control" name="category_name" id="name">
                            </div>
                            <div class="mb-3">
                                <label for="text" class="form-label">Image</label>
                                <input type="file" class="form-control" name="image" id="up_image">
                            </div>
                            <div id="response"></div>
                            <div class="d-grid">
                                <button type="button" onclick="insert()" class="btn btn-success btn-block">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <div class="bg-light">
            <div class="container mt-5">
                <span style="font-size: 40px; font-family: Georgia, 'Times New Roman', Times, serif;">All Sub Category </span>

                <table class="table table-bordered">

                    <script>
                        fetch();

                        function fetch() {
                            $.ajax({
                                url: 'subcate_hide.php?fetchdata',
                                method: 'get',
                                dataType: 'text',
                                success: function(result) {
                                    $('#datafetch').html(result);

                                }
                            })
                        }
                    </script>
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Sub Category Name</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="datafetch">


                    </tbody>
                </table>
            </div>

            <!-- --------update---------->



            <!-- Button to Open the Modal -->
            <!-- <button type="button" class="btn btn-primary mb-5" style="float: right; font-size: 20px;" data-bs-toggle="modal" data-bs-target="#myModal2">
                Add Sub Category
            </button> -->

            <!-- The Modal -->
            <div class="modal" id="myModal2">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Update Sub Category</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form action="" id="updatepost" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" id="id">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Category</label>

                                    <select class="form-control" name="cat_id" id="cat_id">
                                        <option value="">Select Category</option>
                                        <?php
                                        $sql1 = "SELECT * FROM `category` WHERE 1";
                                        $result1 = mysqli_query($conn, $sql1);
                                        if ($result1->num_rows > 0) {
                                            while ($data1 = $result1->fetch_assoc()) {
                                        ?>
                                                <option value="<?php echo $data1['id'] ?>"><?php echo $data1['name'] ?></option>
                                        <?php
                                            }
                                        }

                                        ?>


                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Sub Category Name</label>
                                    <input type="text" class="form-control" name="category_name" id="category_name">
                                </div>
                                <div class="mb-3">
                                    <label for="image">Image:</label>
                                    <input type="file" id="image" name="image"> <br>
                                    <!-- <img class="mt-2" style="margin-right: 940px;"  src="../image/<?php echo $currentImage; ?>" width="5%" height="100px" alt="img"> -->
                                </div>

                                <div class="d-grid">
                                    <button type="button" onclick="update()" class="btn btn-success btn-block">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
        <script>
            let table = new DataTable('.table');
        </script>
    </body>

    </html>



</div>


</div>
<?php
include 'footer.php';
?>

<script>
    function insert() {
        var formData = new FormData($("#insertpost")[0]);
        formData.append('insur', '0')
        $.ajax({
            type: 'POST',
            url: 'subcate_hide.php',
            data: formData,
            contentType: false,
            processData: false,

            success: function(response) {

                // $("#response").html(response);
                alert(response);
                fetch();
                window.location = '?';

            }

        })
    }

    function del(id) {
        $.ajax({
            url: 'subcate_hide.php',
            method: 'get',
            dataType: 'text',
            data: {
                id: id
            },
            success: function(result1) {
                alert(result1);
                fetch();
            }
        })
    }

    function updatedata(id1) {
        // alert(id1)
        data = JSON.parse(id1);
        $('#id').val(data.id)
        $('#cat_id').val(data.cat_id)
        $('#category_name').val(data.category_name)
        $('#image').attr('src', '../image/' + data1.image);
    }

    function update() {
        var formData = new FormData($("#updatepost")[0]);
        formData.append('up', '0')
        $.ajax({
            type: 'POST',
            url: 'subcate_hide.php',
            data: formData,
            contentType: false,
            processData: false,

            success: function(response) {
                // $("#response").html(response);
                alert(response);
                fetch();
                window.location = '?';

            }

        })
    }
</script>
