<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<title>Dashboard</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content="" name="keywords">
<meta content="" name="description">

<!-- Favicons -->
<link href="<?php echo base_url();?>assets/images/surat.jpg" rel="icon">

<!-- Google Fonts -->
<link
href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700"
rel="stylesheet">

<!-- Bootstrap CSS File -->
<link href="<?php echo base_url();?>assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="<?php echo base_url();?>assets/lib/jquery/jquery.min.js"></script>
<!-- Libraries CSS Files -->
<link href="<?php echo base_url();?>assets/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/lib/animate/animate.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/lib/magnific-popup/magnific-popup.css" rel="stylesheet">

<!-- Main Stylesheet File -->
<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/form-wizard.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/timeline.css" rel="stylesheet">

<!-- Data Tables -->
<script src="<?php echo base_url();?>assets/datatables/datatables.min.js" ></script>
<link href="<?php echo base_url();?>assets/datatables/datatables.min.css" rel="stylesheet">


<script src="<?php echo base_url();?>assets/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url();?>assets/lib/easing/easing.min.js"></script>
<script src="<?php echo base_url();?>assets/lib/superfish/hoverIntent.js"></script>
<script src="<?php echo base_url();?>assets/lib/superfish/superfish.min.js"></script>
<script src="<?php echo base_url();?>assets/lib/wow/wow.min.js"></script>
<script src="<?php echo base_url();?>assets/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="<?php echo base_url();?>assets/lib/magnific-popup/magnific-popup.min.js"></script>
<script src="<?php echo base_url();?>assets/lib/sticky/sticky.js"></script>

<!-- Template Main Javascript File -->
<script src="<?php echo base_url();?>assets/js/main.js"></script>
<script src="<?php echo base_url();?>assets/js/javascript.js"></script>
<script src="<?php echo base_url();?>assets/js/form-wizard.js"></script>



<script src="<?php echo base_url();?>assets/js/custom.js"></script>

</head>
<body onload="window.print()">
	<div class="col-lg-8 offset-lg-2">
		<div class="card">
			<div class="card-body">
					<img class="float-left" src="<?= base_url('assets/admin/img/1122.png') ?>">
				<div class="text-right">
				<h4>LAPORAN PPDB PESERTA</h4>
				<label><?= $ket ?></label>
				</div>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Kode Daftar</th>
							<th>Nama Peserta</th>
							<th>Kompetensi Keahlian</th>
							<th>Agama</th>
							<th>Status Pendaftaran</th>
							<th>Asal Sekolah</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($peserta as $k): ?>
							
						<tr>
							<td><?= $k->kode_daftar ?></td>
							<td><?= $k->nama_lengkap ?></td>
							<td><?= $k->jurusan ?></td>
							<td><?= $k->agama ?></td>
							<td><?= $k->status_pendaftaran ?></td>
							<td><?= $k->asal_sekolah ?></td>
						</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</body>
      