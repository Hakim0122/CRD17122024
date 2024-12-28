<?php 
function koneksi(){
  return mysqli_connect('localhost','root', '', 'toko');
}
function query($query){
  $conn = koneksi();

  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function upload() {
  $nama_file = $_FILES['gambar']['name'];
  $tipe_file = $_FILES['gambar']['type'];
  $ukuran_file = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmp_file = $_FILES['gambar']['tmp_name'];

  if ($error == 4) {
    return 'usm.png';
  }

  $daftar_gambar = ['jpg', 'jpeg', 'png'];
  $ekstensi_file = explode('.', $nama_file);
  $ekstensi_file = strtolower(end($ekstensi_file));
  
  if(!in_array($ekstensi_file, $daftar_gambar)) {
    echo "<script>
            alert('Silahkan upload gambar!');
          </script>";
    return false;
  }

  if($tipe_file != 'image/jpeg' && $tipe_file != 'image/png') {
    echo "<script>
            alert('Silahkan upload gambar!');
          </script>";
    return false;
  }

  if($ukuran_file > 5000000) {
    echo "<script>
            alert('Ukuran gambar terlalu besar!');
          </script>";
    return false;
  }

  $nama_file_baru = uniqid();
  $nama_file_baru .= '.';
  $nama_file_baru .= $ekstensi_file;
  move_uploaded_file($tmp_file, 'img/' . $nama_file_baru);

  return $nama_file_baru;
}

function tambah($data) {
  $conn = koneksi();

  $gambar = upload();
  if (!$gambar) {
    return false;
  }

  $nama = htmlspecialchars($data['nama']);
  $jumlah = htmlspecialchars($data['jumlah']);
  $harga = htmlspecialchars($data['harga']);

  $query = "INSERT INTO produk VALUES (null, '$gambar', '$nama', '$jumlah', '$harga');";

  mysqli_query($conn, $query) or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
}

function hapus($id) {
  $conn = koneksi();

  $prd = query("SELECT * FROM produk WHERE id = $id");
  if($prd['gambar'] != 'usm.png') {
    unlink('img/'. $prd['gambar']);
  }

  mysqli_query($conn, "DELETE FROM produk WHERE id = $id") or die (mysqli_error($conn));

  return mysqli_affected_rows($conn);
}

function ubah($data) {
  $conn = koneksi();

  $id = $data['id'];
  $gambar_lama = htmlspecialchars($data['gambar_lama']);
  $nama = htmlspecialchars($data['nama']);
  $jumlah = htmlspecialchars($data['jumlah']);
  $harga = htmlspecialchars($data['harga']);

  $gambar = upload();
  if (!$gambar) {
    return false;
  }

  if ($gambar == 'usm.png') {
    $gambar = $gambar_lama;
  }

  $query = "UPDATE produk SET
              gambar = '$gambar',
              nama   = '$nama',
              jumlah = '$jumlah',
              harga  = '$harga'
            WHERE id = $id ";

  mysqli_query($conn, $query) or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
}

function cari($keyword) {
  $conn = koneksi();

  $query = "SELECT * FROM produk
              WHERE nama LIKE '%$keyword%' OR 
              harga LIKE '%$keyword%' OR
              jumlah LIKE '%$keyword%'
              ";
  
  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function login($data) {
  $conn = koneksi();

  $username = htmlspecialchars($data['username']);
  $password = htmlspecialchars($data['password']);
  $query    = "SELECT * FROM user WHERE username = '$username'";
  $result   = mysqli_query($conn, $query);

  $user     = mysqli_fetch_assoc($result);

  if ($user) {
    if(password_verify($password, $user['password'])){
      $_SESSION['login'] = true;
      header("Location: index.php");
      exit;
    }
  }
  return [
    'error' => true,
    'pesan' => 'username atau password salah!'
  ];
}

function daftar($data) {
  $conn = koneksi();

  $username = htmlspecialchars(strtolower($data['username']));
  $password1 = mysqli_real_escape_string($conn, $data['password1']);
  $password2 = mysqli_real_escape_string($conn, $data['password2']);
  
  if (empty($username) || empty($password1) || empty($password2)) {
    echo "<script>
            alert('username atau password tidak boleh kosong');
            document.location.href = 'daftar.php';
          </script>";
    return false;
  }

  if (query("SELECT * FROM user WHERE username = '$username'")) {
    echo "<script>
            alert('username sudah terdaftar')
            document.location.href = 'daftar.php';
          </script>";
    return false;
  }

  if ($password1 !== $password2) {
    echo "<script>
            alert('password tidak sesuai')
            document.location.href = 'daftar.php'
          </script>";
    return false;
  }

  if (strlen($password1) < 5) {
    echo "<script>
            alert('password terlalu pendek')
            document.location.href = 'daftar.php'
          </script>";
    return false;
  }

  $password_baru = password_hash($password1, PASSWORD_DEFAULT);

  $query = "INSERT INTO user VALUES
              (null,'$username','$password_baru')
            ";
  mysqli_query($conn, $query) or die (mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

?>