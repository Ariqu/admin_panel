<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/log_reg.css">
    <link rel="icon" type="image/png" href="images/icon.png">
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
      echo "Użytkownik został pomyślnie zarejestrowany.";
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
    <img src="images/img_2.png" alt="">
    </div>
  <div id="user-form">
    <form method="post">
    <div id="content-user-form">
      <p style="font-size: 26px;">PKP Rozkład bassu</p><br>
      <p style="font-size: 26px;">Rejestracja</p><br>
      <label>Login: </label>
      <input type="text" name="login" required>
      <br>
      <label>Hasło: </label>
      <input type="password" name="password" required>
      <br>
      <label>Email: </label>
      <input type="email" name="email" required>
      <br><br>
      <label>Wybierz rolę: </label>
      <select name="select_type" required style="width: 110px;">
        <option value="Listener">Słuchacz</option>
        <option value="Sound engineer">Klubowicz</option>
        <option value="Producer">Producent</option>
        <option value="DJ">DJ</option>
      </select>
      <br>
      <br>
      <a><input type="submit" name="submit" style="cursor: pointer;" value="Zarejestruj się"></a>
    </form>
    <br><br>
    <p style="font-size: 12px;">Masz już konto?
    <a href="login_admin.php" style="color: white;"><br>Zaloguj się...</a></p>
  </div>
</div>
</body>
</html>