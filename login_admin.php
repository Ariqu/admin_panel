<?php
include ("connect.php");
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST") {
    //
        // username and password sent from form 
        
        $myusername = mysqli_real_escape_string($db,$_POST['username']);
        $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
        
        $sql = "SELECT id FROM login_users WHERE username = '$myusername' and password = '$mypassword'";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

        
        $count = mysqli_num_rows($result);
        
          
        if($count == 1) {
            echo "Trwa przekierowywanie...";
            session_regenerate_id();
            $_SESSION['username'] = $myusername;
            sleep(2); 
            header("location: user_interface.php");
            exit();
        }else {
           echo "Twój login lub hasło jest nie poprawne.";
        }
     }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>prototyp systemu logowania</title>
</head>
<body>

<form method="POST" action="login_admin.php">
    <input type="text" name="username">
    <input type="password" name="password">
    <input type="submit" name="submit_login" value="zaloguj">
</form>
 
</body>
</html>