<?php 
require 'function.php';

if (isset($_POST['daftar'])) {
  if (daftar($_POST) > 0) {
    echo "<script>
            alert('user berhasil didaftarkan, silahkan login!')
            document.location.href = 'login.php';
          </script>";
  } else {
    echo "<script>
            alert('username gagal ditambahkan')
            document.location.href = 'daftar.php';
          </script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>daftar</title>
</head>
<body>
  <h3>Daftar</h3>
  <form action="" method="POST">
    <ul>
      <li>
        <label>
          Username :
          <input type="text" name="username" autofocus autocomplete="off" required>
        </label>
      </li>
      <li>
        <label>
          Password :
          <input type="password" name="password1" required>
        </label>
      </li>
      <li>
        <label>
          Konfirmasi Password :
          <input type="password" name="password2" required>
        </label>
      </li>
      <li>
        <button type="submit" name="daftar">Daftar</button>
      </li>
    </ul>
  </form>
</body>
</html>