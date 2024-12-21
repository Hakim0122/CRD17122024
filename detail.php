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
  <!-- Link Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Link Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      background-color: #f8f9fa;
    }
    .card {
      border: none;
      border-radius: 10px;
      backdrop-filter: blur(10px);
      background-color: rgba(255, 255, 255, 0.9);
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
    .card-title {
      font-family: 'Roboto', sans-serif;
      font-weight: 700;
      color: #333;
    }
    ul {
      font-family: 'Open Sans', sans-serif;
      font-size: 16px;
      color: white;
      line-height: 1.8;
      padding: 0;
      text-align: center;
    }
    ul li {
      margin-bottom: 15px;
    }
    ul li img {
      border-radius: 10px;
      display: block;
      margin: auto;
      text-align: center;
      width: 300px;
    }
    ul li strong {
      width: 100px;
      display: inline-block;
    }
    .btn {
      border-radius: 20px;
    }
  </style>
</head>
<body>
  <div class="d-flex justify-content-center align-items-center vh-100" style="background-image: url('img/papku.jpg'); background-size: cover; background-position: center;">
    <div class="card p-4" style="max-width: 500px; width: 100%; background: transparent; border: 2px solid rgba(255, 255, 255, .5); border-radius: 20px; backdrop-filter: blur(20px); box-shadow: 0 0 30px rgba(0, 0, 0, .5);">
      <div class="card-body">
        <h3 class="card-title text-center mb-4">Detail Produk</h3>
        <ul class="list-unstyled">
          <li><img src="img/<?= $p['gambar']; ?>" alt="Produk" class="img-fluid"></li>
          <li><strong>Nama:</strong> <?= $p['nama']; ?></li>
          <li><strong>Jumlah:</strong> <?= $p['jumlah']; ?></li>
          <li><strong>Harga:</strong> <?= $p['harga']; ?></li>
        </ul>
        <div class="mt-4 text-center">
          <a href="ubah.php?id=<?= $p['id']; ?>" class="btn btn-warning px-4 me-2">Ubah</a>
          <a href="hapus.php?id=<?= $p['id']; ?>" class="btn btn-danger px-4" onclick="return confirm('Apakah anda yakin?');">Hapus</a>
        </div>
        <div class="text-center mt-3">
          <a href="index.php" class="btn btn-secondary px-4">Kembali</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Link Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
