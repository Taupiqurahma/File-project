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

<!--==========================
    Header
    ============================-->
<header id="header">
    <div class="container">

         <div id="logo" class="pull-left">

            <a href="<?php echo base_url();?>#body"><img style="height: 80px;"
                    src="<?php echo base_url();?>assets/images/surat2.jpg" alt="" title="" /></a>
        </div>
        <nav  id="nav-menu-container">
            <ul class="nav-menu">
                <li class= "<?php if($this->uri->segment('1') == 'Dashboard_siswa') { echo "menu-active" ;} ?>">
                <a href="<?php echo base_url();?>Dashboard_siswa">Home</a>
                </li>
                <li class= "<?php if($this->uri->segment('2') == 'index') { echo "menu-active" ;} ?>">
                <a href="<?php echo base_url();?>Registrasi_siswa/index">Formulir</a>
                </li>
                 <li class= "<?php if($this->uri->segment('2') == 'daftarpeserta') { echo "menu-active" ;} ?>">
                <a href="<?php echo base_url();?>Registrasi_siswa/daftarpeserta">Cek peserta</a>
                </li>
                  <li class="nav-item dropdown">
                <li class= "<?php if($this->uri->segment('2') == 'Pengumuman') { echo "menu-active" ;} ?>">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Pengumuman</a>
                <div class="dropdown-menu">
                <a class="dropdown-item" style="color: black;" href="<?php echo base_url();?>Dashboard_siswa/Pengumuman">Status Penerimaan <i class="fa fa-bullhorn"></i></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" style="color: black;" href="<?php echo base_url();?>Dashboard_siswa/Cetak_form">Cetak Formulir <i class="fa fa-print"></i></a>
                </div>
                </li>
                <li class= "<?php if($this->uri->segment('2') == 'kontak') { echo "menu-active" ;} ?>">
                <a href="<?php echo base_url();?>Dashboard_siswa/kontak">Kontak</a>
                </li>
                <li class= "<?php if($this->uri->segment('2') == 'bayar') { echo "menu-active" ;} ?>">
                <a href="<?php echo base_url();?>Dashboard_siswa/bayar">Pembayaran</a>
                </li>
                <li class= "<?php if($this->uri->segment('2') == 'upload') { echo "menu-active" ;} ?>">
                <a href="<?php echo base_url();?>Dashboard_siswa/upload">Upload Berkas</a></li>
                <li class="nav-item dropdown">
                <li class= "<?php if($this->uri->segment('2') == 'user') { echo "menu-active" ;} ?>">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Profil</a>
                <div class="dropdown-menu">
                <a class="dropdown-item" style="color: black;" href="<?php echo base_url();?>Dashboard_siswa/user">Akun Saya<i class="fa fa-user fa-fw"></i></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" style="color: black;" href="<?php echo base_url();?>Dashboard_siswa/logout">Keluar <i class="fa fa-user fa-lock"></i></a>
                </div>
                </li>
                </ul>
        </nav>
    </div>
</header>

