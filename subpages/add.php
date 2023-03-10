<?php
session_start();

$polaczenie44 = mysqli_connect("localhost", "root", "", "music_database");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$login = $_SESSION['login'];
$query44 = "SELECT id_user FROM users WHERE login = '$login'";
$result44 = mysqli_query($polaczenie44, $query44);
if ($result44 && mysqli_num_rows($result44) > 0) {
    $row44 = mysqli_fetch_assoc($result44);
    // id potrzebne do wrzucania nutek!!!
    $id_user = $row44['id_user'];
} else {
    header('location: user_interface.php');
}




echo "witaj: " . $_SESSION['login'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPLOAD SONG - PKB</title>
    <script src="scripts/change.js"></script>
</head>
<body>

DODAJ SWÓJ UTWÓR
<br>
<h1>Wymagane formaty:<h1>
    <br>
<h3>1. Autor - Tytuł </h3>
<h3>2. Autorzy ... - Tytuł </h3>
<h3>3. Autor lub Autorzy... - Tytuł (...) </h3>
<br>
<form method="POST" action="add.php">
    <input name="url_user_pkb" type="text">
    <input name="title_user_pkb" type="text">
    <input name="wrzuc" onsubmit="add_change(event)" type="submit">
</form>

<?php
if(isset($_POST['wrzuc'])) {
$url_user = $_POST['url_user_pkb'];
$title_user = $_POST['title_user_pkb'];

$wrzuc = "INSERT INTO music (url_music, title_music, id_user) VALUES('$url_user','$title_user','$id_user')";
$wynik_wrzucenia = mysqli_query($polaczenie44, $wrzuc);
mysqli_close($polaczenie44);
} else {
    echo "wrzuć coś śmiało!";
}

?>
</body>
</html>