<?php
$polaczenie = mysqli_connect('localhost','root','','muzyka');
//
// zmienne:
$a = "SELECT id,url,author_title FROM music_2";
$b = mysqli_query($polaczenie,$a);
?>