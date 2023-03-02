<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location: error.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo "webpage in work. Please wait :)";
        $polaczenie = mysqli_connect('localhost','root','','muzyka');
        $a = "SELECT id,url,author_title FROM music_2";
        $b = mysqli_query($polaczenie,$a);
        //
    ?>
    <h1>nasza dostępna lista utworów.</h1>
    <?php
    while($wiersz = mysqli_fetch_array($b)) {
    echo "<a href='";
    echo $wiersz['url'];
    echo "'>";
    echo $wiersz['author_title'];
    echo "</a>";
    echo "<br>";
    }
    ?>
    
</body>
</html>