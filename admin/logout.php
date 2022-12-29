<?php 
include('../config/constant.php');
 session_destroy(); //unsets $_session['user']

header('location:'.SITEURL.'/admin/login.php');



 ?>