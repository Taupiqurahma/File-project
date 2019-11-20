<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Lupa Kata Sandi</title>

    <link href="<?php echo base_url();?>assets/csspage/img/icon.png" rel="icon">
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url();?>assets/css/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>assets/css/css-login.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>assets/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet"
        type="text/css">

</head>

<body>

</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
        <section class="signup">
        <div class="text-center">
    <div class="container">
        <div class="row" style="font-family:roboto">
            <div class="col-md-11 col-md-offset-11">
                
                    <div class="panel-heading">
                        <h3 class="panel-title">LUPA KATA SANDI ?</h3>
                    </div>
                    <div class="panel-body">
                        <?= $this->session->flashdata('message');?>
                        <form method="POST" action="<?= base_url('Lupapassword')?>" role="form">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Masukkan Email (@gmail.com)" name="email" type="email"
                                        autofocus>
                                    <?= form_error('email','<div class="text-danger pl-5">', '</div>'); ?>
                                </div>
                                <button class="btn btn-lg btn-success btn-block">KIRIM EMAIL</button><br>
                                <p class="border border-danger" style="text-align:center; font-weight:bold; color:red"></p>
                                <a href="Login">Kembali</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>

    <!-- jQuery -->
    <script src="<?php echo base_url();?>assets/lib/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>assets/lib/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url();?>assets/js/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>assets/js/startmin.js"></script>

</body>

</html>