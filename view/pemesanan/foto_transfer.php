<?php
error_reporting(0); session_start();
if ($_SESSION['status'] == 'login' and $_SESSION['username'] <> "") {
include "../../config.php";

$kode_pesanan = $_GET['kode_pesanan'];

$cek_foto 	= mysqli_query($link, "SELECT * from foto_transfer where kode_pesanan_foto = '$kode_pesanan'");
$hasil_cek 	= mysqli_fetch_array($cek_foto);

?>

<a href="#"><img src="../../images_transfer/<?= $hasil_cek['kode_pesanan_foto'] ?>/<?= $hasil_cek['file_name'] ?>" alt=""></a>

<?php

}else{
  echo "<script>alert('Anda tidak memiliki hak akses!!'); window.location='../../index.php'</script>";
}
?>