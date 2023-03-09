<?php
$connect = mysqli_connect('localhost','root','','music_database');
$zapytanie = "SELECT music.title_music, music.genre_music, users.login FROM music JOIN users ON music.id_user = users.id_user;";
$wynik = mysqli_query($connect,$zapytanie);
while($row = mysqli_fetch_array($wynik)) {
    echo $row['title_music'];
    echo "<br>";
    echo "utwór przesłany przez: " . $row['login'] . " ";
    echo "<br>";
}
?>