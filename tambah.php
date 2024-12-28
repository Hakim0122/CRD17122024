<?php 
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: login.php");
}
require 'function.php';

if (isset($_POST['tambah'])) {
  if (tambah($_POST) > 0) {
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
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

    .card {
      width: 100%;
      max-width: 600px;
      padding: 30px;
      border-radius: 15px;
      border: 2px solid white;
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(10px);
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      line-height: 10px;
    }

    form {
      color: black;
    }

    .form-label {
      font-weight: 600;
    }

    .img-preview {
      max-width: 100%;
      margin-top: 10px;
    }

    .btn-custom {
      background-color: #007bff;
      color: #fff;
      border-radius: 20px;
    }

    .btn-custom:hover {
      background-color: #0056b3;
    }

    .btn-transparent {
      background: rgba(255, 255, 255, 0.2);
      color: #fff;
      border: 1px solid #333;
      border-radius: 20px;
    }

    .btn-transparent:hover {
      background: rgba(255, 255, 255, 0.2);
      color: black;
    }

    .form-control {
      border-radius: 10px;
      background: transparent;
      color: white;
    }

    .form-control:focus {
      background: transparent;
      color: white;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .alert {
      border-radius: 10px;
    }
  </style>
</head>
<body>
  <div class="card">
    <h3 class="text-center mb-4">Tambah Produk</h3>
    <?php if (isset($_POST['tambah']) && isset($tambah)): ?>
      <div class="alert alert-<?php echo $tambah > 0 ? 'success' : 'danger'; ?>" role="alert">
        <?php echo $tambah > 0 ? 'Produk berhasil ditambahkan!' : 'Produk gagal ditambahkan.'; ?>
      </div>
    <?php endif; ?>
    <form action="" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="gambar" class="form-label">Gambar Produk</label>
        <input type="file" class="form-control" name="gambar" id="gambar" onchange="previewImage()">
        <img src="img/image.png" alt="Preview Gambar" class="img-preview mt-3" width="100">
      </div>
      <div class="form-group">
        <label for="nama" class="form-label">Nama Produk</label>
        <input type="text" class="form-control" name="nama" id="nama" required autocomplete="off">
      </div>
      <div class="form-group">
        <label for="jumlah" class="form-label">Jumlah</label>
        <input type="text" class="form-control" name="jumlah" id="jumlah" required autocomplete="off">
      </div>
      <div class="form-group">
        <label for="harga" class="form-label">Harga</label>
        <input type="text" class="form-control" name="harga" id="harga" required autocomplete="off">
      </div>
      <button type="submit" name="tambah" class="btn btn-custom w-100 mt-4">Tambah Produk</button>
    </form>
    <a href="index.php" class="btn btn-transparent w-100 mt-3">Kembali ke Daftar Produk</a>
  </div>
  <script>
    function previewImage() {
      const image = document.querySelector('#gambar');
      const imgPreview = document.querySelector('.img-preview');

      const file = image.files[0];
      const reader = new FileReader();

      reader.onload = function (e) {
        imgPreview.src = e.target.result;
      }

      reader.readAsDataURL(file);
    }
  </script>
</body>
</html>