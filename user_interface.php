<?php
session_start();
$_SESSION['login'];
$polaczenie = mysqli_connect('localhost','root','','music_database');
$a = "SELECT id_music, url_music, title_music FROM music";
$b = mysqli_query($polaczenie,$a);
////
//  //
//    //
//      //
//        //
//          // 
//            //
//          //
//        //
//      //
//    //
//  //
////
if(!isset($_SESSION['login'])){
    header("location: error.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strona główna - PKP Rozkład bassu</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Saira+Condensed:wght@500&family=Ubuntu&display=swap" rel="stylesheet">
    <script src="scripts/change.js"></script>
    <link rel="stylesheet" href="styles/ui_style.css">
    <link rel="icon" type="image/png" href="images/icon.png">
</head>
<body>
    <div id="container">
        <div id="panel">
            <div id="title_webpage">PKB</div>
                <div class="username"> <?php echo $_SESSION['login']; ?> </div><br /><br /><br />
                    <form method="post" action="logout.php">
                        <input class="logout" type="submit" value="Log out">
                    </form>
                    <?php
                    // $text = "test";
                    // $md = md5($text);
                    // echo $md;
                    ?>
                </div>
                <div id="right_user_panel">
                    <?php
                    include ('main_connect.php');
                    if ($main_connect->connect_error) {
                        die("Connection failed: " . $db->connect_error);
                    }
                    $login = $_SESSION['login'];
                    $sql = "SELECT type FROM users WHERE login = '$login'";
                    $result = $main_connect->query($sql);

                    if (!$result) {
                        die("Error: " . $sql . "<br>" . $db->error);
                    }

    $row = $result->fetch_assoc();
    $id = $row['type'];
    echo "<div id='type'>";
    echo $id;
    echo "</div>";
    if ($id == "(ADMIN) Producer") {
        echo "<div id='admin-panel'>";
        echo "Jesteś w trybie administratora";
        echo "<br>";
        echo "<a href='admin_interface.php'>";
        echo "Przejż do panelu";
        echo "</a>";
        echo "</div>";
    }
    ?>
    <div id="select">
        <div class="home">
            <img class="icon" src="images/icons/home.png" alt="HOME">
        </div>
        <div class="biblioteka">
            <img onclick="library_change()" class="icon" src="images/icons/library.png" alt="BIBLIOTEKA">
        </div>

        <div class="kategoria">
            <img onclick="category_change()" class="icon" src="images/icons/category.png" alt="KATEGORIA">
        </div>
    </div>
    <!---
    <?php
    
    $db = new PDO('mysql:host=localhost;dbname=music_database', 'root', '', array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ));
    
    $stmt = $db->query('SELECT * FROM messages ORDER BY id DESC LIMIT 1');
    $message = $stmt->fetch()['message'];
    if ($id == "(ADMIN) Producer") {
     echo "<a href='edit_message.php'>Edytuj wiadomość</a>";
    }
    echo "<div id='message'>";
    echo "<div id='msg-title'>Wiadomości</div>";
    echo "<div id='msg-source'>$message</div>";
    echo "</div>"


    ?>
    -->
    <h1>Niedawno dodane utwory:</h1>
    <?php
    $zapytanie3 = "SELECT * FROM music ORDER BY id_music DESC LIMIT 3;";
    $wynik3 = mysqli_query($polaczenie,$zapytanie3);

    while($utwor = mysqli_fetch_array($wynik3)) {
        echo "<div id='niedawny_utwor'>";
        echo "<i class='arrow right'></i>";
        echo $utwor['title_music'];
        echo "</div>";
    }
    ?>
       <!-----  --->
    <br>
    <h1>Polecani artyści:</h1>
    <div id="artists">
        <div id="artist-box"><div class="text-a-b">ARIQU</div></div>
        <div id="artist-box"><div class="text-a-b">CARAMEL BASS</div></div>
        <div id="artist-box"><div class="text-a-b">P1NX</div></div>
        <div id="artist-box"><div class="text-a-b">EXMO</div></div>
        <div id="artist-box"><div class="text-a-b">HU BISS</div></div>
        <div id="artist-box"><div class="text-a-b">REZZ</div></div>
        <div id="artist-box"><div class="text-a-b">LYCOS</div></div>
        <div id="artist-box"><div class="text-a-b">DAVID TANGO</div></div>
        <div id="artist-box"><div class="text-a-b">LESTON</div></div>
    </div>
</div>
<?php
        echo "webpage in work. Please wait :)";
        //
    ?>


    <h1>nasza dostępna lista utworów.</h1>
    <div id="main-content">



    </div>
    
</div>
<div id="footer">© 2023 created by ariqu <br>
    PHP SQL JS HTML CSS
</div>

        
</body>
</html>