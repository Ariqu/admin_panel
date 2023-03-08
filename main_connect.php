<?php

$main_connect = mysqli_connect('localhost','root','','music_database');
$a = "SELECT id_music, url_music, title_music FROM music";
$b = mysqli_query($polaczenie,$a);
?>