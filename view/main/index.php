<?php session_start(); error_reporting(0);
if ($_SESSION['status'] == 'login' and $_SESSION['username'] <> "") {
  include "../header.php";
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <style type="text/css">
      .kartu {
        background-color: white;
        padding: 1rem;
        border-radius: .25rem;
      }

      .kartu p {
        margin: 0;
      }
    </style>

    <section class="content">
      <div class="row">
        <!-- /.content -->
      <div class="col-md-3">
        <!-- small box -->
        <div class="card kartu">
            <h4>Daftar Harga</h4>

            <p>1 jam = Rp 60.000,-</p>
            <p>1,5 jam = Rp 90.000,-</p>
            <p>2 jam = Rp 120.000,-</p>

            <h4>Jam Buka</h4>
            <p>10:00-22:00 WIB</p>
        </div>
      </div>
      </div>
      
    </section>




  </div>
  <!-- /.content-wrapper -->
  <?php include "../footer.php";
}else{

  echo "<script>alert('Anda tidak memiliki hak akses!!'); window.location='../login/login.php'</script>";

}
?>