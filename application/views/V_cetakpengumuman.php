<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="<?php echo base_url();?>assets/images/icon.png" rel="icon">

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


<div class="panel panel-default container"><br>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-stdiped table-bordered table-hover">
                <?php foreach ($detailpengumuman as $s): ?>
                <body onload="window.print()">
                    <tr>
                        <td colspan="3" align="center">

                            <h6><img src="<?php echo base_url('assets/admin/img/1122.png') ;?>">
                             No.Pendaftaran:
                                    <?php echo $s->kode_daftar;?>/<?php echo $s->id_peserta;?>/<?php echo date('dmy');?>

                            </h6>
                            <img height="80px" class="float-right" src="<?= base_url('assets/images/barcode/'). $s->kode_daftar.'.png' ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Nama Siswa</td>
                        <td><?php echo $s->nama_lengkap;?></td>
                    </tr>
                    <tr>
                        <td>Kode Daftar</td>
                        <td><?php echo $s->kode_daftar?></td>
                    </tr>
                    <tr>
                        <td>Asal Sekolah</td>
                        <td><?php echo $s->asal_sekolah?></td>
                    </tr>
                    <tr>
                        <td>Jurusan</td>
                        <td><?php echo $s->jurusan?></td>
                    </tr>
                    
                    <tr>
                        <td colspan="3" align="center"><b>STATUS PENDAFTARAN :</b></td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center">
                            <h3><b>****<?php echo $s->status_pendaftaran; ?>****</b></h3>
                        </td>
                    </tr>
                </body>

            </table><br>

            <?php endforeach; ?>
        </div>
    </div><br>
  
</div>


