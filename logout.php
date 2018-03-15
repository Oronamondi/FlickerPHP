<?php
//Remove session created by the user
session_start();
session_unset();//reset session variable $_SESSION['x']
session_destroy();
header("location:index.php");//after logout proceed to login


 ?>