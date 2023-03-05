<?php
include_once 'admin_interface.php';
$sql_delete = "DELETE FROM music WHERE id_music = '" . $_GET['id'] . "'";
$usuwane_id = $_GET['id'];
if(mysqli_query($polaczenie,$sql_delete)) {
    $sql_update = "UPDATE music SET id_music = id_music - 1 WHERE id_music > $usuwane_id";
    mysqli_query($polaczenie, $sql_update);
    echo "<div id='parametr'>";
    echo "pomyślnie usunięteo rekord: " . $_GET['id'] . "<br>";
    echo "</div>";
    echo "<script>alert('pomyślnie usunięto rekord!')";
} else {
    echo "nie usunięto rekordu! - spróbuj ponownie.";
} 
mysqli_close($polaczenie);
?>