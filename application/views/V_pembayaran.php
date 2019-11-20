<div class="container">
    <br>
  
        <p class="lead" style="font-weight:bold">pembayaran Pelunasan Pendaftaran</p>
        <p>*Pastikan anda telah mengisi formulir sebelum melakukan pelunasan</p>
          <h5 class="border border-success" style="text-align:center; font-weight:bold; color:red">
            <?php echo $this->session->flashdata('sukses');?></h5>
            <div style="font-family:roboto" class="form-group offset-lg-3 col-lg-6 ">
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4">Nama Siswa</div>
                    <div class="col-sm-6 col-md-6 col-lg-6">: <?= $formulir['nama_lengkap'] ?></div>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4">Jurusan</div>
                    <div class="col-sm-6 col-md-6 col-lg-6">: <?= $formulir['jurusan'] ?></div>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4">Id Peserta</div>
                    <div class="col-sm-6 col-md-6 col-lg-6">: <?= $formulir['id_peserta'] ?></div>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4">Email</div>
                    <div class="col-sm-6 col-md-6 col-lg-6">: <?= $formulir['email'] ?></div>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-44">Jumlah Bayar</div>
                    <?php if ($formulir['jurusan']=='Administrasi Perkantoran'){
                        $jumlah = 850000; 
                    }else{
                        $jumlah = 950000;
                        } ?>
                    <div class="col-sm-6 col-md-6 col-lg-6 text-danger">: RP. <?= number_format($jumlah) ?></div>
                </div>
                <hr>
                <p>Silahkan lakukan pembayaran pada rekening dibawah ini :</p>
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4">BANK</div>
                    <div class="col-sm-6 col-md-6 col-lg-6">: BCA</div>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4">NOMOR REKENING</div>
                    <div class="col-sm-6 col-md-6 col-lg-6">: 098976778978655698767</div>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4">ATAS NAMA</div>
                    <div class="col-sm-6 col-md-6 col-lg-6">: smk</div>
                </div>
                <hr>
                 <p>Jika sudah melakukan pembayaran, silahkan konfirmasi pembayaran pada form dibawah ini :</p>
                <?php if ($pelunasan['status']==null){ ?>
                    <form action="<?php echo base_url('dashboard_siswa/simpan_pelunasan'); ?>" method="post" role="form" enctype="multipart/form-data">
                     <label>Tanggal Bayar</label>
                <input type="date" name="tanggal" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" class="form-control">
                <label>Nomor Rekening Pengirim</label>
                <input type="number" min="0" name="norek" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" class="form-control">
                <label >Atas Nama Pengirim</label>
                <input type="text" name="atas_nama" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" class="form-control"> 
                <label >Upload Bukti Transfer</label>
                <input type="file" name="file" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" class="form-control">
                <button type="submit" class="btn btn-outline-success btn-block">Simpan</button>
                </form>

                <?php }elseif($pelunasan['status']=='Tidak Valid'){ ?>
                      <label>Tanggal Bayar</label>
                <input disabled type="date" name="tanggal" value="<?= $pelunasan['tanggal_bayar'] ?>" required class="form-control">
                <label>Nomor Rekening Pelunas</label>
                <input disabled type="text" name="norek" required value="<?= $pelunasan['nomor_rekening'] ?>" class="form-control">
                <label >Atas Nama Pelunas</label>
                <input disabled type="text" name="atas_nama" value="<?= $pelunasan['atas_nama'] ?>" required class="form-control"> 
                <label >Foto Bukti Transfer</label>
                <a href="<?= base_url('upload/pelunasan/').$pelunasan['bukti_tf'] ?>"><img width="100%" src="<?= base_url('upload/pelunasan/').$pelunasan['bukti_tf'] ?>"></a>
               <a href="<?= base_url('dashboard_siswa/hapus_pembayaran/').$pelunasan['kode_pelunasan'] ?>" class="btn btn-outline-danger btn-block">Pembayaran tidak valid silahkan Upload Ulang Bukti transfer</a>

                <?php }elseif($pelunasan['status']=='Valid'){ ?>
                   <label>Tanggal Bayar</label>
                <input disabled type="date" name="tanggal" value="<?= $pelunasan['tanggal_bayar'] ?>" required class="form-control">
                <label>Nomor Rekening Pelunas</label>
                <input disabled type="text" name="norek" required value="<?= $pelunasan['nomor_rekening'] ?>" class="form-control">
                <label >Atas Nama Pelunas</label>
                <input disabled type="text" name="atas_nama" value="<?= $pelunasan['atas_nama'] ?>" required class="form-control"> 
                <label >Foto Bukti Transfer</label>
                <a href="<?= base_url('upload/pelunasan/').$pelunasan['bukti_tf'] ?>"><img width="100%" src="<?= base_url('upload/pelunasan/').$pelunasan['bukti_tf'] ?>"></a>
                <label class="text-success">Pembayaran sudah valid</label>

                <?php }elseif($pelunasan['status']=='Tunggu'){ ?>
                    <label>Tanggal Bayar</label>
                <input disabled type="date" name="tanggal" value="<?= $pelunasan['tanggal_bayar'] ?>" required class="form-control">
                <label>Nomor Rekening Pelunas</label>
                <input disabled type="text" name="norek" required value="<?= $pelunasan['nomor_rekening'] ?>" class="form-control">
                <label >Atas Nama Pelunas</label>
                <input disabled type="text" name="atas_nama" value="<?= $pelunasan['atas_nama'] ?>" required class="form-control"> 
                <label >Foto Bukti Transfer</label>
                <a href="<?= base_url('upload/pelunasan/').$pelunasan['bukti_tf'] ?>"><img width="100%" src="<?= base_url('upload/pelunasan/').$pelunasan['bukti_tf'] ?>"></a>
                <label>Tunggu kofirmasi admin</label><a href="<?= base_url('dashboard_siswa/hapus_pembayaran/').$pelunasan['kode_pelunasan'] ?>"  class="btn btn-outline-warning">Upload Ulang</a>
                <?php } ?>
               
            
        </div>
</div>
<br><br><br><br><br><br>