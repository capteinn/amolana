<?php
error_reporting(0); session_start();
if ($_SESSION['status'] == 'login' and $_SESSION['username'] <> "") {
include "../header.php";
include '../../equipment.php';
$kondisi = array( '14500' => 14.5,
                  '14000' => 14,
                  '13500' => 13.5,
                  '13000' => 13,
                  '12500' => 12.5,
                  '12000' => 12,
                  '11500' => 11.5,
                  '11000' => 11,
                  '10500' => 10.5,
                  '10000' => 10,
                  '9500'  => 9.5,
                  '9000' => 9,
                  '8500' => 8.5,
                  '8000' => 8,
                  '7500' => 7.5,
                  '7000' => 7,
                  '6500' => 6.5,
                  '6000' => 6,
                  '5500' => 5.5,
                  '5000' => 5,
                  '4500' => 4.5,
                  '4000' => 4,
                  '3500' => 3.5,
                  '3000' => 3,
                  '2500' => 2.5,
                  '2000' => 2,
                  '1500' => 1.5,
                  '1000' => 1);

?>
<head>
  <link href="../../resource/css/sweetalert.css" rel="stylesheet">
  <link href="../../resource/css/theme/twitter.css" rel="stylesheet">
  <script src="../../resource/js/main/jquery.min.js"></script>
  <script src="../../resource/js/main/sweetalert.min.js"></script>
</head>

<!-- agar tipe nomor sebagai inputan-->
<script type="text/javascript">
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
</script>


<div class="content-wrapper">
<section class="content-header">
      <h1>
        Gaji Terapis
        <small>Amolana</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../main"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Tambah Gaji</li>
      </ol>
</section>

<section class="content">
  <div class="box">
    <div class="box box-danger">
      <div class="box-header with-border">
        <form action="#" method="POST">
        <span class="glyphicon glyphicon-calendar"></span>

        <input type="text" autocomplete="off" id="reservation" name="time_range" required 
               style="box-shadow:0px 0px 2px 2px #CCCCCC; border:0; border-radius:5px; height:27px; padding-left:18px; margin-top:5px;">&emsp;

        <span class="glyphicon glyphicon-usd"></span>
        <select name="id_terapis" required="" style="box-shadow:0px 0px 2px 2px #CCCCCC; border:0; border-radius:5px; height:27px; padding-left:11px; margin-top:5px;">
                <option value="<?= $hasil[id_terapis] ?>">Pilih Terapis</option>
                    <?php
                    $query = mysqli_query($link, "SELECT * FROM terapis");
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                        <option value="<?php echo $row['id_terapis']; ?>">
                            <?php echo $row['nama_terapis']; ?>
                        </option>
                    <?php
                    }
                    ?>
          </select>&emsp;
           <button type="submit" name="tambah_gaji" class="btn btn-success btn-sm"><span class="fa fa-search">Cari Data</span></button>
           
        </form>
      </div>

<?php

if ($_POST['id_terapis'] != NULL) { 

  $time_range   =  $_POST['time_range'];

  $id_terapis   =  $_POST['id_terapis'];

  function terapis($id_terapis){
    global $link;
    $cek_terapis = mysqli_query($link, "SELECT * from terapis where id_terapis = '$id_terapis'");
    $hasil_cek = mysqli_fetch_array($cek_terapis);
    $a = $hasil_cek['nama_terapis'];
    return $a;
  }
  
  //memisahkan tanggal daterange
  $start = substr($time_range,0,-13);
  $end = substr($time_range,13);

  //mengubah format tanggal untuk inputan database
  $date = date_create_from_format('m/d/Y', $start);
  $hasil_start = date_format($date, 'Y-m-d');

  $date2 = date_create_from_format('m/d/Y', $end);
  $hasil_end = date_format($date2, 'Y-m-d');


  $tanggal1 = new DateTime($hasil_start);
  $tanggal2 = new DateTime($hasil_end);
   
  $perbedaan = $tanggal2->diff($tanggal1)->format("%a");
   
  $cek_tanggal = $perbedaan + 1;
  
      //menghitung jumlah total price berdasarkan range tanggal
      $cek_pesan = mysqli_query($link, "SELECT SUM(price) AS total_pendapatan FROM pesan WHERE id_terapis = '$id_terapis' && status_pesan = '1' AND (tanggal >= '$hasil_start' && tanggal <= '$hasil_end')");
      $hasil_cek_pesan = mysqli_fetch_array($cek_pesan);

      //kondisi
      if ($hasil_cek_pesan[total_pendapatan] == null) {
        $pendapatan_kotor = "-";
      }else{
        $pendapatan_kotor = $hasil_cek_pesan[total_pendapatan];
      }

      //menghitung jumlah pesanan berdasarkan range harga
      $cek_jumlah_pesanan = mysqli_query($link, "SELECT COUNT(kode_pesanan) AS jumlah_pesanan from pesan where id_terapis = '$id_terapis' AND status_pesan = '1' AND (tanggal >= '$hasil_start' && tanggal <= '$hasil_end')");
      $h_jumlah_pesanan = mysqli_fetch_array($cek_jumlah_pesanan);

      //kondisi
      if ($h_jumlah_pesanan[jumlah_pesanan] == 0) {
        $jumlah_pesanan = "-";
      }else{
        $jumlah_pesanan = $h_jumlah_pesanan[jumlah_pesanan];
      }

      //mencari total jam dari jumlah pendapatan total price
      $jam_pesanan = $pendapatan_kotor / 30 / 2; 
      //total jam di kondisikan berdasarkan array di atas
      $total_jam = $kondisi[$jam_pesanan];

      if (($total_jam == 0) || ($total_jam == null)) {
        $total_jam = "-";
      }else{
        $total_jam = $total_jam;
      }

      //hasil tip untuk terapis
      $tip =  $total_jam * 10000;
      if (($tip == 0) || $tip == null) {
        $tip = "-";
      }else{
        $tip = $tip;
      }

  //mencari gaji perharinya
  $gaji_pokok = 900000 / 30;

  //setelah dapat gaji perhari lalu dikalikan jumlah tanggal yang dipilih berdasarkan range tanggal
  $cek_gaji_pokok = $gaji_pokok * $cek_tanggal;

  //cek kondisi, jika tanggal di atas 30 hari maka gagal menampilkan data-data gaji terapis
  if ($cek_tanggal <= 30) { ?>

      <form action="../../controller/gaji/tambah.php?id_terapis=<?= $id_terapis ?>" method="POST">
          <div class="box-body">
            <label for="">PERIODE = <font color="blue"><?= tanggal_indo($hasil_start) ?></label> - <label for=""><?= tanggal_indo($hasil_end) ?></font></label> | <label><?= $cek_tanggal ?> Hari</label> | <label> Nama Terapis : <?= terapis($id_terapis) ?></label>
           <div class="row">

              <input type="hidden" name="tanggal_awal" value="<?= $hasil_start ?>" >
              <input type="hidden" name="tanggal_akhir" value="<?= $hasil_end ?>" >
              <div class="col-xs-6">
                <div class="form-group">
                  <label for="">Pendapatan Semua Pesanan</label>
                  <input type="text" class="form-control" name="pendapatan_kotor" value="<?= $pendapatan_kotor ?>" readonly required="">
                </div>
              </div>

              <div class="col-xs-6">
                <div class="form-group">
                  <label for="">Jumlah Pesanan</label>
                  <input type="text" class="form-control" name="jumlah_pesanan" value="<?= $jumlah_pesanan ?>" readonly required="">
                </div>
              </div>

              <div class="col-xs-6">
                <div class="form-group">
                  <label for="">Total Jam</label>
                  <input type="text" class="form-control" name="total_jam" value="<?= $total_jam ?>" readonly required="">
                </div>
              </div>
       
              <div class="col-xs-6">
                <div class="form-group">
                  <label for="">TIP Terapis</label>
                  <input type="text" class="form-control" name="tip" value="<?= $tip ?>" required autocomplete="off" readonly/>
                </div>
              </div>

              <div class="col-xs-6">
                <div class="form-group">
                  <label for="">Ketidakhadiran Tanpa Keterangan <font color="red">*</font></label>
                  <select class="form-control" name="ketidakhadiran" required>
                    <option value="">Pilih Jumlah Hari</option>
                    <option value="0">Selalu Hadir</option>
                    <option value="1">1 Hari</option>
                    <option value="2">2 Hari</option>
                    <option value="3">3 Hari</option>
                  </select>
                </div>
              </div>

              <div class="col-xs-6">
                <div class="form-group">
                  <label for="">Potongan Lainnya <font color="red">*</font></label>
                  <input type="text" class="form-control" name="potongan_lainya" placeholder="50000" required autocomplete="off" onkeypress="return isNumber(event)" />
                </div>
              </div>

               <div class="col-xs-6">
                <div class="form-group">
                  <label for="">Set Gaji Pokok</label>
                  <input type="text" class="form-control" name="gaji_pokok" value="<?= $cek_gaji_pokok ?>" readonly required="">
                </div>
              </div>

               <div class="col-xs-6">
                <div class="form-group">
                  <label for="tunjangan">Tunjangan <font color="red">*</font></label>
                  <input type="text" class="form-control" id="extra7" name="tunjangan" placeholder="100000" onkeypress="return isNumber(event)" required="" autocomplete="off" />
                </div>
              </div>

              <div class="col-xs-6">
                <div class="form-group">
                  <label for="">Keterangan</label>
                  <textarea class="form-control" name="keterangan">Keterangan Tunjangan, potongan Dll</textarea>
                </div>
              </div>
            </div>
            <button type="submit" name="tambah_gaji" class="btn btn-primary">Tambah Data</button>
            <br><br>
            <b><font style="float: left">Tanda <font color="red">*</font> Wajib di Isi</font></b>
          </div>
          <!-- /.box-body -->
        </form>

  <?php } else {

   echo '<script>
          swal({title: "Error",text: "Tanggal Yang Di Pilih Melebihi 30 Hari!",type: "error"}, 
          function() {window.location = "../../view/gaji/tambah.php";
          });
        </script>';

} ?>

<?php } else {

  echo "<h3><center>PILIH NAMA TERAPIS DAN TANGGAL TERLEBIH DAHULU</center></h3>";
  echo "<br>";

} ?>

    </div>
    <!-- /.box -->
  </div>
</section>
</div>


<?php include "../footer.php";?> 


<!--disable button setelah menekan submit-->
<script type="text/javascript">
  $('form').submit(function() {
  $(this).find("button[type='submit']").prop('disabled',true);
});
</script>


<!-- Page script -->
<script>
  $(function () {
    //Date range picker
    $('#reservation').daterangepicker()
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })
  })
</script>

<?php

}else{
  echo "<script>alert('Anda tidak memiliki hak akses!!'); window.location='../../index.php'</script>";
}
?>