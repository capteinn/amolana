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

if(isset($_GET['id_terapis'])){
  $id_terapis       = $_GET['id_terapis'];
  $pendapatan_kotor =  $_POST['pendapatan_kotor'];
  $jumlah_pesanan   =  $_POST['jumlah_pesanan'];
  $total_jam        =  $_POST['total_jam'];
  $tip              =  $_POST['tip'];
  $ketidakhadiran   =  $_POST['ketidakhadiran'];
  $potongan_lainya  =  $_POST['potongan_lainya'];
  $gaji_pokok       =  $_POST['gaji_pokok'];
  $tunjangan      =  $_POST['tunjangan'];
  $keterangan     =  $_POST['keterangan'];

  $tanggal_awal     =  $_POST['tanggal_awal'];
  $tanggal_akhir    =  $_POST['tanggal_akhir'];



  if ($ketidakhadiran == 0) {
    $a = $gaji_pokok; 
  }elseif($ketidakhadiran == 1){
    $a = $gaji_pokok;
  }elseif ($ketidakhadiran == 2) {
    $a = $gaji_pokok / 2;
  }elseif ($ketidakhadiran == 3) {
    $a = $gaji_pokok - $gaji_pokok;
  }else{
    echo "error";
    die;
  }
  

  //perhitungan
  $b = $a + $tunjangan + $tip;

  $final = $b - $potongan_lainya;

  $query = mysqli_query($link,"INSERT INTO gaji (
                                id_terapis,
                                tunjangan,
                                potongan_lainya,
                                tanggal_awal,
                                tanggal_akhir,
                                pendapatan_pesanan,
                                jumlah_pesanan,
                                total_jam,
                                tip,
                                absen,
                                gaji_pokok,
                                total,
                                keterangan,
                                tanggal_input
                              )
                              VALUES
                                (
                                  '$id_terapis',
                                  '$tunjangan',
                                  '$potongan_lainya',
                                  '$tanggal_awal',
                                  '$tanggal_akhir',
                                  '$pendapatan_kotor',
                                  '$jumlah_pesanan',
                                  '$total_jam',
                                  '$tip',
                                  '$ketidakhadiran',
                                  '$gaji_pokok',
                                  '$final',
                                  '$keterangan',
                                  '$tanggal2'
                                )");

          if ($query) {

            echo ".";

            echo '<script>
                    swal({title: "Success",text: "Gaji Telah Ditambah!",type: "success"}, 
                    function() {window.location = "../../view/gaji/";
                    });
                  </script>';

         }else{


            echo '<script>
                    swal({title: "Error",text: "Gagal Menambah Gaji!",type: "error"}, 
                    function() {window.location = "../../view/gaji/";
                    });
                  </script>';

          }
}
}else{
  echo "<script>alert('Anda tidak memiliki hak akses!!'); window.location='../../index.php'</script>";
}
?>  