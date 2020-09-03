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

if(isset($_GET["id_terapis"])){

$id_terapis = secure_val($_GET['id_terapis']);

function kode_terapis($id_terapis){
	global $link;
	$cek = mysqli_query($link, "SELECT id_terapis,kode_terapis from terapis where md5(id_terapis) = '$id_terapis'");
	$hasil_cek = mysqli_fetch_array($cek);
	$kode_terapis = $hasil_cek["kode_terapis"];
	return $kode_terapis;
}
function file_name($id_terapis){
	global $link;
	$cek = mysqli_query($link, "SELECT id_terapis,file_name from terapis where md5(id_terapis) = '$id_terapis'");
	$hasil_cek = mysqli_fetch_array($cek);
	$file_name = $hasil_cek["file_name"];
	return $file_name;
}

//hapus file foto lama
$foto='../../images/'.kode_terapis($id_terapis).'/'.file_name($id_terapis).'';
unlink($foto);

if ($foto) {

$del=mysqli_query($link,"DELETE FROM terapis WHERE md5(id_terapis)='$id_terapis'");

	if ($del) {
		
	 	echo '<script>
				swal({title: "Success",text: "Success!",type: "success"}, 
				function() {window.location = "../../view/terapis/";
				});
			</script>';		
	}

	else{
		
				echo '<script>
					swal({title: "Error",text: "Success!",type: "error"}, 
					function() {window.location = "../../view/terapis/";
					});
				</script>';
			}
		}
	}



}else{
  echo "<script>alert('Anda tidak memiliki hak akses!!'); window.location='../../index.php'</script>";
}
?>