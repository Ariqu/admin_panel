
<?php
session_start();
if(!isset($_SESSION['username'])) {
    echo "czekaj...";
    sleep(1);
    header('location: login_admin.php');
} else {
    header('location: user_interface.php');
} 
    exit();
?>