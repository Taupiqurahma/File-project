

<div class="fh5co-contact animate-box">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <br>
          <img src="<?php echo base_url(); ?>assets/admin/img/1122.png">
          <h3>Hubungi kami</h3>
          <hr class="my-4">
        <div class="col-md-19 col-md-push-5 col-sm-12 col-sm-push-60 col-xs-20 col-xs-push-0">
        <?php echo $this->session->flashdata('msg');?>
          <div class="row">
          <form method="post" action="<?php echo base_url().'dashboard_siswa/kirim_pesan'?>">
            <div class="col-md-9">
              <div class="form-group">
                <input class="form-control" name="nama" placeholder="Nama" type="text" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
              </div>
            </div>
            <div class="col-md-9">
              <div class="form-group">
                <input class="form-control" name="email"  placeholder="Email" type="email" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
              </div>
            </div>
            <div class="col-md-9">
              <div class="form-group">
                <textarea name="pesan" class="form-control" id="" cols="150" rows="10" placeholder="Message" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')"></textarea>
              </div>
            </div>
            <div class="col-md-9">
              <div class="form-group">
                <input value="Kirim Pesan" class="btn btn-primary" type="submit">
              </div>
            </div>
          </form>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
