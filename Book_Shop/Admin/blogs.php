<?php
include 'header.php';
?>

<div class="main " id="main">
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <title>Blog</title>
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
        Add Blog
      </button>

      <!-- The Modal -->
      <div class="modal" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 style="font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;" class="modal-title">ADD BLOG</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <form action="" id="insertpost" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" class="form-control" name="name">
                </div>
                <div class="mb-3">
                  <label for="name" class="form-label">Tittle</label>
                  <input type="text" class="form-control" name="tittle">
                </div>
                <div class="mb-3">
                  <label for="name" class="form-label">Description</label>
                  <input type="text" class="form-control" name="description">
                </div>
                <div class="mb-3">
                  <label for="text" class="form-label">Image</label>
                  <input type="file" class="form-control" name="image">
                </div>
                <div id="response"></div>
                <div class="d-grid">
                  <button type="button" onclick="insert()" class="btn btn-success btn-block">Submit</button>
                </div>
              </form>
            </div>

            <!-- Modal footer -->
            <!-- <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                  </div> -->

          </div>
        </div>
      </div>



      <div class="container" style="margin-top: 10px;">
        <span style="font-size: 40px; font-family: Georgia, 'Times New Roman', Times, serif;">All Blog</span>

        <table class="table table-bordered">
          <script>
            fetch()

            function fetch() {
              $.ajax({
                url: 'blog_hide.php?fetchdata',
                method: 'get',
                dataType: 'text',
                success: function(data) {
                  $('#datafetch').html(data)
                }
              })
            }
          </script>
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Tittle</th>
              <th>Description</th>
              <th>Image</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="datafetch">

          </tbody>
        </table>
      </div>



      <!-- Update modal -->
      <!-- Button to Open the Modal -->
      <!-- <button type="button" class="btn btn-success mb-5" style="float: right; font-size: 20px;" data-bs-toggle="modal" data-bs-target="#myModal1">
        Update Blog
      </button> -->

      <!-- The Modal -->
      <div class="modal" id="myModal1">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 style="font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;" class="modal-title">UPDATE BLOG</h4>
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
                  <label for="name" class="form-label">Tittle</label>
                  <input type="text" class="form-control" name="tittle" id="tittle">
                </div>
                <div class="mb-3">
                  <label for="name" class="form-label">Description</label>
                  <input type="text" class="form-control" name="description" id="description">
                </div>
                <div class="mb-3">
                  <label for="image">Image:</label>
                  <input type="file" id="image" name="image"> <br>
                  <!-- <img src="/image/ <?php echo $data1['b_image'] ?>" width="20%" height="100px" alt="oops"> -->
                </div>
                <div class="d-grid">
                  <button type="button" onclick="update()" class="btn btn-success btn-block">Update</button>
                </div>
              </form>
            </div>

            <!-- Modal footer -->
            <!-- <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div> -->

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
  function insert() {
    var formData = new FormData($("#insertpost")[0]);
    formData.append('inse', '0')
    $.ajax({
      type: 'POST',
      url: 'blog_hide.php',
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
      url: 'blog_hide.php',
      method: 'get',
      dataType: 'text',
      data: {
        id: id
      },
      success: function(deletedata) {
        alert(deletedata);
        fetch();
      }
    })
  }

  function updatedata(id2) {
    // alert(id2)
    data1 = JSON.parse(id2);
    $('#id').val(data1.id)
    $('#tittle').val(data1.b_tittle)
    $('#name').val(data1.b_name)
    $('#description').val(data1.description)
    $('#image').attr('src', './image/' + data1.b_image);

  }

  function update() {
    var formData = new FormData($("#updatepost")[0]);
    formData.append('updata', '0')
    $.ajax({
      type: 'POST',
      url: 'blog_hide.php',
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