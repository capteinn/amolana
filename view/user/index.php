<?php
error_reporting(0); session_start();
if ($_SESSION['status'] == 'login' and $_SESSION['username'] <> "") {
include "../header.php";
include '../../equipment.php';


$kondisi = array('1'      =>    'Administrator',
                '2'       =>    'Client');

?>


<div class="content-wrapper">

<section class="content-header">

      <h1>

        USER 

        <small>Parakerja</small>

      </h1>

      <ol class="breadcrumb">

        <li><a href="../main"><i class="fa fa-dashboard"></i>Home</a></li>

        <li><a href="../user">User</a></li>

        <li class="active">Index</li>

      </ol>

</section>

<section class="content">

  <div class="box" style="float: ">


     <a href="tambah.php">

      <button type="button" class="btn bg-navy btn-flat margin"><i class="fa fa-fw fa-plus"></i>Tambah User</button></a>


     <!-- /.box-header -->

    <div class="box-body">

      <div class="table-responsive"> 

       <table id="example1" class="table table-bordered table-striped">

              <thead>

              <tr> 

                <th>No</th>                      

                <th>Nama</th>

                <th>Alamat</th>

                <th>No Telepon</th>

                <th>Username</th>

                <th>Jabatan</th>

                <th>Usergroup</th>

                <th>Waktu Daftar</th>


                <th style="width:10px;">Aksi</th> 


              </tr>

              </thead>

              <tbody>

              <?php $nomor=1; ?>

              <?php

                $selek_data = mysqli_query($link, "select * from users order by id DESC");

                while($data = mysqli_fetch_array($selek_data)){

                  ?>                  

              <tr>

                <td ><?php echo $nomor; ?></td>

                <td ><?php echo $data['name']; ?></td>

                <td ><?php echo $data['alamat']; ?></td>

                <td ><?php echo $data['no_telp']; ?></td>

                <td ><?php echo $data['username']; ?></td>

                <td ><?php echo $data['jabatan']; ?></td>

                <td ><?php echo $kondisi[$data['usergroup']]; ?></td>

                <td ><?php echo $data['created_at']; ?></td>


                <td class=" last" style="width: 100px">




                  <a OnClick="return confirm('Apakah anda yakin mereset password ?')" href="../../controller/user/reset_pass.php?username=<?=md5($data['username'])?>" title="Reset">

                    <span class="fa  fa-refresh"></span>

                  </a> 


                  |


                  <a  href="edit.php?username=<?=md5($data['username'])?>" title="Edit">

                    <span class="fa fa-edit"></span>

                  </a> 


                  |


                  <a OnClick="return confirm('apakah anda yakin menghapus data?')" href="../../controller/user/delete.php?username=<?=md5($data['username'])?>" title="Delete">

                    <span class="fa fa-remove"></span>

                  </a>




                </td>


              </tr>

              <?php $nomor++;?> 

              <?php

              

              } ?>

                        

          </tbody>

        </table>

      </div>

    </div>

    <!-- /.box-body -->

  </div>

</section>

</div>
<?php include "../footer.php";?> 
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