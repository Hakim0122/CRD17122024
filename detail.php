<?php 
session_start();
if(!isset($_SESSION['login'])) {
  header("Location: login.php");
}
require 'function.php';

$id = $_GET['id'];

$p = query("SELECT * FROM produk WHERE id = $id");


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Produk</title>
</head>
<body style="margin-left: 50px;">
  <h3>Detail Produk</h3>
  <ul style="list-style-type: none;">
    <li><img src="img/<?= $p['gambar']; ?>" alt="" width="20% "></li>
    <li>Nama : <?= $p['nama']; ?></li>
    <li>Jumlah : <?= $p['jumlah']; ?></li>
    <li>Harga : <?= $p['harga']; ?></li><br>
    <li><a href="ubah.php?id=<?= $p['id']; ?>">Ubah</a> | <a href="hapus.php?id=<?= $p['id']; ?>" onclick="return confirm('Apakah anda yakin?');">Hapus</a></li><br>
    <li><a href="index.php">Kembali ke daftar produk</a></li>
  </ul>
</body>
</html>