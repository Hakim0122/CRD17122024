<?php
session_start();
if (!isset($_SESSION['login'])) {
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
  <title>Daftar Produk</title>
  <!-- Link Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Link Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 0;
      background-image: url('img/papku.jpg');
      background-size: cover;
      background-position: center;
    }

    .container {
      max-width: 900px;
      width: 100%;
    }

    .table {
      border-collapse: separate;
      border-spacing: 0;
      border: 1px solid white;
      border-radius: 10px;
      overflow: hidden;
      background: transparent;
      backdrop-filter: blur(20px);
      box-shadow: 0 0 30px rgba(0, 0, 0, .5);
    }

    .table td,
    .table th {
      border: 1px solid rgba(255, 255, 255, 0.3);
    }
    
    .table td img {
    width: 100px;
    height: 60px;
    border-radius: 10px;
    border: 2px solid rgba(255, 255, 255, 0.3);
  }


    .btn-primary {
      border-radius: 20px;
      font-weight: bold;
    }

    .btn-danger {
      border-radius: 20px;
    }

    .card-title {
      font-family: 'Roboto', sans-serif;
      font-weight: bold;
      color: black;
      text-align: center;
    }

    tr {
      color: #f8f9fa;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="card p-4" style="background: transparent; border: 2px solid rgba(255, 255, 255, .5); border-radius: 20px; backdrop-filter: blur(20px); box-shadow: 0 0 30px rgba(0, 0, 0, .5);">
      <h3 class="card-title mb-4">Daftar Produk</h3>
      <a href="tambah.php" class="btn btn-primary mb-3">Tambah Produk</a>

      <form action="" method="POST" class="d-flex mb-4" style="position: relative;">
        <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Pencarian..." autocomplete="off" style="background: transparent; padding-right: 40px; border-radius: 20px;">
        <button type="submit" name="cari" id="tombol-cari" class="btn btn-search" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); border: none; background: transparent;">
          <i class="bi bi-search" style="color: white;"></i>
        </button>
      </form>


      <?php if (empty($produk)) : ?>
        <div class="alert alert-danger text-center" role="alert">
          Data tidak ditemukan!
        </div>
      <?php else : ?>
        <div class="jumbroton">
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
        </div>
      <?php endif; ?>

      <a href="logout.php" class="btn btn-danger mt-3">Logout</a>
    </div>
  </div>

  <!-- Link Bootstrap JS -->
  <script src="js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>