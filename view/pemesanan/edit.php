<?php
error_reporting(0); session_start();
if ($_SESSION['status'] == 'login' and $_SESSION['username'] <> "") {
include "../header.php";
include '../../equipment.php';

$id_pesanan = $_GET['id_pesanan'];

$cek_pesanan = mysqli_query($link, "SELECT * from pesan where id_pesanan = '$id_pesanan'");
$hasil_cek = mysqli_fetch_array($cek_pesanan);

$cek_terapis = mysqli_query($link, "SELECT * from terapis where id_terapis = '$hasil_cek[id_terapis]'");
$hasil_terapis = mysqli_fetch_array($cek_terapis);

$cek_durasi = mysqli_query($link, "SELECT id_durasi from durasi where kode_pesanan = '$hasil_cek[kode_pesanan]'");
$hasil_durasi = mysqli_fetch_array($cek_durasi);

?>


<div class="content-wrapper">
<section class="content-header">
      <h1>
        Edit Pesananan | <?= $hasil_cek['kode_pesanan'] ?>
        <div class="box-body box-profile">
          <form action="#" method="POST">
            <a href="#myModal2" data-toggle='modal' class="btn btn-success btn-flat">Terapis Saat Ini</a> | 
            <input type="hidden" name="id_pesanan" value="<?= $id_pesanan ?>">
            <button name="ubah_waktu" class="btn btn-danger btn-flat">Ubah Waktu Pemesanan</button>
          </form>
        </div>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../main"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Index</li>
      </ol>
</section>





<?php if ($_POST['id_pesanan'] == null) { ?>
  
<section class="content">
  <div class="box">
     <!-- /.box-header -->
    <div class="box-body">
      <!-- Profile Image -->
      <div class="row">
        <?php
          $selek_data = mysqli_query($link, "select * from terapis WHERE id_terapis != '$hasil_cek[id_terapis]'");
          while($data = mysqli_fetch_array($selek_data)){
        ?>  
        <div class="col-md-3">
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../../images/<?= $data["kode_terapis"]?>/<?= $data["file_name"]?>" alt="User profile picture">
              <h3 class="profile-username text-center"><?= $data['nama_terapis'] ?></h3>
              <p class="text-muted text-center"><?= $data['alamat'] ?></p>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Umur</b> <a class="pull-right"><?= $data['umur'] ?></a>
                </li>
                <li class="list-group-item">
                  <b>Jenis Kelamin</b> <a class="pull-right"><?= $data['jenis_kelamin'] ?></a>
                </li>
                <li class="list-group-item">
                  <b>Kode Terapis</b> <a class="pull-right"><?= $data['kode_terapis'] ?></a>
                </li>
              </ul>
              <a  href="update_terapis.php?id_terapis=<?= $data[id_terapis] ?>&kode_pesanan=<?= $hasil_cek[kode_pesanan] ?>" class="btn btn-success btn-block"><span class="fa fa-map-pin"> Update Terapis</span></a>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <?php } ?>
      </div>
      <!-- /.box -->
    </div>
    <!-- /.box-body -->
  </div>
</section>


<div class="modal fade edit"  id="myModal2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content" style="width: 90%">
       <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel" style="text-align: center;">Terapis Saat Ini</h4>
          </div>
          <div class="modal-body">
            <div class="fetched-data">
                <div class="form-group">
                  <label>Profil Terapis Saat Ini</label>
                  <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="../../images/<?= $hasil_terapis["kode_terapis"]?>/<?= $hasil_terapis["file_name"]?>" alt="User profile picture">
                  <h3 class="profile-username text-center"><?= $hasil_terapis['nama_terapis'] ?></h3>
                  <p class="text-muted text-center"><?= $hasil_terapis['alamat'] ?></p>
                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>Umur</b> <a class="pull-right"><?= $hasil_terapis['umur'] ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Jenis Kelamin</b> <a class="pull-right"><?= $hasil_terapis['jenis_kelamin'] ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Kode Terapis</b> <a class="pull-right"><?= $hasil_terapis['kode_terapis'] ?></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



<?php }else{ ?>

<section class="content">
  <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-body box-profile">
            <h4>
                <marquee behavior="scroll" direction="left"><?= $hasil_cek[kode_pesanan] ?>
                <small>Kode Pesanan Anda | Silahkan Pilih Waktu Yang Akan Dipesan Pada Bagian Check Lalu klik Button "Pilih" Pada Bagian Bawah Untuk langkah Selanjutnya</small></marquee>
            </h4>
          <!-- /.box-header -->
          <div class="col-md-7">
            <table class="table table-striped table-bordered table-sm " cellspacing="0"
             width="100%">
              <form action="../../controller/pesan/edit_pesan.php" method="POST" name="fSimpanHa">
              <thead>
                <tr>
                  <th><strong>Check</strong></th>
                  <th>Waktu</th>
                </tr>
              </thead>

               <tbody>
                  <?php
                    $selek_data = mysqli_query($link, "select * from waktu_pesan WHERE waktu not in (SELECT durasi from durasi where id_terapis = '$hasil_cek[id_terapis]' && kode_pesanan != '$hasil_cek[kode_pesanan]' && status_durasi = 0)");
                    while($data = mysqli_fetch_array($selek_data)){
                  ?>  
                    <tr>
                      <td><input type="checkbox" name="check_list[]" value="<?= $data[waktu] ?>"></td>
                      <td class="mailbox-name"><small class="label label-success"><?= $data['waktu'] ?></small></td>
                    </tr>
                  <?php } ?>
                  <td><a id="edit_link" href="#" class="btn btn-primary" data-toggle="modal" data-target=".edit">
                    <span class="fa fa-map-pin"> Pilih</span></a>
                  </td>
                </tbody>

                 <div class="modal fade edit" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content" style="width: 90%">
                       <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel" style="text-align: center;">Pemesanan Terapis</h4>
                          </div>
                          <div class="modal-body">
                            <div class="fetched-data">
                                <div class="form-group">
                                  <label>Kode Pesanan</label>
                                  <input type="text" name="kode_pesanan" value="<?= $hasil_cek[kode_pesanan] ?>" class="form-control" readonly="" />
                                  <input type="hidden" name="kode_pesanan" value="<?= $hasil_cek[kode_pesanan] ?>"/>
                                  <input type="hidden" name="id_terapis" value="<?= $hasil_cek[id_terapis] ?>"/>
                                </div>
                                <div class="form-group">
                                  <label>Nama Pelanggan <font color="red">*</font></label>
                                  <input type="text" name="nama_pelanggan" class="form-control" value="<?= $hasil_cek[nama_pemesan] ?>" autocomplete="off" required=""/>
                                </div>
                                <div class="form-group">
                                  <label>Alamat Pelanggan <font color="red">*</font></label>
                                  <input type="text" name="alamat_pelanggan" class="form-control" value="<?= $hasil_cek[alamat] ?>" autocomplete="off" placeholder="Simpang Tiga" required=""/>
                                </div>
 
                                <div class="form-group">
                                  <label><input type="checkbox" value="" required="">Data Yang Telah Diisi Sudah Benar <font color="red">*</font></label>
                                </div>
                 
                            </div>
                          </div>
                          <div class="modal-footer">
                            <b><font style="float: left">Tanda <font color="red">*</font> Wajib di Isi</font></b>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" name="edit_pesanan" class="btn btn-primary">Tambah Data</button>
                          </div>
                        </div>
                      </div>
                    </div>
                 </form>
            </table>
          </div>

          <!--modal profile edit waktu-->
           <div class="col-md-5">
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <div class="modal-body">
                    <div class="fetched-data">
                        <div class="form-group">
                          <label>Profil Terapis Saat Ini</label>
                          <div class="box-body box-profile">
                          <img class="profile-user-img img-responsive img-circle" src="../../images/<?= $hasil_terapis["kode_terapis"]?>/<?= $hasil_terapis["file_name"]?>" alt="User profile picture">
                          <h3 class="profile-username text-center"><?= $hasil_terapis['nama_terapis'] ?></h3>
                          <p class="text-muted text-center"><?= $hasil_terapis['alamat'] ?></p>
                          <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                              <b>Umur</b> <a class="pull-right"><?= $hasil_terapis['umur'] ?></a>
                            </li>
                            <li class="list-group-item">
                              <b>Jenis Kelamin</b> <a class="pull-right"><?= $hasil_terapis['jenis_kelamin'] ?></a>
                            </li>
                            <li class="list-group-item">
                              <b>Kode Terapis</b> <a class="pull-right"><?= $hasil_terapis['kode_terapis'] ?></a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.box-body -->
              </div>
            </div>
            <div class="row">
            <div class="col-md-5">
              <div class="box">
                <div class="box box-info">
                  <div class="box-header">
                    <h3 class="box-title">Waktu Pemesanan Sebelumnya</h3>
                  </div>
                    <div class="box-body">
                    <?php
                      $selek_data = mysqli_query($link, "SELECT * from durasi where kode_pesanan = '$hasil_cek[kode_pesanan]'");
                      while($data = mysqli_fetch_array($selek_data)){
                    ?> 
                    <div class="form-group">
                      <input type="text" value="<?= $data[durasi] ?>" class="form-control" readonly>
                    </div>
                  <?php } ?>
                   </div>
                </div>
              </div>
            </div>
          </div>

          </div>
          <!-- /. box -->
        </div>
      <!-- /.col -->
      </div>
    </div>
</section>

<?php } ?>

</div>

<?php include "../footer.php";?> 


<!--disable button setelah menekan submit-->
<script type="text/javascript">
  $('form').submit(function() {
  $(this).find("button[type='submit']").prop('disabled',true);
});
</script>

<?php

}else{
  echo "<script>alert('Anda tidak memiliki hak akses!!'); window.location='../../index.php'</script>";
}
?>