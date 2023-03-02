<?php
include ("connect_music.php");
session_start();
if(!isset($_SESSION['username'])){
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
    <title>User Interface</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Saira+Condensed:wght@500&family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/ui_style.css">
</head>
<body>
    <div id="panel">
        <div class="username"> <?php echo $_SESSION['username']; ?> </div><br /><br /><br />
        <form method="post" action="logout.php">
            <input class="logout" type="submit" value="Log out">
        </form>
    </div>
<div id="right_user_panel">
    <h1>Niedawno dodane utwory:</h1>
    <?php
    $zapytanie3 = "SELECT * FROM music_2 ORDER BY id DESC LIMIT 3;";
    $wynik3 = mysqli_query($polaczenie,$zapytanie3);

    while($utwor = mysqli_fetch_array($wynik3)) {
        echo "<div id='niedawny_utwor'>";
        echo "<i class='arrow right'></i>";
        echo $utwor['author_title'];
        echo "</div>";
    }
    ?>
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
    

    <?php
    while($wiersz = mysqli_fetch_array($b)) {
    echo "<div id='music_id'>";
        echo "<a href='";
        echo $wiersz['url'];
        echo "'>";
        echo $wiersz['author_title'];
        echo "</a>";
        echo "<br>";
    echo "</div>";
    }
?>

    
</body>
</html>