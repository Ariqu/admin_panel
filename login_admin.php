<?php
session_start();
if (isset($_SESSION['logout_message'])) {
    echo $_SESSION['logout_message'];
    unset($_SESSION['logout_message']);
}
$polaczenie_login = mysqli_connect('localhost','root','','music_database');

if($_SERVER["REQUEST_METHOD"]=="POST") {
    //
        // username and password sent from form 
        
        $myusername = mysqli_real_escape_string($polaczenie_login,$_POST['username']);
        $mypassword = mysqli_real_escape_string($polaczenie_login,$_POST['password']); 
        
        $sql = "SELECT id_user FROM users WHERE login = '$myusername' and password = md5('$mypassword')";

        $result = mysqli_query($polaczenie_login,$sql);

        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

        
        $count = mysqli_num_rows($result);
        
          
        if($count == 1) {
            echo "Trwa przekierowywanie...";
            session_regenerate_id();
            $_SESSION['login'] = $myusername;
            sleep(2); 
            header("location: user_interface.php");
            exit();
        } if ($mypassword == null || $myusername == null) {
            echo "nie wpisałeś loginu lub hasła.";
        }
        
        else {
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
    <title>prototyp systemu logowania</title>
    <link rel="stylesheet" href="styles/log_reg.css">
</head>
<body>
    <div id="content">
    <div id="image">
        <img src="images/img_1.png" alt="">
    </div>
<div id="user-form">
    <div id="content-user-form">
<form method="POST" action="login_admin.php">
    <input type="text" name="username">
    <input type="password" name="password">
    <input type="submit" name="submit_login" value="zaloguj">
</form>
<a href="register.php"><button>Nie masz konta? Zarejetruj się</button></a>
    </div>
    </div>
    </div>


</body>
</html>