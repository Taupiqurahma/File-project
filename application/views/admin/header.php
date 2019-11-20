<!DOCTYPE html>
<html lang="en">

<head>

   <meta http-equiv="refresh" content="10">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Halaman Admin</title>

  <!-- Favicons -->
    <link href="<?php echo base_url();?>assets/images/icon.png" rel="icon">


  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url();?>assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>assets/admin/https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url();?>assets/admin/css/sb-admin-2.min.css" rel="stylesheet">
  <script src="<?php echo base_url();?>assets/lib/jquery/jquery.min.js"></script>


</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-book"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ADMIN PPDB <sup>SMK CAKRAWALA</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

         <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>Dashboard_admin">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>Pembayaran_admin">
          <i class="fas fa-file-invoice"></i>
          <span>Cek pembayaran</span></a>
      </li>


     <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>Dashboard_admin/berkas">
          <i class="fas fa-check"></i>
          <span>Daftar Berkas</span></a>
      </li>


      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>Dashboard_admin/listpeserta">
        <i class="fas fa-user-edit"></i>
          <span>List Pendaftaran</span></a>
      </li>



      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>inbox_admin">
          <i class="fas fa-envelope-open"></i>
          <span>Kotak masuk pesan</span></a>
      </li>

     

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>Maps">
          <i class="fas fa-road"></i>
          <span>Maps</span></a>
      </li>

        <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>Dashboard_admin/rekening">
         <i class="fas fa-door-open"></i>
          <span>Atur panduan</span></a>
      </li>



      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>Dashboard_admin/pengaturan">
         <i class="far fa-clock"></i>
          <span>Atur jadwal Pendaftaran</span></a>
      </li>

      
      
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light badge-dark topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

<?php 
    $query=$this->db->query("SELECT * FROM pesan WHERE inbox_status='1'");
    $jum_pesan=$query->num_rows();
?>          
<ul class="navbar-nav mr-auto">

              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="">
              </div>
                  
            <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <i class="fas fa-envelope"></i>
           <span class="label label-warning"><?php echo $jum_pesan;?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Anda memiliki <?php echo $jum_pesan;?> pesan</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                <?php 
                    $inbox=$this->db->query("SELECT pesan.*,DATE_FORMAT(inbox_tanggal,'%d %M %Y') AS tanggal FROM pesan WHERE inbox_status='0' ORDER BY inbox_id DESC LIMIT 5");
                    foreach ($inbox->result_array() as $in) :
                        $inbox_id=$in['inbox_id'];
                        $inbox_nama=$in['inbox_nama'];
                        $inbox_tgl=$in['inbox_tanggal'];
                        $inbox_pesan=$in['inbox_pesan'];
                ?>
                  <li><!-- start message -->
                    <a href="<?php echo base_url().'inbox_admin'?>">
                      <h4>
                       Nama pengirim : <?php echo $inbox_nama;?>
                        <small><i class="fa fa-clock-o"></i> <?php echo $inbox_tgl;?></small>
                      </h4>
                      <p><?php echo $inbox_pesan;?></p>
                    </a>
                  </li>
                  <!-- end message -->
                  <?php endforeach;?>
                </ul>
              </li>
              <li class="footer"><a href="<?php echo base_url().'inbox_admin'?>">Lihat Semua Pesan</a></li>
            </ul>
          </li>
              

            </li>



          </ul>


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="">
                  <div class="input-group">
                    <div class="input-group-append">

                    </div>
                  </div>
              </div>
              <!-- Nav Item - Alerts -->
          <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              </a>
          
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <div class="dropdown-divider"></div>

            
              

            </li>


             <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $admin['username'] ?></span>
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>

              </a>
          
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <div class="dropdown-divider"></div>

                <a class="dropdown-item" href="<?php echo base_url () ; ?>Dashboard_admin/logout" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>
          <script src="<?php echo base_url();?>assets/datatables/datatables.min.js" ></script>
          <link href="<?php echo base_url();?>assets/datatables/datatables.min.css" rel="stylesheet">


        </nav>
        <!-- End of Topbar -->

