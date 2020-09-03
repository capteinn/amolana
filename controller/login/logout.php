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

 ini_set( "display_errors", 0);



?>

<?php

session_start();

echo ".";

mysqli_query($link, "UPDATE users SET last_login = '$tanggal' where username='$_SESSION[username]'");

unset($_SESSION['username']);

session_destroy();



	echo '<script>

			swal({title: "Success",text: "Berhasil Logout!",type: "success"}, 

			function() {window.location = "../../front/index.php";

			});

		</script>';	

	exit;

?>

