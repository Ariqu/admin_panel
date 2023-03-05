<?php
session_start();
$_SESSION['message'] = "Wylogowano.";
session_destroy(); 
header("Location: login_admin.php"); 
exit;
?>