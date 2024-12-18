<?php 
session_start();
if(!isset($_SESSION['login'])) {
  header("Location: login.php");
}
require 'function.php';

$produk = query("SELECT * FROM produk");

if (isset($_POST['cari'])) {
  $produk = cari($_POST['keyword']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar</title>
</head>
<body>
  <h3>Daftar Produk</h3><br>
  <a href="tambah.php">Tambah Produk</a><br><br>

  <form action="" method="POST">
    <input type="text" name="keyword" size="38px" placeholder="pencarian..." autocomplete="off">
    <button type="submit" name="cari">Cari</button>
    <br><br>

  </form>

  <table border="1" cellpaddding="10" cellspacing="0">
    <tr align="center">
      <th>Nomer</th>
      <th>Gambar</th>
      <th>Nama Produk</th>
      <th>Aksi</th>
    </tr>

    <?php if(empty($produk)) : ?>
    <tr>
      <td colspan="4">
        <p style="color:red; font-size: italic;" align="center">Data tidak ditemukan</p></td>
    </tr>
    <?php endif; ?>

    <?php $i = 1;
    foreach ($produk as $p) : ?>
    <tr align="center">
      <td><?= $i++; ?></td>
      <td><img src="img/<?= $p['gambar'];?>" width="100px"></td>
      <td><?= $p['nama']; ?></td>
      <td>
        <a href="detail.php?id=<?= $p['id']; ?>">Lihat detail</a>
      </td>
    </tr>
    <?php endforeach;  ?>
  </table><br><br>
  
  <a href="logout.php">logout</a>
</body>
</html>