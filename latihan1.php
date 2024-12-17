<?php 
require 'function.php';

$produk = query("SELECT * FROM nama_produk");

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar</title>
</head>
<body>
  <h3>Daftar Produk</h3>
  <table border="1" cellpaddding="10" cellspacing="0">
    <tr align="center">
      <th>Id Produk</th>
      <th>Gambar</th>
      <th>Nama Produk</th>
      <th>Jumlah</th>
      <th>Harga</th>
      <th>Aksi</th>
    </tr>

    <?php 
    foreach ($produk as $p) : ?>
    <tr align="center">
      <td><?= $p['id_produk']; ?></td>
      <td><img src="img/<?= $p['gambar'];?>" width="100px"></td>
      <td><?= $p['nama_produk']; ?></td>
      <td><?= $p['jumlah']; ?></td>
      <td><?= $p['harga']; ?></td>
      <td>
        <a href="">Ubah</a> |
        <a href="">Hapus</a>
      </td>
    </tr>
    <?php endforeach;  ?>
  </table>
</body>
</html>