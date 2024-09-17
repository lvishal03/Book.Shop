<?php
include '../Admin/conn.php';
session_start();

$errors = [];
$email = $pswd =  "";

function validateEmail($email)
{
    $email = trim($email);
    if (empty($email)) {
        return "Email is required";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Invalid email format";
    }
    return true;
}

function validatePassword($pswd)
{
    if (empty($pswd)) {
        return "Password is required";
    } 
    // $minLength = 8;
    // if (strlen($pswd) < $minLength) {
    //     return "Password must be at least $minLength characters long.";
    // }
    return true;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 

  if (($validationResult = validateEmail($_POST['email'])) !== true) {
    $errors['email'] = $validationResult;
} else {
    $email = $_POST['email'];
}

if (($validationResult = validatePassword($_POST['pswd'])) !== true) {
    $errors['pswd'] = $validationResult;
} else {
    $pswd = $_POST['pswd'];
}

if (empty($errors)) {
  $sql = "SELECT * FROM `register` WHERE email='$email'";
  $result = mysqli_query($conn, $sql);
  $data = $result->fetch_assoc();

  if ($data['email'] == $email) {
    if ($data['password'] == $pswd) {
      $_SESSION['user_id']=$data['id'];
      $_SESSION['name']=$data['name'];
      echo "<script>
        alert('Login Successfull');
        window.location = 'index.php';
      </script>";
    } else {
      echo "<script>
        alert('Wrog Password');
        window.location = '?';
      </script>";
    }
  } else {
    echo "<script>
    alert('Wrog Email');
    window.location = '?';
    </script>";
  }
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Sign In</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
<link href="../image/download.jfif" rel="icon">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
     span {
            color: red;
        }
        .hover {
        font-size: 18px;
        font-family: "Playfair Display", serif;
    }
        .hov {
        font-size: 35px;
        font-family: "Playfair Display", serif;
    }
    button b{
        font-family: "Playfair Display", serif;

    }
    .cur {
        background-color: #FEF4F4;
        padding: 10px;
    }

    .ex {
        text-decoration: none;
        color: black;
    }

    .ex:hover {
        color: black;
    }
    .pl{
        color: #FEF4F4;
    }
    .card{
            box-shadow: 4px 4px 6px 2px gray;
            border-radius: 25px;
        }
  </style>
<body>
<div class="header">
        <nav class="navbar navbar-expand-sm navbar-dark bg-light">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mynavbar">
                    <ul class="navbar-nav me-auto ms-5 ps-3">
                        <li class="nav-item">
                            <a class="nav-link" href="../Admin/index.php"><img src="../image/logo.png.webp" alt=""></a>
                        </li>
                       
                    </ul>
                    <ul class="navbar-nav me-5 pe-5">
                            <li class="nav-item mt-4 ms-3">
                                <span class="icon-title">
                                    <a class="aa text-dark hover" href="sign_in.php">Login</a>/<a class="aa text-dark hover" href="sign_up.php">Register</a>

                                </span>
                            </li>
                    </ul>

                </div>
            </div>
        </nav>
    </div>

  <div class="container mt-5">
    <div class="container mt-5">
      
     <center>
     <h2 class="hov">Login</h2>
     <div class="card" style="width:400px; height:400px;">
        <div class="card-body">
          <form action="" method="post">
            <div class="mb-3 mt-3">
              <label for="email" class="hover">Email:</label>
              <input type="email" class="form-control" placeholder='Enter email' name="email" value="<?php echo htmlspecialchars($email); ?>">
              <span><?php echo $errors['email'] ?? ''; ?></span>
            </div>
            <div class="mb-3 mt-5">
              <label for="pwd" class="hover">Password:</label>
              <input type="password" class="form-control" placeholder="Enter password" name="pswd">
              <span><?php echo $errors['pswd'] ?? ''; ?></span>
            </div>
            <button type="submit" name="test" class="btn btn-primary span"><b>Login</b></button>
            
          </form>
         <a class="nav-link hover" href="sign_up.php">Don’t have an account? <span class="text-info hover">Sign Up</span></a>
        </div>
      </div>
     </center>
    </div>
  </div>

  <!-- <----footer----->

  <div class="cur mt-5">

<div class="footer mt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <img src="../image/logo.png.webp" class="ms-5 mt-5" alt="">
                <p class="pp mt-3 ms-3">Get the brathing space now, and we'|| <br> extend your term at the other end year for <br> go.</p>
                <p class="ms-4 ps-5"><i class="fa fa-facebook icon" aria-hidden="true"></i> <i class="fa fa-instagram ms-4 icon" aria-hidden="true"></i>
                    <i class="fa fa-linkedin ms-4 icon" aria-hidden="true"></i>
                    <i class="fa fa-youtube-play ms-4 icon" aria-hidden="true"></i>
                </p>
            </div>
            <div class="col-md-3">
                <p class="mt-5"><b>Book Category</b></p>
                <a href="#" class="ex mt-4">History</a> <br> <br>
                <a href="#" class="ex mt-4">Horror-Thiller</a><br> <br>
                <a href="#" class="ex">LoveStories</a><br> <br>
                <a href="#" class="ex">Science Fiction</a><br> <br>
                <a href="#" class="ex">Business</a>
            </div>
            <div class="col-md-3">
                <p class="mt-5 pl">rr</p>
                <a href="#" class="ex mt-4">Biography</a> <br> <br>
                <a href="#" class="ex mt-4">Astrology</a> <br> <br>
                <a href="#" class="ex mt-4">Digital Marketing</a> <br> <br>
                <a href="#" class="ex mt-4">Software Development</a> <br> <br>
                <a href="#" class="ex mt-4">Ecommerce</a>
            </div>
            <div class="col-md-3">
                <p class="mt-5"><b>Site Map</b></p>
                <a href="#" class="ex mt-4">Home</a> <br> <br>
                <a href="#" class="ex mt-4">About Us</a> <br> <br>
                <a href="#" class="ex mt-4">FAQs</a> <br> <br>
                <a href="#" class="ex mt-4">Blog</a> <br> <br>
                <a href="#" class="ex mt-4">Contact</a> <br> <br>
            </div>
        </div>
    </div>
</div>
</div>

</body>

</html>
