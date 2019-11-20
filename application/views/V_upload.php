

<div class="container">
    <br>
 <h5 class="border border-success" style="text-align:center; font-weight:bold; color:red">
            <?php echo $this->session->flashdata('sukses');?></h5>
    <h2>Upload Berkas</h2>
    <p>Ijazah, skhun, kk (format jpg, png. Maksimum upload file 1 mb)</p>
    <?php if (empty($peserta['id_peserta'])){ ?>
    <p>*PASTIKAN ID PESERTA TERISI JIKA BELUM, SILAHKAN ISI FORMULIR TERLEBIH DAHULU </p>  
    <?php }else{ ?>
    <?php if (!empty($cekberkas['id_peserta'])){ ?>
      <form action="<?php echo base_url().'dashboard_siswa/aksi_upload/'?>" method="post" enctype="multipart/form-data">
     <div class="form-group">
  <label for="inputEmail3" class="col-sm-2 control-label">Id Peserta</label>
  <div class="col-sm-10">
  <input type="text" class="form-control" id="id_peserta"  name="id_peserta" readonly placeholder="" value="<?= $peserta['id_peserta'] ?>" required> 
  </div>
  </div>

        <div class="form-group col-md-3">
                <a href="<?= base_url('upload/berkas/').$cekberkas['skhun'] ?>"><img width="200px" src="<?= base_url('upload/berkas/').$cekberkas['skhun'] ?>"></a><br>
                <label for="file">SKHUN</label>

                <br>
  </div>
 <div class="form-group col-md-3">
                <a href="<?= base_url('upload/berkas/').$cekberkas['ijazah'] ?>"><img width="200px" src="<?= base_url('upload/berkas/').$cekberkas['ijazah'] ?>"></a><br>
                <label for="file">Ijazah</label>

                <br>
  </div>
 <div class="form-group col-md-3">
                <a href="<?= base_url('upload/berkas/').$cekberkas['kk'] ?>"><img width="200px" src="<?= base_url('upload/berkas/').$cekberkas['kk'] ?>"></a><br>
                <label for="file">KK</label>
                <br>
  </div>

        <A href="<?= base_url('dashboard_siswa/upload_ulang_berkas/').$cekberkas['kode_berkas'] ?>" class="btn btn-warning">Upload Ulang</A>
    </form>
    <?php }else{ ?>
    
    <form action="<?php echo base_url().'dashboard_siswa/aksi_upload/'?>" method="post" enctype="multipart/form-data">
     <div class="form-group">
  <label for="inputEmail3" class="col-sm-2 control-label">Id Peserta</label>
  <div class="col-sm-10">
  <input type="text" class="form-control" id="id_peserta"  name="id_peserta" readonly placeholder="" value="<?= $peserta['id_peserta'] ?>" required> 
  </div>
  </div>

        <div class="form-group col-md-3">
                <label for="file">SKHUN</label>
                <input style="width:200px" type="file" name="skhun" class="form-control-file"  onKeyPress="return hanyaAngka(event);" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                <br>
  </div>
 <div class="form-group col-md-3">
                <label for="file">Ijazah</label>
                <input style="width:200px" type="file" name="ijazah" class="form-control-file"  onKeyPress="return hanyaAngka(event);" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                <br>
  </div>
 <div class="form-group col-md-3">
                <label for="file">KK</label>
                <input style="width:200px" type="file" name="kk" class="form-control-file"  onKeyPress="return hanyaAngka(event);" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                <br>
  </div>

        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
  <?php } ?>
  <?php } ?>
 </div>
</body>
</html>