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


if(isset($_GET["username"])){



$username =  secure_val(addslashes(secure_html($_GET['username'])));



$query_name = mysqli_query($link, "SELECT * FROM users WHERE md5(username)='$username'");

$cek_name = mysqli_fetch_array($query_name);

$tampil = $cek_name['name'];



$aktifitas = 'Berhasil Delete User '.$tampil;


//query delete dari tabel user 

$del_user=mysqli_query($link,"DELETE FROM users WHERE md5(username)='$username'");

	if ($del_user) {



	    echo ".";



		echo '<script>

				swal({title: "Success",text: "Berhasil Delete Data!",type: "success"}, 

				function() {window.location = "../../view/user/index.php";

				});

			</script>';		

	}

	else{



		$aktifitas = 'Gagal Delete User ';

	    echo ".";



		echo '<script>

					swal({title: "Error",text: "Gagal Delete!",type: "error"}, 

					function() {window.location = "../../view/user/index.php";

					});

				</script>';

	}

}

?>

<?php

}else{

  echo "<script>alert('Anda tidak memiliki hak akses!!'); window.location='../../index.php'</script>";

}

?>