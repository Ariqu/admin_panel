<?php
// na początku skryptu
session_start();

// pobranie loginu z sesji
$login = $_SESSION['login'];

// sprawdzenie, czy użytkownik jest zalogowany i ma dostęp do tej strony
if ($login != "ariqu" && $login != "caramel bass" ) {
    // użytkownik nie ma dostępu do tej strony, przekierowanie na user_interface.php
    header("Location: user_interface.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN INTERFACE</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div id="panel_admin">
    <form method="post" action="logout.php">
            <input class="logout" type="submit" value="Log out">
    </form>
    <br><br>
    <a href="./user_interface.php">
        <button class="comeback">Powrót</button>
    </a>

    
    </div>
    <div id="container">
    <h1 class="title">administrator panel</h1>
    <p class="title">system testowy</p>
    <br>
    <form method="POST" action="admin_interface.php">
        <div class="formtext">link(url)</div>
        <br>
        <input name="link" type="text">
        <br>
        <div class="formtext">author / title</div>
        <br>
        <input name="author_title"type="text">
        <br>
        <input class="submit" name="submit_btn" type="submit" value="dodaj do bazy danych">
    </form>
    <div id="info">
        <h1>Informacje z bazy:</h1>
    </div>

</div>
    <?php
    $polaczenie = mysqli_connect('localhost','root','','music_database');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//zmienne
    $link = $_POST['link'];
    $author_title = $_POST['author_title'];
//

//polaczenie z baza

    
    $zapytanie = "INSERT INTO music (url_music,title_music) VALUES('$link','$author_title')";

    $wynik = mysqli_query($polaczenie,$zapytanie);

    echo '<div class="succes">';
    echo "Pomyślnie dodano: " . $author_title . " do bazy danych.";
    echo '</div>';
    

} else {
    echo "<script>console.log('nie dodano rekordu.')</script>";
    
}
$polaczenie = mysqli_connect('localhost','root','','music_database');

$zapytanie2 = "SELECT id_music,url_music,title_music FROM music";
$wynik2 = mysqli_query($polaczenie,$zapytanie2);



echo "<h1> Panel zarządzania </h1>";
//
//
//
//

while($row = mysqli_fetch_array($wynik2)) {
    echo "<div id='box_database'>";
    //echo $row['id'];
    echo "<br>";
    echo "<div id='info'>";
    echo $row['url_music'];
    echo "</div>";
    echo "<br>";
    echo "<div id='info'>";
    echo $row['title_music'];
    echo "</div>";
    echo "<br>";


    ?>
    
    <a href="delete_process.php?id=<?php echo $row['id_music']; ?>">Usuń: <?php $row['title_music']; ?>  </a>
</div>
<?php
}
?>
<style>
    input.logout {
        color: red;
        background-color: black;
        width: 100px;
        float: right;
        clear: both;
    }
</style>
</body>
</html>