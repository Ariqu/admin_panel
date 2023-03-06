<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/log_reg.css">
    <title>Rejestracja</title>
</head>
<body>
<?php
// Połączenie z bazą danych
$main_connect = mysqli_connect('localhost','root','','music_database');

// Obsługa formularza rejestracyjnego
if (isset($_POST['submit'])) {
  // Pobierz wartości formularza
  $login = mysqli_real_escape_string($main_connect, $_POST['login']);
  $password = mysqli_real_escape_string($main_connect, $_POST['password']);
  $type = mysqli_real_escape_string($main_connect, $_POST['select_type']);
  $email = mysqli_real_escape_string($main_connect, $_POST['email']);

  // Sprawdź, czy użytkownik o takim loginie już istnieje
  $query = "SELECT * FROM users WHERE login='$login'";
  $result = mysqli_query($main_connect, $query);
  if (mysqli_num_rows($result) > 0) {
    // Użytkownik już istnieje, wyświetl błąd
    echo "Użytkownik o takim loginie już istnieje!";
  } else {
    // Dodaj użytkownika do bazy danych
    $password = md5($password);
    $query = "INSERT INTO users (login, password, type, email) VALUES ('$login', '$password', '$type', '$email')";
    if (mysqli_query($main_connect, $query)) {
      // Użytkownik został dodany pomyślnie, wyświetl komunikat
      echo "Użytkownik został pomyślnie zarejestrowany!";
      sleep(1);
      header('location: login_admin.php');
    } else {
      // Wystąpił błąd podczas dodawania użytkownika, wyświetl komunikat
      echo "Błąd: " . mysqli_error($main_connect);
    }
  }
}
?>
    <div id="content">
    <div id="image">
        <img src="images/img_1.png" alt="">
    </div>
<div id="user-form">
<form method="post">
  <label>Login:</label>
  <input type="text" name="login" required>
  <br>
  <label>Hasło:</label>
  <input type="password" name="password" required>
  <br>
  <label>Email:</label>
  <input type="email" name="email" required>
  <br>
  <label>Rola:</label>
  <br>
  <select name="select_type" required>
  <option value="Producer">Producer</option>
  <option value="Listener">Listener</option>
  <option value="DJ">DJ</option>
  <option value="Sound engineer">Sound engineer</option>
</select>
  <input type="submit" name="submit" value="Zarejestruj">
</form>
<a href="login_admin.php"><button>Masz już konto? Zaloguj się</button></a>
</div>
</div>
</div>
    
</body>
</html>