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
if(isset($_FILES['files'])){
    $nik          =  $_POST['_%nik'];
    $jenis_kelamin  =  $_POST['_%jenis_kelamin'];
    $agama        =  $_POST['_%agama'];
    $nama_terapis =  $_POST['_%nama_terapis'];
    $umur         =  $_POST['_%umur'];
    $no_telepon   =  $_POST['_%no_telepon'];
    $alamat       =  $_POST['_%alamat'];
    $provinsi     =  $_POST['_%provinsi'];
    $kabupaten    =  $_POST['_%kabupaten'];
    $tempat_lahir =  $_POST['_%tempat_lahir'];
    $tanggal_lahir=  $_POST['_%tanggal_lahir'];
    $kode_terapis =  $_POST['_%kode_terapis'];

    $file_name   =  $_FILES['files']['name'];
    $file_size   =  $_FILES['files']['size'];
    $file_tmp    =  $_FILES['files']['tmp_name'];
    $file_type   =  $_FILES['files']['type']; 


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

        $query = mysqli_query($link,"INSERT INTO terapis ( kode_terapis, nik, nama_terapis, umur, no_telepon, agama, jenis_kelamin, alamat,provinsi, kabupaten, tempat_lahir, tanggal_lahir, file_name, file_size, created_at )
          VALUES
            ( '$kode_terapis', '$nik', '$nama_terapis', '$umur', '$no_telepon', '$agama', '$jenis_kelamin','$alamat','$provinsi', '$kabupaten', '$tempat_lahir', '$tanggal_lahir', '$file_name', '$file_size','$tanggal' )");

          if ($query) {

            echo ".";

            echo '<script>
                    swal({title: "Success",text: "Data Berhasil Ditambah!",type: "success"}, 
                    function() {window.location = "../../view/terapis/";
                    });
                  </script>';

         }else{


            echo '<script>
                    swal({title: "Error",text: "Gagal Menyimpan Data!",type: "error"}, 
                    function() {window.location = "../../view/terapis/";
                    });
                  </script>';

          }
}
}else{
  echo "<script>alert('Anda tidak memiliki hak akses!!'); window.location='../../index.php'</script>";
}
?>  