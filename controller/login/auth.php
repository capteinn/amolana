<head>
	<link href="../../resource/css/sweetalert.css" rel="stylesheet">
	<link href="../../resource/css/theme/twitter.css" rel="stylesheet">
</head>

<body>
   <script src="../../resource/js/main/jquery.min.js"></script>
   <script src="../../resource/js/main/sweetalert.min.js"></script>
</body>

<?php
//error_reporting(0);
include_once "../../config.php";
include '../../equipment.php';

if (isset($_POST["masok"])) {

$username1 = secure_val(secure_html(addslashes($_POST['username'])));
$password1 = secure_val(secure_html(addslashes(sha1($_POST['password']))));

$username = mysqli_escape_string($link,$username1);
$password = mysqli_escape_string($link,$password1);

//query tabel user dan usergroup 
$login = mysqli_query($link,"SELECT * from users where username='$username' and password='$password'");
$cek_login=mysqli_fetch_array($login);

//print_r($cek_login);
//exit;


	//cek login username jika username tidak ada maka tidak bisa login
	if($username == $cek_login['username']){
	session_start();

		//cek masukan captcha saat login 
		if(isset($_POST["captcha"])&&$_POST["captcha"]!=""&&$_SESSION["code"]==$_POST["captcha"])
			{
				$timeout 			  	 	= 10; // Set timeout menit
				$_SESSION['id'] 	  	 	= $cek_login['id'];
				$_SESSION['username']  		= $cek_login['username'];
				$_SESSION['password']  		= $cek_login['password'];
				$_SESSION['name'] 	  	 	= $cek_login['name'];
				$_SESSION['nama']     	 	= $cek_login['nama'];
				$_SESSION['jabatan']     	= $cek_login['jabatan'];
				$_SESSION['created_at']     = $cek_login['created_at'];
				$_SESSION['usergroup']     = $cek_login['usergroup'];
				$_SESSION['status']   	 	= "login";
				$nama1 = $_SESSION['name']; 

			if ($cek_login[usergroup] == 1) {	

				echo '<script>
						swal({title: "Success",text: "Berhasil Login!",type: "success"}, 
						function() {window.location = "../../view/main/";
						});
					</script>';	

			}elseif ($cek_login[usergroup] == 2) {
				echo '<script>
						swal({title: "Success",text: "Berhasil Login Client!",type: "success"}, 
						function() {window.location = "../../front/index_login.php";
						});
					</script>';	
			}else{
				echo "tidak ada usergroup";
				die;
			}

			exit;
			}else{

			 echo '<script>
						swal({title: "Error",text: "Captcha Salah!",type: "error"}, 
						function() {window.location = "../../front/login.php";
						});
					</script>';
			die;
			}

		}else{

		 

		 echo '<script>
					swal({title: "Error",text: "Username Atau Password Salah!",type: "error"}, 
					function() {window.location = "../../front/login.php";
					});
				</script>';
			}

}else{
	echo "error123";
}


?>
