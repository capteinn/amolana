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
$kode_entry_umum  = $_GET['kode'];
$id               = $_GET['id_eum'];
?>


<?php


if(isset($_FILES['files'])){
    $errors= array();
  foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
  
    $file_name = $_FILES['files']['name'][$key];
    $file_size =$_FILES['files']['size'][$key];
    $file_tmp =$_FILES['files']['tmp_name'][$key];
    $file_type=$_FILES['files']['type'][$key];  
    
    
        if($file_size > 80000000){
      $errors[]='File size must be less than 80 MB';
        }   
       $query = mysqli_query($link,"INSERT into galery_entry (kode_entry,file_name,file_size,file_type,created_at,updated_at) VALUES('$kode_entry_umum','$file_name','$file_size','$file_type','$tanggal',''); ");

        $desired_dir="../../images/galeri/$kode_entry_umum/";
        if(empty($errors)==true){
            if(is_dir($desired_dir)==false){
                mkdir("$desired_dir", 0777, true);    // Create directory if it does not exist
            }
            if(is_dir("$desired_dir/".$file_name)==false){
                move_uploaded_file($file_tmp,"$desired_dir/".$file_name);
            }else{                  // rename the file if another one exist
                $new_dir="$desired_dir/".$file_name.time();
                 rename($file_tmp,$new_dir) ;       
            }
        
        }else{
                print_r($errors);
        }
    }
  if(empty($error)){
    echo '<script>
            swal({title: "Success",text: "Data Berhasil Ditambah dan di Upload!",type: "success"}, 
            function() {window.location = "../../view/index.php?link=entry_umum/galeri.php&kode='.md5(sha1($kode_entry_umum)).'";
            });
          </script>';     
      }else{
        echo '<script>
            swal({title: "Error",text: "Data Gagal Ditambah!",type: "error"}, 
            function() {window.location = "../../view/index.php?link=entry_umum/galeri.php&kode='.md5(sha1($kode_entry_umum)).'";
            });
          </script>'; 
      }
}


    #---query untuk menentukan size dari database setup size -----#
    $queri_size = mysqli_query($link, "SELECT * FROM setup_size where kode='002'");
    $cek_size   = mysqli_fetch_array($queri_size);
    $size_foto  = $cek_size['size_foto'];
    $size_video = $cek_size['size_video'];
    #---query untuk menentukan size dari database setup size-----#
/*
        if ($query1) {

            $aktifitas = 'Berhasil Tambah Data Galeri '.$kode_entry_umum.'/'.$file_name;

            $logging = mysqli_query($link, "INSERT INTO logging (nama_user, tanggal, ip, aktifitas, hostname) VALUES ('$nama', '$tanggal', '$ip', '$aktifitas','$hostname')")or die(mysqli_error());
            
            echo ".";
            
            echo '<script>
                    swal({title: "Success",text: "Data Berhasil Ditambah!",type: "success"}, 
                    function() {window.location = "../../view/index.php?link=entry_umum/galeri.php&kode='.md5(sha1($kode_entry_umum)).'";
                    });
                  </script>';
         }else{

            $aktifitas = 'Gagal Tambah Data Galeri '.$kode_entry_umum.'/'.$file_name;

            $logging = mysqli_query($link, "INSERT INTO logging (nama_user, tanggal, ip, aktifitas, hostname) VALUES ('$nama', '$tanggal', '$ip', '$aktifitas','$hostname')")or die(mysqli_error());
            
            echo ".";

            echo '<script>
                    swal({title: "Error",text: "Gagal Menyimpan Data!",type: "error"}, 
                    function() {window.location = "../../view/index.php?link=entry_umum/galeri.php&kode='.md5(sha1($kode_entry_umum)).'";
                    });
                  </script>';

         }
         */

 
}else{
  echo "<script>alert('Anda tidak memiliki hak akses!!'); window.location='../../index.php'</script>";
}
?>  