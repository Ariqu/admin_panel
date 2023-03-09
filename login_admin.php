<?php
session_start();
if (isset($_SESSION['logout_message'])) {
    echo $_SESSION['logout_message'];
    unset($_SESSION['logout_message']);
}

$polaczenie_login = mysqli_connect('localhost','root','','music_database');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
    <link rel="stylesheet" href="styles/log_reg.css">
    <link rel="icon" type="image/png" href="images/icon.png">
</head>
<body>
    <div id="content">
    <div id="image">
        <img src="images/img_2.png" alt="">
    </div>
<div id="user-form">
    <div id="content-user-form">
        <p style="font-size: 26px;">PKP Rozkład bassu</p><br>
        <p style="font-size: 26px;">Logowanie</p><br>
        <form method="POST" action="login_admin.php">
            <label>Login: </label>
            <input type="text" name="username"><br>
            <label>Hasło: </label>
            <input type="password" name="password"><br><br>
            <input type="submit" name="submit_login" style="cursor: pointer;" value="Zaloguj się">
        </form>
        <br><br>
        <p style="font-size: 12px;">Nie masz konta?<br>
        <a href="register.php" style="color: white;">Zarejetruj się...</a></p>
        <?php
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
            echo "<div id='error_user'>Nie wpisałeś loginu lub hasła.</div>";
        }
        
        else {
            echo "<div id='error_user'>Twój login lub hasło jest niepoprawne.</div>";
        }
     }

?>
    </div>
</div>
</div>
</body>
</html>