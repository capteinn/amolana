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


if(isset($_POST['tambah_pesan'])){ 

$status = "0";

if(!empty($_POST['check_list'])){

$count = -1;
// Loop to store and display values of individual checked checkbox.
foreach($_POST['check_list'] as $selected){
    $kode_pesanan = $_POST['kode_pesanan'];
    $id_terapis   = $_POST['id_terapis'];
    $count = $count + 1;
    
    $query = mysqli_query($link,"INSERT INTO durasi ( kode_pesanan, id_terapis, durasi, status_durasi, tanggal )
    VALUES
      ( '$kode_pesanan', '$id_terapis', '$selected','$status', '$tanggal2')");

    if ($query) {
     
    }else{
      echo "error1";
      die;
    }

    }

  }

$nama_pelanggan   = $_POST['nama_pelanggan'];
$alamat_pelanggan   = $_POST['alamat_pelanggan'];
$price   = $count * 30000;

$comment_status = "0";

$query = mysqli_query($link,"INSERT INTO pesan ( id_terapis, kode_pesanan, nama_pemesan, price, alamat, status_pesan, tanggal, comment_status)
    VALUES
      ( '$id_terapis', '$kode_pesanan', '$nama_pelanggan', '$price', '$alamat_pelanggan', '$status','$tanggal2','$comment_status')");

    if ($query) {
      echo ".";
      echo '<script>
              swal({title: "Success",text: "Berhasil Dipesan!",type: "success"}, 
              function() {window.location = "../../view/pemesanan/";
              });
            </script>';

   }else{
      echo ".";
      echo '<script>
              swal({title: "Error",text: "Gagal!",type: "error"}, 
              function() {window.location = "../../view/pemesanan/";
              });
            </script>';

    }
  }

}else{
  echo "<script>alert('Anda tidak memiliki hak akses!!'); window.location='../../index.php'</script>";
}
?>  