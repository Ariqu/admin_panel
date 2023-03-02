<?php
session_start();
session_destroy(); // zakończ sesję

// przekieruj użytkownika na stronę logowania
header("Location: login_admin.php");
exit;
?>