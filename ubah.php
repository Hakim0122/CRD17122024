<?php 
session_start();
if(!isset($_SESSION['login'])) {
  header("Location: login.php");
}
require 'function.php';

if(!isset($_GET['id'])) {
  header("Location: index.php");
  exit;
}

$id = $_GET['id'];

$p = query("SELECT * FROM produk WHERE id = $id");

if(isset($_POST['ubah'])) {
  if(ubah($_POST) > 0) {
    echo "<script>
    alert('Produk berhasil diupdate')
    document.location.href='index.php';
    </script>";
  } else {
    echo "Produk gagal diupdate";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Produk</title>
</head>
<body>
  <h3>Update Produk</h3>
  <form action="" method="POST">
    <input type="hidden" name="id" value="<?= $p['id']; ?>">
    <ul>
      <li>
        <label>
          Gambar : 
          <input type="text" name="gambar" value="<?= $p['gambar']; ?>">
        </label>
      </li>
      <li>
        <label>
          Nama Produk :
          <input type="text" name="nama" required value="<?= $p['nama']; ?>">
        </label> 
      </li>
      <li>
        <label>
          Jumlah :
          <input type="text" name="jumlah" required value="<?= $p['jumlah']; ?>">
        </label>
      </li>
      <li>
        <label>
          Harga :
          <input type="text" name="harga" required value="<?= $p['harga']; ?>">
        </label>
      </li>
      <label>
        <input type="submit" name="ubah" value="Update Produk">
      </label>
    </ul>
  </form>
</body>
</html>