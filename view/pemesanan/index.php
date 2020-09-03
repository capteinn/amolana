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
function cek_status($status, $id_pesanan, $kode_pesanan){
  global $link;
 
  if ($status == 0) {

    $hasil = '<a onclick="return confirm_delete()" href="../../controller/pesan/update_status.php?id_pesanan='.$id_pesanan.'&kode_pesanan='.$kode_pesanan.'"><small class="label label-warning">Sedang Dalam Proses</small></a>';
    
  }elseif ($status == 1) {
    $hasil = '<small class="label label-success">Selesai</small>';
  }
  return $hasil;
}


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
    <a href="profile.php"><button type="button" class="btn bg-navy btn-flat margin"><i class="fa fa-fw fa-plus"></i>Tambah Pesanan</button></a>
     <!-- /.box-header -->
    <div class="box-body">
      <div class="table-responsive"> 
       <table id="example1" class="table table-striped table-bordered table-sm " cellspacing="0"
  width="100%">
              <thead>
              <tr>
                <th>No</th>
                <th>Kode Pesanan</th>
                <th>Nama Terapi</th>
                <th>Nama Pemesan</th>
                <th>Alamat Pemesan</th>
                <th>Total Harga</th>
                <th>Bukti Transfer</th>
                <th>Status</th>
                <th><span class="fa fa-gears"></span> Aksi</th>
              </tr>
              </thead>

              <tbody>
              <?php $nomor=1; ?>
              <?php
                $selek_data = mysqli_query($link, "select * from pesan order by id_pesanan DESC");
                $cek_pesan = mysqli_num_rows($selek_data);
                   if ($cek_pesan)
                   {
                    while($data = mysqli_fetch_array($selek_data)){
                      ?>       
                    <tr>
                      <td nowrap=""><?php echo $nomor; ?></td>
                      <td nowrap=""><a href="detail_index.php?kode_pesanan=<?=$data[kode_pesanan]?>" title="Cek Waktu Pemesanan"><?php echo $data['kode_pesanan'] ?></a></td>
                      <td nowrap=""><?php echo terapis($data['id_terapis']); ?></td>
                      <td nowrap=""><?php echo $data['nama_pemesan']; ?></td>
                      <td nowrap=""><?php echo $data['alamat']; ?></td>
                      <td nowrap=""><?php echo rupiah($data['price']); ?></td>

                      <td nowrap=""><?php 
                      if (($data[status_transfer] == null) || ($data[status_transfer] == 0)) { ?>
                       
                        Belum Upload
                          
                      <?php }else{ ?>
                        <a href="foto_transfer.php?kode_pesanan=<?=$data[kode_pesanan]?>" title="Lihat Foto Transfer" target="_blank"><small class="label label-success">Bukti Transfer</small></a>
                      <?php } ?>

                        </td>

                      <td nowrap=""><?php echo cek_status($data['status_pesan'],$data['id_pesanan'], $data['kode_pesanan']); ?></td>
                      <td class="last" style="width: 100px; text-align: center;">
                        <?php if ($data[status_pesan] == '1') {
                          
                        }else{ ?>
                         <a href="../pemesanan/edit.php?id_pesanan=<?= $data[id_pesanan] ?>" title="Edit">
                          <span class="fa fa-edit"></span>
                        </a>
                        |
                        <?php } ?>
                        <a OnClick="return confirm('apakah anda yakin menghapus data?')" href="../../controller/pesan/hapus.php?id_pesanan=<?=$data['id_pesanan']?>" title="Delete">
                          <span class="fa fa-trash"></span>
                        </a>
                        |
                        <a href="../pemesanan/print_out.php?id_pesanan=<?=$data['id_pesanan']?>" title="Print" target='_blank'>
                          <span class="fa fa-print"></span>
                        </a>
                     </td>
                    </tr>
                    <?php $nomor++;?> 
                <?php
                } 
              }else{
                    echo '
                    <tr bgcolor="#fff">
                        <td align="center" colspan="100" align="center">Tidak Ada Pemesan</td>
                    </tr>
                    ';
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

<script type="text/javascript">
function confirm_delete() {
return confirm('Pesanan Ini Telah Selesai ?');
}
</script>



<?php

}else{
  echo "<script>alert('Anda tidak memiliki hak akses!!'); window.location='../../index.php'</script>";
}
?>