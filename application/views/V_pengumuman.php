    <div class="container">
        <br>
        <br>
        <?php if ($pengumuman != "Tutup") {?>
        <form action="<?php echo base_url('Dashboard_siswa/detailpengumuman'); ?>" method="post" role="form">
            <div class="form-group">
                <label for="kode">Masukkan Kode Daftar</label>
                <input type="char" class="form-control" name="kode_daftar" id="kode_daftar" aria-describedby="kode_daftar"
                    value="<?= $akun['kode_daftar'] ?>" placeholder="">
                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>
            <h5 class="border border-danger" style="text-align:center; font-weight:bold; color:black"><?php echo $this->session->flashdata('pendaftar');?></h5>
            <button type="submit" class="btn btn-primary">Lihat</button>
        </form> 
        

         <?php

        }else{?>
    <br><br><br><br><br><br><br>
    <h2>Maaf <?= $akun ['nama']; ?>, pengumuman belum dibuka. Silahkan hubungi kami untuk informasi lebih lanjut. ~Terima Kasih~</h2>
    <img src="<?php echo base_url('assets/admin/img/1122.png'); ?> ">
    <?php
        } ?>

    </div>
    <br>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>