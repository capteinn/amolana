<?php
error_reporting(0);
session_start();
if ($_SESSION['status'] == 'login' and $_SESSION['username'] <> "") {
$nameuser = $_SESSION['username'];
$nama 	  = $_SESSION['name']; 

?>
<head>
	<link href="../../resource/css/sweetalert.css" rel="stylesheet">
	<link href="../../resource/css/theme/twitter.css" rel="stylesheet">
</head>
<body>
   <script src="../../resource/js/main/jquery.min.js"></script>
   <script src="../../resource/js/main/sweetalert.min.js"></script>
</body>

<?php
include_once "../../config.php";
include '../../equipment.php';
?>

<?php

if(isset($_GET["id_pesanan"])){

$id_pesanan = secure_val($_GET['id_pesanan']);

$cek_pesan = mysqli_query($link, "select * from pesan where id_pesanan = '$id_pesanan'");
$hasil = mysqli_fetch_array($cek_pesan);


//query delete dari tabel  
$del=mysqli_query($link,"DELETE FROM pesan WHERE id_pesanan='$id_pesanan'");
$del2=mysqli_query($link,"DELETE FROM durasi WHERE kode_pesanan='$hasil[kode_pesanan]'");

	if ($del && $del2) {
		
	 	echo '<script>
				swal({title: "Success",text: "Success!",type: "success"}, 
				function() {window.location = "../../view/pemesanan/";
				});
			</script>';		
	}

	else{
		
				echo '<script>
					swal({title: "Error",text: "Success!",type: "error"}, 
					function() {window.location = "../../view/pemesanan/";
					});
				</script>';
			}
		
	}



}else{
  echo "<script>alert('Anda tidak memiliki hak akses!!'); window.location='../../index.php'</script>";
}
?>