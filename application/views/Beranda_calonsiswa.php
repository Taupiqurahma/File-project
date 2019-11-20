<div class="container">
    <br>
    <br>
    <?php 
    $tanggal = mktime(date('m'), date("d"), date('Y'));
    echo "Tanggal : <b> " . date("d-m-Y", $tanggal ) . "</b>";
    date_default_timezone_set("Asia/Jakarta");
    $jam = date ("H:i:s");
    echo " | Pukul : <b> " . $jam . " " ." </b> ";
    $a = date ("H");
    if (($a>=6) && ($a<=10)) {
        echo " <b>, Selamat Pagi </b>";
    }else if(($a>=11) && ($a<=15)){
        echo " <b>, Selamat  siang </b> ";
    }elseif(($a>=14) && ($a<=19)){
        echo "<b>, Selamat Sore </b>";
    }else{
        echo ", <b> Selamat Malam </b>";
    }
    ?>
    <b><?= $akun['nama'] ?></b> |
     <b>Kode pendaftaran anda <?= $akun['kode_daftar'] ?></b> 
    <br>
    <marquee behavior="scroll" scrollamount="5"  onmoseout="this.strat();" direction="left">
    Penerimaan peserta didik baru berbasis website pada SMK Cakrawala Bojonggede - Bogor </marquee>
    <?php if ($daftar != "Tutup") {?>

        <h5  style="text-align:center; font-weight:bold; color:red">
            <?php echo $this->session->flashdata('sukses');?></h5>
            <h5  style="text-align:center; font-weight:bold; color:red">
                <?php echo $this->session->flashdata('tidak_sukses');?></h5>
                <h1 class="display-4" style="font-weight:bold" class="text-center">Selamat Datang Peserta Didik Baru</h1>
                <?php foreach ($tampil as $t): ?>
                    <div class="col-md-12">
                        <h2><center>PANDUAN PENDAFTARAN</center></h2>
                        <h2><center>PPDB SMK CAKRAWALA TAHUN AJARAN 2019/2020</center></h2>
                      
                        <ol>
                          <li><?php echo $t->info2 ?> <?php echo $t->nomor_rekening ?> atas nama <?php echo $t->nama_rekening ?> </li>
                          <li><?php echo $t->info3 ?></li>
                          <li><?php echo $t->info4 ?></li>
                          <li><?php echo $t->info5 ?></li>
                          <li><?php echo $t->info6 ?></li>
                          <li><?php echo $t->info7 ?></li>
                          
                      </ol>
                  </ul>

                  <div style="text-align: right">
                  </div>
              </div>                  


          <?php endforeach; ?>
          <br>

          <p class="lead" style="font-weight:bold">Silahkan Membayar dan upload bukti pembayaran formulir di bawah ini : </p>
          <form action="<?php echo base_url('Dashboard_siswa/add'); ?>" required="rules" method="post" role="form" enctype="multipart/form-data">

            <div style="font-family:roboto" class="row col-xs-12">



                <div class="form-group col-md-3">
                    <label for="nisn">Kode Daftar</label>
                    <input type="char" maxlength="10" name="kode_daftar" class="form-control" aria-describedby="kode_daftar"
                    readonly placeholder="Kode Daftar" onKeyPress="return hanyaAngka(event);" value="<?= $akun['kode_daftar']; ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">

                </div>
                <div class="form-group col-md-3">
                    <label for="email">Email </label>
                    <input type="email" name="email" class="form-control" readonly value="<?= $akun['email'] ?>"  aria-describedby="email"
                    placeholder="smkcakrawala@gmail.com" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">

                </div>


            <div class="form-group col-md-3">
                <label for="nomor_rekening">Nomor Rekening Pengirim</label>
                <input type="char" maxlength="20" class="form-control" name="nomor_rekening"
                aria-describedby="nomor_rekening" placeholder=""
                onKeyPress="return hanyaAngka(event);" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
            </div>

            <div class="form-group col-md-3">
                <label for="tanggal">Tanggal</label>
                <input type="date" maxlength="8" class="form-control" name="tanggal"
                onKeyPress="return hanyaAngka(event);" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
            </div>

        

            <div class="form-group col-md-3">
                <label for="nama_pengirim">Nama Pengirim</label>
                <input type="char" class="form-control" name="nama_pengirim" aria-describedby="nama_pengirim"
                placeholder="Nama Pengirim" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
            </div>


            <div class="form-group col-md-3">
                <label for="file">Upload Bukti Registrasi</label>
                <input style="width:200px" type="file" name="gambar" class="form-control-file" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                <br>
            </div>

            <div class="form-group col-md-5"><br>
                <button type="submit" class="btn btn-primary col-md-5">Konfirmasi Pembayaran</button>
            </div>

        </div>
    </form>
    
                <?php

            }else{?>
                
                <h1>Maaf Pendaftaran Belum Di Buka</h1>
                <img src="<?php echo base_url('assets/admin/img/1122.png'); ?> ">
                <?php
            } ?>
    <h5  style="text-align:center; font-weight:bold; color:red">
        <?php echo $this->session->flashdata('sukses');?></h5>
        <h5  style="text-align:center; font-weight:bold; color:red">
            <?php echo $this->session->flashdata('tidak_sukses');?></h5>

            <hr class="my-5">
            <h3>Jika sudah melakukan konfirmasi pembayaran silahkan tunggu aktivasi kode daftar oleh admin atau lanjutkan pendaftaran pada form dibawah ini :</h3>


            <a href="<?php echo base_url();?>Registrasi_siswa/index" button type="button"
                style="font-family:roboto" class="btn btn-danger ">Lanjutkan pendaftaran</a>





          


        </div>