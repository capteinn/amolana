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

if(isset($_GET['id_gaji'])){

  $id_gaji = $_GET['id_gaji'];

  $jumlah_pesanan   =  $_POST['jumlah_pesanan'];
  $total_jam        =  $_POST['total_jam'];
  $tip              =  $_POST['tip'];
  $ketidakhadiran   =  $_POST['ketidakhadiran'];
  $potongan_lainya  =  $_POST['potongan_lainya'];
  $gaji_pokok       =  $_POST['gaji_pokok'];
  $tunjangan      =  $_POST['tunjangan'];
  $keterangan     =  $_POST['keterangan'];
  
  if ($ketidakhadiran == '0') {
    $a = $gaji_pokok; 
  }elseif($ketidakhadiran == '1'){
    $a = $gaji_pokok;
  }elseif ($ketidakhadiran == '2') {
    $a = $gaji_pokok / 2;
  }elseif ($ketidakhadiran == '3') {
    $a = $gaji_pokok - $gaji_pokok;
  }else{
    echo "error";
    die;
  }

  //perhitungan
  $b = $a + $tunjangan + $tip;

  $final = $b - $potongan_lainya;

  //query edit database
  $query = "UPDATE gaji 
  SET absen = '$ketidakhadiran',
  potongan_lainya = '$potongan_lainya',
  tunjangan = '$tunjangan',
  keterangan = '$keterangan',
  total = '$final'

  WHERE
    id_gaji = '$id_gaji'";

  $gaji = mysqli_query($link, $query);

          if ($gaji) {

            echo ".";

            echo '<script>
                    swal({title: "Success",text: "Gaji Telah Diubah!",type: "success"}, 
                    function() {window.location = "../../view/gaji/";
                    });
                  </script>';

         }else{


            echo '<script>
                    swal({title: "Error",text: "Gagal Mengubah Gaji!",type: "error"}, 
                    function() {window.location = "../../view/gaji/";
                    });
                  </script>';

          }
}
}else{
  echo "<script>alert('Anda tidak memiliki hak akses!!'); window.location='../../index.php'</script>";
}
?>  