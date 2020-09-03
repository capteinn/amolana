<?php
error_reporting(0); session_start();
if ($_SESSION['status'] == 'login' and $_SESSION['username'] <> "") {
include "../config.php";

$id_terapis = $_GET['id_terapis'];
$ceka = mysqli_query($link, "select * from terapis where id_terapis = '$id_terapis'");
$data_ceka = mysqli_fetch_array($ceka);

$query = mysqli_query($link,"SELECT max(id_pesanan) as maxKode FROM pesan") or die(mysqli_error()); 
$data = mysqli_fetch_array($query);
  $kode_entry_umum = $data['maxKode'];
    $tambah = $kode_entry_umum+1;
    if ($tambah<10) {
        $kode="C".$tambah;
    }else{
        $kode="C".$tambah;
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

<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Karma Shop</title>

    <!--
            CSS
            ============================================= -->
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/nouislider.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>

   <!-- Start Header Area -->
        <header class="header_area sticky-header">
            <div class="main_menu">
                <nav class="navbar navbar-expand-lg navbar-light main_box">
                    <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <a class="navbar-brand logo_h" href="index_login.php"><img src="img/amolana.png" alt=""></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                         aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                            <ul class="nav navbar-nav menu_nav ml-auto">
                                <li class="nav-item active"><a class="nav-link" href="index_login.php">Home</a></li>
                                <li class="nav-item submenu dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                     aria-expanded="false">Terapis</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a class="nav-link" href="category.php">List Terapis</a></li>
                                    </ul>
                                </li>
                                
                                
                                <li class="nav-item"><a class="nav-link" href="history.php">History</a></li>
                                <li class="nav-item"><a class="nav-link" href="upload.php">Keranjang</a></li>
                                <li class="nav-item"><a class="nav-link" href="../controller/login/logout.php">LOGOUT</a></li>
                                <font color="blue"><li class="nav-item"><a class="nav-link" href="#">HI <?= $_SESSION['name'] ?></a></li></font>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="search_input" id="search_input_box">
                <div class="container">
                    <form class="d-flex justify-content-between">
                        <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                        <button type="submit" class="btn"></button>
                        <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
                    </form>
                </div>
            </div>
        </header>
        <!-- End Header Area -->

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Keranjang</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index_login.php">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="upload.php">Keranjang</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
<form action="controller/pesan/tambah_pesan.php" method="POST" name="fSimpanHa">
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <h3>Pilih Waktu Pemesanan</h3><br>
                        <thead>
                            <tr>
                                <th scope="col">Terapis</th>
                                <th scope="col">Nama</th>
                                <th scope="col">LK/PR</th>
                                <th scope="col">Umur</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img class="img-fluid" src="../images/<?= $data_ceka['kode_terapis'] ?>/<?= $data_ceka['file_name'] ?>" alt="">
                                </td>
                                <td><?= $data_ceka['jenis_kelamin'] ?></td>
                                <td>
                                    <h5><?= $data_ceka['nama_terapis'] ?></h5>
                                </td>
                                <td><?= $data_ceka['umur'] ?></td>
                                
                            </tr>

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
                                <td>
                                    
                                        <input type="checkbox" id="primary-checkbox" name="check_list[]" value="<?= $data['waktu'] ?>">
                                        <label for="primary-checkbox"></label>
                                    
                                </td>
                                <td>
                                        
                                </td>
                                <td>
                                        
                                </td>
                                <td>
                                        <?= $data['waktu'] ?>
                                </td>
                            </tr>
                            <?php } ?>
                           </tbody>
                    </table>
                    <a id="edit_link" href="#" class="genric-btn info circle" data-toggle="modal" data-target=".edit">
                      <span class="fa fa-map-pin"> Pilih</span></a>
                    
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade edit" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-md">
        <div class="modal-content" style="width: 100%">
         <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel" style="text-align: left;">Pemesanan Terapis</h4>
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
    <!--================End Cart Area =================-->

        <!-- start footer Area -->
    <footer class="footer-area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-3  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>Alamat Dan Kontak</h6>
                        <p>
                            Komplek Lumbung Rezeki, Jl. Teuku Umar No.7, Lubuk Baja Kota, Kec. Lubuk Baja, Kota Batam, Kepulauan Riau 29444, No. Telp : (0778) 452940.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End footer Area -->

    <script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery.sticky.js"></script>
    <script src="js/nouislider.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="js/gmaps.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>


<?php
    }else{
      echo "<script>alert('Anda tidak memiliki hak akses!!'); window.location='login.php'</script>";
    }
?>