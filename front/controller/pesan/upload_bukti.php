<?php
error_reporting(0); 
session_start();
if ($_SESSION['status'] == 'login' and $_SESSION['username'] <> "") {
$nama = $_SESSION['name'];
include '../../../config.php';
include '../../../equipment.php';
?>
<head>
  <link href="../../../resource/css/sweetalert.css" rel="stylesheet">
  <link href="../../../resource/css/theme/twitter.css" rel="stylesheet">
  <script src="../../../resource/js/main/jquery.min.js"></script>
  <script src="../../../resource/js/main/sweetalert.min.js"></script>
</head>

<?php

if(isset($_FILES['files'])){

  echo ".";
  $kode_pesanan = $_POST['kode_pesanan'];
  $file_name   =  $_FILES['files']['name'];
  $file_size   =  $_FILES['files']['size'];
  $file_tmp    =  $_FILES['files']['tmp_name'];
  $file_type   =  $_FILES['files']['type']; 

    
       $desired_dir_video="../../../images_transfer/$kode_pesanan";

          if(empty($errors)==true){
              if(is_dir($desired_dir_video)==false){
                  mkdir("$desired_dir_video", 0777, true);    // Create directory if it does not exist
              }
              if(is_dir("$desired_dir_video/".$file_name)==false){

                   if (file_exists($desired_dir_video.'/'.$file_name)) {

                    echo '<script>
                        swal({title: "Error",text: "File Sudah Ada!",type: "error"}, 
                        function() {window.location = "../../upload.php";
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



        $query = mysqli_query($link,"INSERT INTO foto_transfer ( kode_pesanan_foto, file_name, file_size)
          VALUES
            ( '$kode_pesanan', '$file_name', '$file_size')");

        $querya = "UPDATE pesan 
        SET status_transfer = '1' 
        WHERE
          kode_pesanan = '$kode_pesanan'";

          $pesanan = mysqli_query($link, $querya);
       
          if ($query && $pesanan) {

             echo ".";
          
            echo '<script>
                    swal({title: "Success",text: "Data Berhasil Ditambah!",type: "success"}, 
                    function() {window.location = "../../upload.php";
                    });
                  </script>';

         }else{

          echo ".";

            echo '<script>
                    swal({title: "Error",text: "Gagal Menyimpan Data!",type: "error"}, 
                    function() {window.location = "../../upload.php";
                    });
                  </script>';

          }
}
}else{
  echo "<script>alert('Anda tidak memiliki hak akses!!'); window.location='../../index_login.php'</script>";
}
?>  