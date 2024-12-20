<?php
session_start();
if (isset($_SESSION['login'])) {
  header("Location: index.php");
}

require 'function.php';

if (isset($_POST['login'])) {
  $login = login($_POST);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Masuk?</title>
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>
  <div class="home">
    <div class="wrapper">
      <div class="form-box login"></div>
      <h2>Masuk</h2>

      <?php if (isset($login['error'])): ?>
        <script>
          alert("<?php echo $login['pesan']; ?>");
        </script>
      <?php endif; ?>

      <form action="" method="POST">
        <div class="input-box">
          <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
          <input type="text" name="username" required>
          <label>Username</label>
        </div>
        <div class="input-box">
          <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
          <input type="password" name="password" required>
          <label>Kata sandi</label>
        </div>
        <div class="ingat-saya">
          <label><input type="checkbox" >Ingat saya</label>
          <a href="">Lupa password?</a>
        </div>
        <button type="submit" name="login" class="btn">Masuk</button>
        <div class="daftar-sekarang">
          <p>Belum memiliki akun?<a href="daftar.php" class="daftar-link"> Daftar</a></p>
        </div>
      </form>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>