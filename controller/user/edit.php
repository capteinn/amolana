<?php

error_reporting(0);

session_start();

if ($_SESSION['status'] == 'login' and $_SESSION['username'] <> "") {

?>



<?php $nama = $_SESSION['name']; ?>



<head>

	<link href="../../resource/css/sweetalert.css" rel="stylesheet">

	<link href="../../resource/css/theme/twitter.css" rel="stylesheet">

</head>



<body>

   <script src="../../resource/js/main/jquery.min.js"></script>

   <script src="../../resource/js/main/sweetalert.min.js"></script>

</body>



<?php

include '../../config.php';

include '../../equipment.php';

?>

<?php

$username = $_GET['username'];

$update = date('Y-m-d H:i:s');



if(isset($_POST['update_data'])){

$name		= secure_val(secure_html(addslashes($_POST['_name'])));

$username1 	= secure_val(secure_html(addslashes($_POST['_username'])));

$jabatan	= secure_val(secure_html(addslashes($_POST['_jabatan'])));

$alamat	= secure_val(secure_html(addslashes($_POST['_alamat'])));

$no_telp	= secure_val(secure_html(addslashes($_POST['_no_telp'])));


$cek_sama 	= mysqli_query($link, "SELECT * FROM users WHERE md5(username) = '$username'");

$cek_row 	= mysqli_fetch_array($cek_sama);



$sama = $cek_row['username'];



if ($sama == $username1) {

	

}else{



	$cek_user=mysqli_num_rows(mysqli_query($link,"SELECT * FROM users WHERE username ='$username1'"));

	if ($cek_user > 0) {

	      echo '<script>

	              swal({title: "Error",text: "Username Sudah Di Pakai!",type: "error"}, 

	              function() {window.location = "../../view/user/edit.php?username='.$username.'";

	              });

	            </script>';

	            die;

	}



}





//query update dari tabel user 

$query = "UPDATE users SET name='$name', alamat = '$alamat', no_telp = '$no_telp', username='$username1',

		  jabatan='$jabatan', updated_at='$update' WHERE md5(username)='$username'";



$user = mysqli_query($link, $query);





if($user) {	

	echo ".";

	echo '<script>

				swal({title: "Success",text: "Berhasil Update!",type: "success"}, 

				function() {window.location = "../../view/user/index.php";

				});

			</script>';	



	} else {
	 	echo ".";

		echo '<script>

					swal({title: "Error",text: "Gagal Update!",type: "error"}, 

					function() {window.location = "../../view/user/index.php";

					});

				</script>';

				die;

	}

} 

?>

<?php

}else{

  echo "<script>alert('Anda tidak memiliki hak akses!!'); window.location='../../index.php'</script>";

}

?>