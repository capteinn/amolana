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
if(isset($_GET["id_terapis"])){

	$id_terapis = $_GET['id_terapis']; 

	$nik          =  $_POST['nik'];
	$nama_terapis =  $_POST['nama_terapis'];
	$umur         =  $_POST['umur'];
	$no_telepon   =  $_POST['no_telepon'];
	$agama   			=  $_POST['agama'];
	$jenis_kelamin   	=  $_POST['jenis_kelamin'];
	$alamat   			=  $_POST['alamat'];
	$provinsi     =  $_POST['provinsi'];
	$kabupaten    =  $_POST['kabupaten'];
	$tempat_lahir =  $_POST['tempat_lahir'];
	$tanggal_lahir=  $_POST['tanggal_lahir'];

	$kode_terapis=  $_POST['kode_terapis'];


	//query edit database
	$query = "UPDATE terapis 
	SET nik = '$nik',
	nama_terapis = '$nama_terapis',
	umur = '$umur',
	no_telepon = '$no_telepon',
	agama = '$agama',
	jenis_kelamin = '$jenis_kelamin',
	alamat = '$alamat',
	provinsi = '$provinsi',
	kabupaten = '$kabupaten',
	tempat_lahir = '$tempat_lahir',
	tanggal_lahir = '$tanggal_lahir'

	WHERE
		md5( id_terapis ) = '$id_terapis'";
	$terapis = mysqli_query($link, $query);
	

	if ($terapis) {

		  echo ".";
	      echo '<script>
	        swal({title: "Success",text: "Berhasil Mengubah Data!",type: "success"}, 
	        function() {window.location = "../../view/terapis/";
	        });
	      </script>';

	  }else{
	    echo '<script>
	        swal({title: "Error",text: "Gagal!",type: "error"}, 
	        function() {window.location = "../../view/terapis/edit.php?_%id_terapis='.$id_terapis.'";
	        });
	      </script>';

	    }


		if ($_FILES['files']['name'] != null) {
				//file_name lama
			$file_lama   =  $_POST['file_lama'];
			//
			$file_name   =  $_FILES['files']['name'];
			$file_size   =  $_FILES['files']['size'];
			$file_tmp    =  $_FILES['files']['tmp_name'];
			$file_type   =  $_FILES['files']['type']; 

				//hapus file foto lama
			$foto="../../images/$kode_terapis/$file_lama";
			unlink($foto);

			$query = "UPDATE terapis 
			SET file_name = '$file_name',
			file_size = '$file_size'

			WHERE
				md5( id_terapis ) = '$id_terapis'";
			$terapis = mysqli_query($link, $query);

			echo ".";
			//upload file foto baru

			$desired_dir_video="../../images/$kode_terapis";

			if(empty($errors)==true){
			      if(is_dir($desired_dir_video)==false){
			          mkdir("$desired_dir_video", 0777, true);    // Create directory if it does not exist
			      }
			      if(is_dir("$desired_dir_video/".$file_name)==false){
			           if (file_exists($desired_dir_video.'/'.$file_name)) {
			            echo '<script>
			                swal({title: "Error",text: "File Sudah Ada!",type: "error"}, 
			                function() {window.location = "../../view/terapis/";
			                });
			              </script>';
			              die;
			          }
			          move_uploaded_file($file_tmp,"$desired_dir_video/".$file_name);
			      }else{                  // rename the file if another one exist
			          $new_dir="$desired_dir_video/".$file_name.time();
			           rename($file_tmp,$new_dir) ;       
			      }
			  }else{
			          print_r($errors);
			  }

		}

	}else {
		echo "Tidak Ada Data";
	}

}else{
  echo "<script>alert('Anda tidak memiliki hak akses!!'); window.location='../../index.php'</script>";
}
?>
