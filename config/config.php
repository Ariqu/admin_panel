<?php
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
    header('location: login_admin.php');
}

mysqli_close($polaczenie44);


?>