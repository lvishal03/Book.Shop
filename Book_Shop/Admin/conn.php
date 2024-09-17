<?php 
$servername = "localhost";
$username = "root";
$password = "";
$db = "book_store";

$conn = new mysqli($servername,$username,$password,$db);

if($conn){
    echo '';
}else{
    echo 'error' .$conn->error;
}
?>