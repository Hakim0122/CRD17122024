<?php 
require '../function.php';

$produk = cari($_GET['keyword']);
?>
<div class="container">
    <table border="1" cellpaddding="10" cellspacing="0">
      <tr align="center">
        <th>Nomer</th>
        <th>Gambar</th>
        <th>Nama Produk</th>
        <th>Aksi</th>
      </tr>

      <?php if (empty($produk)) : ?>
        <tr>
          <td colspan="4">
            <p style="color:red; font-size: italic;" align="center">Data tidak ditemukan</p>
          </td>
        </tr>
      <?php endif; ?>

      <?php $i = 1;
      foreach ($produk as $p) : ?>
        <tr align="center">
          <td><?= $i++; ?></td>
          <td><img src="img/<?= $p['gambar']; ?>" width="100px"></td>
          <td><?= $p['nama']; ?></td>
          <td>
            <a href="detail.php?id=<?= $p['id']; ?>">Lihat detail</a>
          </td>
        </tr>
      <?php endforeach;  ?>
    </table><br><br>