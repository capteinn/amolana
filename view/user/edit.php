<?php
error_reporting(0);
session_start(); 
if ($_SESSION['status'] == 'login' and $_SESSION['username'] <> "") {
include "../header.php";
include '../../equipment.php';

$kondisi = array('1'      =>     'Administrator',
                '2'       =>    'Administrator 2',
                '3'       =>    'Warehouse 2',
                '4'       =>    'Kasir',
                '5'       =>    'Kasir 2',
                '6'       =>    'Supplier',
                '7'       =>    'Supplier 2',
                '8'       =>    'Purchasing/Accounting',
                '9'       =>    'Purchasing/Accounting 2',
                '10'      =>    'Keuangan',
                '11'      =>    'keuangan 2',
                '12'      =>    'Warehouse',
                '13'      =>    'Operator 1',
                '14'      =>    'Operator 2');
?>

<?php 
$username = $_GET['username'];
?>
<?php 
$query_user = mysqli_query($link, "SELECT * FROM users WHERE md5(username)='$username'");
$cek_user = mysqli_fetch_array($query_user);

?>
<div class="content-wrapper">
<section class="content-header">
      <h1>
        USER 
        <small>Parakerja</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php?link=home.php"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="index.php?link=user/index.php">User</a></li>
        <li><a href="index.php?link=user/index.php">Index</a></li>
      </ol>
</section>

<section class="content">
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Edit Data User</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form action="../../controller/user/edit.php?username=<?= $username ?>" role="form" method="POST">
    <div class="box-body">
      <div class="form-group">
        <label for="usergroup">Usergroup</label>
        <input type="text" autocomplete="off" name="_usergroup" readonly class="form-control" id="" value="<?= $kondisi[$cek_user[usergroup]] ?>">
      </div>
      <div class="form-group">
        <label for="nama user">Nama User</label>
        <input type="text" autocomplete="off" required name="_name" class="form-control" id="" 
        value="<?= $cek_user[name] ?>">
      </div>

      <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" autocomplete="off" required name="_alamat" class="form-control" id="" 
        value="<?= $cek_user[alamat] ?>">
      </div>

      <div class="form-group">
        <label for="nomor telepon">Nomor Telepon</label>
        <input type="text" autocomplete="off" required name="_no_telp" class="form-control" id="" 
        value="<?= $cek_user[no_telp] ?>">
      </div>

      <div class="form-group">
        <label for="username">Username</label>
        <input type="username" maxlength="15" autocomplete="off" name="_username" class="form-control" value="<?= $cek_user['username'] ?>">
      </div>
      <div class="form-group">
        <label for="jabatan">Jabatan</label>
        <input type="text" autocomplete="off" name="_jabatan" class="form-control" id="" value="<?= $cek_user[jabatan] ?>">
      </div>
      
     </div>
    <!-- /.box-body -->

    <div class="box-footer">
      <button type="submit" name="update_data" class="btn bg-olive btn-flat margin">Update</button>
    </div>
  </form>
</div>
</section>
</div>

<?php include "../footer.php";?> 

<?php
}else{
  echo "<script>alert('Anda tidak memiliki hak akses!!'); window.location='../../index.php'</script>";
}