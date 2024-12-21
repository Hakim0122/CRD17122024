<?php 
require '../function.php';

$produk = cari($_GET['keyword']);
?>
<table class="table table-bordered text-center align-middle">
  <thead class="table-dark">
    <tr>
      <th>No</th>
      <th>Gambar</th>
      <th>Nama Produk</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1;
    foreach ($produk as $p) : ?>
      <tr>
        <td><?= $i++; ?></td>
        <td><img src="img/<?= $p['gambar']; ?>" width="100px" class="img-fluid rounded"></td>
        <td><?= $p['nama']; ?></td>
        <td>
          <a href="detail.php?id=<?= $p['id']; ?>" class="btn btn-outline-success">Lihat Detail</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>