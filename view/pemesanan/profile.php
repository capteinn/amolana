<?php
error_reporting(0); session_start();
if ($_SESSION['status'] == 'login' and $_SESSION['username'] <> "") {
include "../header.php";
include '../../equipment.php';
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

<section class="content">
  <div class="box">
     <!-- /.box-header -->
    <div class="box-body">
      <!-- Profile Image -->
      <div class="row">
        <?php
          $selek_data = mysqli_query($link, "select * from terapis order by id_terapis DESC");
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
              <a id="edit_link" href="list_booking.php?id_terapis=<?= $data[id_terapis] ?>" class="btn btn-success btn-block"><span class="fa fa-map-pin"> Pilih</a>
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