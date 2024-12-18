<?php 
session_start();
if(!isset($_SESSION['login'])) {
  header("Location: login.php");
}
require 'function.php';

if(!isset($_GET['id'])) {
  header("Location: index.php");
  exit;
}

$id = $_GET['id'];

if (hapus($id) > 0) {
  echo "<script>
  alert('Produk berhasil dihapus')
  document.location.href='index.php';
  </script>";
} else {
  echo "Produk gagal dihapus";
}
?>