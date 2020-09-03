<?php
error_reporting(0); session_start();
if ($_SESSION['status'] == 'login' and $_SESSION['username'] <> "") {
include "../header.php";
include '../../equipment.php';

$id_terapis = $_GET['id_terapis'];

$cek_query = mysqli_query($link, "SELECT * FROM terapis where md5(id_terapis) = '$id_terapis'");
$hasil = mysqli_fetch_array($cek_query);

function provinsi($id){
  global $link;
  $cek = mysqli_query($link, "SELECT * from provinsi where id_prov = '$id'");
  $hasil_cek = mysqli_fetch_array($cek);
  $akhir_cek = $hasil_cek["nama"];
  return $akhir_cek;
}
function kabupaten($id){
  global $link;
  $cek = mysqli_query($link, "SELECT * from kabupaten where id_kab = '$id'");
  $hasil_cek = mysqli_fetch_array($cek);
  $akhir_cek = $hasil_cek["nama_kab"];
  return $akhir_cek;
}


?>

<div class="content-wrapper">
<section class="content-header">
      <h1>
        Terapis
        <small>Amolana</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../main"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Edit</li>
      </ol>
</section>

<section class="content">
  <div class="box">
    <div class="box box-danger">
      <div class="box-header with-border">
        <h3 class="box-title">Edit Terapis</h3>
      </div>

      <form action="../../controller/terapis/edit.php?id_terapis=<?= $id_terapis ?>" role="form" method="POST" enctype="multipart/form-data">
      <div class="box-body">
        <div class="row">
          <div class="col-xs-6">
            <div class="form-group">
              <label for="company">Kode Terapis</label>
              <input type="text" name="kode_terapis" class="form-control" value="<?= $hasil[kode_terapis] ?>" readonly>
            </div>
          </div>
          <div class="col-xs-6">
            <div class="form-group">
              <label for="">NIK</label>
              <input type="text" class="form-control" name="nik" value="<?= $hasil[nik] ?>" >
            </div>
          </div>
          <div class="col-xs-6">
            <div class="form-group">
              <label for="">Nama Terapis <font color="red">*</font></label>
              <input type="text" class="form-control" name="nama_terapis" value="<?= $hasil[nama_terapis] ?>" required>
            </div>
          </div>
          <div class="col-xs-6">
            <div class="form-group">
              <label for="">Umur</label>
              <input type="number" class="form-control" name="umur" value="<?= $hasil[umur] ?>" >
            </div>
          </div>
          <div class="col-xs-6">
            <div class="form-group">
              <label for="company">Nomor Telepon</label>
              <input type="text" class="form-control" id="extra7" name="no_telepon" value="<?= $hasil[no_telepon] ?>" onkeypress="return isNumber(event)" />
            </div>
          </div>
          <div class="col-xs-6">
            <div class="form-group">
              <label for="">Agama <font color="red">*</font></label>
              <select name="agama" class="form-control" required="">
                <option value="<?= $hasil[agama] ?>"><?= $hasil[agama] ?></option>
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Hindu">Hindu</option>
                <option value="Budha">Budha</option>
                <option value="Konghucu">Konghucu</option>
              </select>
            </div>
          </div>
          <div class="col-xs-6">
            <div class="form-group">
              <label for="">Jenis Kelamin <font color="red">*</font></label>
              <select name="jenis_kelamin" class="form-control" required="">
                <option value="<?= $hasil[jenis_kelamin] ?>"><?= $hasil[jenis_kelamin] ?></option>
                <option value="Pria">Pria</option>
                <option value="Wanita">Wanita</option>
              </select>
            </div>
          </div>
          <div class="col-xs-6">
            <div class="form-group">
              <label for="">Alamat <font color="red">*</font></label>
              <input type="text" name="alamat" value="<?= $hasil[alamat] ?>" class="form-control" required=""/>
            </div>
          </div>
          <div class="col-xs-6">
            <div class="form-group">
              <label for="kabupaten">provinsi</label>
                  <select name="provinsi" id="provinsi" class="form-control">
                        <option value="<?= $hasil[provinsi] ?>"><?= provinsi($hasil[provinsi]) ?></option>
                            <?php
                            $query = mysqli_query($link, "SELECT * FROM provinsi ORDER BY nama");
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                                <option value="<?php echo $row['id_prov']; ?>">
                                    <?php echo $row['nama']; ?>
                                </option>
                            <?php
                            }
                            ?>
                  </select>
            </div>
          </div>
          <div class="col-xs-6">
            <div class="form-group">
              <label for="kabupaten">kabupaten</label>
                  <select id="kabupaten" name="kabupaten" class="form-control">
                      <option value="<?= $hasil[kabupaten] ?>"><?= kabupaten($hasil[kabupaten]) ?></option>
                      <?php
                      $query = mysqli_query($link, "SELECT
                                  * 
                              FROM
                                  kabupaten
                                  INNER JOIN provinsi ON kabupaten.id_prov = provinsi.id_prov 
                              ORDER BY
                                  nama_kab");
                      while ($row = mysqli_fetch_array($query)) {
                      ?>
                          <option id="kota" class="<?php echo $row['id_prov']; ?>" value="<?php echo $row['id_kab']; ?>">
                              <?php echo $row['nama_kab']; ?>
                          </option>
                      <?php
                      }
                      ?>
                  </select>
            </div>
          </div>
          <div class="col-xs-6">
            <div class="form-group">
              <label for="">Tempat Lahir <font color="red">*</font></label>
              <input type="text" class="form-control" name="tempat_lahir" value="<?= $hasil[tempat_lahir] ?>" required>
            </div>
          </div>
          <div class="col-xs-6">
            <div class="form-group">
              <label for="">Tanggal Lahir <font color="red">*</font></label>
              <input type="text" value="<?= $hasil[tanggal_lahir] ?>" name="tanggal_lahir" id="firstdate" class="form-control" autocomplete="off" placeholder="tanggal_lahir" required=""/>
            </div>
          </div>
          <div class="col-xs-6">
            <div class="form-group">
              <label for="">Foto Lama <a style="text-decoration:none" target="_blank" href="../../images/<?= $hasil["kode_terapis"]?>/<?= $hasil["file_name"]?>" title="File Name"><?= $hasil[file_name]?></a></label>
              <!--passing file name lama-->
              <input type="hidden" name="file_lama" value="<?= $hasil[file_name] ?>" />
              <!---->
              <input type="file" id="someId" name="files" class="form-control" autocomplete="off" />
            </div>
            <br>
            <button type="submit" name="files" class="btn btn-primary" style="float: left;">Ubah Data</button>
          </div>

         
        </div>
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

<!--untuk form provinsi dan kabupaten agar provinsi dan kabupaten saling berkaitan-->
<script>
    $("#kabupaten").chained("#provinsi");
    $("#kecamatan").chained("#kabupaten");
</script>

<!--untuk form telepon agar tipe nomor sebagai inputan-->
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

<!--datepicker-->
<script>
    $(function () {
        $("#firstdate").datepicker({
            format: 'yyyy-mm-dd',
            changeMonth: true,
            changeYear: true
        });
    });
</script>

<!--batasan file upload hanya png dan jpg-->
<script type="text/javascript">
var file = document.getElementById('someId');

file.onchange = function(e) {
  var ext = this.value.match(/\.([^\.]+)$/)[1];
  switch (ext) {
    case 'jpg':
    case 'JPG':
    case 'PNG':
    case 'JPEG':
    case 'png':
    case 'jpeg':
      alert('File DIizinkan');
      break;
    default:
      alert('File Tidak Diizinkan');
      this.value = '';
  }
};
</script>

<?php

}else{
  echo "<script>alert('Anda tidak memiliki hak akses!!'); window.location='../../index.php'</script>";
}
?>