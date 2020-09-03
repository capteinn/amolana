<?php
error_reporting(0);
session_start();
if ($_SESSION['status'] == 'login' and $_SESSION['username'] <> "") {
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

if(isset($_GET["id_gaji"])){

$id_gaji = $_GET['id_gaji'];

//query delete dari tabel  
$del=mysqli_query($link,"DELETE FROM gaji WHERE id_gaji='$id_gaji'");

	if ($del) {
		
	 	echo '<script>
				swal({title: "Success",text: "Success!",type: "success"}, 
				function() {window.location = "../../view/gaji/";
				});
			</script>';		
	}

	else{
		
				echo '<script>
					swal({title: "Error",text: "Success!",type: "error"}, 
					function() {window.location = "../../view/gaji/";
					});
				</script>';
			}
		
	}



}else{
  echo "<script>alert('Anda tidak memiliki hak akses!!'); window.location='../../index.php'</script>";
}
?>