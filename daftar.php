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
  <title>Daftar akun?</title>
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>
  <div class="home">
    <div class="wrapper-daftar">
      <div class="form-box daftar">
        <h2>Daftar</h2>
        <form action="" method="POST">
          <div class="input-box">
            <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
            <input type="text" name="username" autofocus autocomplete="off" required>
            <label>Username</label>
          </div>
          <div class="input-box">
            <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
            <input type="password" name="password1" required>
            <label>Password</label>
          </div>
          <div class="input-box">
            <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
            <input type="password" name="password2" required>
            <label>Konfirmasi Password</label>
          </div>
          <div class="ingat-saya">
            <label><input type="checkbox" required >Saya setuju dengan <a href="">persyaratannya</a></label>
          </div>
          <button type="submit" class="btn" name="daftar">Daftar</button>
          <div class="daftar-sekarang">
            <p>Sudah memiliki akun?<a href="login.php" class="login-link"> Masuk</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>