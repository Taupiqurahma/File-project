<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LOGIN - PPDB SMK Cakrawala</title>
    <link rel="icon" href="assets/csspage/img/icon.png">
    

    
    <link rel="stylesheet" href="assets/csspage/fonts/material-icon/css/material-design-iconic-font.min.css">

    <link rel="stylesheet" href="assets/csspage/css/style1.css">

</head>
<body>
</br>
</br>
</br>
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                    </br>
                    </br>
                </br>
                </br>
                </br>
                        <figure><img src="assets/csspage/img/school.png" alt="sing up image"></figure>
                    </div>


       
                    <div class="signin-form">
                        </br>
                        </br>
                         <img src="assets/admin/img/1122.png">
                         <div>
                         <h2 class="form-title">MASUK</h2>
                         </div>
                         <?= $this->session->flashdata('message');?>
                        <form method="POST" action="<?= base_url('Login') ?>" class="register-form" id="login-form">
                            <div class="form-group">
                                <input type="email" name="email" id="email" placeholder="Masukkan Email"/>
                                  <div style="color: red;">
                                  <?= form_error('email','<div class="text-danger pl-3">', '<div>'); ?>
                                  </div>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="password" placeholder="Kata Sandi"/>
                            <div style="color: red;">
                                 <?= form_error('password','<div class="text-danger pl-3">', '</div>'); ?>
                            </div>
                        </div>
                       
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                                </br>
                                </br>
                                
                                <a href="<?= base_url ('Lupapassword')?>">LUPA KATA SANDI ?</a>
                                <hr class="my-4">
                            <p>Jika belum memiliki akun, silahkan</p>
                         <a href="Daftar"> BUAT AKUN </a> || <a href="Welcome">KEMBALI</a>
                            </br>
                        </br>
                    </br>
                            </div>
                                </form>
            </div>
            </div>
            </div>
            </section>
            <script src="assets/csspage/vendor/jquery/jquery.min.js"></script>
            <script src="assets/csspage/js1/main.js"></script>
            </body>
            </html>
            
                   