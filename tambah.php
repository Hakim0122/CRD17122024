<?php 
session_start();
if(!isset($_SESSION['login'])) {
  header("Location: login.php");
}
require 'function.php';

if(isset($_POST['tambah'])){
  if(tambah($_POST) > 0) {
    echo "<script>
    alert('Produk berhasil ditambahkan')
    document.location.href='index.php';
    </script>";
  } else {
    echo "Produk gagal ditambahkan";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Produk</title>
</head>
<body>
  <h3>Tambah Produk</h3>
  <form action="" method="POST" enctype="multipart/form-data">
    <ul>
      <li>
        <label>
          Gambar : 
          <input type="file" name="gambar" class="gambar" onchange="previewImage()">
        </label>
        <img src="img/usm.png" alt="" width="100" style="display:block;" class="img-preview">
      </li>
      <li>
        <label>
          Nama Produk :
          <input type="text" name="nama" required autocomplete="off">
        </label> 
      </li>
      <li>
        <label>
          Jumlah :
          <input type="text" name="jumlah" required autocomplete="off">
        </label>
      </li>
      <li>
        <label>
          Harga :
          <input type="text" name="harga" required autocomplete="off">
        </label>
      </li>
      <label>
        <input type="submit" name="tambah" value="Tambah Produk">
      </label>
    </ul>
  </form>
<script src="js/script.js"></script>
</body>
</html>