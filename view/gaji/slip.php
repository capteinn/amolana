<?php
error_reporting(0); 
session_start();
if ($_SESSION['status'] == 'login' and $_SESSION['username'] <> "") {
$id_gaji = $_GET['id_gaji'];
include '../../config.php';
include '../../equipment.php';


$cek_gaji = mysqli_query($link, "SELECT * from gaji where id_gaji = '$id_gaji'");
$hasil_cek = mysqli_fetch_array($cek_gaji);

$cek_terapis = mysqli_query($link, "SELECT * from terapis where id_terapis = '$hasil_cek[id_terapis]'");
$hasil_cek_terapis = mysqli_fetch_array($cek_terapis);
?>
<div id="payslip">
	<div id="title">Slip Pembayaran Gaji</div>
	<div id="scope">
		<div class="scope-entry">
			<div class="title">Slip pembayaran Gaji</div>
			<div class="value"><?= tanggal_indo($hasil_cek[tanggal_input]) ?></div>
		</div>
		<div class="scope-entry">
			<div class="title">Periode</div>
			<div class="value"><?= tanggal_indo($hasil_cek[tanggal_awal]) ?> - <?= tanggal_indo($hasil_cek[tanggal_akhir]) ?></div>
		</div>
	</div>
	<div class="content">
		<div class="left-panel">
			<div id="employee">
				<div id="name">
					<?= $hasil_cek_terapis[nama_terapis] ?>
				</div>
				<div id="email">
					<?= $hasil_cek_terapis[alamat] ?>
				</div>
			</div>
			<div class="details">
				<div class="entry">
					<div class="label">Kode Terapis</div>
					<div class="value"><?= $hasil_cek_terapis[kode_terapis] ?></div>
				</div>
				<div class="entry">
					<div class="label">NIK</div>
					<div class="value"><?= $hasil_cek_terapis[nik] ?></div>
				</div>
				<div class="entry">
					<div class="label">Umur</div>
					<div class="value"><?= $hasil_cek_terapis[umur] ?></div>
				</div>
				<div class="entry">
					<div class="label">Jenis Kelamin</div>
					<div class="value"><?= $hasil_cek_terapis[jenis_kelamin] ?></div>
				</div>
				<div class="entry">
					<div class="label">Tempat Lahir</div>
					<div class="value"><?= $hasil_cek_terapis[tempat_lahir] ?></div>
				</div>
				<div class="entry">
					<div class="label">Tanggal Lahir</div>
					<div class="value"><?= tanggal_indo($hasil_cek_terapis[tanggal_lahir]) ?></div>
				</div>
			</div>
			<div class="gross">
				<div class="title">Pendapatan Pesanan</div>
				<div class="entry">
					<div class="label"></div>
					<div class="value"><?= rupiah($hasil_cek[pendapatan_pesanan]) ?></div>
				</div>
				<div class="entry">
					<div class="label">Total Jam</div>
					<div class="value"><?= $hasil_cek[total_jam] ?> Jam</div>
				</div>
			</div>
			<div class="gross">
				<div class="title">Penjelasan Gaji</div>
				<div class="entry">
					<div class="label"></div>
					<div class="value"><?= rupiah(900000) ?> / 30 Hari</div>
				</div>
				<div class="entry">
					<div class="label">1 Hari</div>
					<div class="value"><?= rupiah(30000) ?> / Hari</div>
				</div>
			</div>
		</div>
		<div class="right-panel">
			<div class="details">
				<div class="basic-pay">
					<div class="entry">
						<div class="label">Gaji Pokok</div>
						<div class="detail"></div>
						<div class="rate"><?= rupiah($hasil_cek[gaji_pokok]) ?></div>
						<div class="amount"><?= rupiah($hasil_cek[gaji_pokok]) ?></div>
					</div>
				</div>
				<div class="salary">
					<div class="entry">
						<div class="label">Gaji</div>
						<div class="detail"></div>
						<div class="rate"></div>
						<div class="amount"></div>
					</div>
					<div class="entry">
						<div class="label"></div>
						<div class="detail">Tunjangan</div>
						<div class="rate"><?= rupiah($hasil_cek[tunjangan]) ?></div>
						<div class="amount"><?= rupiah($hasil_cek[tunjangan]) ?></div>
					</div>
					<div class="entry">
						<div class="label"></div>
						<div class="detail">TIP</div>
						<div class="rate"><?= rupiah($hasil_cek[tip]) ?></div>
						<div class="amount"><?= rupiah($hasil_cek[tip]) ?></div>
					</div>
				</div>
				
				<div class="taxable_commission"></div>
				
				<div class="withholding_tax">
					<div class="entry">
						<div class="label"></div>
						<div class="detail">Potongan Lainnya</div>
						<div class="rate"><?= rupiah($hasil_cek[potongan_lainya]) ?></div>
						<div class="amount"><?= rupiah($hasil_cek[potongan_lainya]) ?></div>
					</div>
				</div>
				
				<div class="non_taxable_bonus">
					<div class="entry">
						<div class="label">Absen</div>
						<div class="detail"></div>
						<div class="rate"></div>
						<div class="amount"></div>
					</div>
					<div class="entry">
						<div class="label"></div>
						<div class="detail">Absen</div>
						<div class="rate"></div>
						<div class="amount"><?= $hasil_cek[absen] ?> Hari</div>
					</div>
				</div>
				<div class="non_taxable_bonus">
					<div class="entry">
						<div class="label">Keterangan</div>
						<div class="detail"></div>
						<div class="rate"></div>
						<div class="amount"></div>
					</div>
					<div class="entry">
						<div class="label"></div>
						<div class="detail">Keterangan</div>
						<div class="rate"></div>
						<div class="amount"><?= $hasil_cek[keterangan] ?></div>
					</div>
				</div>
				
				<div class="net_pay">
					<div class="entry">
						<div class="label">NET PAY</div>
						<div class="detail"></div>
						<div class="rate"></div>
						<div class="amount"><?= rupiah($hasil_cek[total]) ?></div>
					</div>
				</div>
				<label><font color="red">*</font> Potongan Absen 2 Hari Tanpa Keterangan Sebesar 50% Dari Gaji Pokok</label><br>
				<label><font color="red">*</font> Gaji Pokok Berdasarkan Jumlah Hari Yang Pilih</label>
					
			</div>
		</div>
	</div>
</div>


<style type="text/css">
	body {
	background: #f0f0f0;
	width: 100vw;
	height: 100vh;
	display: flex;
	justify-content: center;
    padding: 20px;
    height: 100%;
}

@import url('https://fonts.googleapis.com/css?family=Roboto:200,300,400,600,700');

* {
	font-family: 'Roboto', sans-serif;
	font-size: 12px;
	color: #444;
}

#payslip {
	width: calc( 8.5in - 80px );
	height: calc( 11in - 60px );
	background: #fff;
	padding: 30px 40px;
}

#title {
	margin-bottom: 20px;
	font-size: 38px;
	font-weight: 600;
}

#scope {
	border-top: 1px solid #ccc;
	border-bottom: 1px solid #ccc;
	padding: 7px 0 4px 0;
	display: flex;
	justify-content: space-around;
}

#scope > .scope-entry {
	text-align: center;
}

#scope > .scope-entry > .value {
	font-size: 14px;
	font-weight: 700;
}

.content {
	display: flex;
	border-bottom: 1px solid #ccc;
	height: 880px;
}

.content .left-panel {
	border-right: 1px solid #ccc;
	min-width: 200px;
	padding: 20px 16px 0 0;
}

.content .right-panel {
	width: 100%;
	padding: 10px 0  0 16px;
}

#employee {
	text-align: center;
	margin-bottom: 20px;
}
#employee #name {
	font-size: 15px;
	font-weight: 700;
}

#employee #email {
	font-size: 11px;
	font-weight: 300;
}

.details, .contributions, .ytd, .gross {
	margin-bottom: 20px;
}

.details .entry, .contributions .entry, .ytd .entry {
	display: flex;
	justify-content: space-between;
	margin-bottom: 6px;
}

.details .entry .value, .contributions .entry .value, .ytd .entry .value {
	font-weight: 700;
	max-width: 130px;
	text-align: right;
}

.gross .entry .value {
	font-weight: 700;
	text-align: right;
	font-size: 16px;
}

.contributions .title, .ytd .title, .gross .title {
	font-size: 15px;
	font-weight: 700;
	border-bottom: 1px solid #ccc;
	padding-bottom: 4px;
	margin-bottom: 6px;
}

.content .right-panel .details {
	width: 100%;
}

.content .right-panel .details .entry {
	display: flex;
	padding: 0 10px;
	margin: 6px 0;
}

.content .right-panel .details .label {
	font-weight: 700;
	width: 120px;
}

.content .right-panel .details .detail {
	font-weight: 600;
	width: 130px;
}

.content .right-panel .details .rate {
	font-weight: 400;
	width: 100px;
	font-style: italic;
	letter-spacing: 1px;
}

.content .right-panel .details .amount {
	text-align: right;
	font-weight: 700;
	width: 90px;
}

.content .right-panel .details .net_pay div, .content .right-panel .details .nti div {
	font-weight: 600;
	font-size: 12px;
}

.content .right-panel .details .net_pay, .content .right-panel .details .nti {
	padding: 3px 0 2px 0;
	margin-bottom: 10px;
	background: rgba(0, 0, 0, 0.04);
}

</style>

<?php

}else{
  echo "<script>alert('Anda tidak memiliki hak akses!!'); window.location='../../index.php'</script>";
}
?>