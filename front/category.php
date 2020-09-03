<?php
error_reporting(0); session_start();
if ($_SESSION['status'] == 'login' and $_SESSION['username'] <> "") {
include "../config.php";

?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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

<body id="category">

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
					<h1>List Terapis</h1>
					<nav class="d-flex align-items-center">
						<a href="index_login.php">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Terapis<span class="lnr lnr-arrow-right"></span></a>
						<a href="category.php">List Terapis</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->
	<div class="container">
		<div class="row">
			<div class="col-xl-3 col-lg-4 col-md-5">
				<div class="sidebar-categories">
					<div class="head">Daftar Terapis</div>
					<ul class="main-categories">
					</ul>
				</div>
			</div>
			<div class="col-xl-9 col-lg-8 col-md-7">
				<!-- Start Best Seller -->
				<section class="lattest-product-area pb-40 category-list">
					<div class="row">
						<?php 
						$selek_data = mysqli_query($link, "select * from terapis order by id_terapis DESC");
			        	    while($data = mysqli_fetch_array($selek_data)){
						?>
							<!-- single product -->
									<div class="col-lg-4 col-md-6">
										<div class="single-product">
											<img class="img-fluid" src="../images/<?= $data['kode_terapis'] ?>/<?= $data['file_name'] ?>" alt="">
											<div class="product-details">
												<h6><?= $data['nama_terapis'] ?></h6>
												<div class="price">
													<h6><?= $data['umur'] ?></h6>
												</div>
												<div class="prd-bottom">

													<a href="pesanan_terapis.php?id_terapis=<?= $data['id_terapis'] ?>" class="social-info">
														<span class="ti-bag"></span>
														<p class="hover-text">Lakukan Pesanan</p>
													</a>
												</div>
											</div>
										</div>
									</div>
							<!-- single product -->
							<?php } ?>
						
							</div>
						</div>
					</div>
				</section>
				<!-- End Best Seller -->
			</div>
		</div>
	</div>

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