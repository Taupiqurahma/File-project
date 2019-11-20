</br>
</br>
<div class="container">
<div class="panel panel-success">
<div class="panel-heading">
<h3  class="text-center" class="panel-title">Formulir Pendaftaran</h3>
</div>
<div class="panel-body">
<?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success" role="alert">
          <?php echo $this->session->flashdata('success'); ?>
        </div>
        <?php endif; ?>


   
  <h1>Data Siswa</h1>
  <div class="progress">
  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
  <span class="sr-only">100% Complete</span>
  </div>
  </div>
  <?php foreach($peserta as $p){ ?>
  <form action="<?php echo base_url(). 'Dashboard_admin/update'; ?>" method="post">    

  <label class="control-label">Status Penerimaan</label>
  <select style="height:35px" class="form-control" name="status_pendaftaran" id="status">
  <option value="<?php echo $p->status_pendaftaran ?>"><?php echo $p->status_pendaftaran ?></option>
  <option value="Diterima">Diterima</option>
  <option value="Ditolak">Ditolak</option>
  </select><br>
  
  <div class="form-group">
  <label for="inputEmail3" class="col-sm-2 control-label">Id Peserta</label>
  <div class="col-sm-10">
  <input type="text" class="form-control" id="inputEmail3"  name="id_peserta" readonly placeholder="Kode Daftar" value=<?php echo $p->id_peserta ?>>
  </div>
  </div>


  <div class="form-group">
  <label for="inputEmail3" class="col-sm-2 control-label">Kode Daftar</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3"  name="kode_daftar" readonly placeholder="Kode Daftar" value=<?php echo $p->kode_daftar ?> >
    </div>
  </div>
 


<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3"  name="email" readonly placeholder="Email" value=<?php echo $p->email ?> >
    </div>
  </div>

  <div class="form-group">
    <label for="text" class="col-sm-2 control-label">Nama Lengkap</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="text" placeholder="Nama_lengkap" name= "nama_lengkap" value='<?php echo $p->nama_lengkap ?>'>
      <div style="color: red;">
      <?= form_error('nama_lengkap','<div class="text-danger pl-3">', '</div>'); ?>
      </div>
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-5 control-label">Nama Panggilan</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputPassword3" placeholder="Nama Panggilan" name="nama_panggilan" value="<?php echo $p->nama_panggilan ?>" >
    </div>
  </div>

   <div class="form-group">
   <label class="control-label">Jenis Kelamin : *</label>
   <select style="height:35px" class="form-control" name="jenis_kelamin" type="text" name="jenis_kelamin" id="jenis_kelamin" required>
    <option value="<?php echo $p->jenis_kelamin; ?>"><?php echo $p->jenis_kelamin; ?></option>
    <option value="Laki - laki">Laki-laki</option>
    <option value="Perempuan">Perempuan</option>
    </select>
    </div>
  
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Tempat Lahir</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="inputPassword3" placeholder="Mis: Bandung" value="<?php echo $p->tempat_lahir ?>" name="tempat_lahir" >
    </div>
    
    </div>
    
<div class="form-group col-md-3">
<label class="control-label">Tanggal Lahir : *</label>
<input type="date" name="tanggal_lahir" required="required" class="date form-control" value="<?php echo $p->tanggal_lahir ?>" placeholder="Contoh : 1996-05-08" />
</div>
                  
    
    <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Agama</label>
    <div class="col-sm-10">
      <select class="form-control" name="agama">
          <option value="<?php echo $p->agama; ?>"><?php echo $p->agama; ?></option>
          <option>Islam</option>
          <option>Kristen</option>
          <option>Katolik</option>
          <option>Hindu</option>
          <option>Buddha</option>
    </select>
    </div>
  </div>

     <div class="form-group col-md-10">
                        <label class="control-label">Jurusan : *</label>
                        <select style="height:35px" class="form-control" name="jurusan" id="" type="text">
                            <option value="<?php echo $p->agama; ?>"><?php echo $p->jurusan; ?></option>
                            <option value="Administrasi Perkantoran">Administrasi Perkantoran</option>
                            <option value="Multimedia">Multimedia</option>
                        </select>
      </div>
  
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Kewarganegaraan</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputPassword3" placeholder="Kewarganegaraan" value="<?php echo $p->kewarganegaraan ?>" name="kewarganegaraan" >
    </div>
  </div>
  
  <div class="form-group">
  
    <label for="inputPassword3" class="col-sm-2 control-label">Anak Ke</label>
    <div class="col-sm-2">
      <input type="number" class="form-control" id="inputPassword3" name="anak_ke" value="<?php echo $p->anak_ke ?>" placeholder="">
    </div>
    
    <div class="col-sm-3">
      <label for="inputPassword3" class="control-label">Jumlah Saudara</label>
    </div>
    
    <div class="col-sm-2">
      <input type="number" class="form-control" id="inputPassword3" name="jumlah_saudara" value="<?php echo $p->jumlah_saudara ?>" placeholder="">
    </div>
    
  </div>
  
  
    
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Alamat</label>
    <div class="col-sm-10">
      <textarea row="5" class="form-control" id="inputPassword3" name="alamat" value="<?php echo $p->alamat ?>" placeholder="Alamat"></textarea>
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Status Anak</label>
    <div class="col-sm-10">
      <select class="form-control" name="status_anak" value="<?php echo $p->status_anak ?>">
            <option></option>
          <option>Anak Kandung</option>
          <option>Anak Tiri</option>
    </select>
    </div>
  </div>
  
    
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">No Handphone</label>
    <div class="col-sm-4">
      <input type="number" class="form-control" id="inputPassword3" name="no_handphone" value="<?php echo $p->no_handphone ?>"  placeholder="Mis 0812.....">
    </div>
    
    
    <label for="inputPassword3" class="col-sm-3 control-label">Hobi</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="inputPassword3" name="hobi" value="<?php echo $p->hobi ?>"  placeholder="Hobi">
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Tinggal Pada</label>
    <div class="col-sm-10">
      <label class="radio-inline">
        <input type="radio" name="tinggal_pada" id="inlineRadio1" value="orang tua" checked="checked"> Orang Tua
        </label>
        <label class="radio-inline">
          <input type="radio" name="tinggal_pada" id="inlineRadio2" value="menumpang"> Menumpang
        </label>
        <label class="radio-inline">
          <input type="radio" name="tinggal_pada" id="inlineRadio2" value="asrama"> Asrama
        </label>
    </div>
  </div>

  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Asal Sekolah</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="text" name="asal_sekolah" value="<?php echo $p->asal_sekolah ?>"  placeholder="SMP/MTS ....">
    </div>
  </div>
  
  <img src="<?php echo base_url();?>upload/<?php echo $p->gambar ?>" height="70px" width="60px">

  




<h1>Data Orang Tua</h1>
<div class="progress">
  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
    <span class="sr-only">100% Complete</span>
  </div>
</div>


          
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-3 control-label">Nama Ayah</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="inputEmail3" name="nama_ayah" value="<?php echo $p->nama_ayah ?>"  placeholder="Nama Ayah">
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Nama Ibu</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="inputPassword3" name="nama_ibu" value="<?php echo $p->nama_ibu ?>" placeholder="Nama Ibu">
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Pendidikan Tertinggi Ayah</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="inputPassword3" name="pendidikan_ayah" value="<?php echo $p->pendidikan_ayah ?>" placeholder="Pendidikan Tertinggi Ayah">
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Pendidikan Tertinggi Ibu</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="inputPassword3" name="pendidikan_ibu" value="<?php echo $p->pekerjaan_ibu ?>" placeholder="Pendidikan Tertinggi Ibu">
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Pekerjaan Ayah</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="inputPassword3" name="pekerjaan_ayah" value="<?php echo $p->pekerjaan_ayah ?>" placeholder="PNS/TNI/Peg. Swasta/WiraSwasta/Petani/Buruh">
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Pekerjaan Ibu</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="inputPassword3" name="pekerjaan_ibu" value="<?php echo $p->pekerjaan_ibu ?>" placeholder="PNS/TNI/Peg. Swasta/WiraSwasta/Petani/Buruh">
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">penghasilan</label>
    <div class="col-sm-9">
      <input type="number" class="form-control" id="inputPassword3" name="penghasilan_ayah" value="<?php echo $p->penghasilan_ayah ?>" placeholder="Misal 2000000">
    </div>
  </div>  
  </div>


<button type="submit" class="btn btn-primary btn-lg btn-block">Simpan</button>
    
<br>
 <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href=<?php echo base_url(); ?>"Dashboard_admin/logout">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url();?>assets/admin/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url();?>assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url();?>assets/admin/js/sb-admin-2.min.js"></script>

</body>

</html>

    </form>
    <?php } ?>
  </div>  
</div>

