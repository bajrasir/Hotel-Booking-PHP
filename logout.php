<?php include('config/constant.php'); ?>

<?php   


 session_start();
session_destroy();

header('location:'.SITEURL);



?>