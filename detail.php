<?php 
require 'function.php';

$id = $_GET['id'];
$p = query("SELECT * FROM nama_produk WHERE id_produk = $id");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Produk</title>
</head>
<body>
  <h3>Detail Produk</h3>
  <ul>
    <li><img src="img/<?= $p['gambar']; ?>" alt=""></li>
    <li>Nama : <?= $p['nama_produk']; ?></li>
    <li>Jumlah : <?= $p['jumlah']; ?></li>
    <li>Harga : <?= $p['harga']; ?></li>
    <li><a href="">Ubah</a> | <a href="">Hapus</a></li>
    <li><a href="latihan2.php">Kembali ke daftar produk</a></li>
  </ul>
</body>
</html>