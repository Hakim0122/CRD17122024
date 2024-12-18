<?php 
function koneksi(){
  
  return mysqli_connect('localhost','root', '', 'toko');
}
function query($query){
  $conn = koneksi();

  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function tambah($data) {
  $conn = koneksi();

  $gambar = htmlspecialchars($data['gambar']);
  $nama = htmlspecialchars($data['nama']);
  $jumlah = htmlspecialchars($data['jumlah']);
  $harga = htmlspecialchars($data['harga']);

  $query = "INSERT INTO produk VALUES (null, '$gambar', '$nama', '$jumlah', '$harga');";

  mysqli_query($conn, $query) or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
}

function hapus($id) {
  $conn = koneksi();

  mysqli_query($conn, "DELETE FROM produk WHERE id = $id") or die (mysqli_error($conn));

  return mysqli_affected_rows($conn);
}

function ubah($data) {
  $conn = koneksi();

  $id = $data['id'];
  $gambar = htmlspecialchars($data['gambar']);
  $nama = htmlspecialchars($data['nama']);
  $jumlah = htmlspecialchars($data['jumlah']);
  $harga = htmlspecialchars($data['harga']);

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

  if ($user = query("SELECT * FROM user WHERE username = '$username'")) {
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