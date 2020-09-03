<?php
error_reporting(0); session_start();
if ($_SESSION['status'] == 'login' and $_SESSION['username'] <> "") {
include "../header.php";
include '../../equipment.php';

$id_gaji = $_GET['id_gaji'];

$cek_gaji = mysqli_query($link, "SELECT * from gaji where id_gaji = '$id_gaji'");
$hasil_cek_gaji = mysqli_fetch_array($cek_gaji);


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
        Edit Gaji Terapis
        <small>Amolana</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../main"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Edit Gaji</li>
      </ol>
</section>

<section class="content">
  <div class="box">
    <div class="box box-danger">
      
<?php

  function terapis($id_terapis){
    global $link;
    $cek_terapis = mysqli_query($link, "SELECT * from terapis where id_terapis = '$id_terapis'");
    $hasil_cek = mysqli_fetch_array($cek_terapis);
    $a = $hasil_cek['nama_terapis'];
    return $a;
  }


  ?>
  <form action="../../controller/gaji/edit.php?id_gaji=<?= $id_gaji ?>" method="POST">
      <div class="box-body">
        <label for="">PERIODE = <font color="blue"><label><?= tanggal_indo($hasil_cek_gaji[tanggal_awal]) ?></label> - <label for=""><?= tanggal_indo($hasil_cek_gaji[tanggal_akhir]) ?></font></label>|<label> Nama Terapis : <?= terapis($hasil_cek_gaji[id_terapis]) ?></label>
       <div class="row">

          <input type="hidden" name="tanggal_awal" value="<?= $hasil_start ?>" >
          <input type="hidden" name="tanggal_akhir" value="<?= $hasil_end ?>" >
          <div class="col-xs-6">
            <div class="form-group">
              <label for="">Pendapatan Semua Pesanan</label>
              <input type="text" class="form-control" name="pendapatan_kotor" value="<?= $hasil_cek_gaji[pendapatan_pesanan] ?>" readonly required="">
            </div>
          </div>

          <div class="col-xs-6">
            <div class="form-group">
              <label for="">Jumlah Pesanan</label>
              <input type="text" class="form-control" name="jumlah_pesanan" value="<?= $hasil_cek_gaji[jumlah_pesanan] ?>" readonly required="">
            </div>
          </div>

          <div class="col-xs-6">
            <div class="form-group">
              <label for="">Total Jam</label>
              <input type="text" class="form-control" name="total_jam" value="<?= $hasil_cek_gaji[total_jam] ?>" readonly required="">
            </div>
          </div>
   
          <div class="col-xs-6">
            <div class="form-group">
              <label for="">TIP Terapis</label>
              <input type="text" class="form-control" name="tip" value="<?= $hasil_cek_gaji[tip] ?>" required autocomplete="off" readonly/>
            </div>
          </div>

          <div class="col-xs-6">
            <div class="form-group">
              <label for="">Ketidakhadiran Tanpa Keterangan <font color="red">*</font></label>
              <select class="form-control" name="ketidakhadiran" required>
                <option value="<?= $hasil_cek_gaji[absen] ?>"><?= $hasil_cek_gaji[absen] ?> Hari</option>
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
              <input type="text" class="form-control" name="potongan_lainya" value="<?= $hasil_cek_gaji[potongan_lainya]?>" required autocomplete="off" onkeypress="return isNumber(event)" />
            </div>
          </div>

           <div class="col-xs-6">
            <div class="form-group">
              <label for="">Set Gaji Pokok</label>
              <input type="text" class="form-control" name="gaji_pokok" value="<?= $hasil_cek_gaji[gaji_pokok] ?>" readonly required="">
            </div>
          </div>

           <div class="col-xs-6">
            <div class="form-group">
              <label for="tunjangan">Tunjangan <font color="red">*</font></label>
              <input type="text" class="form-control" id="extra7" name="tunjangan" value="<?= $hasil_cek_gaji[tunjangan] ?>" onkeypress="return isNumber(event)" required="" autocomplete="off" />
            </div>
          </div>

          <div class="col-xs-6">
            <div class="form-group">
              <label for="">Keterangan</label>
              <textarea class="form-control" name="keterangan"><?= $hasil_cek_gaji[keterangan] ?></textarea>
            </div>
          </div>
        </div>
        <button type="submit" name="edit_gaji" class="btn btn-primary">Ubah Data</button>
        <br><br>
      </div>
      <!-- /.box-body -->
    </form>

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