<?php
error_reporting(0); session_start();
if ($_SESSION['status'] == 'login' and $_SESSION['username'] <> "") {
include '../../config.php';
include '../../equipment.php';

$id_pesanan = $_GET['id_pesanan'];

$cek_pesanan = mysqli_query($link, "SELECT * from pesan where id_pesanan = '$id_pesanan'");
$hasil_cek = mysqli_fetch_array($cek_pesanan);

function terapis($id_terapis){
  global $link;
  $cek_terapis = mysqli_query($link, "SELECT * from terapis where id_terapis = '$id_terapis'");
  $hasil_cek = mysqli_fetch_array($cek_terapis);
  $a = $hasil_cek['nama_terapis'];
  return $a;
}
?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Amolana</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body onload="//window.print();">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-globe"></i> Amolana Terapis
          <small class="pull-right"><?= tanggal_indo($tanggal2) ?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        Admin
        <address>
          <strong>Admin, Amolana.</strong><br>
          Komplek Lumbung Rezeki, Jl. Teuku Umar No.7, Lubuk Baja Kota, Kec. Lubuk Baja, Kota Batam, Kepulauan Riau 29444<br><br>
          <strong>No. Telp : (0778) 452940</strong><br>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        Pemesan
        <address>
          <strong><?= $hasil_cek['nama_pemesan']; ?></strong><br>
          <?= $hasil_cek['alamat'] ?><br>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b>Struk</b><br>
        <br>
        <b>Kode Pesanan</b> <?= $hasil_cek['kode_pesanan'] ?><br>
        <b>Pembayaran:</b> <?= tanggal_indo($tanggal2) ?><br>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>Kode Pesanan</th>
            <th>Nama Terapis</th>
            <th>Nama Pemesan</th>
            <th>Price</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td><?= $hasil_cek['kode_pesanan']; ?></td>
            <td><?= terapis($hasil_cek['id_terapis']); ?></td>
            <td><?= $hasil_cek['nama_pemesan'] ?></td>
            <td><?= rupiah($hasil_cek['price']) ?></td>
          </tr>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <div class="row">
      <!-- accepted payments column -->
    
       <div class="col-xs-6">
        <p class="lead"><?= tanggal_indo($tanggal2) ?></p>

        <div class="table-responsive">
          <table class="table">
            <?php
            $count = -2;
            $selek_data = mysqli_query($link, "select id_durasi,durasi from durasi where kode_pesanan = '$hasil_cek[kode_pesanan]'");
            while($data = mysqli_fetch_array($selek_data)){ 
            ?>
            

            <tr>
              <th style="width:50%">Durasi:</th>
              <td><?= $data['durasi'] ?></td>
            </tr>

            <?php  }   ?>
            
          </table>
        </div>
      </div>
      <div class="col-xs-6">
        
        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Total Perjam:</th>
              <td><?= rupiah(60000) ?></td>
            </tr>
            <tr>
              <th>Total:</th>
              <td><?= rupiah($hasil_cek['price']) ?></td>
            </tr>
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->


<?php

}else{
  echo "<script>alert('Anda tidak memiliki hak akses!!'); window.location='../../index.php'</script>";
}
?>
