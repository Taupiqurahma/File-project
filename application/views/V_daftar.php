<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Akun - PPDB SMK Cakrawala</title>
    <link rel="icon" href="assets//img/icon.png">
        <script src='https://www.google.com/recaptcha/api.js'></script>


    <!-- Font Icon -->
    <link rel="stylesheet" href="assets/csspage/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="assets/csspage/css/style1.css">
</head>
<body>
</br>
</br>
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <img src="assets/admin/img/1122.png">
                        <h2 class="form-title">REGISTRASI AKUN</h2>
                        <form method="POST" action="<?= base_url('Daftar')?>">
                            <div class="form-group">
                               <input type="name" name="nama" id="nama" placeholder="Nama Lengkap">
                               
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" id="email" placeholder="Masukkan Email (@gmail.com)"value="<?= set_value ('email'); ?> ">
                                <div style="color: red;">
                                <?= form_error('email','<div class="text-danger pl-3">', '</div>'); ?>
                            </div>
                            </div>
                            <div class="form-group">
                                <input type="name" name="kode_daftar" id="nisn" placeholder="Masukkan NISN (Nomer Induk Siswa Nasional)">
                                <div style="color: red;">
                                <?= form_error('nisn','<div class="text-danger pl-3">', '</div>'); ?>
                            </div>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password1" id="password1" placeholder="Kata Sandi">
                                  <div style="color: red;">
                                  <?= form_error('password1','<div class="text-danger pl-3">', '</div>'); ?>
                            </div>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password2" id="password2" placeholder="Konfirmasi Kata Sandi">
                            </div>

                             <div class="g-recaptcha" required data-sitekey="6LfgrasUAAAAAGcvZE1DRZcmArrkT9__LhjNcLjW"></div>
    

                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="DAFTAR"/>
                            <p>Jika sudah memiliki akun silahkan <a href="Login">KLIK DISINI</a> </p>
                            </div>
                        </form>
                    </div>
                </div>
        </section>

    </div>

    <!-- JS -->
    <script src="csspage/vendor/jquery/jquery.min.js"></script>
    <script src="csspage/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>