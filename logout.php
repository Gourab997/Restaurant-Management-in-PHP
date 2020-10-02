
<?php
ob_start();
session_start();
session_destroy();
session_unset();
header("location:login.php");

ob_end_flush();
?>