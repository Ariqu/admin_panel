<?php
session_start();
if (!$_SESSION['login'] == "ariqu" && !$_SESSION['login'] == "caramel bass") {
    header('Location: user_interface.php');
    exit();
}
$db = new PDO('mysql:host=localhost;dbname=music_database', 'root', '', array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
));
if ($_POST['message']) {
    
    $stmt = $db->prepare('UPDATE messages SET message = :message WHERE id = :id');
    $stmt->execute(array(':message' => $_POST['message'], ':id' => $_POST['id']));
    header('Location: user_interface.php');
    exit();
}
$stmt = $db->query('SELECT * FROM messages ORDER BY id DESC LIMIT 1');
$message = $stmt->fetch();
echo "witaj " . $_SESSION['login'];
?>
<form method="POST">
    <input type="hidden" name="id" value="<?php echo $message['id']; ?>">
    <textarea name="message"><?php echo $message['message']; ?></textarea>
    <br>
    <br>
    <input type="submit" value="Zapisz">
</form>
    <a href="user_interface.php"><button>Anuluj</button></a>