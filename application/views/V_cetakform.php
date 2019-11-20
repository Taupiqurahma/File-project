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
<body onload="window.print()">
<div class="panel panel-default container"><br>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-stdiped table-bordered table-hover">
     
                <tbody>
                    <tr>
                        <td colspan="3" >
                            <h4><img src="<?php echo base_url('assets/admin/img/1122.png') ;?>">
                             FORMULIR PENDAFTARAN  
                             <br> No. Urut Pendaftaran <?= $peserta['id_peserta'];?>
                               
                            </h4>
                        </td>
                    </tr>
                   
                    <tr class="info">
                    <td colspan="3" ><h4>DATA SISWA</h4></td>
                    </tr>

                    <tr>
                    <td>Pas Foto 3 x 4</td>
                    <td><img src="<?php echo base_url();?>upload/<?= $peserta['gambar'] ?>" height="70px" width="60px"></td>
                    </tr>
  
                    <tr>
                        <td>Nama Siswa</td>
                        <td><?= $peserta['nama_lengkap'];?></td>
                    </tr>
                    <tr>
                        <td>Kode Daftar</td>
                       <td><?= $peserta['kode_daftar'];?></td>
                    </tr>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td><?= $peserta['nama_lengkap'];?></td>   
                    </tr>
                    <tr>
                        <td>Tempat Tanggal Lahir</td>
                        <td><?= $peserta['tempat_lahir'];?>, <?= $peserta['tanggal_lahir'];?></td>
                    </tr>
                      <tr>
                        <td>Jenis Kelamin</td>
                        <td><?= $peserta['jenis_kelamin'];?></td>
                    </tr>
                    <tr>
                        <td>Agama</td>
                        <td><?= $peserta['agama'];?></td>
                    </tr>
                    <tr>
                        <td>Jurusan yang Diminati</td>
                        <td><?= $peserta['jurusan'];?></td>
                    </tr>
                    <tr>
                        <td>Anak Ke</td>
                        <td><?= $peserta['anak_ke'];?></td>
                    </tr>
                    <tr>
                        <td>Jumlah Saudara</td>
                        <td><?= $peserta['jumlah_saudara'];?></td>
                    </tr>
                    <tr>
                        <td>Tinggal pada</td>
                        <td><?= $peserta['tinggal_pada'];?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td><?= $peserta['alamat'];?></td>
                    </tr>
                    <tr>
                        <td>Hobi</td>
                        <td><?= $peserta['hobi'];?></td>
                    </tr>
                    <tr>
                        <td>No Handphone</td>
                        <td><?= $peserta['no_handphone'];?></td>
                    </tr>
                     <tr>
                        <td>Asal Sekolah</td>
                        <td><?= $peserta['asal_sekolah'];?></td>
                    </tr>
                    <tr class="info">
                    <td colspan="3" ><h4>DATA ORANG TUA</h4></td>
                    </tr>
                     <tr>
                        <td>Nama Ayah</td>
                        <td><?= $peserta['nama_ayah'];?></td>
                    </tr>
                     <tr>
                        <td>Nama Ibu</td>
                        <td><?= $peserta['nama_ibu'];?></td>
                    </tr>
                     <tr>
                        <td>Pekerjaan Ayah</td>
                        <td><?= $peserta['pekerjaan_ayah'];?></td>
                    </tr>
                     <tr>
                        <td>Pekerjaan Ibu</td>
                        <td><?= $peserta['pekerjaan_ibu'];?></td>
                    </tr>
                     <tr>
                        <td>Penghasilan Ayah</td>
                        <td><?= $peserta['penghasilan_ayah'];?></td>
                    </tr>
                     <tr>
                        <td>Penghasilan_ibu</td>
                        <td><?= $peserta['penghasilan_ibu'];?></td>
                    </tr>






                </tbody>
            </table><br>

</body>