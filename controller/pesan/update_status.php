<?php
error_reporting(0); 
session_start();
if ($_SESSION['status'] == 'login' and $_SESSION['username'] <> "") {
$nama = $_SESSION['name'];
include '../../config.php';
include '../../equipment.php';
?>
<head>
  <link href="../../resource/css/sweetalert.css" rel="stylesheet">
  <link href="../../resource/css/theme/twitter.css" rel="stylesheet">
  <script src="../../resource/js/main/jquery.min.js"></script>
  <script src="../../resource/js/main/sweetalert.min.js"></script>
</head>

<?php

if (isset($_GET['id_pesanan'])) {

$id_pesanan = $_GET['id_pesanan'];
$kode_pesanan = $_GET['kode_pesanan'];

$status = '1';

$query = "UPDATE pesan 
SET status_pesan = '$status' 
WHERE
	id_pesanan = '$id_pesanan'";

	$pesanan = mysqli_query($link, $query);

$query2 = "UPDATE durasi 
SET status_durasi = '$status' 
WHERE
	kode_pesanan = '$kode_pesanan'";

	$durasi = mysqli_query($link, $query2);
	

	if ($pesanan && $durasi) {

		  echo ".";
	      echo '<script>
	        swal({title: "Success",text: "Berhasil Menyelesaikan Pesanan!",type: "success"}, 
	        function() {window.location = "../../view/pemesanan/";
	        });
	      </script>';

	  }else{
	    echo '<script>
	        swal({title: "Error",text: "Gagal!",type: "error"}, 
	        function() {window.location = "../../view/pemesanan/";
	        });
	      </script>';

	    }

}


}else{
  echo "<script>alert('Anda tidak memiliki hak akses!!'); window.location='../../index.php'</script>";
}
?>  