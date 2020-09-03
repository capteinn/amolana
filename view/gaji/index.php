<?php
error_reporting(0); session_start();
if ($_SESSION['status'] == 'login' and $_SESSION['username'] <> "") {
include "../header.php";
include '../../equipment.php';

function terapis($id_terapis){
  global $link;
  $cek_terapis = mysqli_query($link, "SELECT * from terapis where id_terapis = '$id_terapis'");
  $hasil_cek = mysqli_fetch_array($cek_terapis);
  $a = $hasil_cek['nama_terapis'];
  return $a;
}
?>


<div class="content-wrapper">
<section class="content-header">
      <h1>
        Gaji Terapis
        <small>Amolana</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../main"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Index</li>
      </ol>
</section>

<section class="content">
  <div class="box">
    <a href="tambah.php" class="btn bg-navy btn-flat margin"><i class="fa fa-fw fa-plus"></i>Tambah Gaji</a>
     <!-- /.box-header -->
    <div class="box-body">
      <div class="table-responsive"> 
       <table id="example1" class="table table-striped table-bordered table-sm " cellspacing="0"
  width="100%">
              <thead>
              <tr>
                <th>No</th>
                <th>Nama Terapis</th>
                <th>Total Pendapatan Pesanan</th>
                <th>NET</th>
                <th>Tanggal Awal</th>
                <th>Tanggal Akhir</th>
                <th>Keterangan</th>
                <th><span class="fa fa-gears"></span> Aksi</th>
              </tr>
              </thead>

              <tbody>
              <?php $nomor=1; ?>
              <?php
                $selek_data = mysqli_query($link, "select * from gaji order by id_gaji DESC");
                while($data = mysqli_fetch_array($selek_data)){
                  ?>       
              <tr>
                <td nowrap=""><?php echo $nomor; ?></td>
                <td nowrap=""><?php echo terapis($data['id_terapis']); ?></td>
                <td nowrap=""><?php echo rupiah($data['pendapatan_pesanan']); ?></td>
                <td nowrap=""><?php echo rupiah($data['total']); ?></td>
                <td nowrap=""><?php echo tanggal_indo($data['tanggal_awal']); ?></td>
                <td nowrap=""><?php echo tanggal_indo($data['tanggal_akhir']); ?></td>
                <td nowrap=""><?php echo $data['keterangan']; ?></td>
                <td class="last" style="width: 100px; text-align: center;">
                   <a href="../gaji/edit.php?id_gaji=<?= $data[id_gaji] ?>" title="Edit">
                    <span class="fa fa-edit"></span>
                  </a>
                  |
                  <a href="../gaji/slip.php?id_gaji=<?= $data[id_gaji] ?>" title="Print Slip Gaji" target="_blank">
                    <span class="fa fa-print"></span>
                  </a>
                  |
                  <a OnClick="return confirm('apakah anda yakin menghapus data gaji ini?')" href="../../controller/gaji/hapus.php?id_gaji=<?=$data['id_gaji']?>" title="Delete">
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

<?php include "../footer.php";?> 


<!--disable button setelah menekan submit-->
<script type="text/javascript">
  $('form').submit(function() {
  $(this).find("button[type='submit']").prop('disabled',true);
});
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