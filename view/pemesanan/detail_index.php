  <?php
error_reporting(0); session_start();
if ($_SESSION['status'] == 'login' and $_SESSION['username'] <> "") {
include "../header.php";
include '../../equipment.php';
$kode = $_GET['kode_pesanan'];

?>

<div class="content-wrapper">
<section class="content-header">
      <h1>
        Waktu Pemesanan
        <small>Amolana</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../main"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Index</li>
      </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-6">
      <div class="box">
        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">Waktu Yang Telah DiPesan</h3>
          </div>
            <div class="box-body">
              <div class="table-responsive"> 
       <table id="example1" class="table table-striped table-bordered table-sm " cellspacing="0"
  width="100%">
  <thead>
              <tr>
                <th>Waktu Pesanan</th>
                </tr>
              </thead>
            <?php
              $selek_data = mysqli_query($link, "SELECT * from durasi where kode_pesanan = '$kode'");
              while($data = mysqli_fetch_array($selek_data)){
            ?> 
              <tbody>
               <tr>
                <td nowrap=""><?= $data[durasi] ?></td>
               </tr>
              </tbody>
          <?php } ?>
           </div>
         </table>
       </div>
        </div>
      </div>
    </div>
  </div>
</section>

</div>

<?php include "../footer.php";?> 

<?php

}else{
  echo "<script>alert('Anda tidak memiliki hak akses!!'); window.location='../../index.php'</script>";
}
?>