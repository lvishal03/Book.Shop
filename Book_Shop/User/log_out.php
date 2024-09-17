<?php
session_start();
session_destroy();
echo  
"<script>
 window.location = 'sign_in.php';
 alert('logout successfully');
</script>";
?>