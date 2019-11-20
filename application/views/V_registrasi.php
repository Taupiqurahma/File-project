

<div class="container">

  <?php if ($akun['status'] != "belum aktif") {?>


    <br>

    <link href="<?php echo base_url();?>assets/netdna.css" rel="stylesheet" id="bootstrap-css">
    <script src="<?php echo base_url();?>assets/netdna.js"></script>
    <script src="<?php echo base_url();?>assets/code.js"></script>


  </br>
</br>
<div class="container">
  <div class="panel panel-success">
    <div class="panel-heading">
      <h3  class="text-center" class="panel-title">Formulir Pendaftaran</h3>
    </div>
    <?php if (!empty($cekkode['kode_daftar'])){ ?>
        <div class="text-center">
          <img src="<?php echo base_url('assets/admin/img/1122.png');?>"><br>
        <label>Anda Sudah Mengisi Formulir</label>
        </div>
      <?php } else { ?>
    <div class="panel-body">


        <div class="row">
          <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
              <div class="stepwizard-step">
                <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                <p>Data Siswa</p>
              </div>
              <div class="stepwizard-step">
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <p>Data Orang Tua</p>
              </div>
              <div class="stepwizard-step">
                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                <p>Surat Pernyataan</p>
              </div> 
            </div>
          </div>

          <form action="<?php echo base_url('Registrasi_siswa/crud_siswa');?>" method="post" role="form" enctype="multipart/form-data"> 

            <div class="row setup-content" id="step-1">
              <div class="col-xs-12">
               <h5 class="border border-success" style="text-align:center; font-weight:bold; color:red">
                <?php echo $this->session->flashdata('sukses');?></h5>
                <h5 class="border border-danger" style="text-align:center; font-weight:bold; color:red">
                  <?php echo $this->session->flashdata('tidak_sukses');?></h5>

                  <h1>Data Siswa</h1>
                  <div class="progress">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                      <span class="sr-only">100% Complete</span>
                    </div>       
                  </div>


                  <div class="form-group">
                    <label for="inputkode" class="col-sm-2 control-label">Kode Daftar</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control"  name="kode_daftar" readonly placeholder="Kode Daftar" value="<?= $akun['kode_daftar'] ?>"required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="inputEmail3"  name="email" placeholder="Email" value=<?= $akun['email'] ?> >
                    </div>
                    <?= form_error('email', '<small class="text-danger" >', '</small>'); ?>
                  </div>

                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Nama Lengkap</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" placeholder="Nama Lengkap"  name="nama_lengkap" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">

                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Nama Panggilan</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="inputPassword3"  required="harus diisi" placeholder="Nama Panggilan" name="nama_panggilan" value=<?= $peserta['nama_panggilan'] ?> >
                    </div>
                  </div>

                  <div class="form-group col-md-4">
                    <label class="control-label">Jenis Kelamin : *</label>
                    <select style="height:35px" class="form-control" name="jenis_kelamin" type="text"
                    name="jenis_kelamin" id="jenis_kelamin" required>
                    <option value="">Pilih</option>
                    <option value="Laki - laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>

                <div class="form-group col-md-4">
                  <label class="control-label">Tempat Lahir : *</label>
                  <input type="text" name="tempat_lahir" required="required" class="form-control"
                  placeholder="Tempat Lahir" />
                </div>
                <div class="form-group col-md-3">
                  <label class="control-label">Tanggal Lahir : *</label>
                  <input type="date" name="tanggal_lahir" required="required" class="date form-control"
                  placeholder="Contoh : 1996-05-08" />
                </div>


                <div class="form-group col-md-10">
                  <label class="control-label">Agama : *</label>
                  <select style="height:35px" class="form-control" name="agama" id="" type="text">
                    <option value="">Pilih Agama</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen Katolik">Kristen Katolik</option>
                    <option value="Kristen Protestan">Kristen Protestan</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Budha">Budha</option>
                  </select>

                </div>


                <div class="form-group col-md-10">
                  <label class="control-label">Jurusan : *</label>
                  <select style="height:35px" class="form-control" name="jurusan" id="" type="text">
                    <option value="">Pilih Jurusan</option>
                    <option value="Administrasi Perkantoran">Administrasi Perkantoran</option>
                    <option value="Multimedia">Multimedia</option>
                  </select>
                </div>


                <div class="form-group col-md-10">
                  <label for="inputPassword3" class="col-sm-2 control-label">Kewarganegaraan</label>
                  <input type="text" class="form-control" id="inputPassword3" placeholder="Kewarganegaraan" name="kewarganegaraan" >
                </div>
              </div>

              <div class="form-group col-md-4">
                <label for="inputPassword3" class="col-sm-2 control-label">Anak Ke</label>
                <div class="col-sm-3">
                  <input type="number" class="form-control" id="inputPassword3" name="anak_ke"  placeholder="">
                </div>
              </div>

              <div class="form-group col-md-4">
                <label for="inputPassword3" class="col-sm-2 control-label">Jumlah Saudara</label>
                <div class="col-sm-4">
                  <input type="number" class="form-control" id="inputPassword3" name="jumlah_saudara" placeholder="">
                </div>
              </div>

              <div class="form-group col-md-4">
                <label for="inputPassword3" class="col-sm-2 control-label">Alamat</label>
                <div class="col-sm-10">
                  <textarea row="5" class="form-control" id="inputPassword3" name="alamat" placeholder="Alamat"></textarea>
                </div>
              </div>

              <div class="form-group col-md-4">
                <label for="inputPassword3" class="col-sm-2 control-label">Status Anak</label>
                <div class="col-sm-4">
                  <select class="form-control" name="status_anak">
                    <option></option>
                    <option>Anak Kandung</option>
                    <option>Anak Tiri</option>
                  </select>
                </div>
              </div>


              <div class="form-group col-md-4">
                <label for="inputPassword3" class="col-sm-2 control-label">No.HP</label>
                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputPassword3" name="no_handphone"  placeholder="Mis 0812xxxxxx">
                </div>
              </div>

              <div class="form-group col-md-3">
                <label for="inputPassword3" class="col-sm-3 control-label">Hobi</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="inputPassword3" name="hobi"  placeholder="Hobi">
                </div>
              </div>

              <div class="form-group col-md-8">
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

              <div class="form-group col-md-6">
                <label for="inputPassword3" class="col-sm-2 control-label">Asal Sekolah</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="text" name="asal_sekolah"  required="required" placeholder="SMP/MTS ....">
                </div>
              </div>

              <div class="form-group col-md-3">
                <label for="file">Pas Foto 3x4</label>
                <input style="width:200px" type="file" name="gambar" class="form-control-file" required>
                <br>
              </div>


              <br>
              <br><button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
            </div>
          </div>
        </div>




        <div class="row setup-content" id="step-2">
          <div class="col-xs-12">
            <h1>Data Orang Tua</h1>
            <div class="progress">
              <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                <span class="sr-only">100% Complete</span>
              </div>
            </div>



            <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Nama Ayah</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="inputEmail3" name="nama_ayah"  placeholder="Nama Ayah">
              </div>
            </div>

            <div class="form-group">
              <label for="inputPassword3" class="col-sm-3 control-label">Nama Ibu</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="inputPassword3" name="nama_ibu"  placeholder="Nama Ibu">
              </div>
            </div>

            <div class="form-group">
              <label for="inputPassword3" class="col-sm-3 control-label">No.telp</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="inputPassword3" name="nama_ibu"  placeholder="Nama Ibu">
              </div>
            </div>


            <div class="form-group col-md-3">
              <label class="control-label">Pendidikan Ayah :</label>
              <select style="height:35px" class="form-control" name="pendidikan_ayah" id="pendidikan_ayah">
                <option value="">Pilih</option>
                <option value="Tidak Sekolah">Tidak Sekolah</option>
                <option value="SD/MI">SD/MI</option>
                <option value="SMP/MTs">SMP/MTs</option>
                <option value="SMK/SMA/MA">SMK/SMA/MA</option>
                <option value="Diploma">Diploma</option>
                <option value="S1">S1</option>
                <option value="S2">S2</option>
                <option value="S3">S3</option>
              </select>

              <div class="form-group col-md-6">
                <label class="control-label">Pendidikan Ibu :</label>
                <select style="height:35px" class="form-control" name="pendidikan_ibu" id="pendidikan_ibu">
                  <option value="">Pilih</option>
                  <option value="Tidak Sekolah">Tidak Sekolah</option>
                  <option value="SD/MI">SD/MI</option>
                  <option value="SMP/MTs">SMP/MTs</option>
                  <option value="SMK/SMA/MA">SMK/SMA/MA</option>
                  <option value="Diploma">Diploma</option>
                  <option value="S1">S1</option>
                  <option value="S2">S2</option>
                  <option value="S3">S3</option>
                </select>
              </div>


              <div class="form-group col-md-6">
                <label class="control-label">Pekerjaan Ayah :</label>
                <select style="height:35px" class="form-control" name="pekerjaan_ayah" id="pekerjaan_ayah"
                maxlength="20">
                <option value="">Pilih</option>
                <option value="Buruh">Buruh</option>
                <option value="Tani">Tani</option>
                <option value="Wiraswasta">Wiraswasta</option>
                <option value="PNS">PNS</option>
                <option value="Polri/TNI">Polri/TNI</option>
                <option value="Perangkat Desa">Perangkat Desa</option>
                <option value="Nelayan">Nelayan</option>
                <option value="Lainnya">Lainnya</option>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label class="control-label">Penghasilan Ayah :</label>
              <select style="height:35px" class="form-control" name="penghasilan_ayah" id="penghasilan_ayah"
              maxlength="20">
              <option value="">Pilih</option>
              <option value="-500rb">-500rb</option>
              <option value="500-1jt">500-1jt</option>
              <option value="1jt-3jt">1jt-3jt</option>
              <option value="3jt-5jt">3jt-5jt</option>
              <option value="5jt-10jt">5jt-10jt</option>
              <option value="10jt+">10jt+</option>
            </select>

          </div>

          <div class="form-group col-md-6">
            <label class="control-label">Pekerjaan Ibu : </label>
            <select style="height:35px" class="form-control" name="pekerjaan_ibu" id="pekerjaan_ibu">
              <option value="">Pilih</option>
              <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
              <option value="Buruh">Buruh</option>
              <option value="Tani">Tani</option>
              <option value="Wiraswasta">Wiraswasta</option>
              <option value="PNS">PNS</option>
              <option value="Polri/TNI">Polri/TNI</option>
              <option value="Perangkat Desa">Perangkat Desa</option>
              <option value="Nelayan">Nelayan</option>
              <option value="Lainnya">Lainnya</option>
            </select>

          </div>

          <div class="form-group col-md-6">
            <label class="control-label">Penghasilan Ibu : </label>
            <select style="height:35px" class="form-control" name="penghasilan_ibu" id="penghasilan_ibu">
              <option value="">Pilih</option>
              <option value="-500rb">-500rb</option>
              <option value="500-1jt">500-1jt</option>
              <option value="1jt-3jt">1jt-3jt</option>
              <option value="3jt-5jt">3jt-5jt</option>
              <option value="5jt-10jt">5jt-10jt</option>
              <option value="10jt+">10jt+</option>
            </select>

          </div>

          <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
        </div>
      </div>
    </div>


    <div class="row setup-content" id="step-3">
      <div class="col-xs-12">
        <div class="col-md-12">
          <h2><center>SURAT PERNYATAAN SISWA/ORANG TUA PESERTA DIDIK</center></h2>
          <h2><center>TAHUN PELAJARAN 2019/2020</center></h2>
          <div class="progress">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
              <span class="sr-only">100% Complete</span>
            </div>
          </div>
          <li>Saya yang bertanda tangan dibawah ini :
            <h2><center>MENYATAKAN</center></h2>
            <ol>
              <li>Akan belajar dengan tekun dan penuh semangat dan disertai rasa tanggung jawab saya sebagai siswa</li>
              <li>Akan menjaga nama baik diri sendiri, keluarga, dan sekolah.</li>
              <li>Sanggup mentaati dan memenuhi semua peraturan dan tata tertib sekolah, termasuk keputusan Direktorat Jenderal Pendidikan Dasar dan Menengah No.052/C/kep/D/82. Tanggal 17 1982 dan No 100/C/Kep/D/1991 tanggal 16 februari 1991 tentang pakaian seragam sekolah </li>
              <li>akan mengikuti pedoman agama sesuai dengan keyakinan saya</li>
              <li>Apabila saya tidak mentaati ketentuan yang telah ditetapkan oleh pihak sekolah, maka saya bersedia menerima sanksi dari sekolah yaitu tidak diperkenankan mengikuti pelajaran selama jangka waktu tertentu (skorsing) ata dikeluarkan dari sekolah </li>

            </ol>
          </li>
        </ul>
        <p>Demikian penyataan ini saya buat dengan sebenarnya, atas persetujuan orang tua/wali saya</p>
        <br><br><br>
        <div style="text-align: right">
        </div>
      </div>                  
    </div>

    <div class="form-group col-md-10">
      <label for="inputPassword3" class="col-sm-5 control-label">Persetujuan orang tua</label>
      <div class="col-sm-10">
        <select style="height:35px" class="form-control" name="persetujuan_ortu">
          <option>klik disini</option>
          <option>Ya, saya menyetujuinya</option>
        </select>
      </div>
    </div>


    <button type="submit" class="btn btn-primary btn-lg btn-block">Simpan</button>

  </div>
</div>
</div>
</form><?php } ?>
<?php

}else{?>
  <br><br><br><br><br><br><br>
  <h2>Maaf <?= $akun ['nama']; ?>, Kode pendaftaran belum diaktivasi, silahkan lakukan konfirmasi pembayaran formulir atau jika sudah silahkan menunggu. ~Terima Kasih~</h2>
  <img src="<?php echo base_url('assets/admin/img/1122.png'); ?> ">
  <?php
} ?>
<br><br><br><br><br><br><br>
<br><br><br><br><br><br><br>
<br><br><br><br><br><br><br>


</div>



