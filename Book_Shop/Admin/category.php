<?php
include 'header.php';
?>

<div class="main " id="main">
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Category</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="//cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>

    <body>
        <div class="bg-light">

            <!-- insert modal -->

            <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-success mb-5" style="float: right; font-size: 20px;" data-bs-toggle="modal" data-bs-target="#myModal">
                Add New Category
            </button>

            <!-- The Modal -->
            <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 style="font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;" class="modal-title">ADD CATEGORY</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form action="" id="insertpost" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" id="up_name">
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

            <!-- fetch data  -->

            <div class="container" style="margin-top: 10px;">
                <span style="font-size: 40px; font-family: Georgia, 'Times New Roman', Times, serif;">All Category </span>

                <table class="table table-bordered">
                    <script>
                        // Fetch script 
                        fetch();

                        function fetch() {
                            $.ajax({
                                url: 'c_hide.php?fetchdata',
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
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="datafetch">

                    </tbody>
                </table>
            </div>

            <!-- <------updatedata------->


            <!-- The Modal -->
            <div class="modal" id="myModal1">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 style="font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;" class="modal-title"> UPDATE CATEGORY</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form action="" id="updatepost" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" id="id">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" id="name">
                                </div>
                                <div class="mb-3">
                                    <label for="image">Image:</label>
                                    <input type="file" id="image" name="image"> <br>
                                    <img  src="../image/<?php echo $data1['image'] ?>" width="20%" height="100px" alt="img">
                                </div>

                                <div class="d-grid">
                                    <button type="button" onclick="update()" class="btn btn-info btn-block text-secondary">Update</button>
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



<?php
include 'footer.php';
?>

<script>
    //   Insert Script
    function insert() {
        var formData = new FormData($("#insertpost")[0]);
        formData.append('inse', '0')
        $.ajax({
            type: 'POST',
            url: 'c_hide.php',
            data: formData,
            contentType: false,
            processData: false,

            success: function(response) {
                alert(response);
                fetch();
                window.location = '?';

            }

        })
    }

    // Delete Script  

    function del(id) {
        $.ajax({
            url: 'c_hide.php',
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

    // Take Update Data 
    function updatedata(id2) {
        // alert(id2)
        data1 = JSON.parse(id2);
        $('#id').val(data1.id)
        $('#name').val(data1.name)
        $('#image').attr('src', '../image/' + data1.image);
    }


    //   Insert & Fetch Data 
    function update() {
        var formData = new FormData($("#updatepost")[0]);
        formData.append('editdata', '0')
        $.ajax({
            type: 'POST',
            url: 'c_hide.php',
            data: formData,
            contentType: false,
            processData: false,

            success: function(response) {
                alert(response);
                fetch();
                window.location = '?';

            }

        })
    }
</script>