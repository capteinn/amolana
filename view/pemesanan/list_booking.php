<?php
error_reporting(0); session_start();
if ($_SESSION['status'] == 'login' and $_SESSION['username'] <> "") {
include "../header.php";
include '../../equipment.php';

$id_terapis = $_GET['id_terapis'];

//fungsi untuk mendapatkan kode terapis
$query = mysqli_query($link,"SELECT max(id_pesanan) as maxKode FROM pesan") or die(mysqli_error()); 
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
$finalcode='BOOK-'.createRandomPassword().$kode;

?>


<div class="content-wrapper">
<section class="content-header">
      <h1>
        Pemesanan
        <small>Amolana</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../main"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Index</li>
      </ol>
</section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-body box-profile">
              <h4>
                  <marquee behavior="scroll" direction="left"><?= $finalcode ?>
                  <small>Kode Pesanan Anda | Silahkan Pilih Waktu Yang Akan Dipesan Pada Bagian Check Lalu klik Button "Pilih" Pada Bagian Bawah Untuk langkah Selanjutnya</small></marquee>
              </h4>
            <!-- /.box-header -->
            <div class="col-md-7">
              <table class="table table-striped table-bordered table-sm " cellspacing="0"
               width="100%">
                <form action="../../controller/pesan/tambah_pesan.php?id_terapis=<?= $id_terapis ?>" method="POST" name="fSimpanHa">
                <thead>
                  <tr>
                    <th><strong>Check</strong></th>
                    <th>Waktu</th>
                  </tr>
                </thead>

                 <tbody>
                    <?php
                      $selek_data = mysqli_query($link,   "SELECT
                                                            * 
                                                          FROM
                                                            waktu_pesan 
                                                          WHERE
                                                            waktu NOT IN ( SELECT durasi FROM durasi WHERE id_terapis = '$id_terapis' AND status_durasi = 0) 
                                                          ORDER BY
                                                            id ASC");
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
                                    <input type="text" name="kode_pesanan" value="<?= $finalcode ?>" class="form-control" readonly="" />
                                    <input type="hidden" name="id_terapis" value="<?= $id_terapis ?>"/>
                                  </div>
                                  <div class="form-group">
                                    <label>Nama Pelanggan <font color="red">*</font></label>
                                    <input type="text" name="nama_pelanggan" class="form-control" placeholder="agus" autocomplete="off" required=""/>
                                  </div>
                                  <div class="form-group">
                                    <label>Alamat Pelanggan <font color="red">*</font></label>
                                    <input type="text" name="alamat_pelanggan" class="form-control" autocomplete="off" placeholder="Simpang Tiga" required=""/>
                                  </div>
                                  <div class="form-group">
                                    <label><input type="checkbox" value="" required="">Data Yang Telah Diisi Sudah Benar <font color="red">*</font></label>
                                  </div>
                   
                              </div>
                            </div>
                            <div class="modal-footer">
                              <b><font style="float: left">Tanda <font color="red">*</font> Wajib di Isi</font></b>
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <button type="submit" name="tambah_pesan" class="btn btn-primary">Tambah Data</button>
                            </div>
                          </div>
                        </div>
                      </div>
                   </form>
              </table>
            </div>

              <?php
                $selek_data = mysqli_query($link, "select * from terapis where id_terapis = '$id_terapis'");
                while($data = mysqli_fetch_array($selek_data)){
              ?>  
              <div class="col-md-5">
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
                  </div>
                  <!-- /.box-body -->
                </div>
              </div>
              <?php } ?>

            </div>
            <!-- /. box -->
          </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
    </section>
<!-- ./wrapper -->
</div>




<?php include "../footer.php";?> 

<script type="text/javascript">

//check all checkbox
    function checkAll(form) {
        for (var i = 0; i < document.forms['fSimpanHa'].elements.length; i++)
        {
            var e = document.forms['fSimpanHa'].elements[i];
            if ((e.name != 'allbox') && (e.type == 'checkbox'))
            {
                e.checked = document.forms['fSimpanHa'].ceksemua.checked;
            }
        }
    }
</script> 

<script type="text/javascript">
  $(document).on("click", "#edit_link", function () {
      var id = $(this).data('id');
      $(".modal-body #id_terapis").val( id );
    
    });
</script>


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