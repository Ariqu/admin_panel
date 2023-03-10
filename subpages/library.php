<?php
    $main_connect = mysqli_connect('localhost','root','','music_database');
    $a = "SELECT id_music, url_music, title_music FROM music";
    $b = mysqli_query($main_connect,$a);
    while($wiersz = mysqli_fetch_array($b)) {
        echo "<div id='music_id'>";
            echo "<a href='";
            echo $wiersz['url_music'];
            echo "'>";
            echo "<div id='author'>";
            echo strstr($wiersz['title_music'], '-', true);
            echo "</div>";
            echo "</a>";
            echo "<br>";
            echo $wiersz['url_music'];
        echo "</div>";
        }
    ?>