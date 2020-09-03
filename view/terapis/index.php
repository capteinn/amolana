<?php
error_reporting(0); session_start();
if ($_SESSION['status'] == 'login' and $_SESSION['username'] <> "") {
include "../header.php";
include '../../equipment.php';

//fungsi untuk mendapatkan kode terapis
$query = mysqli_query($link,"SELECT max(id_terapis) as maxKode FROM terapis") or die(mysqli_error()); 
      $data = mysqli_fetch_array($query);
        $kode_entry_umum = $data['maxKode'];
          $tambah = $kode_entry_umum+1;
          if ($tambah<10) {
              $kode="N".$tambah;
          }else{
              $kode="N".$tambah;
          }
        function createRandomPassword() {
          $chars = "003232303232023232023456789";
          srand((double)microtime()*1000000);
          $i = 0;
          $pass = '' ;
          while ($i <= 7) {
            $num = rand() % 33;
            $tmp = substr($chars, $num, 1);
            $pass = $pass . $tmp;
            $i++;
          }
          return $pass;
        }
      $finalcode='TRP-'.createRandomPassword().$kode;

      //fungsi mengubah id provinsi dan kabupaten menjadi nama
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
      ////

?>


<div class="content-wrapper">
<section class="content-header">
      <h1>
        Terapis
        <small>Amolana</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../main"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Index</li>
      </ol>
</section>

<section class="content">
  <div class="box">
    <a href="#myModal2" data-toggle='modal' class="btn bg-navy btn-flat margin" data-id=""><i class="fa fa-fw fa-plus"></i>Tambah Terapis</a>
     <!-- /.box-header -->
    <div class="box-body">
      <div class="table-responsive"> 
       <table id="example1" class="table table-striped table-bordered table-sm " cellspacing="0"
  width="100%">
              <thead>
              <tr>
                <th>NO</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>No Telepon</th>
                <th>Agama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Provinsi</th>
                <th>Kecamatan</th>
                <th>Tempat Lahir</th>
                <th>tanggal Lahir</th>
                <th>Foto</th>
                <th><span class="fa fa-gears"></span> Aksi</th>
              </tr>
              </thead>

              <tbody>
              <?php $nomor=1; ?>
              <?php
                $selek_data = mysqli_query($link, "select * from terapis order by id_terapis DESC");
                while($data = mysqli_fetch_array($selek_data)){
                  ?>       
              <tr>
                <td nowrap=""><?php echo $nomor; ?></td>
                <td nowrap=""><?php echo $data['nik']; ?></td>
                <td nowrap=""><?php echo $data['nama_terapis']; ?></td>
                <td nowrap=""><?php echo $data['umur']; ?></td>
                <td nowrap=""><?php echo $data['no_telepon']; ?></td>
                <td nowrap=""><?php echo $data['agama']; ?></td>
                <td nowrap=""><?php echo $data['jenis_kelamin']; ?></td>
                <td nowrap=""><?php echo $data['alamat']; ?></td>
                <td nowrap=""><?php echo provinsi($data['provinsi']); ?></td>
                <td nowrap=""><?php echo kabupaten($data['kabupaten']); ?></td>
                <td nowrap=""><?php echo $data['tempat_lahir']; ?></td>
                <td nowrap=""><?php echo tanggal_indo($data['tanggal_lahir']); ?></td>
                <td nowrap=""><?php echo '<a style="text-decoration:none" target="_blank" href="../../images/'.$data["kode_terapis"].'/'.$data["file_name"].'" title="File Name">'.$data[file_name].'</a>' ?></td>
                <td class="last" style="width: 100px; text-align: center;">
                   <a href="../terapis/edit.php?id_terapis=<?= md5($data[id_terapis]) ?>" title="Edit">
                    <span class="fa fa-edit"></span>
                  </a>
                  |
                  <a OnClick="return confirm('apakah anda yakin menghapus data?')" href="../../controller/terapis/delete.php?id_terapis=<?=md5($data['id_terapis'])?>" title="Delete">
                    <span class="fa fa-trash"></span>
                  </a>
               </td>
              </tr>
              <?php $nomor++;?> 
              <?php
              } 


              ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- /.box-body -->
  </div>
</section>
</div>

<form action="../../controller/terapis/tambah.php?code=<?= $finalcode ?>" role="form" method="POST" enctype="multipart/form-data">
  <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" style="position: fixed; left: 13%">
   <div class="modal-dialog" role="document">
    <div class="modal-content" style="width: 80%">
     <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel" style="text-align: center;">Tambah Terapis</h4>
        </div>
        <div class="modal-body">
        <h5 class="modal-title" id="myModalLabel" style="text-align: left;">Kode Terapis <?= $finalcode ?></h5>
        <input type="hidden" name="_%kode_terapis" value="<?= $finalcode ?>" />
          <div class="fetched-data">

              <div class="form-group">
                <label for="company">NIK</label>
                <input type="text" name="_%nik" class="form-control" placeholder="1234567898765" onkeypress="return isNumber(event)"/>
              </div>
              <div class="form-group">
                <label for="company">Nama Terapis <font color="red">*</font></label>
                <input type="text" name="_%nama_terapis" placeholder="Munawarah" class="form-control" required=""/>
              </div>
              <div class="form-group">
                <label for="company">Umur</label>
                <input type="number" name="_%umur" placeholder="" class="form-control"/>
              </div>
              <div class="form-group">
                <label for="company">No Telepon</label>
                <input type="text" class="form-control" value="" id="extra7" name="_%no_telepon" placeholder="0822938429342" onkeypress="return isNumber(event)" />
              </div>
              <div class="form-group">
                <label for="">Agama <font color="red">*</font></label>
                <select name="_%agama" class="form-control" required="">
                  <option value="">Please Select</option>
                  <option value="Islam">Islam</option>
                  <option value="Kristen">Kristen</option>
                  <option value="Hindu">Hindu</option>
                  <option value="Budha">Budha</option>
                  <option value="Konghucu">Konghucu</option>
                </select>
              </div>
              <div class="form-group">
                <label for="">Jenis Kelamin <font color="red">*</font></label>
                <select name="_%jenis_kelamin" class="form-control" required="">
                  <option value="">Please Select</option>
                  <option value="Pria">Pria</option>
                  <option value="Wanita">Wanita</option>
                </select>
              </div>
              <div class="form-group">
                <label for="">Alamat <font color="red">*</font></label>
                <input type="text" name="_%alamat" placeholder="Simpang Perkasa" class="form-control" required=""/>
              </div>
              
              <div class="form-group">
                <label for="kabupaten">provinsi</label>
                <select name="_%provinsi" id="provinsi" class="form-control">
                      <option value="">Please Select</option>
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
                                  
              <div class="form-group">
                <label for="kabupaten">kabupaten</label>
                <select id="kabupaten" name="_%kabupaten" class="form-control" >
                    <option value="">Please Select</option>
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

              <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir <font color="red">*</font></label>
                <input type="text" name="_%tempat_lahir" class="form-control" placeholder="Batam" required=""/>
              </div>

              <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir <font color="red">*</font></label>
                <input type="text" name="_%tanggal_lahir" id="firstdate" class="form-control" autocomplete="off" placeholder="tanggal_lahir" required=""/>
              </div>

              <label for="file_name">Foto</label>
              <input type="file" id="someId" name="files" class="form-control" required=""/>
              
          </div>
        </div>
        <div class="modal-footer">
          <b><font style="float: left">Tanda <font color="red">*</font> Wajib di Isi</font></b>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" name="files" class="btn btn-primary">Tambah Data</button>
        </div>
        </div>
      </div>
    </div>
</form>

<?php include "../footer.php";?> 


<!--disable button setelah menekan submit-->
<script type="text/javascript">
  $('form').submit(function() {
  $(this).find("button[type='submit']").prop('disabled',true);
});
</script>

<!--untuk form provinsi dan kabupaten-->
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

<!--datatables-->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

<?php

}else{
  echo "<script>alert('Anda tidak memiliki hak akses!!'); window.location='../../index.php'</script>";
}
?>