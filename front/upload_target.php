<?php 
error_reporting(0);
session_start();
if ($_SESSION['status'] == 'login' and $_SESSION['username'] <> "") {
$id_client = $_SESSION['id'];
include "../config.php";
include "../equipment.php";


?>
<!DOCTYPE html>
<html>
<head>
	<title>Upload Bukti Tranfer</title>
</head>
	<body>


		<form action="controller/pesan/upload_bukti.php" method="POST" enctype="multipart/form-data" >
			<input type="hidden" name="username" value="<?php echo $id_client ?>">
			<input type="hidden" name="kode_pesanan" value="<?php echo $_GET['kode_pesanan'] ?>">
			<input type="file" name="files"  id="someId">
			<button type="submit" name="files" class="site-btn">Upload</button>
		</form>
	</body>
</html>

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

<?php 
}else{

  echo "<script>alert('Harap Login Untuk Melakukan Pemesanan!!'); window.location='../index.php'</script>";

}
?>