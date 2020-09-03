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


if(isset($_POST['edit_pesanan'])){

$status = "0";
$kode_pesanan = $_POST['kode_pesanan'];
$id_terapis   = $_POST['id_terapis'];
if(!empty($_POST['check_list'])){


mysqli_query($link, "DELETE FROM durasi WHERE kode_pesanan = '$kode_pesanan' ");
$count = -1;
// Loop to store and display values of individual checked checkbox.
foreach($_POST['check_list'] as $selected){
    $count = $count + 1;
    $query = mysqli_query($link,"INSERT INTO durasi ( kode_pesanan, id_terapis, durasi,status_durasi, tanggal )
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


$query = "UPDATE pesan 
SET nama_pemesan = '$nama_pelanggan',
alamat = '$alamat_pelanggan',
price = '$price' 
WHERE
  kode_pesanan = '$kode_pesanan'";
  
  $pesan = mysqli_query($link, $query);

    if ($pesan) {
      echo ".";
      echo '<script>
              swal({title: "Success",text: "Berhasil Mengubah!",type: "success"}, 
              function() {window.location = "../../view/pemesanan/";
              });
            </script>';

   }else{
      echo ".";
      echo '<script>
              swal({title: "Error",text: "Gagal Melakukan Pengubahan!",type: "error"}, 
              function() {window.location = "../../view/pemesanan/";
              });
            </script>';

    }
  }

//edit bagian ganti terapis dan waktu pemesanan

if(isset($_POST['edit_terapis'])){

$status = "0";
$kode_pesanan = $_POST['kode_pesanan'];
$id_terapis   = $_POST['id_terapis'];
if(!empty($_POST['check_list'])){


mysqli_query($link, "DELETE FROM durasi WHERE kode_pesanan = '$kode_pesanan' ");
$count = -1;
// Loop to store and display values of individual checked checkbox.
foreach($_POST['check_list'] as $selected){
    $count = $count + 1;
    $query = mysqli_query($link,"INSERT INTO durasi ( kode_pesanan, id_terapis, durasi,status_durasi )
    VALUES
      ( '$kode_pesanan', '$id_terapis', '$selected','$status')");

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


$query = "UPDATE pesan 
SET 
id_terapis = '$id_terapis',
nama_pemesan = '$nama_pelanggan',
alamat = '$alamat_pelanggan',
price = '$price' 
WHERE
  kode_pesanan = '$kode_pesanan'";
  
  $pesan = mysqli_query($link, $query);

    if ($pesan) {
      echo ".";
      echo '<script>
              swal({title: "Success",text: "Berhasil Mengubah!",type: "success"}, 
              function() {window.location = "../../view/pemesanan/";
              });
            </script>';

   }else{
      echo ".";
      echo '<script>
              swal({title: "Error",text: "Gagal Melakukan Pengubahan!",type: "error"}, 
              function() {window.location = "../../view/pemesanan/";
              });
            </script>';

    }
  }





}else{
  echo "<script>alert('Anda tidak memiliki hak akses!!'); window.location='../../index.php'</script>";
}
?>  