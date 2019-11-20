<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->


    <!-- Favicon -->
    <link rel="icon" href="assets/csspage/img/icon.png">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="assets/csspage/style.css">

</head>

<body>
    <!-- ##### Preloader ##### -->
    <div id="preloader">
        <i class="circle-preloader"></i>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Top Header Area -->
        <div class="top-header">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-12 h-100">
                        <div class="header-content h-100 d-flex align-items-center justify-content-between">
                            <div class="academy-logo">
                                <img src="assets/csspage/img/TES1.png" alt=""></a>
                            </div>
                            <div class="login-content">
                                <a href="login">Register / Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar Area -->
        <div class="academy-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="academyNav">

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul class="menu">
                                    <li class= "<?php if($this->uri->segment('1') == 'Welcome') { echo "active" ;} ?>">
                                    <a href="<?php echo base_url();?>Welcome">Home</a>
                                    </li>
                                  
                                    <li><a href="Tentang_kami">Tentang Kami</a></li>
                                    <li><a href="Info_pendaftaran">Info Pendaftaran</a></li> 
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>

                        <!-- Calling Info -->
                        <div class="calling-info">
                            <div class="call-center">
                                <a href=""></i> <span>PPDB SMK CAKRAWALA</span></a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>


     <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="assets/csspage/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="assets/csspage/js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="assets/csspage/js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="assets/csspage/js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="assets/csspage/js/active.js"></script>